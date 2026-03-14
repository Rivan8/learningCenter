<?php
namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Fine;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Middleware\CheckAdminRole;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, DispatchesJobs;

    public function __construct()
    {
        $this->middleware(CheckAdminRole::class);
    }
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'member') {
            return redirect()->route('users.member');
        }

        $users = User::all();
        $books = Book::all();



        $title = 'Daftar Peminjaman';
        // $borrowings = Borrowing::with(['user', 'book', 'fine'])->get();
        $borrowings = Borrowing::with(['user', 'book'])->get()->map(function($borrowing) {
            $borrowing->borrowed_at = Carbon::parse($borrowing->borrowed_at)->format('d-M-Y'); // Format tanggal
            $borrowing->due_date = Carbon::parse($borrowing->due_date)->format('d-M-Y'); // Format tanggal
            $borrowing->returned_at = $borrowing->returned_at ? Carbon::parse($borrowing->returned_at)->format('d-M-Y') : null; // Format tanggal jika ada
            return $borrowing;
        });
        return view('peminjaman.index', compact('borrowings', 'users','title', 'books'));
    }

    public function create()
    {
        $users = User::where('role', 'member')->get();
        $books = Book::where('quantity', '>', 0)->get();
        return view('peminjaman.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
            'due_date' => 'required|date|after:borrowed_at',
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
            'status'=>'required|in:Dipinjam,Dikembalikan',
        ]);

        $book = Book::findOrFail($request->book_id);
        if ($book->quantity <= 0) {
            return redirect()->back()->withErrors(['book_id' => 'This book is currently unavailable.']);
        }



        Borrowing::create($request->all());
        $book->decrement('quantity');

        return redirect()->route('borrowings.index')->with('success', 'Borrowing created successfully.');
    }

    public function edit(Borrowing $borrowing)
    {
        $title = 'Edit Peminjaman';
        $users = User::where('role', 'member')->get();

        $books = Book::all();
        return view('peminjaman.edit', compact('borrowing', 'users', 'books', 'title'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $request->validate([
            'borrowed_at' => 'required|date',
            'due_date' => 'required|date|after:borrowed_at',
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
            'status' => 'required|in:Dipinjam,Dikembalikan',
        ]);
        try {
        $borrowing->update($request->all());

        if ($request->status === 'returned' && !$borrowing->returned_at) {
            $borrowing->update(['returned_at' => now()]);
            $borrowing->book->increment('quantity');

            // Check for fines
            // if ($borrowing->returned_at->gt(Carbon::parse($borrowing->due_date))) {
            //     $daysLate = $borrowing->returned_at->diffInDays(Carbon::parse($borrowing->due_date));
            //     Fine::create([
            //         'borrowing_id' => $borrowing->id,
            //         'amount' => $daysLate * 1000, // Example: Rp 1000 per hari
            //     ]);
            // }
        }

        return redirect()->route('borrowings.index')->with('berhasil', 'Data Peminjaman berhasil diperbaharui.');
    } catch (\Exception $e) {
        // Jika gagal, set flash message error
        return redirect()->route('borrowings.index')->with('gagal', 'Data Peminjaman gagal diperbaharui.');
    }
}
    public function show( $id)
    {
        $users = User::all();
        $books = Book::all();
        $borrowing = Borrowing::with('user', 'book')->findOrFail($id);
        $title = 'Detail Peminjaman';
        // $borrowings = Borrowing::with(['user', 'book', 'fine'])->get();
        $borrowings = Borrowing::with(['user', 'book'])->get()->map(function($borrowing) {
            $borrowing->borrowed_at = Carbon::parse($borrowing->borrowed_at)->format('d-M-Y'); // Format tanggal
            $borrowing->due_date = Carbon::parse($borrowing->due_date)->format('d-M-Y'); // Format tanggal
            $borrowing->returned_at = $borrowing->returned_at ? Carbon::parse($borrowing->returned_at)->format('d-M-Y') : null; // Format tanggal jika ada
            return $borrowing;
        });
        return view('peminjaman.detail', compact('borrowings', 'users', 'title', 'books','borrowing'));
    }

    public function destroy(Borrowing $borrowing)
    {
        if ($borrowing->status === 'borrowed') {
            $borrowing->book->increment('quantity');
        }

        $borrowing->delete();

        return redirect()->route('borrowings.index')->with('success', 'data Peminjaman berhasil dihapus.');
    }

    public function generatePDF()
{
    // Ambil data yang ingin ditampilkan di PDF
    $borrowings = Borrowing::with(['user', 'book'])->get()->map(function($borrowing) {
        $borrowing->borrowed_at = Carbon::parse($borrowing->borrowed_at)->format('d-M-Y'); // Format tanggal
        $borrowing->due_date = Carbon::parse($borrowing->due_date)->format('d-M-Y'); // Format tanggal
        $borrowing->returned_at = $borrowing->returned_at ? Carbon::parse($borrowing->returned_at)->format('d-M-Y') : null; // Format tanggal jika ada
        return $borrowing;
    });

    $data = [
        'title' => 'Laporan Peminjaman',
        'date' => date('m/d/Y'),
        'borrowings' => $borrowings
    ];

    // Generate PDF dari view
    $pdf = PDF::loadView('peminjaman.report', $data);

    // Download PDF
    return $pdf->download('laporan.pdf');
}



    public function streamPDF()
    {
        $borrowings = Borrowing::with(['user', 'book'])->get()->map(function($borrowing) {
            $borrowing->borrowed_at = Carbon::parse($borrowing->borrowed_at)->format('d-M-Y'); // Format tanggal
            $borrowing->due_date = Carbon::parse($borrowing->due_date)->format('d-M-Y'); // Format tanggal
            $borrowing->returned_at = $borrowing->returned_at ? Carbon::parse($borrowing->returned_at)->format('d-M-Y') : null; // Format tanggal jika ada
            return $borrowing;
        });
        $data = [
            'title' => 'Laporan Data Peminjaman Buku',
            'date' => date('m/d/Y'),
            'borrowings' => $borrowings

        ];

        // Tampilkan PDF di browser
        $pdf = PDF::loadView('peminjaman.report', $data);
        return $pdf->stream('laporan.pdf');
    }
}

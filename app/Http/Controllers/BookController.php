<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckAdminRole;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends BaseController
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
        $title = 'List of Books';
        $books = Book::with('category')->get();
        $categories = Category::all();
        return view('books.index', compact('books', 'title', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'kode_buku' => 'required|string|max:10',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|digits:4',
            'isbn' => 'required|unique:books', // Pastikan ISBN unik
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Menyimpan foto jika ada
        $coverPath = null;
        if ($request->hasFile('cover')) {
            // Pastikan direktori 'cover' ada
            $coverPath = $request->file('cover')->storeAs(
                'photo',
                time() . '-' . $request->file('cover')->getClientOriginalName(),
                'public' // Pastikan disk 'public' sudah terkonfigurasi
            );
        }

        // Menyimpan buku dengan path cover
        Book::create(array_merge($request->except('cover'), ['cover' => $coverPath]));

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        $title = 'Edit Book';
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories', 'title'));
    }

    public function update(Request $request, Book $book)
    {
        // dd($request->all()); // Hapus atau komentari ini setelah debugging
        $request->validate([
            'title' => 'required|string|max:255',
            'kode_buku' => 'required|string|max:10',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|digits:4',
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Menyimpan foto jika ada
        $coverPath = null;
        if ($request->hasFile('cover')) {
            // Pastikan direktori 'cover' ada
            $coverPath = $request->file('cover')->storeAs(
                'photo',
                time() . '-' . $request->file('cover')->getClientOriginalName(),
                'public' // Pastikan disk 'public' sudah terkonfigurasi
            );
        }

        // Pastikan untuk menyertakan 'cover' saat melakukan update
        $dataToUpdate = $request->all();
        if ($coverPath) {
            $dataToUpdate['cover'] = $coverPath; // Menyertakan path cover yang baru
        }

        $book->update($dataToUpdate); // Menggunakan data yang sudah diperbarui

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function detail($id){
        $title = "Detail Buku";
        $buku = Book::findOrFail($id);
        return view('books.detail', compact('title','buku'));

    }
    public function search(Request $request) {
        $search = $request->input('query');
       
        $query = Book::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('kode_buku', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->orWhereHas('category', function($q) use ($search) {
                      $q->where('name', 'LIKE', "%{$search}%");
                  });
            });
        }

        $books = $query->get();
        return view('home', compact('books'));
    }


    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}

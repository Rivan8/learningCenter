<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\User;
use App\Models\VideoProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard";
        $books = new Book();
        $member = User::where('role','member');
        $user = User::paginate(5);
        $pinjam = new Borrowing();
        $kategori = Category::all();
        $buku = Book::all();
        $borrowing = Borrowing::all();

        // Statistik progres video Why
        $totalUsers = User::where('role', 'member')->count();

        // Menghitung jumlah user yang telah menyelesaikan video Why
        $completedWhyUsers = User::whereHas('videoProgress', function($query) {
            $query->where('video_type', 'why')
                  ->where('is_completed', true);
        }, '>=', 1)->count();

        // Menghitung jumlah user yang sedang dalam progres video Why
        $inProgressWhyUsers = User::whereHas('videoProgress', function($query) {
            $query->where('video_type', 'why')
                  ->where('is_completed', false)
                  ->where('progress_percentage', '>', 0);
        })->count();

        // Menghitung jumlah user yang belum memulai video Why
        $notStartedWhyUsers = $totalUsers - ($completedWhyUsers + $inProgressWhyUsers);

        // Menghitung persentase untuk masing-masing kategori
        $completedWhyPercentage = $totalUsers > 0 ? round(($completedWhyUsers / $totalUsers) * 100) : 0;
        $inProgressWhyPercentage = $totalUsers > 0 ? round(($inProgressWhyUsers / $totalUsers) * 100) : 0;
        $notStartedWhyPercentage = $totalUsers > 0 ? round(($notStartedWhyUsers / $totalUsers) * 100) : 0;

        // Menghitung rata-rata progres video Why
        $avgWhyProgress = 0;
        if ($totalUsers > 0) {
            $totalWhyProgress = User::where('role', 'member')
                ->withCount(['videoProgress as total_why_progress' => function($query) {
                    $query->where('video_type', 'why')
                          ->select(DB::raw('COALESCE(AVG(progress_percentage), 0)'));
                }])
                ->get()
                ->sum('total_why_progress');

            $avgWhyProgress = round($totalWhyProgress / $totalUsers);
        }

        // Statistik progres video What
        // Menghitung jumlah user yang telah menyelesaikan video What
        $completedWhatUsers = User::whereHas('videoProgress', function($query) {
            $query->where('video_type', 'what')
                  ->where('is_completed', true);
        }, '>=', 1)->count();

        // Menghitung jumlah user yang sedang dalam progres video What
        $inProgressWhatUsers = User::whereHas('videoProgress', function($query) {
            $query->where('video_type', 'what')
                  ->where('is_completed', false)
                  ->where('progress_percentage', '>', 0);
        })->count();

        // Menghitung jumlah user yang belum memulai video What
        $notStartedWhatUsers = $totalUsers - ($completedWhatUsers + $inProgressWhatUsers);

        // Menghitung persentase untuk masing-masing kategori
        $completedWhatPercentage = $totalUsers > 0 ? round(($completedWhatUsers / $totalUsers) * 100) : 0;
        $inProgressWhatPercentage = $totalUsers > 0 ? round(($inProgressWhatUsers / $totalUsers) * 100) : 0;
        $notStartedWhatPercentage = $totalUsers > 0 ? round(($notStartedWhatUsers / $totalUsers) * 100) : 0;

        // Menghitung rata-rata progres video What
        $avgWhatProgress = 0;
        if ($totalUsers > 0) {
            $totalWhatProgress = User::where('role', 'member')
                ->withCount(['videoProgress as total_what_progress' => function($query) {
                    $query->where('video_type', 'what')
                          ->select(DB::raw('COALESCE(AVG(progress_percentage), 0)'));
                }])
                ->get()
                ->sum('total_what_progress');

            $avgWhatProgress = round($totalWhatProgress / $totalUsers);
        }

        return view('dashboard.index', compact(
            'books', 'title', 'user', 'pinjam', 'kategori', 'member', 'buku', 'borrowing',
            'totalUsers', 'completedWhyUsers', 'inProgressWhyUsers', 'notStartedWhyUsers',
            'completedWhyPercentage', 'inProgressWhyPercentage', 'notStartedWhyPercentage', 'avgWhyProgress',
            'completedWhatUsers', 'inProgressWhatUsers', 'notStartedWhatUsers',
            'completedWhatPercentage', 'inProgressWhatPercentage', 'notStartedWhatPercentage', 'avgWhatProgress'
        ));
    }
}

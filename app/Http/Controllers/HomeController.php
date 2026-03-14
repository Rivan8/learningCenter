<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Gunakan Auth tanpa backslash

        // Cek peran pengguna
        if ($user->role !== 'admin' && $user->role !== 'member') {
            return redirect()->route('users.index')->with('error', 'Akses ditolak. Hanya member yang dapat mengakses halaman ini.');
        }

        $title = 'List of Books';
        $books = Book::with('category')->get();
        $categories = Category::all();
        return view('page.landing', compact('books', 'title', 'categories'));
    }
}

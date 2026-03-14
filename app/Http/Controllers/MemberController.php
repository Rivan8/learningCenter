<?php

namespace App\Http\Controllers;


use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Gunakan Auth tanpa backslash

        // Cek peran pengguna
        if ($user->role !== 'member') {
            return redirect()->route('users.index')->with('error', 'Akses ditolak. Hanya member yang dapat mengakses halaman ini.');
        }

        $title = 'Member';
        // Ambil data peminjaman berdasarkan user_id menggunakan model Borrowing
        $pinjambuku = Borrowing::where('user_id', $user->id)
            ->with(['book'])
            ->get();

        // return view('users.member', compact('pinjambuku', 'title'));
        return view('home', compact('pinjambuku', 'title'));
    }
}

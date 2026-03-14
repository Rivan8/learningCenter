<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.signin');
    }

    // Proses login
    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah pengguna ada
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Menentukan arah berdasarkan peran pengguna
            $user = Auth::user();
            if ($user->role === 'member') {
                return redirect()->action([MemberController::class, 'index']);
            } elseif ($user->role === 'admin') {
                return redirect()->action([UserController::class, 'index']);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function formregistrasi()
    {
        return view('auth.signup');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'no_hp'=>'required|numeric',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,member',
            // 'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            // 'photo' => $request->file('photo')->store('public/photos'),

        ]);
        if ($user->role === 'member') {
            session(['new_member' => $user->name]);
        }

        Auth::login($user);

        return redirect()->route('show.login');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

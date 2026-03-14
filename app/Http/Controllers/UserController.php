<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Middleware\CheckAdminRole;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->middleware(CheckAdminRole::class);
    }

    public function index(Request $request)
    {
        $title = 'Users';
        $user = Auth::user();
        if ($user->role === 'member') {
            return redirect()->route('users.member');
        }

        $users = User::all();
        $totalUsers = $users->count();
        
        // Preload video progress data for each user
        foreach ($users as $user) {
            $user->why_video_progress = $user->getVideoProgressPercentage('why');
        }
        
        // Calculate statistics
        $completedCount = $users->filter(function($user) {
            return $user->why_video_progress >= 100;
        })->count();
        
        $inProgressCount = $users->filter(function($user) {
            return $user->why_video_progress > 0 && $user->why_video_progress < 100;
        })->count();
        
        $notStartedCount = $users->filter(function($user) {
            return $user->why_video_progress == 0;
        })->count();
        
        $completedPercentage = $totalUsers > 0 ? round(($completedCount / $totalUsers) * 100) : 0;
        $inProgressPercentage = $totalUsers > 0 ? round(($inProgressCount / $totalUsers) * 100) : 0;
        $notStartedPercentage = $totalUsers > 0 ? round(($notStartedCount / $totalUsers) * 100) : 0;
        
        // Filter by progress level if requested
        $progressFilter = $request->query('progress_filter', '');
        if ($progressFilter === 'completed') {
            $users = $users->filter(function($user) {
                return $user->why_video_progress >= 100;
            });
        } elseif ($progressFilter === 'in_progress') {
            $users = $users->filter(function($user) {
                return $user->why_video_progress > 0 && $user->why_video_progress < 100;
            });
        } elseif ($progressFilter === 'not_started') {
            $users = $users->filter(function($user) {
                return $user->why_video_progress == 0;
            });
        }
        
        // Sort by video progress if requested
        $sortBy = $request->query('sort_by', '');
        if ($sortBy === 'progress_asc') {
            $users = $users->sortBy('why_video_progress');
        } elseif ($sortBy === 'progress_desc') {
            $users = $users->sortByDesc('why_video_progress');
        }
        
        return view('users.index', compact(
            'users', 
            'title', 
            'sortBy', 
            'progressFilter', 
            'totalUsers', 
            'completedCount', 
            'inProgressCount', 
            'notStartedCount', 
            'completedPercentage', 
            'inProgressPercentage', 
            'notStartedPercentage'
        ));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required|numeric',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,member',
            'statusanggota' => 'required|in:Core Team,DM,belum',
            'status' => 'required|in:active,inactive,suspended',
            'statusnextstep' => 'required|in:new,plant,grow,fruitfull',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan foto jika ada
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->storeAs(
                'photo',
                time() . '-' . $request->file('photo')->getClientOriginalName(),
                'public'
            );
        }

        // Simpan data pengguna
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'statusanggota' => $request->statusanggota,
            'statusnextstep' => $request->statusnextstep,
            'status' => $request->status ?? 'active',
            'photo' => $photoPath,
        ]);

        // Set sesi untuk notifikasi
        if ($user->role === 'member') {
            session(['new_member' => $user->name]);
        }

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function detail($id)
    {
        $title = 'Detail User';
        // $user=User::all();
        $user = User::findOrFail($id);
        return view('users.detail', compact('user', 'title'));
    }

    public function edit(User $user)
    {
        $title = 'Edit User';
        return view('users.edit', compact('user', 'title'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi input
        //  dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'required|numeric',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'statusanggota' => 'required|in:Core Team,DM,belum',
            'role' => 'required|in:admin,member',
            'status' => 'required|in:active,inactive,suspended',
            'statusnextstep' => 'required|in:new,plant,grow,fruitfull',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);

        // Update data pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->statusanggota = $request->statusanggota;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->statusnextstep = $request->statusnextstep;


        // Cek jika ada file foto yang diupload
        if ($request->hasFile('photo')) {
            // Simpan foto dan ambil path-nya
            $photoPath = $request->file('photo')->storeAs(
                'photo',
                time() . '-' . $request->file('photo')->getClientOriginalName(),
                'public'
            );

            // Update kolom foto di tabel users
            $user->photo = $photoPath;
        }

        // Simpan perubahan ke database
        try {
            $user->save();
            return redirect()->route('users.index')->with('berhasil', 'Data user berhasil diperbaharui.');
        } catch(\Exception $e) {
            return redirect()->route('users.edit', $user->id)->with('gagal', 'Gagal update user.');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }


}

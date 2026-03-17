<?php

namespace App\Http\Controllers;

use App\Models\Grade2Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Grade2RequestController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $existing = Grade2Request::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'approved'])
            ->latest()
            ->first();

        if ($existing) {
            return response()->json(['message' => 'Permintaan sudah ada'], 200);
        }

        $req = Grade2Request::create([
            'user_id' => $user->id,
            'alasan'  => $request->input('alasan', 'Request Akses Grade 2 - The Power'),
            'status'  => 'pending',
        ]);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Permintaan berhasil dikirim', 'data' => $req], 200);
        }

        return redirect()->back()->with('success', 'Permintaan akses berhasil dikirim');
    }

    public function adminIndex()
    {
        $this->authorizeAdmin();
        $requests = Grade2Request::with('user')->latest()->get();
        return view('admin.grade2_requests', compact('requests'));
    }

    public function approve($id)
    {
        $this->authorizeAdmin();
        $req = Grade2Request::findOrFail($id);
        $req->status = 'approved';
        $req->save();
        return redirect()->back()->with('success', 'Permintaan disetujui');
    }

    public function reject($id)
    {
        $this->authorizeAdmin();
        $req = Grade2Request::findOrFail($id);
        $req->status = 'rejected';
        $req->save();
        return redirect()->back()->with('success', 'Permintaan ditolak');
    }

    private function authorizeAdmin()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'admin') {
            abort(403);
        }
    }
}
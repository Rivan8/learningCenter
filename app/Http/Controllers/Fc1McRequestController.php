<?php

namespace App\Http\Controllers;

use App\Models\Fc1McRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Fc1McRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'alasan' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $existing = Fc1McRequest::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'approved'])
            ->latest()
            ->first();

        if ($existing) {
            return response()->json(['message' => 'Permintaan sudah ada'], 200);
        }

        $req = Fc1McRequest::create([
            'user_id' => $user->id,
            'alasan' => $request->input('alasan'),
            'status' => 'pending',
        ]);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Permintaan berhasil dikirim', 'data' => $req], 200);
        }

        return redirect()->back()->with('success', 'Permintaan berhasil dikirim');
    }

    public function adminIndex()
    {
        $this->authorizeAdmin();
        $requests = Fc1McRequest::with('user')->latest()->get();
        return view('admin.fc1mc_requests', compact('requests'));
    }

    public function approve($id)
    {
        $this->authorizeAdmin();
        $req = Fc1McRequest::findOrFail($id);
        $req->status = 'approved';
        $req->save();
        return redirect()->back()->with('success', 'Permintaan disetujui');
    }

    public function reject($id)
    {
        $this->authorizeAdmin();
        $req = Fc1McRequest::findOrFail($id);
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

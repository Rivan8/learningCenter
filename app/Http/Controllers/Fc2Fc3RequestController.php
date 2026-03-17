<?php

namespace App\Http\Controllers;

use App\Models\Fc2Fc3Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Fc2Fc3RequestController extends Controller
{
    /**
     * Member mengajukan request akses FC2 & FC3.
     */
    public function store(Request $request)
    {
        $request->validate([
            'alasan' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Cegah duplikasi request yang masih pending atau sudah approved
        $existing = Fc2Fc3Request::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'approved'])
            ->latest()
            ->first();

        if ($existing) {
            return response()->json(['message' => 'Permintaan sudah ada'], 200);
        }

        $req = Fc2Fc3Request::create([
            'user_id' => $user->id,
            'alasan'  => $request->input('alasan'),
            'status'  => 'pending',
        ]);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Permintaan berhasil dikirim', 'data' => $req], 200);
        }

        return redirect()->back()->with('success', 'Permintaan akses FC2 & FC3 berhasil dikirim');
    }

    /**
     * Admin melihat semua request FC2 & FC3.
     */
    public function adminIndex()
    {
        $this->authorizeAdmin();
        $requests = Fc2Fc3Request::with('user')->latest()->get();
        return view('admin.fc2fc3_requests', compact('requests'));
    }

    /**
     * Admin menyetujui request.
     */
    public function approve($id)
    {
        $this->authorizeAdmin();
        $req = Fc2Fc3Request::findOrFail($id);
        $req->status = 'approved';
        $req->save();
        return redirect()->back()->with('success', 'Permintaan FC2 & FC3 disetujui');
    }

    /**
     * Admin menolak request.
     */
    public function reject($id)
    {
        $this->authorizeAdmin();
        $req = Fc2Fc3Request::findOrFail($id);
        $req->status = 'rejected';
        $req->save();
        return redirect()->back()->with('success', 'Permintaan FC2 & FC3 ditolak');
    }

    /**
     * Pastikan yang mengakses adalah admin.
     */
    private function authorizeAdmin()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'admin') {
            abort(403);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessRequest;
use Illuminate\Support\Facades\Auth;

class AccessRequestController extends Controller
{
    // Menyimpan request akses dari user
    public function store(Request $request)
    {
        try {
            $request->validate([
                'alasan' => 'required|string|min:10',
            ]);

            $accessRequest = AccessRequest::create([
                'user_id' => Auth::id(),
                'alasan' => $request->alasan,
                'status' => 'pending',
            ]);

            \Log::info('Access request created', [
                'user_id' => Auth::id(),
                'request_id' => $accessRequest->id,
                'alasan' => $request->alasan
            ]);

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Permintaan akses berhasil dikirim.',
                    'data' => $accessRequest
                ], 200);
            }

            return redirect()->back()->with('success', 'Permintaan akses berhasil dikirim.');

        } catch (\Exception $e) {
            \Log::error('Error creating access request', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengirim permintaan akses: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Gagal mengirim permintaan akses: ' . $e->getMessage());
        }
    }

    // Menampilkan tabel request untuk admin
    public function index()
    {
        $requests = AccessRequest::with('user')->latest()->get();
        return view('admin.access_requests', compact('requests'));
    }

    // Approve request akses
    public function approve($id)
    {
        $accessRequest = AccessRequest::findOrFail($id);
        $accessRequest->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Permintaan akses berhasil disetujui.');
    }

    // Reject request akses
    public function reject($id)
    {
        $accessRequest = AccessRequest::findOrFail($id);
        $accessRequest->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Permintaan akses berhasil ditolak.');
    }
}

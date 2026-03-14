<?php
namespace App\Http\Controllers;

use App\Models\Fine;
use Illuminate\Http\Request;

class FineController extends Controller
{
    public function index()
    {
        $fines = Fine::with('borrowing.user', 'borrowing.book')->get();
        return view('fines.index', compact('fines'));
    }

    public function pay(Fine $fine)
    {
        if ($fine->status === 'paid') {
            return redirect()->back()->withErrors(['error' => 'This fine has already been paid.']);
        }

        $fine->update([
            'status' => 'paid',
            'paid_at' => now(),
        ]);

        return redirect()->route('fines.index')->with('success', 'Fine paid successfully.');
    }

    public function destroy(Fine $fine)
    {
        $fine->delete();
        return redirect()->route('fines.index')->with('success', 'Fine deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class EquipController extends Controller
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
        return view('equip.index',compact('books', 'title','user','pinjam','kategori','member','buku','borrowing'));
    }
}

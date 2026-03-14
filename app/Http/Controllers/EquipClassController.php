<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipClassController extends Controller
{
    /**
     * Halaman utama ESC EQUIP - Plant Class.
     */
    public function index()
    {
        return view('equipClass.index');
    }
}


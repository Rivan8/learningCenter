<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipPlantController extends Controller
{
    /**
     * Halaman utama ESC EQUIP - Plant Class.
     */
    public function index()
    {
        return view('equipClass.plant');
    }
}


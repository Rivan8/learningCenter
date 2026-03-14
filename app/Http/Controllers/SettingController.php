<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // Menampilkan semua pengaturan
        $settings = Setting::all();
        return view('settings.index', compact('settings'));
    }

    public function create()
    {
        // Menampilkan form untuk menambah pengaturan baru
        return view('settings.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'key' => 'required|unique:settings,key|max:255',
            'value' => 'required|max:255',
        ]);

        // Menyimpan pengaturan baru
        Setting::create($request->all());
        return redirect()->route('settings.index')->with('success', 'Setting created successfully.');
    }

    public function edit(Setting $setting)
    {
        // Menampilkan form untuk mengedit pengaturan
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        // Validasi data
        $request->validate([
            'key' => 'required|max:255|unique:settings,key,' . $setting->id,
            'value' => 'required|max:255',
        ]);

        // Memperbarui pengaturan
        $setting->update($request->all());
        return redirect()->route('settings.index')->with('success', 'Setting updated successfully.');
    }

    public function destroy(Setting $setting)
    {
        // Menghapus pengaturan
        $setting->delete();
        return redirect()->route('settings.index')->with('success', 'Setting deleted successfully.');
    }
}

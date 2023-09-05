<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class MasterSiswaController extends Controller
{
    public function index()
    {
        $datasiswa = siswa::all();
        return view ('admin.Master Siswa.mastersiswa', compact('datasiswa'));
    }
    
    public function tambah()
    {
        return view ('admin.Master Siswa.tambahsiswa');
    }

    public function edit_siswa($id)
    {
        $data = siswa::find($id);
        return view('admin.Master Siswa.editsiswa', compact('data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate( [
            'name' => 'required|min:8',
            'about' => 'required',
            'photo' => 'nullable',
        ]);
        siswa::create($validated);
        return redirect() -> route('indexsiswa');
        // return view('admin.Master Siswa.tambahsiswa');
    }
}

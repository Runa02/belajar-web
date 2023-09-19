<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Http\Controllers\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // dd($request);
        $request->validate( [
            'name' => 'required|min:8',
            'about' => 'required|min:20',
            'photo' => 'required|mimes:jpg,jpeg,png',
        ]);

        // $image = $request->file('photo')->getClientOriginalName(); 
        // if($request->hasFile('photo')){
        //     $request->file('photo')->move('photo/',$image);
        // }

        $image = $request->file('photo')->store('photo', 'public');

        siswa::create([
            'name' => $request->name,
            'about' => $request->about,
            'photo' => $image
        ]);
        return redirect() -> route('indexsiswa')->with('message', 'Data Berhasil ditambahkan');
        // return view('admin.Master Siswa.tambahsiswa');
    }

    public function update(Request $request, $id)
    {
        $data = siswa::find($id);
        $request->validate([
            'name' => 'required|min:8',
            'about' => 'required',
            'photo' => 'nullable|mimes:jpg,jpeg,png',
        ]);
        // dd($data);
        if($request->hasFile('photo')){
            if($data->photo) {
                Storage::disk('public')->delete($data->photo);
            }

            $file = $request->file('photo');
            $fileName = $request->nama . '.' . $file->getClientOriginalName();

            $image = $file->storeAs('photo', $fileName, 'public');

            $data->update([
                'name' => $request->name,
                'about' => $request->about,
                'photo' => $image,
            ]);
        }else{
            $data->update([
                'name' => $request->name,
                'about' => $request->about,
            ]);
        }
        // $image = $request->file('photo')->store('photo', 'public');
        return redirect()->route('indexsiswa')->with('message', 'Berhasil memperbarui data');
    }

    public function destroy($id)
    {
        $siswa = siswa::find($id);
        $siswa->delete();
        return redirect()->route('indexsiswa')->with('message', 'Berhasil menghapus data');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataDokter;

class dokterController extends Controller
{
    //
    public function index()
    {
        $dokters = dataDokter::all();
        return view('dataDokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('dataDokter.tambah');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
        ]);

        // Membuat dokter baru
        dataDokter::create([
            'nama' => $request->nama,
            'spesialisasi' => $request->spesialisasi,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan');
    }
    public function edit($id)
    {
        $dokter = dataDokter::findOrFail($id);  // Mencari dokter berdasarkan ID
        return view('dataDokter.edit', compact('dokter'));  // Menampilkan form edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
        ]);

        // Mencari dokter yang akan diupdate
        $dokter = dataDokter::findOrFail($id);
        $dokter->update([
            'nama' => $request->nama,
            'spesialisasi' => $request->spesialisasi,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil diupdate');
    }
    public function destroy($id)
    {
        $dokter = dataDokter::findOrFail($id);  // Mencari dokter berdasarkan ID
        $dokter->delete();  // Menghapus dokter

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus');
    }

}

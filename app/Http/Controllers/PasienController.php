<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataPasien;
use App\Models\dataDokter;
use App\Exports\PasienExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PasienController extends Controller
{
    //
    public function index()
    {
        $pasiens = dataPasien::with('dokter')->get();  // Mengambil semua data pasien beserta dokternya
        return view('dataPasien.index', compact('pasiens'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'riwayat_penyakit' => 'required|string|max:255',
            'dokter_id' => 'required|exists:data_dokters,id',  // Pastikan dokter_id valid
            'jadwal_kunjungan' => 'required|date',
        ]);

        // Membuat pasien baru
        dataPasien::create([
            'nama' => $request->nama,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'dokter_id' => $request->dokter_id,
            'jadwal_kunjungan' => $request->jadwal_kunjungan,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan');
    }
    public function create()
    {
        $dokters = dataDokter::all();  // Mengambil daftar dokter
        return view('dataPasien.tambah', compact('dokters'));  // Menampilkan form create pasien
    }
    public function export_excel()
	{
		return Excel::download(new PasienExport, 'pasien.xlsx');
	}
}

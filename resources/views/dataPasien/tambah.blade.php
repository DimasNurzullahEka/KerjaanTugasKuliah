@extends('template.index')

@section('content')
<h1>Tambah Pasien Baru</h1>

<form action="{{ route('pasien.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama Pasien</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
    </div>
    <div class="form-group">
        <label for="riwayat_penyakit">Riwayat Penyakit</label>
        <input type="text" class="form-control" id="riwayat_penyakit" name="riwayat_penyakit" value="{{ old('riwayat_penyakit') }}" required>
    </div>
    <div class="form-group">
        <label for="dokter_id">Dokter</label>
        <select class="form-control" id="dokter_id" name="dokter_id" required>
            <option value="">Pilih Dokter</option>
            @foreach($dokters as $dokter)
                <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="jadwal_kunjungan">Jadwal Kunjungan</label>
        <input type="date" class="form-control" id="jadwal_kunjungan" name="jadwal_kunjungan" value="{{ old('jadwal_kunjungan') }}" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection

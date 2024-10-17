@extends('template.index')

@section('content')
<h1>Tambah Dokter Baru</h1>

<form action="{{ route('dokter.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama Dokter</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
    </div>
    <div class="form-group">
        <label for="spesialisasi">Spesialisasi</label>
        <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="{{ old('spesialisasi') }}" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection

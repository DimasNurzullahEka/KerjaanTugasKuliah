@extends('template.index')

@section('content')
<h1>Edit Dokter</h1>

    <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Dokter</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $dokter->nama }}" required>
        </div>
        <div class="form-group">
            <label for="spesialisasi">Spesialisasi</label>
            <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="{{ $dokter->spesialisasi }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection

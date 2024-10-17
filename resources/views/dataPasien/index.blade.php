@extends('template.index')

@section('content')
<h1>Daftar Pasien</h1>

<a href="{{ route('pasien.create') }}" class="btn btn-primary">Tambah Pasien</a>
<a href="{{ route('pasien.export_excel') }}" class="btn btn-success my-3">Download Data Pasien</a>
<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Riwayat Penyakit</th>
            <th>Dokter</th>
            <th>Jadwal Kunjungan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pasiens as $pasien)
            <tr>
                <td>{{ $pasien->id }}</td>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->riwayat_penyakit }}</td>
                <td>{{ $pasien->dokter->nama }}</td>
                <td>{{ $pasien->jadwal_kunjungan }}</td>
                <td>
                    <a href="{{ route('pasien.show', $pasien->id) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

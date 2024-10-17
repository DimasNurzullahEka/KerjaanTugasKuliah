@extends('template.index')

@section('content')
<h1>Daftar Dokter</h1>

<a href="{{ route('dokter.create') }}" class="btn btn-primary">Tambah Dokter</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Spesialisasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dokters as $dokter)
            <tr>
                <td>{{ $dokter->id }}</td>
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->spesialisasi }}</td>
                <td>
                    <a href="{{ route('dokter.show', $dokter->id) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" style="display:inline;">
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

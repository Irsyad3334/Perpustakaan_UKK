@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Jenis Anggota</h1>
        <a href="{{ route('jenis_anggota.create') }}" class="btn btn-primary">Tambah Jenis Anggota</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode</th>
                    <th>Jenis</th>
                    <th>Max Pinjam</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jenisAnggota as $item)
                    <tr>
                        <td>{{ $item->id_jenis_anggota }}</td>
                        <td>{{ $item->kode_jenis_anggota }}</td>
                        <td>{{ $item->jenis_anggota }}</td>
                        <td>{{ $item->max_pinjam }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('jenis_anggota.edit', $item->id_jenis_anggota) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('jenis_anggota.destroy', $item->id_jenis_anggota) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

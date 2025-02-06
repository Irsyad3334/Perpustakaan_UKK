@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Anggota</h1>
        <a href="{{ route('anggota.create') }}" class="btn btn-primary">Tambah Anggota</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Tempat</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Email</th>
                    <th>Tanggal Daftar</th>
                    <th>Masa Aktif</th>
                    <th>Foto</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anggota as $item)
                    <tr>
                        <td>{{ $item->id_anggota }}</td>
                        <td>{{ $item->kode_anggota }}</td>
                        <td>{{ $item->nama_anggota }}</td>
                        <td>{{ $item->tempat }}</td>
                        <td>{{ $item->tgl_lahir }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->tgl_daftar }}</td>
                        <td>{{ $item->masa_aktif }}</td>
                        <td>
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" width="50" height="50">
                            @endif
                        </td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->fa }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('anggota.edit', $item->id_anggota) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('anggota.destroy', $item->id_anggota) }}" method="POST" style="display:inline;">
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

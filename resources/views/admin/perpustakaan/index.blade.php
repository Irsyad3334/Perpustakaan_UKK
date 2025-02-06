@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Judul Halaman -->
        <h2>Daftar Perpustakaan</h2>

        <!-- Tombol Tambah Data -->
        <a href="{{ route('perpustakaan.create') }}" class="btn btn-primary mb-3">Tambah Perpustakaan</a>

        <!-- Flash Message (Opsional) -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Data Perpustakaan -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th> <!-- Nomor Urut -->
                    <th>Nama Perpustakaan</th> <!-- Nama Perpustakaan -->
                    <th>Nama Pustakawan</th> <!-- Nama Pustakawan -->
                    <th>Email</th> <!-- Email -->
                    <th>Alamat</th> <!-- Alamat Perpustakaan -->
                    <th>Website</th> <!-- Website Perpustakaan -->
                    <th>No. Telp</th> <!-- No. Telp Perpustakaan -->
                    <th>Keterangan</th> <!-- Kolom Keterangan -->
                    <th>Action</th> <!-- Kolom Aksi -->
                </tr>
            </thead>
            <tbody>
                @foreach($perpustakaan as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td> <!-- Nomor Urut -->
                        <td>{{ $item->nama_perpustakaan }}</td> <!-- Nama Perpustakaan -->
                        <td>{{ $item->nama_pustakawan }}</td> <!-- Nama Pustakawan -->
                        <td>{{ $item->email }}</td> <!-- Email -->
                        <td>{{ $item->alamat }}</td> <!-- Alamat Perpustakaan -->
                        <td>{{ $item->website }}</td> <!-- Website Perpustakaan -->
                        <td>{{ $item->no_telp }}</td> <!-- No. Telp Perpustakaan -->
                        <td>{{ $item->keterangan }}</td> <!-- Menampilkan Keterangan -->
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('perpustakaan.edit', $item->id_perpustakaan) }}" class="btn btn-warning">Edit</a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('perpustakaan.destroy', $item->id_perpustakaan) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

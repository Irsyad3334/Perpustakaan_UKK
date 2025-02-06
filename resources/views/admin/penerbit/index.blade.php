<!-- resources/views/penerbit/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Penerbit</h2>
        <a href="{{ route('penerbit.create') }}" class="btn btn-primary mb-3">Tambah Penerbit</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Penerbit</th>
                    <th>Nama Penerbit</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Email</th>
                    <th>Kontak</th> <!-- Menambahkan kolom Kontak -->
                    <th>Website</th> <!-- Menambahkan kolom Website -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penerbit as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->kode_penerbit }}</td>
                        <td>{{ $item->nama_penerbit }}</td>
                        <td>{{ $item->alamat_penerbit }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->kontak }}</td> <!-- Menampilkan data kontak -->
                        <td>{{ $item->website }}</td> <!-- Menampilkan data website -->
                        <td>
                            <a href="{{ route('penerbit.edit', $item->id_penerbit) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('penerbit.destroy', $item->id_penerbit) }}" method="POST" style="display:inline;">
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

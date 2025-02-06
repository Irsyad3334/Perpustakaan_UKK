<!-- resources/views/pengarang/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Pengarang</h2>
        <a href="{{ route('pengarang.create') }}" class="btn btn-primary mb-3">Tambah Pengarang</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pengarang</th>
                    <th>Gelar Depan</th>
                    <th>Nama Pengarang</th>
                    <th>Gelar Belakang</th>
                    <th>No Telp</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Biografi</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengarang as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->kode_pengarang }}</td>
                        <td>{{ $item->gelar_depan }}</td>
                        <td>{{ $item->nama_pengarang }}</td>
                        <td>{{ $item->gelar_belakang }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->website }}</td>
                        <td>{{ $item->biografi }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('pengarang.edit', $item->id_pengarang) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pengarang.destroy', $item->id_pengarang) }}" method="POST" style="display:inline;">
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

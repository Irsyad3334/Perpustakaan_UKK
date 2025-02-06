@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Pustaka</h1>
        <!-- Remove the create button for users -->
        <!-- <a href="{{ route('pustaka.create') }}" class="btn btn-primary">Tambah Pustaka</a> -->

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Judul Pustaka</th>
                    <th>ISBN</th>
                    <th>Tahun Terbit</th>
                    <th>Harga Buku</th>
                    <th>Jumlah Pinjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pustakas as $pustaka)
                    <tr>
                        <td>{{ $pustaka->judul_pustaka }}</td>
                        <td>{{ $pustaka->isbn }}</td>
                        <td>{{ $pustaka->tahun_terbit }}</td>
                        <td>{{ $pustaka->harga_buku }}</td>
                        <td>{{ $pustaka->jml_pinjam }}</td>
                        <td>
                            <a href="{{ route('user.pustaka.show', $pustaka->id_pustaka) }}" class="btn btn-info btn-sm">Detail</a>
                            <!-- Remove edit and delete buttons for users -->
                            <!-- <a href="{{ route('pustaka.edit', $pustaka->id_pustaka) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pustaka.destroy', $pustaka->id_pustaka) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

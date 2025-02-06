<!-- resources/views/pengarang/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Pengarang</h2>

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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

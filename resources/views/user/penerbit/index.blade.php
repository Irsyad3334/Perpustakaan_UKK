<!-- resources/views/penerbit/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Penerbit</h2>

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
                    <th>Kontak</th>
                    <th>Website</th>
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
                        <td>{{ $item->kontak }}</td>
                        <td>{{ $item->website }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

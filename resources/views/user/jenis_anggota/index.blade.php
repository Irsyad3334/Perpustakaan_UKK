@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Jenis Anggota</h1>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

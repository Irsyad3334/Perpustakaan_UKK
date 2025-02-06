@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Transaksi</h1>
    <!-- Remove create button for users -->
    <!-- <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a> -->

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Pustaka</th>
                <th>Anggota</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Tanggal Pengembalian</th>
                <th>FP</th>
                <th>Keterangan</th>
                <!-- Remove Aksi column for users -->
                <!-- <th>Aksi</th> -->
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id_transaksi }}</td>
                    <td>{{ $transaksi->pustaka->judul_pustaka ?? 'Tidak ditemukan' }}</td>
                    <td>{{ $transaksi->anggota->nama_anggota ?? 'Tidak ditemukan' }}</td>
                    <td>{{ $transaksi->tgl_pinjam }}</td>
                    <td>{{ $transaksi->tgl_kembali }}</td>
                    <td>{{ $transaksi->tgl_pengembalian ?? '-' }}</td>
                    <td>{{ $transaksi->fp == '1' ? 'Ya' : 'Tidak' }}</td>
                    <td>{{ $transaksi->keterangan ?? '-' }}</td>
                    <!-- Remove action buttons for users -->
                    <!-- <td>
                        <a href="{{ route('transaksi.edit', $transaksi->id_transaksi) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('transaksi.destroy', $transaksi->id_transaksi) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                        </form>
                    </td> -->
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

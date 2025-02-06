@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Pustaka</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $pustaka->judul_pustaka }}</h5>
                <p><strong>ISBN:</strong> {{ $pustaka->isbn }}</p>
                <p><strong>Tahun Terbit:</strong> {{ $pustaka->tahun_terbit }}</p>
                <p><strong>Keyword:</strong> {{ $pustaka->keyword }}</p>
                <p><strong>Keterangan Fisik:</strong> {{ $pustaka->keterangan_fisik }}</p>
                <p><strong>Keterangan Tambahan:</strong> {{ $pustaka->keterangan_tambahan }}</p>
                <p><strong>Abstraksi:</strong> {{ $pustaka->abstraksi }}</p>
                <p><strong>Harga Buku:</strong> {{ $pustaka->harga_buku }}</p>
                <p><strong>Kondisi Buku:</strong> {{ $pustaka->kondisi_buku }}</p>
                <p><strong>Status:</strong> {{ $pustaka->fp == '0' ? 'Fiksi' : 'Non-Fiksi' }}</p>
                <p><strong>Jumlah Pinjam:</strong> {{ $pustaka->jml_pinjam }}</p>
                <p><strong>Denda Terlambat:</strong> {{ $pustaka->denda_terlambat }}</p>
                <p><strong>Denda Hilang:</strong> {{ $pustaka->denda_hilang }}</p>

                <p><strong>DDC:</strong> {{ $pustaka->ddc ? $pustaka->ddc->kode_ddc : 'Tidak tersedia' }}</p>
                <p><strong>Format:</strong> {{ $pustaka->format ? $pustaka->format->kode_format : 'Tidak tersedia' }}</p>
                <p><strong>Penerbit:</strong> {{ $pustaka->penerbit ? $pustaka->penerbit->nama_penerbit : 'Tidak tersedia' }}</p>
                <p><strong>Pengarang:</strong> {{ $pustaka->pengarang ? $pustaka->pengarang->nama_pengarang : 'Tidak tersedia' }}</p>

                <p><strong></strong></p>
                @if ($pustaka->gambar)
            <div>
                <h4>Gambar Pustaka:</h4>
                <img src="{{ asset('storage/' . $pustaka->gambar) }}" alt="{{ $pustaka->judul_pustaka }}" style="max-width: 300px;">
            </div>
        @else
                    <p>No image available</p>
                @endif

                <a href="{{ route('user.pustaka.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection

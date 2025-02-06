@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Transaksi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksi.update', $transaksi->id_transaksi) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_pustaka" class="form-label">Pustaka</label>
            <select name="id_pustaka" id="id_pustaka" class="form-select" required>
                <option value="">Pilih Pustaka</option>
                @foreach ($pustakas as $pustaka)
                    <option value="{{ $pustaka->id_pustaka }}" 
                        {{ $transaksi->id_pustaka == $pustaka->id_pustaka ? 'selected' : '' }}>
                        {{ $pustaka->judul_pustaka }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_anggota" class="form-label">Anggota</label>
            <select name="id_anggota" id="id_anggota" class="form-select" required>
                <option value="">Pilih Anggota</option>
                @foreach ($anggotas as $anggota)
                    <option value="{{ $anggota->id_anggota }}"
                        {{ $transaksi->id_anggota == $anggota->id_anggota ? 'selected' : '' }}>
                        {{ $anggota->nama_anggota }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
    <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
    <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" required readonly>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const today = new Date().toISOString().split('T')[0]; // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
        document.getElementById('tgl_pinjam').value = today; // Menetapkan nilai input dengan tanggal hari ini

        // Menetapkan batas minimal Tanggal Kembali agar tidak lebih kecil dari Tanggal Pinjam
        const tglPinjamInput = document.getElementById('tgl_pinjam');
        const tglKembaliInput = document.getElementById('tgl_kembali');
        tglKembaliInput.setAttribute('min', today); // Menetapkan nilai minimal Tanggal Kembali
    });
</script>

<div class="mb-3">
    <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" 
           value="{{ old('tgl_kembali', $transaksi->tgl_kembali) }}" required>
</div>

<div class="mb-3">
    <label for="tgl_pengembalian" class="form-label">Tanggal Pengembalian</label>
    <input type="date" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control" 
           value="{{ old('tgl_pengembalian', $transaksi->tgl_pengembalian) }}">
</div>


        <div class="mb-3">
            <label for="fp" class="form-label">FP</label>
            <select name="fp" id="fp" class="form-select" required>
                <option value="0" {{ $transaksi->fp == '0' ? 'selected' : '' }}>Tidak</option>
                <option value="1" {{ $transaksi->fp == '1' ? 'selected' : '' }}>Ya</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control" maxlength="50" value="{{ $transaksi->keterangan }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

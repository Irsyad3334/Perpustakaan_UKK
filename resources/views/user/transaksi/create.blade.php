@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Transaksi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_pustaka" class="form-label">Pustaka</label>
            <select name="id_pustaka" id="id_pustaka" class="form-select" required>
                <option value="">Pilih Pustaka</option>
                @foreach ($pustakas as $pustaka)
                    <option value="{{ $pustaka->id_pustaka }}">{{ $pustaka->judul_pustaka }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_anggota" class="form-label">Anggota</label>
            <select name="id_anggota" id="id_anggota" class="form-select" required>
                <option value="">Pilih Anggota</option>
                @foreach ($anggotas as $anggota)
                    <option value="{{ $anggota->id_anggota }}">{{ $anggota->nama_anggota }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
    <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
    <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" required readonly>
</div>

<div class="mb-3">
    <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" required>
</div>

<div class="mb-3">
    <label for="tgl_pengembalian" class="form-label">Tanggal Pengembalian</label>
    <input type="date" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control">
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const today = new Date();
        
        // Mendapatkan hari, bulan, dan tahun
        const day = String(today.getDate()).padStart(2, '0'); // Menambahkan 0 di depan jika kurang dari 10
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Menambahkan 0 dan mengatur bulan yang dimulai dari 0
        const year = today.getFullYear();

        // Format tanggal menjadi YYYY-MM-DD untuk input type date
        const formattedDate = `${year}-${month}-${day}`;

        // Menetapkan nilai input Tanggal Pinjam dengan format yang benar
        document.getElementById('tgl_pinjam').value = formattedDate;

        // Set batas minimal Tanggal Kembali untuk tidak lebih kecil dari Tanggal Pinjam
        const tglPinjamInput = document.getElementById('tgl_pinjam');
        const tglKembaliInput = document.getElementById('tgl_kembali');
        tglKembaliInput.setAttribute('min', formattedDate); // Menetapkan nilai minimal Tanggal Kembali
    });

    // Validasi Tanggal Kembali agar tidak lebih kecil dari Tanggal Pinjam
    document.getElementById('tgl_kembali').addEventListener('change', function() {
        var tglPinjam = document.getElementById('tgl_pinjam').value;
        var tglKembali = this.value;

        if (tglKembali < tglPinjam) {
            alert("Tanggal Kembali harus lebih besar atau sama dengan Tanggal Pinjam.");
            this.value = ''; // Clear the input if invalid
        }
    });
</script>


        <div class="mb-3">
            <label for="fp" class="form-label">FP</label>
            <select name="fp" id="fp" class="form-select" required>
                <option value="0">Tidak</option>
                <option value="1">Ya</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control" maxlength="50">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

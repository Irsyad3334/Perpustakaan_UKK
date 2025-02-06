@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Jenis Anggota</h1>
        <form action="{{ route('jenis_anggota.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Kode Jenis Anggota</label>
                <input type="text" name="kode_jenis_anggota" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jenis Anggota</label>
                <input type="text" name="jenis_anggota" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Max Pinjam</label>
                <input type="text" name="max_pinjam" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

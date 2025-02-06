<!-- resources/views/penerbit/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Penerbit</h2>
        <form action="{{ route('penerbit.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_penerbit">Kode Penerbit</label>
                <input type="text" name="kode_penerbit" id="kode_penerbit" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama_penerbit">Nama Penerbit</label>
                <input type="text" name="nama_penerbit" id="nama_penerbit" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat_penerbit">Alamat Penerbit</label>
                <input type="text" name="alamat_penerbit" id="alamat_penerbit" class="form-control">
            </div>
            <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="fax">Fax</label>
                <input type="text" name="fax" id="fax" class="form-control">
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" id="website" class="form-control">
            </div>
            <div class="form-group">
                <label for="kontak">Kontak</label>
                <input type="text" name="kontak" id="kontak" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

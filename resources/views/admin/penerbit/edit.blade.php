<!-- resources/views/penerbit/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Penerbit</h2>
        <form action="{{ route('penerbit.update', $penerbit->id_penerbit) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_penerbit">Kode Penerbit</label>
                <input type="text" name="kode_penerbit" id="kode_penerbit" class="form-control" value="{{ $penerbit->kode_penerbit }}" required>
            </div>
            <div class="form-group">
                <label for="nama_penerbit">Nama Penerbit</label>
                <input type="text" name="nama_penerbit" id="nama_penerbit" class="form-control" value="{{ $penerbit->nama_penerbit }}" required>
            </div>
            <div class="form-group">
                <label for="alamat_penerbit">Alamat Penerbit</label>
                <input type="text" name="alamat_penerbit" id="alamat_penerbit" class="form-control" value="{{ $penerbit->alamat_penerbit }}">
            </div>
            <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ $penerbit->no_telp }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $penerbit->email }}">
            </div>
            <div class="form-group">
                <label for="fax">Fax</label>
                <input type="text" name="fax" id="fax" class="form-control" value="{{ $penerbit->fax }}">
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" id="website" class="form-control" value="{{ $penerbit->website }}">
            </div>
            <div class="form-group">
                <label for="kontak">Kontak</label>
                <input type="text" name="kontak" id="kontak" class="form-control" value="{{ $penerbit->kontak }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

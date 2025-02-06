<!-- resources/views/pengarang/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Pengarang</h2>
        <form action="{{ route('pengarang.update', $pengarang->id_pengarang) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_pengarang">Kode Pengarang</label>
                <input type="text" name="kode_pengarang" id="kode_pengarang" class="form-control" value="{{ $pengarang->kode_pengarang }}" required>
            </div>
            <div class="form-group">
                <label for="nama_pengarang">Nama Pengarang</label>
                <input type="text" name="nama_pengarang" id="nama_pengarang" class="form-control" value="{{ $pengarang->nama_pengarang }}" required>
            </div>
            <div class="form-group">
                <label for="gelar_depan">Gelar Depan</label>
                <input type="text" name="gelar_depan" id="gelar_depan" class="form-control" value="{{ $pengarang->gelar_depan }}">
            </div>
            <div class="form-group">
                <label for="gelar_belakang">Gelar Belakang</label>
                <input type="text" name="gelar_belakang" id="gelar_belakang" class="form-control" value="{{ $pengarang->gelar_belakang }}">
            </div>
            <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ $pengarang->no_telp }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $pengarang->email }}">
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" id="website" class="form-control" value="{{ $pengarang->website }}">
            </div>
            <div class="form-group">
                <label for="biografi">Biografi</label>
                <textarea name="biografi" id="biografi" class="form-control">{{ $pengarang->biografi }}</textarea>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{ $pengarang->keterangan }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

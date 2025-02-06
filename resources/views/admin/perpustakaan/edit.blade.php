@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Perpustakaan</h2>
    
    <form action="{{ route('perpustakaan.update', $perpustakaan->id_perpustakaan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_perpustakaan">Nama Perpustakaan</label>
            <input type="text" class="form-control" id="nama_perpustakaan" name="nama_perpustakaan" value="{{ $perpustakaan->nama_perpustakaan }}" required>
        </div>

        <div class="form-group">
            <label for="nama_pustakawan">Nama Pustakawan</label>
            <input type="text" class="form-control" id="nama_pustakawan" name="nama_pustakawan" value="{{ $perpustakaan->nama_pustakawan }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $perpustakaan->alamat }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $perpustakaan->email }}" required>
        </div>

        <div class="form-group">
            <label for="website">Website</label>
            <input type="url" class="form-control" id="website" name="website" value="{{ $perpustakaan->website }}">
        </div>

        <div class="form-group">
            <label for="no_telp">No. Telp</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $perpustakaan->no_telp }}" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{ $perpustakaan->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection

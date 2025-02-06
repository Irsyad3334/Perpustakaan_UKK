@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Format</h2>

        <form action="{{ route('format.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="kode_format">Kode Format</label>
                <input type="text" class="form-control" id="kode_format" name="kode_format" required>
            </div>

            <div class="form-group">
                <label for="format">Format</label>
                <input type="text" class="form-control" id="format" name="format" required>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection

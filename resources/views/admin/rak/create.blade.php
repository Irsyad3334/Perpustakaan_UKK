@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Rak</h2>

        <form action="{{ route('rak.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_rak">Kode Rak</label>
                <input type="text" name="kode_rak" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="rak">Nama Rak</label>
                <input type="text" name="rak" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Rak</h2>

        <form action="{{ route('rak.update', $rak->id_rak) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_rak">Kode Rak</label>
                <input type="text" name="kode_rak" class="form-control" value="{{ $rak->kode_rak }}" required>
            </div>

            <div class="form-group">
                <label for="rak">Nama Rak</label>
                <input type="text" name="rak" class="form-control" value="{{ $rak->rak }}" required>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $rak->keterangan }}">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection

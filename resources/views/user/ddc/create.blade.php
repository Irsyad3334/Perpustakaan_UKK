@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah DDC</h2>

        <form action="{{ route('ddc.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_rak">Rak</label>
                <select name="id_rak" id="id_rak" class="form-control" required>
                    <option value="">Pilih Rak</option>
                    @foreach($rak as $rak_item)
                        <option value="{{ $rak_item->id_rak }}">{{ $rak_item->rak }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="kode_ddc">Kode DDC</label>
                <input type="text" name="kode_ddc" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ddc">DDC</label>
                <input type="text" name="ddc" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

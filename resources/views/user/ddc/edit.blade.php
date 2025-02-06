@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit DDC</h2>

        <form action="{{ route('ddc.update', $ddc->id_ddc) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_rak">Rak</label>
                <select name="id_rak" id="id_rak" class="form-control" required>
                    <option value="">Pilih Rak</option>
                    @foreach($rak as $rak_item)
                        <option value="{{ $rak_item->id_rak }}" {{ $rak_item->id_rak == $ddc->id_rak ? 'selected' : '' }}>
                            {{ $rak_item->rak }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="kode_ddc">Kode DDC</label>
                <input type="text" name="kode_ddc" class="form-control" value="{{ $ddc->kode_ddc }}" required>
            </div>

            <div class="form-group">
                <label for="ddc">DDC</label>
                <input type="text" name="ddc" class="form-control" value="{{ $ddc->ddc }}" required>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $ddc->keterangan }}">
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
@endsection

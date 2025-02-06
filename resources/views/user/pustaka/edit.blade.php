@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pustaka</h2>
    <form action="{{ route('pustaka.update', $pustaka->id_pustaka) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="kode_pustaka">Kode Pustaka</label>
            <input type="text" class="form-control" name="kode_pustaka" value="{{ old('kode_pustaka', $pustaka->kode_pustaka) }}" required>
        </div>

        <div class="form-group">
            <label for="id_ddc">DDC</label>
            <select name="id_ddc" class="form-control" required>
                @foreach($ddcs as $ddc)
                    <option value="{{ $ddc->id_ddc }}" {{ $ddc->id_ddc == $pustaka->id_ddc ? 'selected' : '' }}>
                        {{ $ddc->kode_ddc }} - {{ $ddc->nama_ddc }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_format">Format</label>
            <select name="id_format" class="form-control" required>
                @foreach($formats as $format)
                    <option value="{{ $format->id_format }}" {{ $format->id_format == $pustaka->id_format ? 'selected' : '' }}>
                        {{ $format->kode_format }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_penerbit">Penerbit</label>
            <select name="id_penerbit" class="form-control" required>
                @foreach($penerbits as $penerbit)
                    <option value="{{ $penerbit->id_penerbit }}" {{ $penerbit->id_penerbit == $pustaka->id_penerbit ? 'selected' : '' }}>
                        {{ $penerbit->nama_penerbit }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_pengarang">Pengarang</label>
            <select name="id_pengarang" class="form-control" required>
                @foreach($pengarangs as $pengarang)
                    <option value="{{ $pengarang->id_pengarang }}" {{ $pengarang->id_pengarang == $pustaka->id_pengarang ? 'selected' : '' }}>
                        {{ $pengarang->nama_pengarang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" name="isbn" value="{{ old('isbn', $pustaka->isbn) }}">
        </div>

        <div class="form-group">
            <label for="judul_pustaka">Judul Pustaka</label>
            <input type="text" class="form-control" name="judul_pustaka" value="{{ old('judul_pustaka', $pustaka->judul_pustaka) }}" required>
        </div>

        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="text" class="form-control" name="tahun_terbit" value="{{ old('tahun_terbit', $pustaka->tahun_terbit) }}" required>
        </div>

        <div class="form-group">
            <label for="keyword">Keyword</label>
            <input type="text" class="form-control" name="keyword" value="{{ old('keyword', $pustaka->keyword) }}">
        </div>

        <div class="form-group">
            <label for="keterangan_fisik">Keterangan Fisik</label>
            <input type="text" class="form-control" name="keterangan_fisik" value="{{ old('keterangan_fisik', $pustaka->keterangan_fisik) }}">
        </div>

        <div class="form-group">
            <label for="keterangan_tambahan">Keterangan Tambahan</label>
            <input type="text" class="form-control" name="keterangan_tambahan" value="{{ old('keterangan_tambahan', $pustaka->keterangan_tambahan) }}">
        </div>

        <div class="form-group">
            <label for="abstraksi">Abstraksi</label>
            <textarea class="form-control" name="abstraksi">{{ old('abstraksi', $pustaka->abstraksi) }}</textarea>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" name="gambar">
            @if($pustaka->gambar)
                <img src="{{ asset('storage/' . $pustaka->gambar) }}" alt="Pustaka Image" width="100">
            @endif
        </div>

        <div class="form-group">
            <label for="harga_buku">Harga Buku</label>
            <input type="number" class="form-control" name="harga_buku" value="{{ old('harga_buku', $pustaka->harga_buku) }}">
        </div>

        <div class="form-group">
            <label for="kondisi_buku">Kondisi Buku</label>
            <input type="text" class="form-control" name="kondisi_buku" value="{{ old('kondisi_buku', $pustaka->kondisi_buku) }}">
        </div>

        <div class="form-group">
            <label for="fp">FP (Fiksi/Non-Fiksi)</label>
            <select name="fp" class="form-control" required>
                <option value="0" {{ $pustaka->fp == '0' ? 'selected' : '' }}>Non-Fiksi</option>
                <option value="1" {{ $pustaka->fp == '1' ? 'selected' : '' }}>Fiksi</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jml_pinjam">Jumlah Pinjam</label>
            <input type="number" class="form-control" name="jml_pinjam" value="{{ old('jml_pinjam', $pustaka->jml_pinjam) }}">
        </div>

        <div class="form-group">
            <label for="denda_terlambat">Denda Terlambat</label>
            <input type="number" class="form-control" name="denda_terlambat" value="{{ old('denda_terlambat', $pustaka->denda_terlambat) }}">
        </div>

        <div class="form-group">
            <label for="denda_hilang">Denda Hilang</label>
            <input type="number" class="form-control" name="denda_hilang" value="{{ old('denda_hilang', $pustaka->denda_hilang) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pustaka</h1>
    <form action="{{ route('pustaka.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="kode_pustaka">Kode Pustaka</label>
            <input type="number" name="kode_pustaka" class="form-control" id="kode_pustaka" value="{{ old('kode_pustaka') }}" required>
        </div>

        <div class="form-group">
            <label for="id_ddc">DDC</label>
            <select name="id_ddc" class="form-control" id="id_ddc" required>
                <option value="">Pilih DDC</option>
                @foreach ($ddcs as $ddc)
                    <option value="{{ $ddc->id_ddc }}" {{ old('id_ddc') == $ddc->id_ddc ? 'selected' : '' }}>
                        {{ $ddc->kode_ddc }} - {{ $ddc->nama_ddc }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_format">Format</label>
            <select name="id_format" class="form-control" id="id_format" required>
                <option value="">Pilih Format</option>
                @foreach ($formats as $format)
                    <option value="{{ $format->id_format }}" {{ old('id_format') == $format->id_format ? 'selected' : '' }}>
                        {{ $format->kode_format }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_penerbit">Penerbit</label>
            <select name="id_penerbit" class="form-control" id="id_penerbit" required>
                <option value="">Pilih Penerbit</option>
                @foreach ($penerbits as $penerbit)
                    <option value="{{ $penerbit->id_penerbit }}" {{ old('id_penerbit') == $penerbit->id_penerbit ? 'selected' : '' }}>
                        {{ $penerbit->nama_penerbit }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_pengarang">Pengarang</label>
            <select name="id_pengarang" class="form-control" id="id_pengarang" required>
                <option value="">Pilih Pengarang</option>
                @foreach ($pengarangs as $pengarang)
                    <option value="{{ $pengarang->id_pengarang }}" {{ old('id_pengarang') == $pengarang->id_pengarang ? 'selected' : '' }}>
                        {{ $pengarang->nama_pengarang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" class="form-control" id="isbn" value="{{ old('isbn') }}">
        </div>

        <div class="form-group">
            <label for="judul_pustaka">Judul Pustaka</label>
            <input type="text" name="judul_pustaka" class="form-control" id="judul_pustaka" value="{{ old('judul_pustaka') }}" required>
        </div>

        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="text" name="tahun_terbit" class="form-control" id="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
        </div>

        <div class="form-group">
            <label for="keyword">Keyword</label>
            <input type="text" name="keyword" class="form-control" id="keyword" value="{{ old('keyword') }}">
        </div>

        <div class="form-group">
            <label for="keterangan_fisik">Keterangan Fisik</label>
            <input type="text" name="keterangan_fisik" class="form-control" id="keterangan_fisik" value="{{ old('keterangan_fisik') }}">
        </div>

        <div class="form-group">
            <label for="keterangan_tambahan">Keterangan Tambahan</label>
            <input type="text" name="keterangan_tambahan" class="form-control" id="keterangan_tambahan" value="{{ old('keterangan_tambahan') }}">
        </div>

        <div class="form-group">
            <label for="abstraksi">Abstraksi</label>
            <textarea name="abstraksi" class="form-control" id="abstraksi" rows="5">{{ old('abstraksi') }}</textarea>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="gambar" value="{{ old('gambar') }}">
        </div>

        <div class="form-group">
            <label for="harga_buku">Harga Buku</label>
            <input type="number" name="harga_buku" class="form-control" id="harga_buku" value="{{ old('harga_buku') }}">
        </div>

        <div class="form-group">
            <label for="kondisi_buku">Kondisi Buku</label>
            <input type="text" name="kondisi_buku" class="form-control" id="kondisi_buku" value="{{ old('kondisi_buku') }}">
        </div>

        <div class="form-group">
            <label for="fp">FP</label>
            <select name="fp" class="form-control" id="fp">
                <option value="0" {{ old('fp') == '0' ? 'selected' : '' }}>Tidak</option>
                <option value="1" {{ old('fp') == '1' ? 'selected' : '' }}>Ya</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jml_pinjam">Jumlah Pinjam</label>
            <input type="number" name="jml_pinjam" class="form-control" id="jml_pinjam" value="{{ old('jml_pinjam') }}">
        </div>

        <div class="form-group">
            <label for="denda_terlambat">Denda Terlambat</label>
            <input type="number" name="denda_terlambat" class="form-control" id="denda_terlambat" value="{{ old('denda_terlambat') }}">
        </div>

        <div class="form-group">
            <label for="denda_hilang">Denda Hilang</label>
            <input type="number" name="denda_hilang" class="form-control" id="denda_hilang" value="{{ old('denda_hilang') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

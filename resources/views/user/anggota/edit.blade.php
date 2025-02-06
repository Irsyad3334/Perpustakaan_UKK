@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Anggota</h1>
        <form action="{{ route('anggota.update', $anggota->id_anggota) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Jenis Anggota</label>
                <select name="id_jenis_anggota" class="form-control" required>
                    <option value="">Pilih Jenis Anggota</option>
                    @foreach($jenisAnggota as $item)
                        <option value="{{ $item->id_jenis_anggota }}" {{ $anggota->id_jenis_anggota == $item->id_jenis_anggota ? 'selected' : '' }}>{{ $item->jenis_anggota }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Kode Anggota</label>
                <input type="text" name="kode_anggota" class="form-control" value="{{ $anggota->kode_anggota }}" required>
            </div>
            <div class="mb-3">
                <label>Nama Anggota</label>
                <input type="text" name="nama_anggota" class="form-control" value="{{ $anggota->nama_anggota }}" required>
            </div>
            <div class="mb-3">
                <label>Tempat</label>
                <input type="text" name="tempat" class="form-control" value="{{ $anggota->tempat }}" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" value="{{ $anggota->tgl_lahir }}" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $anggota->alamat }}" required>
            </div>
            <div class="mb-3">
                <label>No. Telp</label>
                <input type="text" name="no_telp" class="form-control" value="{{ $anggota->no_telp }}" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $anggota->email }}">
            </div>
            <div class="mb-3">
                <label>Tanggal Daftar</label>
                <input type="date" name="tgl_daftar" class="form-control" value="{{ $anggota->tgl_daftar }}" required>
            </div>
            <div class="mb-3">
                <label>Masa Aktif</label>
                <input type="date" name="masa_aktif" class="form-control" value="{{ $anggota->masa_aktif }}" required>
            </div>
            <div class="mb-3">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
                @if($anggota->foto)
                    <img src="{{ asset('storage/' . $anggota->foto) }}" width="50" height="50" alt="Foto Anggota">
                @endif
            </div>
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="{{ $anggota->username }}" required>
            </div>
            <div class="mb-3">
                <label>Password (kosongkan jika tidak ingin diubah)</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="fa" class="form-control" required>
                    <option value="Y" {{ $anggota->fa == 'Y' ? 'selected' : '' }}>Aktif</option>
                    <option value="T" {{ $anggota->fa == 'T' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $anggota->keterangan }}">
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection

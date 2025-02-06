@extends('layouts.app')

@section('content')
    <div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <h1>Tambah Anggota</h1>
        <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Jenis Anggota</label>
                <select name="id_jenis_anggota" class="form-control" required>
                    <option value="">Pilih Jenis Anggota</option>
                    @foreach($jenisAnggota as $item)
                        <option value="{{ $item->id_jenis_anggota }}">{{ $item->id_jenis_anggota }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Kode Anggota</label>
                <input type="text" name="kode_anggota" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama Anggota</label>
                <input type="text" name="nama_anggota" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tempat</label>
                <input type="text" name="tempat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>No. Telp</label>
                <input type="text" name="no_telp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label>Tanggal Daftar</label>
                <input type="date" name="tgl_daftar" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Masa Aktif</label>
                <input type="date" name="masa_aktif" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="fa" class="form-control" required>
                    <option value="Y">Aktif</option>
                    <option value="T">Tidak Aktif</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
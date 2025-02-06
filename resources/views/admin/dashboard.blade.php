@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Dashboard Perpustakaan</h2>

        <!-- Baris untuk Menampilkan Kotak Dashboard -->
        <div class="row">
            <!-- Card 1: Perpustakaan -->
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: #f8d7da;">
                    <div class="card-body text-center">
                        <i class="fas fa-book fa-3x mb-3"></i>
                        <h5 class="card-title">Perpustakaan</h5>
                        <p class="card-text">Manajemen Data Perpustakaan</p>
                        <a href="{{ route('admin.perpustakaan.index') }}" class="btn btn-danger">Lihat Data</a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Rak -->
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: #d4edda;">
                    <div class="card-body text-center">
                        <i class="fas fa-shelves fa-3x mb-3"></i>
                        <h5 class="card-title">Rak</h5>
                        <p class="card-text">Manajemen Data Rak Buku</p>
                        <a href="{{ route('admin.rak.index') }}" class="btn btn-success">Lihat Data</a>
                    </div>
                </div>
            </div>

            <!-- Card 3: DDC -->
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: #cce5ff;">
                    <div class="card-body text-center">
                        <i class="fas fa-cogs fa-3x mb-3"></i>
                        <h5 class="card-title">DDC</h5>
                        <p class="card-text">Manajemen Klasifikasi DDC</p>
                        <a href="{{ route('admin.ddc.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
            </div>

            <!-- Card 4: Format -->
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: #fff3cd;">
                    <div class="card-body text-center">
                        <i class="fas fa-file-alt fa-3x mb-3"></i>
                        <h5 class="card-title">Format</h5>
                        <p class="card-text">Manajemen Format Buku</p>
                        <a href="{{ route('admin.format.index') }}" class="btn btn-warning">Lihat Data</a>
                    </div>
                </div>
            </div>

            <!-- Card 5: Penerbit -->
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: #f8d7da;">
                    <div class="card-body text-center">
                        <i class="fas fa-print fa-3x mb-3"></i>
                        <h5 class="card-title">Penerbit</h5>
                        <p class="card-text">Manajemen Data Penerbit</p>
                        <a href="{{ route('admin.penerbit.index') }}" class="btn btn-danger">Lihat Data</a>
                    </div>
                </div>
            </div>

            <!-- Card 6: Pengarang -->
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: #d4edda;">
                    <div class="card-body text-center">
                        <i class="fas fa-pencil-alt fa-3x mb-3"></i>
                        <h5 class="card-title">Pengarang</h5>
                        <p class="card-text">Manajemen Data Pengarang</p>
                        <a href="{{ route('admin.pengarang.index') }}" class="btn btn-success">Lihat Data</a>
                    </div>
                </div>
            </div>

            <!-- Card 7: Pustaka -->
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: #cce5ff;">
                    <div class="card-body text-center">
                        <i class="fas fa-book-open fa-3x mb-3"></i>
                        <h5 class="card-title">Pustaka</h5>
                        <p class="card-text">Manajemen Data Pustaka</p>
                        <a href="{{ route('admin.pustaka.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
            </div>

            <!-- Card 8: Jenis Anggota -->
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: #fff3cd;">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h5 class="card-title">Jenis Anggota</h5>
                        <p class="card-text">Manajemen Jenis Anggota Perpustakaan</p>
                        <a href="{{ route('admin.jenis_anggota.index') }}" class="btn btn-warning">Lihat Data</a>
                    </div>
                </div>
            </div>

            <!-- Card 9: Anggota -->
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: #f8d7da;">
                    <div class="card-body text-center">
                        <i class="fas fa-id-card fa-3x mb-3"></i>
                        <h5 class="card-title">Anggota</h5>
                        <p class="card-text">Manajemen Data Anggota</p>
                        <a href="{{ route('admin.anggota.index') }}" class="btn btn-danger">Lihat Data</a>
                    </div>
                </div>
            </div>

            <!-- Card 10: Transaksi -->
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: #d4edda;">
                    <div class="card-body text-center">
                        <i class="fas fa-exchange-alt fa-3x mb-3"></i>
                        <h5 class="card-title">Transaksi</h5>
                        <p class="card-text">Manajemen Transaksi Perpustakaan</p>
                        <a href="{{ route('admin.transaksi.index') }}" class="btn btn-success">Lihat Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

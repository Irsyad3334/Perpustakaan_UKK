@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Dashboard Perpustakaan</h2>

        <div class="row">
            <!-- Card 8: Jenis Anggota -->
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: #fff3cd;">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h5 class="card-title">Jenis Anggota</h5>
                        <p class="card-text">Manajemen Jenis Anggota Perpustakaan</p>
                        <a href="{{ route('user.jenis_anggota.index') }}" class="btn btn-warning">Lihat Data</a>
                    </div>
                </div>
            </div>

            <!-- Card 9: Anggota -->
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: #f8d7da;">
                    <div class="card-body text-center">
                        <i class="fas fa-id-card fa-3x mb-3"></i>
                        <h5 class="card-title">Anggota</h5>
                        <p class="card-text">Manajemen Data Anggota</p>
                        <a href="{{ route('user.anggota.index') }}" class="btn btn-danger">Lihat Data</a>
                    </div>
                </div>
            </div>

            <!-- Card 10: Transaksi -->
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: #d4edda;">
                    <div class="card-body text-center">
                        <i class="fas fa-exchange-alt fa-3x mb-3"></i>
                        <h5 class="card-title">Transaksi</h5>
                        <p class="card-text">Manajemen Transaksi Perpustakaan</p>
                        <a href="{{ route('user.transaksi.index') }}" class="btn btn-success">Lihat Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

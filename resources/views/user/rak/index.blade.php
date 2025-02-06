@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Rak</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Rak</th>
                    <th>Nama Rak</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($raks as $index => $rak)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $rak->kode_rak }}</td>
                        <td>{{ $rak->rak }}</td>
                        <td>{{ $rak->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

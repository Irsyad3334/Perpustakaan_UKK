@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Format</h2>

        <!-- Flash Message (Opsional) -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Data Format -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Format</th>
                    <th>Format</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formats as $index => $format)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $format->kode_format }}</td>
                        <td>{{ $format->format }}</td>
                        <td>{{ $format->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

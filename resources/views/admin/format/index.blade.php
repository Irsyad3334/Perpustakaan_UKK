@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Format</h2>
        <a href="{{ route('format.create') }}" class="btn btn-primary mb-3">Tambah Format</a>

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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formats as $index => $format)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $format->kode_format }}</td>
                        <td>{{ $format->format }}</td>
                        <td>{{ $format->keterangan }}</td>
                        <td>
                            <a href="{{ route('format.edit', $format->id_format) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('format.destroy', $format->id_format) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

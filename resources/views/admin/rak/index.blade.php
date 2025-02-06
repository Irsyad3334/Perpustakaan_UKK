@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Rak</h2>

        <a href="{{ route('rak.create') }}" class="btn btn-primary mb-3">Tambah Rak</a>

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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($raks as $index => $rak)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $rak->kode_rak }}</td>
                        <td>{{ $rak->rak }}</td>
                        <td>{{ $rak->keterangan }}</td>
                        <td>
                            <a href="{{ route('rak.edit', $rak->id_rak) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('rak.destroy', $rak->id_rak) }}" method="POST" style="display:inline;">
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

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar DDC</h2>
        <a href="{{ route('ddc.create') }}" class="btn btn-primary mb-3">Tambah DDC</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode DDC</th>
                    <th>DDC</th>
                    <th>Rak</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ddc as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->kode_ddc }}</td>
                        <td>{{ $item->ddc }}</td>
                        <td>{{ $item->rak->rak ?? 'Tidak ada rak' }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('ddc.edit', $item->id_ddc) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('ddc.destroy', $item->id_ddc) }}" method="POST" style="display:inline;">
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

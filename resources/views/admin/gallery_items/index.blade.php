@extends('adminlte::page')
@section('title', 'Item Galeri')
@section('content_header')
    <h1>Item Galeri</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.gallery-items.create') }}" class="btn btn-primary">Tambah Item Galeri</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 100px;">Gambar</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td><img src="{{ asset('storage/' . $item->image) }}" width="100"></td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>
                            <a href="{{ route('admin.gallery-items.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.gallery-items.destroy', $item) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
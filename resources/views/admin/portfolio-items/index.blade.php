@extends('adminlte::page')
@section('title', 'Item Portfolio')
@section('content_header')
    <h1>Item Portfolio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.portfolio-items.create') }}" class="btn btn-primary">Tambah Item Baru</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th style="width: 150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($portfolioItems as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ Storage::url($item->image) }}" alt="Image" width="150"></td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.portfolio-items.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.portfolio-items.destroy', $item) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
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
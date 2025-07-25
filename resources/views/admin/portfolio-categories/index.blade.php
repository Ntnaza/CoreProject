@extends('adminlte::page')
@section('title', 'Kategori Portfolio')
@section('content_header')
    <h1>Kategori Portfolio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('portfolio-categories.create') }}" class="btn btn-primary">Tambah Kategori Baru</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
                    <th>Filter</th>
                    <th style="width: 150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($portfolioCategories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td><code>{{ $category->filter }}</code></td>
                    <td>
                        <a href="{{ route('portfolio-categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('portfolio-categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus kategori ini? Menghapus kategori akan menghapus semua item portfolio di dalamnya.')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
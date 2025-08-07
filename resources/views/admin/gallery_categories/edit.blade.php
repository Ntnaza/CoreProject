@extends('adminlte::page')
@section('title', 'Edit Kategori Galeri')
@section('content_header')
    <h1>Edit Kategori Galeri</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.gallery-categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('admin.gallery-categories.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop

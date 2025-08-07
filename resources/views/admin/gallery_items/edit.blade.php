@extends('adminlte::page')
@section('title', 'Edit Item Galeri')
@section('content_header')
    <h1>Edit Item Galeri</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.gallery-items.update', $item) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="gallery_category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $item->gallery_category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Deskripsi (Opsional)</label>
                <textarea name="description" class="form-control" rows="3">{{ $item->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Ganti Gambar (Opsional)</label>
                <input type="file" name="image" class="form-control-file">
                <small>Gambar saat ini:</small><br>
                <img src="{{ asset('storage/' . $item->image) }}" width="150" class="mt-2">
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('admin.gallery-items.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop
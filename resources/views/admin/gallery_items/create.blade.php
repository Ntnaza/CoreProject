@extends('adminlte::page')
@section('title', 'Tambah Item Galeri')
@section('content_header')
    <h1>Tambah Item Galeri</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.gallery-items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="gallery_category_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Deskripsi (Opsional)</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="image" class="form-control-file" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.gallery-items.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop

@extends('adminlte::page')
@section('title', 'Tambah Kategori Galeri')
@section('content_header')
    <h1>Tambah Kategori Galeri</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.gallery-categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="name" class="form-control" placeholder="Contoh: Kegiatan Sekolah" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.gallery-categories.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop
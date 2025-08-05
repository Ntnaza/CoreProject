@extends('adminlte::page')
@section('title', 'Tambah Kategori')
@section('content_header')
    <h1>Tambah Kategori Portfolio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.portfolio-categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Kategori</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Contoh: App">
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="filter">Filter Class</label>
                <input type="text" name="filter" class="form-control @error('filter') is-invalid @enderror" value="{{ old('filter') }}" placeholder="Contoh: filter-app">
                @error('filter')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <small class="form-text text-muted">Gunakan format "filter-namakategori" tanpa spasi.</small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.portfolio-categories.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop
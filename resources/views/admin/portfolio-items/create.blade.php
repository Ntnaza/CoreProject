@extends('adminlte::page')
@section('title', 'Tambah Item Portfolio')
@section('content_header')
    <h1>Tambah Item Portfolio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('portfolio-items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="portfolio_category_id">Kategori</label>
                <select name="portfolio_category_id" class="form-control @error('portfolio_category_id') is-invalid @enderror">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('portfolio_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('portfolio_category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="image">Gambar</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="detail_url">URL Detail (Opsional)</label>
                <input type="text" name="detail_url" class="form-control @error('detail_url') is-invalid @enderror" value="{{ old('detail_url', '#') }}">
                @error('detail_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('portfolio-items.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop
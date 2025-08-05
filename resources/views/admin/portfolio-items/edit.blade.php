@extends('adminlte::page')
@section('title', 'Edit Item Portfolio')
@section('content_header')
    <h1>Edit Item Portfolio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.portfolio-items.update', $portfolioItem) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $portfolioItem->title) }}">
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="portfolio_category_id">Kategori</label>
                <select name="portfolio_category_id" class="form-control @error('portfolio_category_id') is-invalid @enderror">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('portfolio_category_id', $portfolioItem->portfolio_category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('portfolio_category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $portfolioItem->description) }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="image">Gambar (Opsional)</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                <small>Kosongkan jika tidak ingin mengganti gambar.</small><br>
                <img src="{{ Storage::url($portfolioItem->image) }}" alt="Current Image" width="200" class="mt-2">
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="detail_url">URL Detail (Opsional)</label>
                <input type="text" name="detail_url" class="form-control @error('detail_url') is-invalid @enderror" value="{{ old('detail_url', $portfolioItem->detail_url) }}">
                @error('detail_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('admin.portfolio-items.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop
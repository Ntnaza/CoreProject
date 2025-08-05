@extends('adminlte::page')

@section('title', 'Edit Hero Item')

@section('content_header')
    <h1>Edit Hero Item</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.hero-items.update', $heroItem) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $heroItem->title) }}">
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $heroItem->description) }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="image">Gambar (Opsional)</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                <small>Kosongkan jika tidak ingin mengganti gambar.</small><br>
                <img src="{{ Storage::url($heroItem->image) }}" alt="Current Image" width="200" class="mt-2">
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
</div>
@stop
@extends('adminlte::page')

@section('title', 'Edit Icon Box')

@section('content_header')
    <h1>Edit Icon Box</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('feature-items.update', $featureItem) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="icon">Kelas Ikon (Contoh: bi bi-clipboard-data)</label>
                <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $featureItem->icon) }}" placeholder="Contoh: bi bi-gem">
                @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">
                    Salin nama kelas dari <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a>.
                </small>
            </div>

            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $featureItem->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $featureItem->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('features.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop
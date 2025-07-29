@extends('adminlte::page')

@section('title', 'Tambah Testimoni')

@section('content_header')
    <h1>Tambah Testimoni Baru</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="position">Posisi / Jabatan</label>
                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}">
                @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="quote">Kutipan / Testimoni</label>
                <textarea name="quote" class="form-control @error('quote') is-invalid @enderror">{{ old('quote') }}</textarea>
                @error('quote')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="stars">Rating Bintang</label>
                <select name="stars" class="form-control @error('stars') is-invalid @enderror">
                    <option value="5" {{ old('stars') == 5 ? 'selected' : '' }}>5 Bintang</option>
                    <option value="4" {{ old('stars') == 4 ? 'selected' : '' }}>4 Bintang</option>
                    <option value="3" {{ old('stars') == 3 ? 'selected' : '' }}>3 Bintang</option>
                    <option value="2" {{ old('stars') == 2 ? 'selected' : '' }}>2 Bintang</option>
                    <option value="1" {{ old('stars') == 1 ? 'selected' : '' }}>1 Bintang</option>
                </select>
                @error('stars')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="photo">Foto (Opsional)</label>
                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop
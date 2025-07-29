@extends('adminlte::page')
@section('title', 'Edit Testimoni')
@section('content_header')
    <h1>Edit Testimoni</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $testimonial->name) }}">
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="position">Posisi / Jabatan</label>
                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $testimonial->position) }}">
                @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="quote">Kutipan / Testimoni</label>
                <textarea name="quote" class="form-control @error('quote') is-invalid @enderror">{{ old('quote', $testimonial->quote) }}</textarea>
                @error('quote')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="stars">Rating Bintang</label>
                <select name="stars" class="form-control @error('stars') is-invalid @enderror">
                    <option value="5" {{ old('stars', $testimonial->stars) == 5 ? 'selected' : '' }}>5 Bintang</option>
                    <option value="4" {{ old('stars', $testimonial->stars) == 4 ? 'selected' : '' }}>4 Bintang</option>
                    <option value="3" {{ old('stars', $testimonial->stars) == 3 ? 'selected' : '' }}>3 Bintang</option>
                    <option value="2" {{ old('stars', $testimonial->stars) == 2 ? 'selected' : '' }}>2 Bintang</option>
                    <option value="1" {{ old('stars', $testimonial->stars) == 1 ? 'selected' : '' }}>1 Bintang</option>
                </select>
                @error('stars')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="photo">Foto (Opsional)</label>
                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                <small>Kosongkan jika tidak ingin mengganti foto.</small><br>
                <img src="{{ $testimonial->photo ? Storage::url($testimonial->photo) : 'https://via.placeholder.com/100' }}" alt="Current Photo" width="100" class="mt-2">
                @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop
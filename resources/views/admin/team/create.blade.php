@extends('adminlte::page')
@section('title', 'Tambah Anggota Tim')
@section('content_header')
    <h1>Tambah Anggota Tim Baru</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('team-members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="position">Posisi / Jabatan</label>
                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}">
                @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="photo">Foto</label>
                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="description">Deskripsi Singkat</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <hr>
            <h5>Link Sosial Media (Opsional)</h5>
            <div class="form-group">
                <label for="twitter_url">Twitter</label>
                <input type="text" name="twitter_url" class="form-control" value="{{ old('twitter_url') }}" placeholder="https://twitter.com/username">
            </div>
            <div class="form-group">
                <label for="facebook_url">Facebook</label>
                <input type="text" name="facebook_url" class="form-control" value="{{ old('facebook_url') }}" placeholder="https://facebook.com/username">
            </div>
            <div class="form-group">
                <label for="instagram_url">Instagram</label>
                <input type="text" name="instagram_url" class="form-control" value="{{ old('instagram_url') }}" placeholder="https://instagram.com/username">
            </div>
            <div class="form-group">
                <label for="linkedin_url">LinkedIn</label>
                <input type="text" name="linkedin_url" class="form-control" value="{{ old('linkedin_url') }}" placeholder="https://linkedin.com/in/username">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('team.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop
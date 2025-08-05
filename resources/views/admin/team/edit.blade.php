@extends('adminlte::page')
@section('title', 'Edit Anggota Tim')
@section('content_header')
    <h1>Edit Anggota Tim</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.team-members.update', $teamMember) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $teamMember->name) }}">
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="position">Posisi / Jabatan</label>
                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $teamMember->position) }}">
                @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="photo">Foto</label>
                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                <small>Kosongkan jika tidak ingin mengganti foto.</small><br>
                <img src="{{ Storage::url($teamMember->photo) }}" alt="Current Photo" width="150" class="mt-2">
                @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="description">Deskripsi Singkat</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $teamMember->description) }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <hr>
            <h5>Link Sosial Media (Opsional)</h5>
            <div class="form-group">
                <label for="twitter_url">Twitter</label>
                <input type="text" name="twitter_url" class="form-control" value="{{ old('twitter_url', $teamMember->twitter_url) }}" placeholder="https://twitter.com/username">
            </div>
            <div class="form-group">
                <label for="facebook_url">Facebook</label>
                <input type="text" name="facebook_url" class="form-control" value="{{ old('facebook_url', $teamMember->facebook_url) }}" placeholder="https://facebook.com/username">
            </div>
            <div class="form-group">
                <label for="instagram_url">Instagram</label>
                <input type="text" name="instagram_url" class="form-control" value="{{ old('instagram_url', $teamMember->instagram_url) }}" placeholder="https://instagram.com/username">
            </div>
            <div class="form-group">
                <label for="linkedin_url">LinkedIn</label>
                <input type="text" name="linkedin_url" class="form-control" value="{{ old('linkedin_url', $teamMember->linkedin_url) }}" placeholder="https://linkedin.com/in/username">
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop
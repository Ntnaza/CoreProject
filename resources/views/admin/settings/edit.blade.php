@extends('adminlte::page')
@section('title', 'Pengaturan Situs')
@section('content_header')
    <h1>Pengaturan Situs</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Situs</label>
                <input type="text" name="site_name" class="form-control" value="{{ old('site_name', $setting->site_name) }}">
            </div>
            <div class="form-group">
                <label>Logo Situs</label>
                <input type="file" name="logo" class="form-control">
                <small>Kosongkan jika tidak ingin mengganti logo. Format: png, jpg, svg. Maks 1MB.</small><br>
                @if($setting->logo)
                    <img src="{{ Storage::url($setting->logo) }}" alt="Current Logo" width="200" class="mt-2">
                @else
                    <p class="mt-2">Belum ada logo yang diunggah.</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
        </form>
    </div>
</div>
@stop
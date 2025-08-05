@extends('adminlte::page')

@section('title', 'Edit Call To Action')

@section('content_header')
    <h1>Edit Call To Action</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Perbaikan ada di baris ini --}}
        <form action="{{ route('admin.cta.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Headline</label>
                <input type="text" name="headline" class="form-control" value="{{ old('headline', $cta->headline) }}">
            </div>

            <div class="form-group">
                <label>Paragraf</label>
                <textarea name="paragraph" class="form-control" rows="4">{{ old('paragraph', $cta->paragraph) }}</textarea>
            </div>

            <div class="form-group">
                <label>Teks Tombol</label>
                <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $cta->button_text) }}">
            </div>

            <div class="form-group">
                <label>URL Tombol</label>
                <input type="text" name="button_url" class="form-control" value="{{ old('button_url', $cta->button_url) }}">
            </div>

            <div class="form-group">
                <label>Gambar Latar Belakang</label>
                <input type="file" name="background_image" class="form-control">
                <small>Kosongkan jika tidak ingin mengganti gambar.</small><br>
                <img src="{{ Storage::url($cta->background_image) }}" alt="Current Background" width="300" class="mt-2">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@stop
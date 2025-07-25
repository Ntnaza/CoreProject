@extends('adminlte::page')
@section('title', 'Edit Halaman About Us')
@section('content_header')
    <h1>Edit Halaman About Us</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Section Title & Subtitle --}}
            <div class="form-group">
                <label>Judul Section</label>
                <input type="text" name="section_title" class="form-control" value="{{ old('section_title', $about->section_title) }}">
            </div>
            <div class="form-group">
                <label>Subtitle Section</label>
                <textarea name="section_subtitle" class="form-control">{{ old('section_subtitle', $about->section_subtitle) }}</textarea>
            </div>
            <hr>

            {{-- Kolom Kiri --}}
            <h4>Konten Kolom Kiri</h4>
            <div class="form-group">
                <label>Headline</label>
                <input type="text" name="headline" class="form-control" value="{{ old('headline', $about->headline) }}">
            </div>
             <div class="form-group">
                <label>Gambar Utama</label>
                <input type="file" name="main_image" class="form-control">
                <small>Kosongkan jika tidak ingin ganti gambar.</small><br>
                <img src="{{ Storage::url($about->main_image) }}" width="200" class="mt-2">
            </div>
            <div class="form-group">
                <label>Paragraf 1</label>
                <textarea name="paragraph1" class="form-control" rows="4">{{ old('paragraph1', $about->paragraph1) }}</textarea>
            </div>
             <div class="form-group">
                <label>Paragraf 2</label>
                <textarea name="paragraph2" class="form-control" rows="4">{{ old('paragraph2', $about->paragraph2) }}</textarea>
            </div>
            <hr>

            {{-- Kolom Kanan --}}
            <h4>Konten Kolom Kanan</h4>
            <div class="form-group">
                <label>Paragraf Italic</label>
                <textarea name="italic_paragraph" class="form-control" rows="3">{{ old('italic_paragraph', $about->italic_paragraph) }}</textarea>
            </div>
            <div class="form-group">
                <label>List Item (Satu item per baris)</label>
                <textarea name="list_items" class="form-control" rows="4">{{ old('list_items', $about->list_items) }}</textarea>
            </div>
            <div class="form-group">
                <label>Paragraf Final</label>
                <textarea name="final_paragraph" class="form-control" rows="3">{{ old('final_paragraph', $about->final_paragraph) }}</textarea>
            </div>
            <div class="form-group">
                <label>URL Video Youtube</label>
                <input type="text" name="video_url" class="form-control" value="{{ old('video_url', $about->video_url) }}">
            </div>
            <div class="form-group">
                <label>Gambar Video (Thumbnail)</label>
                <input type="file" name="video_image" class="form-control">
                <small>Kosongkan jika tidak ingin ganti gambar.</small><br>
                <img src="{{ Storage::url($about->video_image) }}" width="200" class="mt-2">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@stop
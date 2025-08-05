@extends('adminlte::page')
@section('title', 'Edit Halaman Tentang Kami')
@section('content_header')
    <h1>Edit Halaman Tentang Kami</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
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

            {{-- Konten yang Masih Digunakan --}}
            <h4>Konten Visi Misi & Video</h4>
            <div class="form-group">
                <label>Paragraf Pembuka (Italic)</label>
                <textarea name="italic_paragraph" class="form-control" rows="3">{{ old('italic_paragraph', $about->italic_paragraph) }}</textarea>
            </div>
            <div class="form-group">
                <label>List Item Visi & Misi (Satu item per baris)</label>
                <textarea name="list_items" class="form-control" rows="4">{{ old('list_items', $about->list_items) }}</textarea>
            </div>
            <div class="form-group">
                <label>URL Video Youtube</label>
                <input type="text" name="video_url" class="form-control" value="{{ old('video_url', $about->video_url) }}">
            </div>
            <div class="form-group">
                <label>Gambar Video (Thumbnail)</label>
                <input type="file" name="video_image" class="form-control-file">
                <small class="form-text text-muted">Kosongkan jika tidak ingin ganti gambar.</small><br>
                @if($about->video_image)
                    <img src="{{ asset('storage/' . $about->video_image) }}" width="200" class="mt-2 img-thumbnail">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@stop
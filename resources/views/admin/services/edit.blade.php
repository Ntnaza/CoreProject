@extends('adminlte::page')
@section('title', 'Edit Item Layanan')
@section('content_header')
    <h1>Edit Item Layanan</h1>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        {{-- Perbaikan ada di baris ini --}}
        <form action="{{ route('service-items.update', $service_item) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Kelas Ikon</label>
        {{-- Ganti value --}}
        <input type="text" name="icon" class="form-control" value="{{ $service_item->icon }}">
    </div>
    <div class="form-group">
        <label>Judul</label>
        {{-- Ganti value --}}
        <input type="text" name="title" class="form-control" value="{{ $service_item->title }}">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        {{-- Ganti value --}}
        <textarea name="description" class="form-control">{{ $service_item->description }}</textarea>
    </div>
    <div class="form-group">
        <label>Link</label>
        {{-- Ganti value --}}
        <input type="text" name="link" class="form-control" value="{{ $service_item->link }}">
    </div>
    <button type="submit" class="btn btn-primary">Perbarui</button>
</form>
    </div>
</div>
@stop
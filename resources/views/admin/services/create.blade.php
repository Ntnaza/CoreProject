@extends('adminlte::page')
@section('title', 'Tambah Item Layanan')
@section('content_header')
    <h1>Tambah Item Layanan</h1>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.service-items.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Kelas Ikon</label>
                <input type="text" name="icon" class="form-control" placeholder="Contoh: bi bi-activity">
            </div>
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" placeholder="Contoh: Nesciunt Mete">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control" value="#">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@stop
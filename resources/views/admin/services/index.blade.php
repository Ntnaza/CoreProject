@extends('adminlte::page')
@section('title', 'Manajemen Services')
@section('content_header')
    <h1>Manajemen Services</h1>
@stop

@section('content')
    {{-- Form untuk Judul Section --}}
    <div class="card">
        <div class="card-header"><h3 class="card-title">Judul Section</h3></div>
        <div class="card-body">
            @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
            <form action="{{ route('services.section.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="title" class="form-control" value="{{ $serviceSection->title }}">
                </div>
                <div class="form-group">
                    <label>Subtitle</label>
                    <textarea name="subtitle" class="form-control">{{ $serviceSection->subtitle }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan Judul</button>
            </form>
        </div>
    </div>

    {{-- Tabel untuk Item Layanan --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Item Layanan</h3>
            <a href="{{ route('service-items.create') }}" class="btn btn-primary float-right">Tambah Item Baru</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr><th>Ikon</th><th>Judul</th><th>Deskripsi</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr>
                        <td><i class="{{ $service->icon }}" style="font-size: 2rem;"></i></td>
                        <td>{{ $service->title }}</td>
                        <td>{{ $service->description }}</td>
                        <td>
                            <a href="{{ route('service-items.edit', $service) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('service-items.destroy', $service) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
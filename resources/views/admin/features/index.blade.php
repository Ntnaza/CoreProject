@extends('adminlte::page')
@section('title', 'Manajemen Features')
@section('content_header')
    <h1>Manajemen Features</h1>
@stop

@section('content')
    {{-- Form untuk Why Box --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bagian "Why Box"</h3>
        </div>
        <div class="card-body">
            @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
            <form action="{{ route('features.section.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Headline</label>
                    <input type="text" name="headline" class="form-control" value="{{ $featureSection->headline }}">
                </div>
                <div class="form-group">
                    <label>Paragraf</label>
                    <textarea name="paragraph" class="form-control" rows="4">{{ $featureSection->paragraph }}</textarea>
                </div>
                <div class="form-group">
                    <label>Teks Tombol</label>
                    <input type="text" name="link_text" class="form-control" value="{{ $featureSection->link_text }}">
                </div>
                <div class="form-group">
                    <label>URL Tombol</label>
                    <input type="text" name="link_url" class="form-control" value="{{ $featureSection->link_url }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan "Why Box"</button>
            </form>
        </div>
    </div>

    {{-- Tabel untuk Icon Boxes --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bagian "Icon Boxes"</h3>
            <a href="{{ route('feature-items.create') }}" class="btn btn-primary float-right">Tambah Icon Box Baru</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Ikon</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($featureItems as $item)
                    <tr>
                        <td><i class="{{ $item->icon }}" style="font-size: 2rem;"></i></td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <a href="{{ route('feature-items.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('feature-items.destroy', $item) }}" method="POST" style="display:inline-block;">
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
@extends('adminlte::page')
@section('title', 'Manajemen Features')
@section('content_header')
    <h1>Manajemen Features</h1>
@stop

@section('content')
    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Form untuk Why Box --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pengaturan Section Features</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.features.section.update') }}" method="POST">
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
                <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
            </form>
        </div>
    </div>

    {{-- Tabel untuk Icon Boxes --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Item Features</h3>
            {{-- PERBAIKAN 1: Tombol dipindahkan ke card-tools agar di kanan --}}
            <div class="card-tools">
                <a href="{{ route('admin.feature-items.create') }}" class="btn btn-primary btn-sm">Tambah Item Baru</a>
            </div>
        </div>
        {{-- PERBAIKAN 2: Menambahkan kelas p-0 untuk menghapus padding --}}
        <div class="card-body p-0">
            {{-- PERBAIKAN 3: Mengganti table-bordered dengan table-striped --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 80px;">Ikon</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($featureItems as $item)
                    <tr>
                        <td class="text-center"><i class="{{ $item->icon }}" style="font-size: 2rem;"></i></td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            {{-- PERBAIKAN 4: Ukuran tombol diubah menjadi lebih kecil --}}
                            <a href="{{ route('admin.feature-items.edit', $item) }}" class="btn btn-xs btn-warning">Edit</a>
                            <form action="{{ route('admin.feature-items.destroy', $item) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada item features.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop   
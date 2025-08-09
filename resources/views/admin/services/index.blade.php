@extends('adminlte::page')
@section('title', 'Manajemen Layanan')
@section('content_header')
    <h1>Manajemen Layanan</h1>
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

    {{-- Form untuk Judul Section --}}
    <div class="card">
        <div class="card-header"><h3 class="card-title">Pengaturan Section Layanan</h3></div>
        <div class="card-body">
            <form action="{{ route('admin.services.section.update') }}" method="POST">
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
                <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
            </form>
        </div>
    </div>

    {{-- Tabel untuk Item Layanan --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Item Layanan</h3>
            {{-- PERBAIKAN 1: Tombol dipindahkan ke card-tools agar di kanan --}}
            <div class="card-tools">
                <a href="{{ route('admin.service-items.create') }}" class="btn btn-primary btn-sm">Tambah Item Baru</a>
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
                    @forelse($services as $service)
                    <tr>
                        <td class="text-center"><i class="{{ $service->icon }}" style="font-size: 2rem;"></i></td>
                        <td>{{ $service->title }}</td>
                        <td>{{ $service->description }}</td>
                        <td>
                            {{-- PERBAIKAN 4: Ukuran tombol diubah menjadi lebih kecil --}}
                            <a href="{{ route('admin.service-items.edit', $service) }}" class="btn btn-xs btn-warning">Edit</a>
                            <form action="{{ route('admin.service-items.destroy', $service) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada item layanan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
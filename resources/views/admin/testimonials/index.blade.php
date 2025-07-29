@extends('adminlte::page')
@section('title', 'Manajemen Testimoni')
@section('content_header')
    <h1>Manajemen Testimoni</h1>
@stop

@section('content')
    {{-- Menampilkan pesan sukses di bagian atas --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- KARTU UNTUK PENGATURAN SECTION --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pengaturan Section</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('testimonials.section.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                <div class="form-group">
                    <label>Judul Section</label>
                    <input type="text" name="title" class="form-control" value="{{ $section->title }}">
                </div>
                <div class="form-group">
                    <label>Subtitle Section</label>
                    <textarea name="subtitle" class="form-control">{{ $section->subtitle }}</textarea>
                </div>
                <div class="form-group">
                    <label>Gambar Latar Belakang (Opsional)</label>
                    <input type="file" name="background_image" class="form-control">
                    <small>Kosongkan jika tidak ingin mengubah background.</small><br>
                    @if($section->background_image)
                        <img src="{{ Storage::url($section->background_image) }}" alt="Current Background" width="200" class="mt-2">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
            </form>
        </div>
    </div>

    {{-- KARTU UNTUK DAFTAR ITEM TESTIMONI --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Testimoni</h3>
            <a href="{{ route('testimonial-items.create') }}" class="btn btn-primary float-right">Tambah Item Testimoni</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 80px;">Foto</th>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th style="width: 120px;">Status</th>
                        <th style="width: 220px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                    <tr>
                        <td><img src="{{ $testimonial->photo ? Storage::url($testimonial->photo) : 'https://via.placeholder.com/80' }}" width="80" class="rounded-circle"></td>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->position }}</td>
                        <td>
                            @if($testimonial->is_approved)
                                <span class="badge badge-success">Disetujui</span>
                            @else
                                <span class="badge badge-warning">Pending</span>
                            @endif
                        </td>
                        <td>
                            @if(!$testimonial->is_approved)
                            <form action="{{ route('testimonials.approve', $testimonial) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                            </form>
                            @endif
                            <a href="{{ route('testimonial-items.edit', $testimonial) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('testimonial-items.destroy', $testimonial) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data testimoni.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
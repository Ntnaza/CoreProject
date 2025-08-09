@extends('adminlte::page')
@section('title', 'Manajemen Produk')
@section('content_header')
    <h1>Manajemen Produk</h1>
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

    {{-- KARTU UNTUK KATEGORI PRODUK --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Kategori Produk</h3>
            <div class="card-tools">
                {{-- Tombol ini mengarah ke route create dari PortfolioCategoryController --}}
                <a href="{{ route('admin.portfolio-categories.create') }}" class="btn btn-primary btn-sm">Tambah Kategori Baru</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Filter</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolioCategories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>.{{ $category->filter }}</td>
                        <td>
                            <a href="{{ route('admin.portfolio-categories.edit', $category) }}" class="btn btn-xs btn-warning">Edit</a>
                            <form action="{{ route('admin.portfolio-categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin ingin menghapus kategori ini? Menghapus kategori akan menghapus semua produk di dalamnya.')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada kategori.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- KARTU UNTUK ITEM PRODUK --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Item Produk</h3>
            <div class="card-tools">
                <a href="{{ route('admin.portfolio-items.create') }}" class="btn btn-primary btn-sm">Tambah Item Baru</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 100px;">Gambar</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolioItems as $item)
                    <tr>
                        <td><img src="{{ asset('storage/' . $item->image) }}" width="100"></td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->category->name ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('admin.portfolio-items.edit', $item) }}" class="btn btn-xs btn-warning">Edit</a>
                            <form action="{{ route('admin.portfolio-items.destroy', $item) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                     @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada item produk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

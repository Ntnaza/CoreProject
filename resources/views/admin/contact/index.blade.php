@extends('adminlte::page')

@section('title', 'Manajemen Kontak')

@section('content_header')
    <h1>Manajemen Halaman Kontak</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Form Edit Informasi Kontak --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Informasi Kontak</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('contact.info.update') }}" method="POST">
                @csrf
                @method('PUT')

                <h5>Pengaturan Section</h5>
                <div class="form-group">
                    <label>Judul Section</label>
                    <input type="text" name="section_title" class="form-control" value="{{ old('section_title', $contactInfo->section_title) }}">
                </div>
                <div class="form-group">
                    <label>Subtitle Section</label>
                    <textarea name="section_subtitle" class="form-control">{{ old('section_subtitle', $contactInfo->section_subtitle) }}</textarea>
                </div>
                <hr>

                <h5>Info Kontak Utama</h5>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', $contactInfo->address) }}">
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $contactInfo->phone) }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $contactInfo->email) }}">
                </div>
                <div class="form-group">
                    <label>URL Google Maps (Embed)</label>
                    <textarea name="map_url" class="form-control" rows="3">{{ old('map_url', $contactInfo->map_url) }}</textarea>
                </div>
                <hr>

                <h5>Link Sosial Media</h5>
                <div class="form-group">
                    <label>Twitter</label>
                    <input type="text" name="twitter_url" class="form-control" value="{{ old('twitter_url', $contactInfo->twitter_url) }}">
                </div>
                <div class="form-group">
                    <label>Facebook</label>
                    <input type="text" name="facebook_url" class="form-control" value="{{ old('facebook_url', $contactInfo->facebook_url) }}">
                </div>
                <div class="form-group">
                    <label>Instagram</label>
                    <input type="text" name="instagram_url" class="form-control" value="{{ old('instagram_url', $contactInfo->instagram_url) }}">
                </div>
                <div class="form-group">
                    <label>LinkedIn</label>
                    <input type="text" name="linkedin_url" class="form-control" value="{{ old('linkedin_url', $contactInfo->linkedin_url) }}">
                </div>
                {{-- INPUT BARU --}}
                <div class="form-group">
                    <label>YouTube</label>
                    <input type="text" name="youtube_url" class="form-control" value="{{ old('youtube_url', $contactInfo->youtube_url) }}">
                </div>
                <div class="form-group">
                    <label>TikTok</label>
                    <input type="text" name="tiktok_url" class="form-control" value="{{ old('tiktok_url', $contactInfo->tiktok_url) }}">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan Info</button>
            </form>
        </div>
    </div>

    {{-- Tabel Pesan Masuk --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pesan Masuk</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 15%">Nama</th>
                        <th style="width: 15%">Email</th>
                        <th>Subjek</th>
                        <th>Pesan</th>
                        <th style="width: 100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contactMessages as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>{{ $message->message }}</td>
                        <td>
                            <form action="{{ route('contact.message.destroy', $message) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin ingin menghapus pesan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada pesan masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
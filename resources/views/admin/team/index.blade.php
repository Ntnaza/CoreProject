@extends('adminlte::page')
@section('title', 'Manajemen Tim')
@section('content_header')
    <h1>Manajemen Tim</h1>
@stop

@section('content')
    {{-- Form untuk Judul Section --}}
    <div class="card">
        <div class="card-header"><h3 class="card-title">Judul Section</h3></div>
        <div class="card-body">
            @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
            <form action="{{ route('admin.team.section.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group"><label>Judul</label><input type="text" name="title" class="form-control" value="{{ $teamSection->title }}"></div>
                <div class="form-group"><label>Subtitle</label><textarea name="subtitle" class="form-control">{{ $teamSection->subtitle }}</textarea></div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan Judul</button>
            </form>
        </div>
    </div>

    {{-- Tabel untuk Anggota Tim --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Anggota Tim</h3>
            <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary float-right">Tambah Anggota Baru</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead><tr><th>Foto</th><th>Nama</th><th>Posisi</th><th>Aksi</th></tr></thead>
                <tbody>
                    @foreach($teamMembers as $member)
                    <tr>
                        <td><img src="{{ Storage::url($member->photo) }}" width="80"></td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->position }}</td>
                        <td>
                            <a href="{{ route('admin.team-members.edit', $member) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.team-members.destroy', $member) }}" method="POST" style="display:inline-block;">
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
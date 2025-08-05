@extends('adminlte::page')

@section('title', 'Manajemen Testimoni')

{{-- Tambahkan CSRF Token untuk AJAX --}}
@section('meta_tags')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

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

    {{-- KARTU UNTUK PENGATURAN SECTION (TIDAK DIUBAH) --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pengaturan Section</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.testimonials.section.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Judul Section</label>
                    <input type="text" name="title" class="form-control" value="{{ optional($section)->title }}">
                </div>
                <div class="form-group">
                    <label>Subtitle Section</label>
                    <textarea name="subtitle" class="form-control">{{ optional($section)->subtitle }}</textarea>
                </div>
                <div class="form-group">
                    <label>Gambar Latar Belakang (Opsional)</label>
                    <input type="file" name="background_image" class="form-control">
                    <small>Kosongkan jika tidak ingin mengubah background.</small><br>
                    @if(optional($section)->background_image)
                        <img src="{{ asset('storage/' . $section->background_image) }}" alt="Current Background" width="200" class="mt-2">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
            </form>
        </div>
    </div>

    {{-- KARTU UNTUK DAFTAR ITEM TESTIMONI (DISESUAIKAN) --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Testimoni</h3>
            {{-- PERBAIKAN: Menggunakan route name yang benar --}}
            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary float-right">Tambah Testimoni</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="testimonials-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">Foto</th>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th style="width: 120px;">Status</th>
                        <th style="width: 250px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                        {{-- PENINGKATAN: Memberi ID pada setiap baris untuk manipulasi JS --}}
                        <tr id="row-{{ $testimonial->id }}">
                            <td>
                                <img src="{{ $testimonial->photo ? asset('storage/' . $testimonial->photo) : 'https://via.placeholder.com/80' }}" style="width: 80px; height: 80px; object-fit: cover;" class="rounded-circle">
                            </td>
                            <td>{{ $testimonial->name }}</td>
                            <td>{{ $testimonial->position }}</td>
                            <td>
                                {{-- PERBAIKAN: Cek berdasarkan kolom 'status' (string) bukan 'is_approved' (boolean) --}}
                                @if($testimonial->status == 'Disetujui')
                                    <span class="badge badge-success">Disetujui</span>
                                @else
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>
                            <td class="actions-cell">
                                {{-- PERBAIKAN: Mengganti form dengan tombol yang akan ditangani AJAX --}}
                                @if($testimonial->status == 'Disetujui')
                                    <button class="btn btn-sm btn-secondary btn-unapprove" data-id="{{ $testimonial->id }}">Batal Setujui</button>
                                @else
                                    <button class="btn btn-sm btn-success btn-approve" data-id="{{ $testimonial->id }}">Approve</button>
                                @endif
                                
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-warning">Edit</a>
                                
                                <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $testimonial->id }}">Hapus</button>
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

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    
    // Fungsi untuk menampilkan notifikasi
    const showToast = (message) => {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        Toast.fire({ icon: 'success', title: message });
    }

    // Mengambil CSRF token
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Fungsi untuk AJAX
    function performAjax(url, method, successCallback) {
        $.ajax({
            url: url,
            method: method,
            headers: { 'X-CSRF-TOKEN': csrfToken },
            success: function(response) {
                if(response.success) {
                    showToast(response.message);
                    successCallback(response);
                }
            },
            error: function() {
                Swal.fire('Error!', 'Terjadi kesalahan saat memproses permintaan.', 'error');
            }
        });
    }

    // Event handler untuk tombol Approve
    $('#testimonials-table').on('click', '.btn-approve', function() {
        const id = $(this).data('id');
        const url = `/admin/testimonials/${id}/approve`; // URL disesuaikan dengan route Anda
        performAjax(url, 'POST', () => {
            const row = $(`#row-${id}`);
            row.find('.badge').removeClass('badge-warning').addClass('badge-success').text('Disetujui');
            const newButton = `<button class="btn btn-sm btn-secondary btn-unapprove" data-id="${id}">Batal Setujui</button>`;
            $(this).replaceWith(newButton);
        });
    });

    // Event handler untuk tombol Batal Setujui
    $('#testimonials-table').on('click', '.btn-unapprove', function() {
        const id = $(this).data('id');
        const url = `/admin/testimonials/${id}/unapprove`;
        performAjax(url, 'POST', () => {
            const row = $(`#row-${id}`);
            row.find('.badge').removeClass('badge-success').addClass('badge-warning').text('Pending');
            const newButton = `<button class="btn btn-sm btn-success btn-approve" data-id="${id}">Approve</button>`;
            $(this).replaceWith(newButton);
        });
    });

    // Event handler untuk tombol Hapus
    $('#testimonials-table').on('click', '.btn-delete', function() {
        const id = $(this).data('id');
        const url = `/admin/testimonials/${id}`;

        Swal.fire({
            title: 'Anda yakin?',
            text: "Data ini tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                performAjax(url, 'DELETE', () => {
                    $(`#row-${id}`).fadeOut(500, function() {
                        $(this).remove();
                    });
                });
            }
        });
    });
});
</script>
@stop
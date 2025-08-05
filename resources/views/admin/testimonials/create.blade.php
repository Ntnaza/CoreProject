@extends('adminlte::page')

@section('title', 'Tambah Testimoni')

@section('content_header')
    <h1>Tambah Testimoni Baru</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {{-- PERBAIKAN: Sesuaikan nama route dengan prefix 'admin.' --}}
        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama lengkap">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="position">Posisi / Jabatan</label>
                        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}" placeholder="Contoh: CEO, Frontend Developer">
                        @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                     <div class="form-group">
                        <label for="quote">Kutipan / Testimoni</label>
                        <textarea name="quote" id="quote-input" class="form-control" placeholder="Tulis Pendapat Anda" maxlength="50"></textarea>
<div id="char-counter" style="text-align: right; font-size: 12px; color: #6c757d; margin-top: 5px;"></div>
                        @error('quote')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="stars">Rating Bintang</label>
                        <select name="stars" class="form-control @error('stars') is-invalid @enderror">
                            <option value="" disabled selected>-- Pilih Rating --</option>
                            <option value="5" {{ old('stars') == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5 Bintang)</option>
                            <option value="4" {{ old('stars') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4 Bintang)</option>
                            <option value="3" {{ old('stars') == 3 ? 'selected' : '' }}>⭐⭐⭐ (3 Bintang)</option>
                            <option value="2" {{ old('stars') == 2 ? 'selected' : '' }}>⭐⭐ (2 Bintang)</option>
                            <option value="1" {{ old('stars') == 1 ? 'selected' : '' }}>⭐ (1 Bintang)</option>
                        </select>
                        @error('stars')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto (Opsional)</label>
                        <input type="file" name="photo" id="photo" class="form-control-file @error('photo') is-invalid @enderror">
                        @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    
                    {{-- PENINGKATAN: Tambahkan area untuk image preview --}}
                    <div class="form-group">
                        <label>Preview Foto:</label>
                        <img id="image-preview" src="https://via.placeholder.com/150" alt="Preview" class="img-thumbnail" style="width:150px; height:150px; object-fit: cover;">
                    </div>
                </div>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">Simpan Testimoni</button>
            {{-- PERBAIKAN: Sesuaikan nama route dengan prefix 'admin.' --}}
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop

{{-- PENINGKATAN: Tambahkan script untuk image preview --}}
@section('js')
<script>
    document.getElementById('photo').addEventListener('change', function(event) {
        if (event.target.files && event.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-preview').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    });
</script>
@stop
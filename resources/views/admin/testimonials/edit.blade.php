@extends('adminlte::page')

@section('title', 'Edit Testimoni')

@section('content_header')
    <h1>Edit Testimoni: {{ $testimonial->name }}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {{-- PERBAIKAN: Sesuaikan nama route dengan prefix 'admin.' --}}
        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Metode untuk update --}}
            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $testimonial->name) }}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="position">Posisi / Jabatan</label>
                        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $testimonial->position) }}">
                        @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="quote">Kutipan / Testimoni</label>
                        <textarea name="quote" class="form-control ..." maxlength="50">{{ old('quote', $testimonial->quote ?? '') }}</textarea>
                        <div id="char-counter" style="text-align: right; font-size: 12px; color: #6c757d; margin-top: 5px;"></div>
                        @error('quote')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="stars">Rating Bintang</label>
                        <select name="stars" class="form-control @error('stars') is-invalid @enderror">
                            <option value="5" {{ old('stars', $testimonial->stars) == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5 Bintang)</option>
                            <option value="4" {{ old('stars', $testimonial->stars) == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4 Bintang)</option>
                            <option value="3" {{ old('stars', $testimonial->stars) == 3 ? 'selected' : '' }}>⭐⭐⭐ (3 Bintang)</option>
                            <option value="2" {{ old('stars', $testimonial->stars) == 2 ? 'selected' : '' }}>⭐⭐ (2 Bintang)</option>
                            <option value="1" {{ old('stars', $testimonial->stars) == 1 ? 'selected' : '' }}>⭐ (1 Bintang)</option>
                        </select>
                        @error('stars')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="photo">Ganti Foto (Opsional)</label>
                        <input type="file" name="photo" id="photo" class="form-control-file @error('photo') is-invalid @enderror">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                        @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    
                    {{-- PENINGKATAN: Area untuk preview foto --}}
                    <div class="form-group">
                        <label>Preview / Foto Saat Ini:</label>
                        {{-- Logika untuk menampilkan foto yang ada atau placeholder --}}
                        @php
                            $photo_url = $testimonial->photo ? asset('storage/' . $testimonial->photo) : 'https://via.placeholder.com/150';
                        @endphp
                        <img id="image-preview" src="{{ $photo_url }}" alt="Preview" class="img-thumbnail" style="width:150px; height:150px; object-fit: cover;">
                    </div>
                </div>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">Perbarui Testimoni</button>
            {{-- PERBAIKAN: Sesuaikan nama route dengan prefix 'admin.' --}}
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop

{{-- PENINGKATAN: Tambahkan script yang sama untuk image preview --}}
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
    const quoteInput = document.getElementById('quote-input');
    const charCounter = document.getElementById('char-counter');
    const maxLength = quoteInput.getAttribute('maxlength');

    // Fungsi untuk update counter
    const updateCounter = () => {
        const currentLength = quoteInput.value.length;
        charCounter.textContent = `${currentLength} / ${maxLength} karakter`;
    };

    // Panggil fungsi saat halaman dimuat
    updateCounter();

    // Panggil fungsi setiap kali ada input
    quoteInput.addEventListener('input', updateCounter);
</script>
@stop

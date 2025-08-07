@extends('layouts.main-app')

@section('title', 'Berikan Testimoni - ') {{-- Menambahkan judul halaman spesifik --}}

@section('content')

<main class="main">

    <!-- Section Testimoni Form -->
    <section id="testimonials-form" class="testimonials-form section" 
    @if($testimonialSection->background_image)
        style="background-image: url('{{ Storage::url($testimonialSection->background_image) }}'); background-size: cover; background-position: center; background-attachment: fixed;"
    @endif
><br>
<br>
    <div class="container section-title" data-aos="fade-up">
        <h2 class="text-white">{{ $testimonialSection->title }}</h2>
        <p class="text-white">{{ $testimonialSection->subtitle }}</p>
    </div>{{-- ... sisa kode form Anda ... --}}

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    
                    {{-- Menghapus div.form-wrapper yang tidak perlu agar styling konsisten --}}
                    @if(session('testimonial_success'))
                        <div class="alert alert-success text-center">{{ session('testimonial_success') }}</div>
                    @endif
                    
                    <form action="{{ route('testimonials.public.store') }}" method="POST" enctype="multipart/form-data" class="php-email-form">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nama Anda" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="position" class="form-control" placeholder="Posisi atau jabatan anda Contoh: (Pelanggan)" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <select name="stars" class="form-control" required>
                                    <option value="">Beri Bintang...</option>
                                    <option value="5">★★★★★ (Luar Biasa)</option>
                                    <option value="4">★★★★☆ (Bagus)</option>
                                    <option value="3">★★★☆☆ (Cukup)</option>
                                    <option value="2">★★☆☆☆ (Kurang)</option>
                                    <option value="1">★☆☆☆☆ (Buruk)</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea name="quote" id="quote-input" class="form-control" placeholder="Tulis Pendapat Anda" maxlength="50"></textarea>
<div id="char-counter" style="text-align: right; font-size: 12px; color: #6c757d; margin-top: 5px;"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="photo" class="form-label text-white">Unggah Foto (Opsional)</label>
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Terima kasih! Testimoni Anda telah kami terima.</div>
                                <button class="btn-custom-submit" type="submit">Kirim Testimoni</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- End Testimoni Form Section -->

</main>

@endsection
<style>
    .btn-custom-submit {
        background: #FFA500; /* Warna oranye */
        border: 0;
        padding: 10px 30px;
        color: #fff;
        transition: 0.4s;
        border-radius: 50px;
    }

    .btn-custom-submit:hover {
        background: #cc8400; /* Warna oranye lebih gelap saat hover */
    }
</style>
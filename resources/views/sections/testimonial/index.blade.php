<section id="testimonials" class="testimonials section" 
    @if($testimonialSection->background_image)
        style="background-image: url('{{ asset('storage/' . $testimonialSection->background_image) }}');"
    @endif
>

    <div class="container section-title" data-aos="fade-up">
        <br>
        <h2>{{ $testimonialSection->title }}</h2>
        <p>{{ $testimonialSection->subtitle }}</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                  "loop": true, "speed": 600, "autoplay": {"delay": 5000}, "slidesPerView": "auto",
                  "pagination": {"el": ".swiper-pagination", "type": "bullets", "clickable": true},
                  "breakpoints": { "320": {"slidesPerView": 1, "spaceBetween": 40}, "1200": {"slidesPerView": 3, "spaceBetween": 1} }
                }
            </script>
            <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="stars">
                            @for ($i = 0; $i < $testimonial->stars; $i++)
                                <i class="bi bi-star-fill"></i>
                            @endfor
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>{{ $testimonial->quote }}</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        <div class="profile">
                            <img src="{{ $testimonial->photo ? asset('storage/' . $testimonial->photo) : asset('assets/img/u.jpg') }}" class="testimonial-img" alt="">
                            <div class="profile-info">
                                <h3>{{ $testimonial->name }}</h3>
                                <h4>{{ $testimonial->position }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <br>
        <div class="text-center mt-4">
            <a href="{{ route('testimonials.public.create') }}" class="btn-custom-submit">Tulis Testimoni Anda</a>
        </div>
    </div>
</section>

{{-- GANTI SELURUH BLOK STYLE ANDA DENGAN INI --}}
<style>
    /* Mengatur section utama testimoni */
    .testimonials.section {
        position: relative; /* Diperlukan untuk overlay */
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 80px 0;
    }

    /* INI ADALAH SOLUSINYA: Menambahkan lapisan overlay gelap */
    .testimonials.section::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: rgba(0, 0, 0, 0.6); /* Warna hitam dengan 60% opacity */
        z-index: 1;
    }

    /* Memastikan semua konten berada di atas overlay */
    .testimonials .container {
        position: relative;
        z-index: 2;
    }
    
    /* Mengubah warna judul dan subtitle menjadi putih agar kontras */
    .testimonials .section-title h2,
    .testimonials .section-title p {
        color: #ffffff;
    }

    /* Sisa style Anda (tidak berubah) */
    .testimonial-item { box-sizing: content-box; padding: 30px; margin: 30px 15px; min-height: 200px; box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08); background: #fff; position: relative; border-radius: 8px; }
    .testimonial-item .profile { display: flex; align-items: center; margin-top: 25px; }
    .testimonial-item .profile .testimonial-img { width: 60px; height: 60px; border-radius: 50%; object-fit: cover; flex-shrink: 0; }
    .testimonial-item .profile .profile-info { margin-left: 15px; }
    .testimonial-item .profile h3 { font-size: 18px; font-weight: bold; margin: 0; }
    .testimonial-item .profile h4 { font-size: 14px; color: #6c757d; margin: 0; }
    .testimonial-item .stars { margin-bottom: 15px; }
    .testimonial-item .stars i { color: #ffc107; }
    .testimonial-item .quote-icon-left, .testimonial-item .quote-icon-right { color: #fad39c; font-size: 26px; }
    .testimonial-item .quote-icon-left { display: inline-block; left: -5px; position: relative; }
    .testimonial-item .quote-icon-right { display: inline-block; right: -5px; position: relative; top: 10px; transform: scale(-1, -1); }
    .btn-custom-submit { background: #FFA500; border: 0; padding: 10px 30px; color: #fff; transition: 0.4s; border-radius: 50px; }
    .btn-custom-submit:hover { background: #ffffff; color: #FFA500; }
</style>
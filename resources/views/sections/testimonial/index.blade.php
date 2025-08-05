<section id="testimonials" class="testimonials section" 
    @if($testimonialSection->background_image)
        style="background-image: url('{{ Storage::url($testimonialSection->background_image) }}'); background-size: cover; background-position: center; background-attachment: fixed;"
    @endif
>

<div class="container section-title" data-aos="fade-up">
    <br>
    <br>
    <br>
    <h2 class="text-white">{{ $testimonialSection->title }}</h2>
    <p class="text-white">{{ $testimonialSection->subtitle }}</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 1,
                      "spaceBetween": 40
                    },
                    "1200": {
                      "slidesPerView": 3,
                      "spaceBetween": 1
                    }
                  }
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
            <img src="{{ $testimonial->photo ? Storage::url($testimonial->photo) : 'https://via.placeholder.com/100' }}" class="testimonial-img" alt="">
            <div class="profile-info">
                <h3>{{ $testimonial->name }}</h3>
                <h4>{{ $testimonial->position }}</h4>
            </div>
        </div>

    </div>
</div>@endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="text-center mt-4">
                   <a href="{{ route('testimonials.public.create') }}" class="btn-custom-submit">Tulis Testimoni Anda</a>
               </div>
    </div>
</section>

<style>
    /* Mengatur kontainer utama setiap item testimoni */
    .testimonial-item {
        box-sizing: content-box;
        padding: 30px;
        margin: 30px 15px;
        min-height: 200px;
        box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08);
        background: #fff; /* Memberikan background putih */
        position: relative;
        border-radius: 8px; /* Sudut sedikit melengkung */
    }

    /* Mengatur layout foto dan info nama */
    .testimonial-item .profile {
        display: flex;
        align-items: center;
        margin-top: 25px;
    }

    .testimonial-item .profile .testimonial-img {
        width: 60px; /* Ukuran foto */
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0; /* Mencegah foto mengecil */
    }

    .testimonial-item .profile .profile-info {
        margin-left: 15px;
    }

    .testimonial-item .profile h3 {
        font-size: 18px;
        font-weight: bold;
        margin: 0;
    }

    .testimonial-item .profile h4 {
        font-size: 14px;
        color: #6c757d;
        margin: 0;
    }

    /* Mengatur posisi rating bintang */
    .testimonial-item .stars {
        margin-bottom: 15px;
    }
    .testimonial-item .stars i {
        color: #ffc107; /* Warna bintang kuning */
    }

    /* Mengatur kutipan testimoni */
    .testimonial-item .quote-icon-left,
    .testimonial-item .quote-icon-right {
        color: #fad39c;
        font-size: 26px;
    }
    .testimonial-item .quote-icon-left {
        display: inline-block;
        left: -5px;
        position: relative;
    }
    .testimonial-item .quote-icon-right {
        display: inline-block;
        right: -5px;
        position: relative;
        top: 10px;
        transform: scale(-1, -1);
    }
    


.btn-custom-submit {
        background: #FFA500; /* Warna oranye */
        border: 0;
        padding: 10px 30px;
        color: #fff;
        transition: 0.4s;
        border-radius: 50px;
    }

    .btn-custom-submit:hover {
        background: #ffffff; /* Warna oranye lebih gelap saat hover */
    }
</style>
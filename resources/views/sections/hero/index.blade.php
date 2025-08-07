    <section id="hero" class="hero section dark-background">
        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            @foreach ($heroItems as $item)
            <div class="carousel-item @if($loop->first) active @endif">
                <img src="{{ Storage::url($item->image) }}" class="hero-image-darken" alt="{{ $item->title }}">
                <div class="container">
                    <h2>{{ $item->title }}</h2>
                    <p>{{ $item->description }}</p>
                    <br><br>
                    {{-- <a href="#services" class="btn-get-started">Get Started</a> --}}
                </div>
            </div>
            @endforeach
            
            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
            <ol class="carousel-indicators">
                {{-- @foreach ($heroItems as $item) --}}
                {{-- <li  data-bs-target="#hero-carousel" data-bs-slide-to="{{ $loop->index }}" class="@if($loop->first) active @endif"></li> --}}
                {{-- @endforeach --}}
            </ol>
        </div>
    </section>

    {{-- Kode CSS Lengkap untuk Hero Section --}}
    <style>
        .hero-image-darken {
            filter: brightness(30%);
        }

        /* Membuat latar belakang kontainer teks menjadi transparan */
        #hero .carousel-item .container {
            background-color: transparent;
            box-shadow: none; /* Menghapus bayangan jika ada */
            padding: 20px; /* Menambah sedikit jarak agar tidak terlalu rapat */
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6); /* Menambah bayangan teks agar mudah dibaca */
            border: none !important; /* <-- TAMBAHKAN BARIS INI UNTUK MENGHILANGKAN GARIS ORANYE */
        }

        /* Menghilangkan garis dekoratif di atas judul (jika ada) */
        #hero .container h2::before {
            display: none !important;
        }
    </style>
<section id="portfolio" class="portfolio section">

    <div class="container section-title" data-aos="fade-up">
        <h2>Produk Kami</h2>
        <p>Intip Referensi produk jadi kami untuk kemajuan Bisnis Anda</p>
    </div>
    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                @foreach($portfolioCategories as $category)
                <li data-filter=".{{ $category->filter }}">{{ $category->name }}</li>
                @endforeach
            </ul>

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($portfolioItems as $item)
                {{-- PERBAIKAN: Menambahkan ?? '' sebagai pengaman jika kategori tidak ada --}}
                <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item {{ $item->category->filter ?? '' }}">
                    <div class="portfolio-content h-100">
                        
                        {{-- PERBAIKAN: Mengirim seluruh objek $item, bukan hanya slug --}}
                        <a href="{{ route('portfolio.show', $item) }}">
                            <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="{{ $item->title }}">
                        </a>

                        <div class="portfolio-info">
                            <h4>{{ $item->title }}</h4>
                            <div class="button-container">
                                <a href="{{ $item->detail_url }}" class="portfolio-title-button1" target="_blank">Live Demo</a>
                                
                                {{-- PERBAIKAN: Mengirim seluruh objek $item, bukan hanya slug --}}
                                <a href="{{ route('portfolio.show', $item) }}" class="portfolio-title-button">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


{{-- KODE CSS LENGKAP --}}
<style>
    /* Mengatur agar .portfolio-content mengisi tinggi kolomnya */
    .portfolio-content.h-100 {
        display: flex;
        flex-direction: column;
        border-radius: 8px;
        box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        background: #fff;
    }

    /* ======================================================= */
    /* PERBAIKAN 1: Membuat "bingkai" untuk gambar             */
    /* ======================================================= */
    .portfolio-content > a {
        display: block;
        overflow: hidden;
        /* Tentukan rasio aspek yang Anda inginkan (misal: 4:3) */
        aspect-ratio: 6 / 3; 
        background-color: #f0f0f0; /* Warna placeholder saat gambar dimuat */
    }

    /* PERBAIKAN 2: Memaksa gambar untuk mengisi bingkai tanpa distorsi */
    .portfolio-content img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ini bagian terpenting */
        transition: transform 0.3s ease;
    }

    /* Efek zoom saat kursor di atas gambar */
    .portfolio-content:hover img {
        transform: scale(1.1);
    }
    /* ======================================================= */
    /* AKHIR PERBAIKAN                                         */
    /* ======================================================= */

    /* Area info (judul dan tombol) */
    .portfolio-content .portfolio-info {
        padding: 20px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .portfolio-content h4 {
        font-size: 18px;
        font-weight: 700;
        margin: 0 0 20px 0;
        min-height: 44px;
    }
    
    /* Kontainer untuk tombol */
    .portfolio-content .button-container {
        display: flex;
        gap: 10px;
        margin-top: auto;
    }

    /* Style untuk tombol */
    .portfolio-title-button, .portfolio-title-button1 {
        display: block;
        color: #ffffff !important;
        padding: 8px 15px;
        border-radius: 50px;
        text-decoration: none !important;
        font-size: 14px;
        font-weight: 500;
        text-align: center;
        transition: background-color 0.3s;
        flex-grow: 1; 
    }

    .portfolio-title-button {
        background-color: #FFA500;
    }
    .portfolio-title-button1 {
        background-color: #0044ff;
    }

    .portfolio-title-button1:hover {
        background-color: #0300cc;
    }
    .portfolio-title-button:hover {
        background-color: #cc8400;
    }
</style>
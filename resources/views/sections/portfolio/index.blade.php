<section id="portfolio" class="portfolio section">

    <div class="container section-title" data-aos="fade-up">
        <h2>Produk Kami</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>
    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            {{-- Filter Kategori (Dinamis) --}}
            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                @foreach($portfolioCategories as $category)
                <li data-filter=".{{ $category->filter }}">{{ $category->name }}</li>
                @endforeach
            </ul>

            {{-- Item Portfolio (Dinamis) --}}
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($portfolioItems as $item)
                <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item {{ $item->category->filter }}">
        <div class="portfolio-content h-100">
            
            {{-- PERUBAHAN 1: Link gambar sekarang ke halaman detail, bukan modal --}}
            <a href="{{ route('portfolio.show', $item->slug) }}">
                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="{{ $item->title }}">
            </a>

            <div class="portfolio-info">
                <h4>{{ $item->title }}</h4>
                <div class="button-container">
                    <a href="{{ $item->detail_url }}" class="portfolio-title-button1" target="_blank">Live Demo</a>
                    
                    {{-- PERUBAHAN 2: Tombol diubah menjadi 'Lihat Selengkapnya' --}}
                    <a href="{{ route('portfolio.show', $item->slug) }}" class="portfolio-title-button">Lihat Selengkapnya</a>
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
        flex-direction: column; /* Mengatur item di dalamnya (gambar, info) secara vertikal */
        border-radius: 8px;
        box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        background: #fff;
    }

    /* Area info (judul dan tombol) */
    .portfolio-content .portfolio-info {
        padding: 20px;
        display: flex;
        flex-direction: column;
        flex-grow: 1; /* KUNCI: Membuat area info ini mengisi sisa ruang vertikal */
    }

    .portfolio-content h4 {
        font-size: 18px;
        font-weight: 700;
        margin: 0 0 20px 0; /* Jarak antara judul dan tombol */
        min-height: 44px;
    }
    
    /* Kontainer untuk tombol */
    .portfolio-content .button-container {
        display: flex;
        gap: 10px;
        margin-top: auto; /* KUNCI: Mendorong kontainer tombol ini ke bagian paling bawah */
    }

    /* Style untuk tombol */
    .portfolio-title-button {
        display: block;
        background-color: #FFA500;
        color: #ffffff !important;
        padding: 8px 15px;
        border-radius: 50px;
        text-decoration: none !important;
        font-size: 14px;
        font-weight: 500;
        text-align: center;
        transition: background-color 0.3s;
        /* PERBAIKAN: Ganti width: 100% dengan flex-grow: 1 */
        flex-grow: 1; 
    }

    .portfolio-title-button1{
        display: block;
        background-color: #0044ff;
        color: #ffffff !important;
        padding: 8px 15px;
        border-radius: 50px;
        text-decoration: none !important;
        font-size: 14px;
        font-weight: 500;
        text-align: center;
        transition: background-color 0.3s;
        /* PERBAIKAN: Ganti width: 100% dengan flex-grow: 1 */
        flex-grow: 1; 
    }

    .portfolio-title-button1:hover {
        background-color: #0300cc;
    }
    .portfolio-title-button:hover {
        background-color: #cc8400;
    }
</style>
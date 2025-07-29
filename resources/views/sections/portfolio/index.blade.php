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
                        
                        {{-- GAMBAR SEKARANG MENJADI PEMICU MODAL --}}
                        <a href="#" data-bs-toggle="modal" data-bs-target="#portfolioModal-{{ $item->id }}">
                            <img src="{{ Storage::url($item->image) }}" class="img-fluid" alt="{{ $item->title }}">
                        </a>

                        <div class="portfolio-info">
                            <h4>{{ $item->title }}</h4>
                            {{-- <p class="portfolio-description">{{ $item->description }}</p> --}}
                            <div class="button-container">
                                <a href="{{ $item->detail_url }}" class="portfolio-title-button" target="_blank">Live Demo</a>
                                <a href="https://wa.me/message/E2RJ2KLGMG7WD1" class="portfolio-title-button" target="_blank">Order Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal fade" id="portfolioModal-{{ $item->id }}" tabindex="-1" aria-labelledby="portfolioModalLabel-{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="portfolioModalLabel-{{ $item->id }}">{{ $item->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <img src="{{ Storage::url($item->image) }}" class="img-fluid" alt="{{ $item->title }}">
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Kategori:</strong> {{ $item->category->name ?? 'N/A' }}</p>
                                        <div>
                                            <strong>Deskripsi:</strong>
                                            {{-- Pastikan Anda sudah punya kolom 'details' di database --}}
                                            <p>{!! nl2br(e($item->description)) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ $item->detail_url }}" class="portfolio-title-button" target="_blank" rel="noopener noreferrer">Kunjungi Website</a>
                                <a href="https://wa.me/message/E2RJ2KLGMG7WD1" class="portfolio-title-button" target="_blank">Order Sekarang</a>
                                <a class="portfolio-title-button" data-bs-dismiss="modal">Tutup</a>
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
    /* Mengatur tata letak kartu agar rapi */
    .portfolio-content {
        display: flex;
        flex-direction: column;
    }
    .portfolio-info {
        padding: 15px;
        display: flex;
        flex-direction: column;
        flex-grow: 1; /* Membuat .portfolio-info mengisi sisa ruang */
    }
    .portfolio-description {
        flex-grow: 1; /* Membuat deskripsi mengisi ruang kosong di tengah */
    }
    .button-container {
        display: flex;
        gap: 10px; /* Jarak antar tombol */
        margin-top: auto; /* Mendorong tombol ke bagian bawah kartu */
        padding-top: 15px;
    }

    /* Style untuk tombol */
    .portfolio-title-button {
        display: inline-block;
        background-color: #FFA500;
        color: #ffffff !important;
        padding: 8px 15px;
        border-radius: 50px;
        text-decoration: none !important;
        font-size: 14px;
        font-weight: 500;
        text-align: center;
        transition: background-color 0.3s;
    }
    .portfolio-title-button:hover {
        background-color: #cc8400;
        color: #ffffff !important;
    }
</style>
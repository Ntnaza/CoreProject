@extends('layouts.main') {{-- Sesuaikan dengan nama layout utama Anda --}}

@section('content')

<main class="main">

    <section id="portfolio-details" class="portfolio-details section">
        <div class="container" data-aos="fade-up">

            {{-- Wrapper untuk memberi jarak dari navbar --}}
            <div class="page-title">
              <br>
              <br>
              <br>
                <h1>{{ $portfolioItem->title }}</h1>
            </div>

            <div class="row gy-5 align-items-center">

                {{-- KOLOM KIRI: Gambar --}}
                <div class="col-lg-6">
                    <div class="portfolio-images">
                        <img src="{{ asset('storage/' . $portfolioItem->image) }}" class="img-fluid rounded-4 shadow-sm" alt="{{ $portfolioItem->title }}">
                    </div>
                </div>

                {{-- KOLOM KANAN: Deskripsi dan Tombol Aksi --}}
                <div class="col-lg-6">
                    <div class="portfolio-content-right">
                        
                        <h3>Informasi Proyek</h3>
                        <ul>
                            <li><strong>Kategori</strong>: {{ $portfolioItem->category->name ?? 'N/A' }}</li>
                            <li><strong>Tanggal Rilis</strong>: {{ $portfolioItem->created_at->format('d M, Y') }}</li>
                        </ul>
                        
                        <h3>Deskripsi</h3>
                        <p>
                            {!! nl2br(e($portfolioItem->description)) !!}
                        </p>
                        
                        <div class="portfolio-actions">
                            <a href="{{ $portfolioItem->detail_url }}" class="btn btn-visit-website" target="_blank">Kunjungi Website</a>
                            <a href="https://wa.me/message/E2RJ2KLGMG7WD1" class="btn btn-order-now" target="_blank"><i class="fa-brands fa-whatsapp"></i> Order Sekarang</a>
                            <a href="{{ url('/') }}#portfolio" class="btn btn-back"><i class="fa-solid fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

</main>

{{-- PERUBAHAN: Blok style diperbarui --}}
<style>
    /* Latar belakang untuk seluruh section */
    .portfolio-details.section {
        background-color: #292929;
        padding: 60px 0;
        min-height: 100vh;
    }

    /* PERBAIKAN: Menghapus kotak putih pada judul */
    .page-title {
        background: none; /* Menghapus background putih */
        padding: 0; /* Menghapus padding */
        margin-bottom: 40px;
    }

    .page-title h1 {
        font-size: 36px;
        font-weight: 700;
        border-bottom: none; /* Menghapus garis bawah */
    }

    /* Style untuk breadcrumbs */
    .breadcrumbs ol {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        padding: 0;
        margin: 0 0 10px 0;
        font-size: 14px;
    }
    .breadcrumbs ol li+li {
        padding-left: 10px;
    }
    .breadcrumbs ol li+li::before {
        display: inline-block;
        padding-right: 10px;
        color: #6c757d;
        content: "/";
    }

    /* Ukuran gambar di kolom kiri */
    .portfolio-images img {
        max-height: 450px;
        width: 100%;
        object-fit: cover;
    }

    /* Styling untuk info dan deskripsi di kolom kanan */
    .portfolio-content-right h3 {
        font-size: 22px;
        font-weight: 600;
        
        /* margin-top: 20px; */
        /* margin-bottom: 15px; */
        /* padding-bottom: 10px; */
        /* border-bottom: 2px solid #e9ecef; */
    }

    .portfolio-content-right ul {
        list-style: none;
        padding: 0;
        
    }

    .portfolio-content-right ul li {
        margin-bottom: 10px;
    }

    /* Styling untuk tombol aksi */
    .portfolio-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }

    .btn-visit-website, .btn-order-now , .btn-back{
        color: white !important;
        padding: 10px 25px;
        border-radius: 50px;
        text-decoration: none;
        transition: 0.3s;
        font-weight: 500;
    }

    .btn-visit-website {
        background: #0d6efd;
    }
    .btn-visit-website:hover {
        background: #0b5ed7;
    }
    
    .btn-order-now {
        background: #06eb5a;
    }
    .btn-order-now:hover {
        background: #25D366;
    }
    .btn-back {
        background: #eb0606;
    }
    .btn-back:hover {
        background: #c10000;
    }
    .portfolio-details.section,
.portfolio-details h1,
.portfolio-details h3,
.portfolio-details p,
.portfolio-details li {
    color: #ffffff; /* Warna teks putih */
}

/* PERBAIKAN: Mengubah warna breadcrumbs agar terlihat */
.breadcrumbs ol li, .breadcrumbs ol li a {
    color: #cccccc; /* Abu-abu terang untuk breadcrumbs */
}
.breadcrumbs ol li.current {
    color: #ffffff; /* Warna putih untuk halaman aktif */
}
.breadcrumbs ol li+li::before {
    color: #888888; /* Warna pemisah '/' */
}
</style>

@endsection
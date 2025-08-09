<!-- Gallery Section -->
<section id="galery" class="portfolio section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Galeri</h2>
    <p>Intip kegiatan Kami</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

      <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        @foreach($galleryCategories as $category)
        <li data-filter=".filter-{{ $category->filter }}">{{ $category->name }}</li>
        @endforeach
      </ul><!-- End Portfolio Filters -->

      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

        @foreach($galleryItems as $item)
        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $item->category->filter }}">
          <div class="portfolio-content h-100">
            {{-- Link pembungkus gambar --}}
            <a href="{{ asset('storage/' . $item->image) }}" data-gallery="portfolio-gallery-app" class="glightbox portfolio-image-wrap">
                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="">
            </a>
            {{-- Info di bawah gambar --}}
            <div class="portfolio-info">
              <h4><a href="{{ asset('storage/' . $item->image) }}" class="glightbox" title="{{ $item->title }}">{{ $item->title }}</a></h4>
              {{-- <p>{{ $item->description }}</p> --}}
            </div>
          </div>
        </div><!-- End Portfolio Item -->
        @endforeach

      </div><!-- End Portfolio Container -->

    </div>

  </div>

</section><!-- /Portfolio Section -->

{{-- ======================================================= --}}
{{-- TAMBAHKAN BLOK STYLE INI DI BAWAH SECTION ANDA         --}}
{{-- ======================================================= --}}
<style>
    /* Membuat "bingkai" untuk gambar dengan rasio aspek tetap */
    .portfolio-image-wrap {
        display: block;
        overflow: hidden;
        aspect-ratio: 4 / 3; /* Rasio 4:3 (lebar:tinggi). Ubah sesuai selera, misal: 16/9 atau 1/1 */
        background-color: #f0f0f0; /* Warna placeholder */
    }

    /* Memaksa gambar untuk mengisi bingkai tanpa menjadi gepeng */
    .portfolio-image-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ini bagian terpenting */
        transition: transform 0.3s ease;
    }

    /* Efek zoom saat kursor di atas gambar */
    .portfolio-content:hover .portfolio-image-wrap img {
        transform: scale(1.1);
    }
</style>
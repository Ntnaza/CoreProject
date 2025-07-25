<section id="portfolio" class="portfolio section">

    <div class="container section-title" data-aos="fade-up">
        <h2>Produk Kami</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            {{-- Filter Kategori (Dinamis) --}}
            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                @foreach($portfolioCategories as $category)
                <li data-filter=".{{ $category->filter }}">{{ $category->name }}</li>
                @endforeach
            </ul>{{-- Item Portfolio (Dinamis) --}}
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($portfolioItems as $item)
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ $item->category->filter }}">
                    <div class="portfolio-content h-100">
                        <a href="{{ Storage::url($item->image) }}" data-gallery="portfolio-gallery-app" class="glightbox">
                            <img src="{{ Storage::url($item->image) }}" class="img-fluid" alt="{{ $item->title }}">
                        </a>
                        <div class="portfolio-info">
                            <h4><a href="{{ $item->detail_url }}" title="More Details">{{ $item->title }}</a></h4>
                            <p>{{ $item->description }}</p>
                        </div>
                    </div>
                </div>@endforeach
            </div></div>
    </div>
</section>
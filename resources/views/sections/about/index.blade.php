<section id="about" class="about section">

    {{-- Bagian Judul (Tidak Berubah) --}}
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $about->section_title }}</h2>
        <p>{{ $about->section_subtitle }}</p>
    </div>

    <div class="container">
        <div class="row gy-4 align-items-center">

            {{-- PERUBAHAN: Kolom kiri sekarang berisi Visi & Misi --}}
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="content ps-0 ps-lg-5">
                    <p class="fst-italic">{!! nl2br(e($about->italic_paragraph)) !!}</p>
                    <ul>
                        @foreach(explode("\n", str_replace("\r", "", $about->list_items)) as $item)
                            @if(trim($item))
                                <li><i class="bi bi-check-circle-fill"></i> <span>{{ trim($item) }}</span></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- PERUBAHAN: Kolom kanan sekarang hanya berisi Video --}}
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
                <div class="position-relative">
                    <img src="{{ Storage::url($about->video_image) }}" class="img-fluid rounded-4" alt="">
                    <a href="{{ $about->video_url }}" class="glightbox pulsating-play-btn"></a>
                </div>
            </div>

        </div>
    </div>

</section>
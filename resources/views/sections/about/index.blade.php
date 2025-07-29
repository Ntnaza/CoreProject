<section id="about" class="about section">

    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $about->section_title }}</h2>
        <p>{{ $about->section_subtitle }}</p>
    </div><div class="container">
        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3>{{ $about->headline }}</h3>
                <img src="{{ Storage::url($about->main_image) }}" class="img-fluid rounded-4 mb-4" alt="">
                <p>{!! nl2br(e($about->paragraph1)) !!}</p>
                <p>{!! nl2br(e($about->paragraph2)) !!}</p>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
                <div class="content ps-0 ps-lg-5">
                    <p class="fst-italic">{!! nl2br(e($about->italic_paragraph)) !!}</p>
                    <ul>
                        @foreach(explode("\n", str_replace("\r", "", $about->list_items)) as $item)
                            @if(trim($item))
                                <li><i class="bi bi-check-circle-fill"></i> <span>{{ trim($item) }}</span></li>
                            @endif
                        @endforeach
                    </ul>
                    <p>{!! nl2br(e($about->final_paragraph)) !!}</p>
                    <div class="position-relative mt-4">
                        <img src="{{ Storage::url($about->video_image) }}" class="img-fluid rounded-4" alt="">
                        <a href="{{ $about->video_url }}" class="glightbox pulsating-play-btn"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
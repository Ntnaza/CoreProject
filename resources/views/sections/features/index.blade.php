<section id="features" class="features section">
    <div class="container">
        <div class="row gy-4">

            {{-- Kolom Kiri untuk "Why Box" (Dinamis) --}}
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="why-box">
                    <h3>{{ $featureSection->headline }}</h3>
                    <p>{!! nl2br(e($featureSection->paragraph)) !!}</p>
                    <div class="text-center">
                        <a href="{{ $featureSection->link_url }}" class="more-btn"><span>{{ $featureSection->link_text }}</span> <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>{{-- Kolom Kanan untuk "Icon Boxes" (Dinamis) --}}
            <div class="col-lg-8 d-flex align-items-stretch">
                {{-- Container untuk icon box. AOS diatur di sini --}}
                <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

                    @foreach($featureItems as $item)
                        {{-- 
                            Struktur ini meniru contoh statis Anda:
                            - Item pertama tidak memiliki delay sendiri (mengikuti delay parent .row yaitu "200").
                            - Item selanjutnya memiliki delay yang bertambah 100ms.
                            - Variabel $loop->index dari Blade digunakan untuk kalkulasi.
                        --}}
                        <div class="col-xl-4" @if($loop->index > 0) data-aos-delay="{{ 200 + ($loop->index * 100) }}" @endif>
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <i class="{{ $item->icon }}"></i>
                                <h4>{{ $item->title }}</h4>
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>@endforeach

                </div>
            </div>

        </div>
    </div>
</section>
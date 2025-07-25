<section id="call" class="call-to-action section dark-background">

    {{-- Ganti path gambar statis dengan path dinamis --}}
    <img src="{{ Storage::url($cta->background_image) }}" alt="">

    <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-10">
                <div class="text-center">
                    {{-- Ganti konten statis dengan variabel dari database --}}
                    <h3>{{ $cta->headline }}</h3>
                    <p>{{ $cta->paragraph }}</p>
                    <a class="cta-btn" href="{{ $cta->button_url }}">{{ $cta->button_text }}</a>
                </div>
            </div>
        </div>
    </div>

</section>
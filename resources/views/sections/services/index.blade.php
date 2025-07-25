<section id="services" class="services section">

    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $serviceSection->title }}</h2>
        <p>{{ $serviceSection->subtitle }}</p>
    </div><div class="container">
        <div class="row gy-4">

            @foreach($services as $service)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                <div class="service-item position-relative">
                    <div class="icon">
                        <i class="{{ $service->icon }}"></i>
                    </div>
                    <a href="{{ $service->link }}" class="stretched-link">
                        <h3>{{ $service->title }}</h3>
                    </a>
                    <p>{{ $service->description }}</p>
                </div>
            </div>@endforeach

        </div>
    </div>
</section>
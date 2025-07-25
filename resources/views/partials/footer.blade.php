<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    @if($setting->logo)
        <img src="{{ Storage::url($setting->logo) }}" alt="Logo" style="max-height: 40px; margin-right: 10px;">
    @endif
    {{-- <span class="sitename">{{ $setting->site_name }}</span> --}}
</a>
                <div class="footer-contact pt-3">
                    {{-- Menggunakan data dinamis dari $contactInfo --}}
                    <p>{{ $contactInfo->address }}</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>{{ $contactInfo->phone }}</span></p>
                    <p><strong>Email:</strong> <span>{{ $contactInfo->email }}</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    {{-- Menggunakan data dinamis dari $contactInfo --}}
                    @if($contactInfo->twitter_url)<a href="{{ $contactInfo->twitter_url }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-twitter-x"></i></a>@endif
                    @if($contactInfo->facebook_url)<a href="{{ $contactInfo->facebook_url }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>@endif
                    @if($contactInfo->instagram_url)<a href="{{ $contactInfo->instagram_url }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>@endif
                    @if($contactInfo->linkedin_url)<a href="{{ $contactInfo->linkedin_url }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-linkedin"></i></a>@endif
                    @if($contactInfo->youtube_url)<a href="{{ $contactInfo->youtube_url }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-youtube"></i></a>@endif
                    @if($contactInfo->tiktok_url)<a href="{{ $contactInfo->tiktok_url }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-tiktok"></i></a>@endif
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    {{-- Link ini mengarah ke section di halaman yang sama --}}
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About us</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Team</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul>
                    {{-- Loop dari data services yang ada di database --}}
                    @foreach($services as $service)
                    <li><a href="{{ $service->link }}">{{ $service->title }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Menghapus 2 kolom link placeholder yang tidak relevan --}}

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $setting->site_name }}</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

</footer>
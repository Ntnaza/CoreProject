<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="{{ url('/') }}#about" class="logo d-flex align-items-center">
                    <span class="sitename">{{ $setting->site_name }}</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>{{ $contactInfo->address }}</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>{{ $contactInfo->phone }}</span></p>
                    <p><strong>Email:</strong> <span>{{ $contactInfo->email }}</span></p>
                </div>
                <div class="social-links d-flex mt-4">
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
                    {{-- Link ini juga diubah agar berfungsi dari halaman manapun --}}
                    <li><a href="{{ url('/') }}#hero">Home</a></li>
                    <li><a href="{{ url('/') }}#about">About us</a></li>
                    <li><a href="{{ url('/') }}#services">Services</a></li>
                    <li><a href="{{ url('/') }}#portfolio">Portfolio</a></li>
                    <li><a href="{{ url('/') }}#team">Team</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul>
                    @foreach($services as $service)
                    {{-- Link layanan diubah agar mengarah ke section services di halaman utama --}}
                    <li><a href="{{ url('/#services') }}">{{ $service->title }}</a></li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $setting->site_name }}</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

</footer>
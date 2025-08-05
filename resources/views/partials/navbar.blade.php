<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ url('/') }}#about" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        @if($setting->logo)
        <img src="{{ Storage::url($setting->logo) }}" alt="Logo" style="max-height: 40px; margin-right: 10px;">
    @endif
    {{-- <span class="sitename">{{ $setting->site_name }}</span> --}}
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}#hero" class="active">Beranda</a></li>
                <li><a href="{{ url('/') }}#about">Tentang Kami</a></li>
                <li><a href="{{ url('/') }}#services">Layanan</a></li>
                <li><a href="{{ url('/') }}#portfolio">Produk Kami</a></li>
                <li><a href="{{ url('/') }}#team">Team</a></li>
                <li><a href="{{ url('/') }}#testimonials">Testimoni</a></li>
                <li><a href="{{ url('/') }}#contact">Kontak</a></li>
                <li><a href="{{ route('testimonials.public.create') }}#testimonials-form">Tulis Testimoni</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>
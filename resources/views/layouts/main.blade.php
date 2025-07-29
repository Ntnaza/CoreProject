<!-- resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')Core Project</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">


  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">
</head>
<body>

  {{-- Navbar --}}
  @include('partials.navbar')

  {{-- Main Content --}}
  <main id="main">
    @include('sections.hero.index')
    @include('sections.about.index')
    @include('sections.features.index')
    @include('sections.services.index')
    @include('sections.call.index')
    @include('sections.portfolio.index')
    @include('sections.team.index')
    @include('sections.testimonial.index') 
    @include('sections.contact.index') 
    
    
  </main>
  
  {{-- Footer --}}
  @include('partials.footer')
  {{-- <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}
  {{-- <div id="preloader"></div> --}}

    <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>
</body>
</html>

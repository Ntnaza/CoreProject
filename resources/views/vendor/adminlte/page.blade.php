@extends('adminlte::master')

@section('adminlte_css')
    {{-- MENAMBAHKAN FAVICON ANDA SECARA PAKSA --}}
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
    
    @stack('css')
    @yield('css')
@stop

@section('body')
    <div class="wrapper">

        {{-- Preloader (menggunakan konfigurasi) --}}
        @if(config('adminlte.preloader.enabled', false))
            @include('adminlte::partials.preloader')
        @endif

        {{-- Navbar --}}
        @include('adminlte::partials.navbar.navbar')

        {{-- Main Sidebar --}}
        @include('adminlte::partials.sidebar.left-sidebar')

        {{-- Content Wrapper --}}
        <div class="content-wrapper">

            {{-- Content Header --}}
            @hasSection('content_header')
                <div class="content-header">
                    <div class="container-fluid">
                        @yield('content_header')
                    </div>
                </div>
            @endif

            {{-- Main Content --}}
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

        </div>

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
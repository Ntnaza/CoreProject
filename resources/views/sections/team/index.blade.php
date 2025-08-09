<section id="team" class="team section">

    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $teamSection->title }}</h2>
        <p>{{ $teamSection->subtitle }}</p>
    </div>

    <div class="container">
        {{-- PERUBAHAN: Menambahkan pembungkus untuk membuat konten lebih sempit --}}
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row gy-4">
                    @foreach($teamMembers as $member)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('storage/' . $member->photo) }}" class="img-fluid" alt="{{ $member->name }}">
                                <div class="social">
                                    @if($member->twitter_url)<a href="{{ $member->twitter_url }}" target="_blank"><i class="bi bi-twitter-x"></i></a>@endif
                                    @if($member->facebook_url)<a href="{{ $member->facebook_url }}" target="_blank"><i class="bi bi-facebook"></i></a>@endif
                                    @if($member->instagram_url)<a href="{{ $member->instagram_url }}" target="_blank"><i class="bi bi-instagram"></i></a>@endif
                                    @if($member->linkedin_url)<a href="{{ $member->linkedin_url }}" target="_blank"><i class="bi bi-linkedin"></i></a>@endif
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ $member->name }}</h4>
                                <span>{{ $member->position }}</span>
                                {{-- <p>{{ $member->description }}</p> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ======================================================= --}}
{{-- TAMBAHKAN BLOK STYLE INI DI BAWAH SECTION ANDA         --}}
{{-- ======================================================= --}}
<style>
    /* PERBAIKAN 1: Mengecilkan ukuran foto anggota tim */
    
    

    /* PERBAIKAN 2: Mengubah warna ikon media sosial */
    .team-member .social a i {
        transition: color 0.3s;
    }
    .team-member .social a .bi-twitter-x { color: #000000; } /* Hitam */
    .team-member .social a .bi-facebook { color: #1877F2; } /* Biru Facebook */
    .team-member .social a .bi-instagram { color: #D62976; } /* Pink Instagram */
    .team-member .social a .bi-linkedin { color: #0A66C2; } /* Biru LinkedIn */

    /* Menambahkan efek hover agar lebih menarik */
    .team-member .social a:hover i {
        color: #FFA500; /* Warna oranye brand Anda saat hover */
    }

    /* Style lain dari template Anda (tidak perlu diubah) */
    .team-member { text-align: center; }
    .team-member .member-info { text-align: center; }
    .team-member .member-info h4 { font-weight: 700; margin-bottom: 2px; font-size: 18px; }
    .team-member .member-info span { font-style: italic; display: block; font-size: 13px; }
    .team-member .member-info p { padding-top: 10px; font-size: 14px; font-style: italic; color: #aaaaaa; }
    .team-member .social { position: absolute; right: -100%; top: 10px; opacity: 0; border-radius: 4px; transition: 0.5s; background: rgba(255, 255, 255, 0.9); z-index: 2; }
    .team-member .social a { transition: color 0.3s; color: #444444; margin: 15px 12px; display: block; line-height: 0; text-align: center; }
    .team-member:hover .social { right: 10px; opacity: 1; }
</style>
<section id="team" class="team section">

    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $teamSection->title }}</h2>
        <p>{{ $teamSection->subtitle }}</p>
    </div><div class="container">
        <div class="row gy-4">

            @foreach($teamMembers as $member)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                <div class="team-member">
                    <div class="member-img">
                        <img src="{{ Storage::url($member->photo) }}" class="img-fluid" alt="{{ $member->name }}">
                        <div class="social">
                            @if($member->twitter_url)<a href="{{ $member->twitter_url }}"target="_blank"><i class="bi bi-twitter-x"></i></a>@endif
                            @if($member->facebook_url)<a href="{{ $member->facebook_url }}"target="_blank"><i class="bi bi-facebook"></i></a>@endif
                            @if($member->instagram_url)<a href="{{ $member->instagram_url }}"target="_blank"><i class="bi bi-instagram"></i></a>@endif
                            @if($member->linkedin_url)<a href="{{ $member->linkedin_url }}"target="_blank"><i class="bi bi-linkedin"></i></a>@endif
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>{{ $member->name }}</h4>
                        <span>{{ $member->position }}</span>
                        <p>{{ $member->description }}</p>
                    </div>
                </div>
            </div>@endforeach

        </div>
    </div>
</section>
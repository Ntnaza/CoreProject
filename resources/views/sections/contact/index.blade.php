<section id="contact" class="contact section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $contactInfo->section_title }}</h2>
        <p>{{ $contactInfo->section_subtitle }}</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-5">
                <div class="info-wrap">
                    <div class="info-item d-flex"><i class="bi bi-geo-alt flex-shrink-0"></i><div><h3>Address</h3><p>{{ $contactInfo->address }}</p></div></div>
                    <div class="info-item d-flex"><i class="bi bi-telephone flex-shrink-0"></i><div><h3>Telepon</h3><p>{{ $contactInfo->phone }}</p></div></div>
                    <div class="info-item d-flex"><i class="bi bi-envelope flex-shrink-0"></i><div><h3>Email</h3><p>{{ $contactInfo->email }}</p></div></div>
                    <div href="{{ $contactInfo->instagram_url }}" target="_blank" class="info-item d-flex"><i class="bi bi-instagram flex-shrink-0"></i><div><h3>Instagram</h3><p>coreproject.sch</p></div></div>
                    <div class="info-item d-flex"><i class="bi bi-youtube flex-shrink-0"></i><div><h3>Youtube</h3><p>coreproject</p></div></div>
                    <div class="info-item d-flex"><i class="bi bi-linkedin flex-shrink-0"></i><div><h3>Linkedin</h3><p>coreproject.sch</p></div></div>
                    {{-- <iframe src="{{ $contactInfo->map_url }}" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                </div>
            </div>
            <div class="col-lg-7">
                <form action="{{ route('contact.store') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-6"><label for="name-field" class="pb-2">Your Name</label><input type="text" name="name" id="name-field" class="form-control" required=""></div>
                        <div class="col-md-6"><label for="email-field" class="pb-2">Your Email</label><input type="email" class="form-control" name="email" id="email-field" required=""></div>
                        <div class="col-md-12"><label for="subject-field" class="pb-2">Subject</label><input type="text" class="form-control" name="subject" id="subject-field" required=""></div>
                        <div class="col-md-12"><label for="message-field" class="pb-2">Message</label><textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea></div>
                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                            <button type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
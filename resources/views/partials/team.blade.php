<div class="container-fluid our-team-sec pyt-80 pyb-80 myt-40 myb-40">
    <div class="container">
        <div class="row">
            <div
                class="col-12 d-md-flex flex-column justify-content-center  align-items-center text-lg-start text-md-center">
                <h2 class="head--2 mb-0 pyb-40 wht--clr text-center ">
                    Our Team
                </h2>
                <p class="body-txt1 mb-0 pyb-60 wht--clr text-center">
                    Nunc convallis semper justo quis tempor. Praesent molestie,
                    lorem sed imperdiet tempor, libero urna semper urna, facilisis
                    vulputate velit arcu vitae mi. Donec ac nisi ex.
                </p>
            </div>
        </div>
        <div class="row justify-content-center g-4">
            @foreach ($data as $team)
                <div class="our-team-card-wrapper d-flex flex-column justify-content-center ">
                    <div class="our-team-content-wrapper">
                        <div class="our-team-img d-flex justify-content-center">
                            <img src="{{ asset('assets/frontend/images/our-team-img1.webp') }}" alt=""
                                class="img-fluid our-team--img" />
                        </div>
                        <div class="our-team-details d-flex flex-column justify-content-center align-items-center p-4">
                            <div class="name-des col-lg-6 col-12">
                                <h3 class="head--3 secondary-clr mb-3 text-center">{{ $team->name }}</h3>
                                <p class="body-txt1 secondary--clr mb-3  text-center">CEO</p>
                            </div>
                            <div
                                class="social-links-icons col-lg-6 col-12 d-flex justify-content-lg-between  justify-content-center pt-lg-0 pt-2 gap-lg-1 gap-3">
                                <a href="{{ $team->facebook }}">
                                    <div class="socail-links-team d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('assets/frontend/icons/fb-icon.svg') }}" alt="">
                                    </div>
                                </a>
                                <a href="{{ $team->twitter }}">
                                    <div class="socail-links-team d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('assets/frontend/icons/twitter-x-icon.svg') }}"
                                            alt="">
                                    </div>
                                </a>
                                <a href="{{ $team->twitter }}">
                                    <div class="socail-links-team d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('assets/frontend/icons/linkedin-icon.svg') }}"
                                            alt="">
                                    </div>
                                </a>
                                <a href="{{ $team->instagram }}">
                                    <div class="socail-links-team d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('assets/frontend/icons/insta-icon.svg') }}" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

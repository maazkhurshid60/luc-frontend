@extends('layouts.main-layout')


@section('title', 'About Us')

@section('custom-styles')
@endsection

@section('content')
    <div class="main">

        @include('partials.breadcrumbs', [
            'bg_image' => asset('assets/frontend/images/about-us-hero-bg.webp'),
            'home' => ['name' => 'Home', 'route' => 'index'],
            'parent' => '',
            'page_title' => 'About Us',
        ])

        <!-- About Us Section Start-->
        <div class="container-fluid d-flex flex-column justify-content-center py-40px">
            <div class="container">
                <div class="row flex-md-row flex-column">
                    <div class="hero-sec-img d-md-flex flex-column justify-content-center align-items-start ">
                        <img src="{{ asset('assets/frontend/images/engineer-cooperation-technician-maintenance.webp') }}"
                            class="img--2 w-100" alt="" />
                    </div>
                    <div
                        class="hero-sec-text d-flex flex-column justify-content-center align-items-md-start align-items-center  text-md-start text-center ">
                        <h2 class="head--2 secondary--clr line-ht3 mb-0 pyb-40">
                            Your Trusted Advisors in Business Success
                        </h2>
                        <p class="body-txt1 txt--clr mb-0 pyb-40">
                            Lorem ipsum dolor sit amet consectetur. Dictumst sed a mauris a felis consectetur feugiat
                            adipiscing odio. Amet morbi vel amet eget. Pretium magna nec semper vitae pharetra feugiat
                            vulputate velit tellus. Tristique faucibus elementum arcu et turpis consectetur ultricies.
                            Tellus ultrices posuere vehicula facilisis elit.
                        </p>
                        <span class="body-txt1 txt--clr mb-0 pb-4"><img
                                src="{{ asset('assets/frontend/icons/cube-icon.svg') }}" alt=""
                                class="me-4" />Lorem ipsum dolor sit amet, consectetur adipiscing elit. </span>
                        <span class="body-txt1 txt--clr mb-0 pb-4"><img
                                src="{{ asset('assets/frontend/icons/cube-icon.svg') }}" alt=""
                                class="me-4" />Lorem ipsum dolor sit amet, consectetur adipiscing elit. </span>
                        <span class="body-txt1 txt--clr mb-0 pyb-60"><img
                                src="{{ asset('assets/frontend/icons/cube-icon.svg') }}" alt=""
                                class="me-4" />Lorem ipsum dolor sit amet, consectetur adipiscing elit. </span>
                        <button class="secondary-btn primary--clr d-none">
                            Learn More<img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                class="ms-2" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Us Section End-->

        @include('partials.counter')

        <!-- Journey Section Start-->
        <div class="container-fluid py-40px">
            <div class="container">
                <div class="row gap-md-0 gap-4">
                    <div class="hero-sec-img d-flex flex-column justify-content-center">
                        <h2 class="head--2 secondary--clr text-md-start text-center pyb-40 mb-0">Share your journey from
                            the
                            beginning to now</h2>
                        <img src="{{ asset('assets/frontend/images/low-angle-shot-high-buildings-with-metal-stairs-gloomy-day.webp') }}"
                            alt="" class="our-vision-sec-img">
                    </div>
                    <div class="col-md-6 timeline-sec">
                        <div class="timline-item d-flex pyb-40">
                            <div class="timeline-icon">
                                <img src="{{ asset('assets/frontend/icons/timeline-img.svg') }}" alt="">
                            </div>
                            <div class="timeline-details">
                                <p class="body-txt2 secondary--clr mb-0 pb-lg-3 pb-2">Year • Month</p>
                                <h3 class="head--3 mb-0 pb-lg-2 pb-1">Lorem Ipsum</h3>
                                <p class="body-txt2 txt--clr mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit. Suspendisse varius enim in eros elementum tristique.</p>
                            </div>
                        </div>
                        <div class="timline-item d-flex pyb-40">
                            <div class="timeline-icon">
                                <img src="{{ asset('assets/frontend/icons/timeline-img.svg') }}" alt="">
                            </div>
                            <div class="timeline-details">
                                <p class="body-txt2 secondary--clr mb-0 pb-3">Year • Month</p>
                                <h3 class="head--3 mb-0 pb-2">Lorem Ipsum</h3>
                                <p class="body-txt2 txt--clr mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit. Suspendisse varius enim in eros elementum tristique.</p>
                            </div>
                        </div>
                        <div class="timline-item d-flex pyb-40">
                            <div class="timeline-icon">
                                <img src="{{ asset('assets/frontend/icons/timeline-img.svg') }}" alt="">
                            </div>
                            <div class="timeline-details">
                                <p class="body-txt2 secondary--clr mb-0 pb-3">Year • Month</p>
                                <h3 class="head--3 mb-0 pb-2">Lorem Ipsum</h3>
                                <p class="body-txt2 txt--clr mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit. Suspendisse varius enim in eros elementum tristique.</p>
                            </div>
                        </div>
                        <div class="timline-item d-flex pyb-40">
                            <div class="timeline-icon">
                                <img src="{{ asset('assets/frontend/icons/timeline-img.svg') }}" alt="">
                            </div>
                            <div class="timeline-details">
                                <p class="body-txt2 secondary--clr mb-0 pb-3">Year • Month</p>
                                <h3 class="head--3 mb-0 pb-2">Lorem Ipsum</h3>
                                <p class="body-txt2 txt--clr mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit. Suspendisse varius enim in eros elementum tristique.</p>
                            </div>
                        </div>
                        <div class="timline-item d-flex ">
                            <div class="timeline-icon">
                                <img src="{{ asset('assets/frontend/icons/timeline-img.svg') }}" alt="">
                            </div>
                            <div class="timeline-details">
                                <p class="body-txt2 secondary--clr mb-0 pb-3">Year • Month</p>
                                <h3 class="head--3 mb-0 pb-2">Lorem Ipsum</h3>
                                <p class="body-txt2 txt--clr mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit. Suspendisse varius enim in eros elementum tristique.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Journey Section End-->

        <!-- Visison Section Start-->
        <div class="container-fluid py-40px">
            <div class="container">
                <div class="row">
                    <div class="hero-sec-text d-flex flex-column justify-content-center">
                        <h2 class="head--2 secondary--clr text-md-start text-center">Our Vision</h2>
                        <p class="body-txt1 txt--clr text-md-start text-center">Lorem ipsum dolor sit amet consectetur.
                            Leo quisque justo turpis quam volutpat tellus risus condimentum. Aliquet morbi a in
                            ultricies vitae sagittis. Neque adipiscing facilisi nullam nisl lacus enim in consectetur.
                            Quisque natoque quis amet mauris in cras sed ornare volutpat. Massa dictumst nibh at varius
                            sit. Mi urna eget sodales orci tellus rhoncus. Diam in viverra integer id lacinia sit massa.
                            Eu congue ut suspendisse nunc ut arcu nisi vestibulum adipiscing. Accumsan purus risus vel
                            sit enim pellentesque felis habitant adipiscing. Eget sapien aenean placerat fermentum leo.
                            Suscipit viverra erat et malesuada eget quam. Eget tortor fringilla sed nunc. Erat mi mattis
                            id integer massa dignissim tincidunt nisi mollis. Pharetra lectus phasellus enim tincidunt.
                        </p>
                    </div>
                    <div class="hero-sec-img-right">
                        <img src="{{ asset('assets/frontend/images/our-vision-img.webp') }}" alt=""
                            class="our-vision-sec-img">
                    </div>
                </div>
            </div>
        </div>
        <!-- Visison Section End-->

        @include('partials.team', ['data' => $teams])

        @include('partials.brands')
    </div>
@endsection
@section('custom-js')
@endsection

@extends('layouts.main-layout')


@section('title', 'Services')

@section('custom-styles')
@endsection
@section('content')
    <div class="main">

        @include('partials.breadcrumbs', [
            'bg_image' => asset('assets/frontend/images/services-details-bg.webp'),
            'home' => ['name' => 'Home', 'route' => 'index'],
            'parent' => ['name' => 'Services', 'route' => 'services.index'],
            'page_title' => 'Technology',
        ])

        <div class="container-fluid d-flex flex-column justify-content-center py-40px">
            <div class="container">
                <div class="row flex-md-row flex-column">
                    <div class="hero-sec-img d-md-flex flex-column justify-content-center align-items-start ">
                        <img src="{{ asset('assets/frontend/images/services-details-sec2.webp') }}" class="img--2 w-100"
                            alt="" />
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

        <div class="container-fluid our-team-sec pyt-80 pyb-80 my-40px">
            <div class="container">
                <div class="row justify-content-center gy-4">
                    <div class="services-sec d-flex flex-column justify-content-center  align-items-center  text-center">
                        <h2 class="head--2 mb-0 pyb-40 wht--clr text-center ">
                            How It Works
                        </h2>
                        <p class="body-txt1 mb-0 pyb-60 wht--clr text-center">
                            Nunc convallis semper justo quis tempor. Praesent molestie,
                            lorem sed imperdiet tempor, libero urna semper urna, facilisis
                            vulputate velit arcu vitae mi. Donec ac nisi ex.
                        </p>
                    </div>
                    <div class="our--services d-flex justify-content-between flex-wrap mt-0">
                        <div class="our-services-card p-4 mb-4 bg-white">
                            <div class="card-img-wrap mb-4">
                                <img src="{{ asset('assets/frontend/icons/compass.svg') }}" alt=""
                                    class="card-img" />
                            </div>
                            <h3 class="head--3 mb-3 secondary--clr"> Discovery & Assessment</h3>
                            <p class="body-txt2 mb-4 txt--clr">Lorem ipsum dolor sit amet consectetur. Sit odio etiam est
                                pellentesque
                                gravida tincidunt. Aenean eget pellentesque urna facilisi mattis. Quis in tempus massa ac
                                aliquet sit.
                                At vel egestas arcu etiam.
                            </p>
                        </div>
                        <div class="our-services-card p-4 mb-4 bg-white">
                            <div class="card-img-wrap mb-4">
                                <img src="{{ asset('assets/icons/implementaion&assets/frontend/icons/implementaion&integration.svg') }}"
                                    alt="" class="card-img" />
                            </div>
                            <h3 class="head--3 mb-3 secondary--clr">Implementation & Integration</h3>
                            <p class="body-txt2 mb-4 txt--clr">Lorem ipsum dolor sit amet consectetur. Sit odio etiam est
                                pellentesque
                                gravida tincidunt. Aenean eget pellentesque urna facilisi mattis. Quis in tempus massa ac
                                aliquet sit.
                                At vel egestas arcu etiam.
                            </p>
                        </div>
                        <div class="our-services-card p-4 mb-4 bg-white">
                            <div class="card-img-wrap mb-4">
                                <img src="{{ asset('assets/frontend/icons/support.svg') }}" alt=""
                                    class="card-img" />
                            </div>
                            <h3 class="head--3 mb-3 secondary--clr">Support & Optimization</h3>
                            <p class="body-txt2 mb-4 txt--clr">Lorem ipsum dolor sit amet consectetur. Sit odio etiam est
                                pellentesque
                                gravida tincidunt. Aenean eget pellentesque urna facilisi mattis. Quis in tempus massa ac
                                aliquet sit.
                                At vel egestas arcu etiam.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('partials.related-blogs')

        @include('partials.quotation-form')

        @include('partials.faqs')

    </div>
@endsection
@section('custom-js')
@endsection

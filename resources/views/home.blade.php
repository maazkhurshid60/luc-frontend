@extends('layouts.main-layout')

@section('title', $data->page_title)

@section('meta-keywords', $data->meta_keywords ?? '')
@section('meta-description', $data->meta_description ?? '')

@if ($data->search_engine)
    @section('robots', 'nofollow, noindex')
@else
    @section('robots', 'follow, index')
@endif

@section('og-title', $data->og_title ?? '')
@section('og-description', $data->og_description ?? '')
@section('og-image', $data->og_image ?? '')
@section('og-type', $data->og_type ?? 'website')

@section('twitter-title', $data->twitter_title ?? '')
@section('twitter-description', $data->twitter_description ?? '')
@section('twitter-image', $data->twitter_image ?? '')

@section('custom-styles')
@endsection
@section('content')
    <div class="main">

        <!-- Hero Section Start-->
        <div class="container-fluid afcon--home-hero-section d-flex flex-column justify-content-center myb-40">
            <div class="container">
                <div class="row flex-md-row flex-column-reverse">
                    <div class="hero-sec-text d-flex flex-column justify-content-center">
                        <h1 class="head--1 wht--clr line-ht3  text-md-start text-center mb-0 pyb-40">
                            {{ $settings->slogan }}
                        </h1>
                        <p class="body-txt1 wht--clr text-md-start text-center mb-0 pyb-60">
                            {{ $settings->about_us }}
                        </p>
                        <div class="d-flex justify-content-md-start  justify-content-center">
                            <span class=""><a href="pages/contact-us.html"
                                    class="text-decoration-none primary-btn d-flex  justify-content-center">Request A
                                    Quote<img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                        class="ms-2"></a></span>
                        </div>
                    </div>
                    <div class="hero-sec-img d-md-flex flex-column justify-content-end align-items-end  ">
                        <img src="{{ asset('assets/frontend/images/conferrence-room.webp') }}" class="img--1"
                            alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Section End-->

        @include('partials.brands')

        @include('partials.about-us')

        @include('partials.counter')

        <!-- Services Section Start-->
        @if ($latest_services)
            <div class="container-fluid d-flex flex-column justify-content-center py-40px afcon--our-services">
                <div class="container">
                    <div class="row flex-md-row flex-column">
                        <div
                            class="services-sec-col d-md-flex flex-column justify-content-center align-items-lg-start align-items-center text-lg-start text-md-center">
                            <h2 class="head--2 mb-0 pyb-40 secondary--clr ">
                                Explore Our Services
                            </h2>
                            <p class="body-txt1 mb-0 pyb-60 txt--clr txt--clr">
                                Nunc convallis semper justo quis tempor. Praesent molestie,
                                lorem sed imperdiet tempor, libero urna semper urna, facilisis
                                vulputate velit arcu vitae mi. Donec ac nisi ex.
                            </p>
                            <span class="d-lg-block d-none">
                                <a href="{{ route('services.index') }}"
                                    class="text-decoration-none wht--clr primary-btn d-flex justify-content-center">View All
                                    <img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                        class="ms-2">
                                </a>
                            </span>
                        </div>
                        <div class="services-sec-col d-flex flex-md-row flex-column justify-content-center gap-4">
                            <div class="ourservices--1 d-flex flex-column justify-content-center gap-4">
                                @if ($latest_services[0])
                                    <div class="our-services-card p-4">
                                        <div class="card-img-wrap mb-4">
                                            <img src="{{ asset($latest_services[0]->icon ? 'storage/images/' . $latest_services[0]->icon : 'assets/frontend/icons/services-icon-1.svg') }}"
                                                alt="" class="card-img" />
                                        </div>
                                        <h3 class="head--3 mb-3 secondary--clr">{{ $latest_services[0]->title }}</h3>
                                        <p class="body-txt2 mb-4 txt--clr">{{ $latest_services[0]->description }}</p>
                                        <a href="{{ url('services/' . $latest_services[0]->slug) }}"
                                            class="text-decoration-none">
                                            <button class="card-sec-btn primary--clr">Learn More
                                                <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                                    class="ms-2" />
                                            </button>
                                        </a>
                                    </div>
                                @endif
                                @if ($latest_services[1])
                                    <div class="our-services-card p-4">
                                        <div class="card-img-wrap mb-4">
                                            <img src="{{ asset($latest_services[1]->icon ? 'storage/images/' . $latest_services[1]->icon : 'assets/frontend/icons/services-icon-2.svg') }}"
                                                alt="" class="card-img" />
                                        </div>
                                        <h3 class="head--3 mb-3 secondary--clr">{{ $latest_services[1]->title }}</h3>
                                        <p class="body-txt2 mb-4 txt--clr">{{ $latest_services[1]->description }}</p>
                                        <a href="{{ url('services/' . $latest_services[1]->slug) }}"
                                            class="text-decoration-none">
                                            <button class="card-sec-btn primary--clr">Learn More
                                                <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                                    class="ms-2" />
                                            </button>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="ourservices--2 d-flex flex-column justify-content-center gap-4">
                                @if ($latest_services[2])
                                    <div class="our-services-card p-4">
                                        <div class="card-img-wrap mb-4">
                                            <img src="{{ asset($latest_services[2]->icon ? 'storage/images/' . $latest_services[2]->icon : 'assets/frontend/icons/services-icon-3.svg') }}"
                                                alt="" class="card-img" />
                                        </div>
                                        <h3 class="head--3 mb-3 secondary--clr">{{ $latest_services[2]->title }}</h3>
                                        <p class="body-txt2 mb-4 txt--clr">{{ $latest_services[2]->description }}</p>
                                        <a href="{{ url('services/' . $latest_services[2]->slug) }}"
                                            class="text-decoration-none">
                                            <button class="card-sec-btn primary--clr">Learn More
                                                <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                                    class="ms-2" />
                                            </button>
                                        </a>
                                    </div>
                                @endif
                                @if ($latest_services[3])
                                    <div class="our-services-card p-4">
                                        <div class="card-img-wrap mb-4">
                                            <img src="{{ asset($latest_services[3]->icon ? 'storage/images/' . $latest_services[3]->icon : 'assets/frontend/icons/services-icon-4.svg') }}"
                                                alt="" class="card-img" />
                                        </div>
                                        <h3 class="head--3 mb-3 secondary--clr">{{ $latest_services[3]->title }}</h3>
                                        <p class="body-txt2 mb-4 txt--clr">{{ $latest_services[3]->description }}</p>
                                        <a href="{{ url('services/' . $latest_services[3]->slug) }}"
                                            class="text-decoration-none">
                                            <button class="card-sec-btn primary--clr">Learn More
                                                <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                                    class="ms-2" />
                                            </button></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <span class="d-lg-none d-flex justify-content-center pyt-60">
                            <a href="{{ route('services.index') }}"
                                class="text-decoration-none wht--clr primary-btn d-flex justify-content-center">View All
                                <img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt="" class="ms-2">
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        @endif
        <!-- Services Section End-->

        @include('partials.projects')

        @include('partials.maps')

        @include('partials.latest-blogs')

        @include('partials.career')

        @include('partials.quotation-form')

        @include('partials.faqs')
    </div>
@endsection
@section('custom-js')
@endsection
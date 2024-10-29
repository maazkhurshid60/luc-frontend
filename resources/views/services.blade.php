@extends('layouts.main-layout')


@section('title', 'Services')

@section('custom-styles')
@endsection
@section('content')
    <div class="main">

        @include('partials.breadcrumbs', [
            'bg_image' => asset('assets/frontend/images/services-bg.webp'),
            'home' => ['name' => 'Home', 'route' => 'index'],
            'parent' => '',
            'page_title' => 'Services',
        ])

        <div class="container-fluid d-flex flex-column justify-content-center py-40px afcon--our-services">
            <div class="container">
                <div class="row flex-column">
                    <div class="services-sec d-flex flex-column justify-content-center  align-items-center  text-center">
                        <h2 class="head--2 mb-0 pyb-40 secondary--clr text-center ">
                            Our Services
                        </h2>
                        <p class="body-txt1 mb-0 pyb-60 txt--clr text-center">
                            Nunc convallis semper justo quis tempor. Praesent molestie,
                            lorem sed imperdiet tempor, libero urna semper urna, facilisis
                            vulputate velit arcu vitae mi. Donec ac nisi ex.
                        </p>
                    </div>
                    <div class="services-sec">
                        <div class="our--services d-flex justify-content-between flex-wrap">
                            <div class="our-services-card p-4 mb-4">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ asset('assets/frontend/icons/services-icon-1.svg') }}" alt=""
                                        class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">Technology</h3>
                                <p class="body-txt2 mb-4 txt--clr">
                                    Donec mi lorem, consequat a quam nec, pellentesque pulvinar
                                    sem. Morbi lacus magna.
                                </p>
                                <span class="services-card-btn"><a href="services-detail.html"
                                        class="text-decoration-none wht--clr secondary-btn d-flex justify-content-center">Read
                                        More
                                        <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                            class="ms-2">
                                    </a>
                                </span>
                            </div>
                            <div class="our-services-card p-4 mb-4">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ asset('assets/frontend/icons/services-icon-3.svg') }}" alt=""
                                        class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">Construction</h3>
                                <p class="body-txt2 mb-4 txt--clr">
                                    Donec mi lorem, consequat a quam nec, pellentesque pulvinar
                                    sem. Morbi lacus magna.
                                </p>
                                <span class="services-card-btn"><a href="services-detail.html"
                                        class="text-decoration-none wht--clr secondary-btn d-flex justify-content-center">Read
                                        More
                                        <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                            class="ms-2">
                                    </a>
                                </span>
                            </div>
                            <div class="our-services-card p-4 mb-4">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ asset('assets/frontend/icons/services-icon-4.svg') }}" alt=""
                                        class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">Real Estate</h3>
                                <p class="body-txt2 mb-4 txt--clr">
                                    Donec mi lorem, consequat a quam nec, pellentesque pulvinar
                                    sem. Morbi lacus magna.
                                </p>
                                <span class="services-card-btn"><a href="services-detail.html"
                                        class="text-decoration-none wht--clr secondary-btn d-flex justify-content-center">Read
                                        More
                                        <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                            class="ms-2">
                                    </a>
                                </span>
                            </div>
                            <div class="our-services-card p-4 mb-4">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ asset('assets/frontend/icons/services-icon-2.svg') }}" alt=""
                                        class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">General Trade</h3>
                                <p class="body-txt2 mb-4 txt--clr">
                                    Donec mi lorem, consequat a quam nec, pellentesque pulvinar
                                    sem. Morbi lacus magna.
                                </p>
                                <span class="services-card-btn"><a href="services-detail.html"
                                        class="text-decoration-none wht--clr secondary-btn d-flex justify-content-center">Read
                                        More
                                        <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                            class="ms-2">
                                    </a>
                                </span>
                            </div>
                            <div class="our-services-card p-4 mb-4">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ asset('assets/frontend/icons/services-icon-5.svg') }}" alt=""
                                        class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">Infrastructure</h3>
                                <p class="body-txt2 mb-4 txt--clr">
                                    Donec mi lorem, consequat a quam nec, pellentesque pulvinar
                                    sem. Morbi lacus magna.
                                </p>
                                <span class="services-card-btn"><a href="services-detail.html"
                                        class="text-decoration-none wht--clr secondary-btn d-flex justify-content-center">Read
                                        More
                                        <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                            class="ms-2">
                                    </a>
                                </span>
                            </div>
                            <div class="our-services-card p-4 mb-4">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ asset('assets/frontend/icons/services-icon-6.svg') }}" alt=""
                                        class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">Interior & Exterior Architecture</h3>
                                <p class="body-txt2 mb-4 txt--clr">
                                    Donec mi lorem, consequat a quam nec, pellentesque pulvinar
                                    sem. Morbi lacus magna.
                                </p>
                                <span class="services-card-btn"><a href="services-detail.html"
                                        class="text-decoration-none wht--clr secondary-btn d-flex justify-content-center">Read
                                        More
                                        <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                            class="ms-2">
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.counter')

        @include('partials.brands')

    </div>
@endsection
@section('custom-js')
@endsection

<!DOCTYPE html>
<html lang="en">
@php
    $settings = DB::table('settings')->find(1);
@endphp

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>
        @section('title', $settings->siteName ?? env('APP_NAME'))
        @yield('title') | {{ $settings->siteName ?? env('APP_NAME') }}
    </title>

    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/fontawesome-free-6.6.0-web/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/slick/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/mainstyle.css') }}" />
    <link rel="icon" href="{{ asset('assets/frontend/icons/afcon-group-logo.svg') }}">


    @yield('custom-styles')
</head>

<body id="content" class="fade-in">

    @include('layouts.navbar')

    @yield('content')

    @include('include.modal')

    <!-- ///////////////////////// Footer Section ///////////////////////// -->
    <footer>
        <div class="container-fluid afcon--footer myt-40">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="footer-logo text-center pyb-40">
                        <a href="index.html">
                            <img src="{{ asset($settings->logo ? 'storage/images/' . $settings->logo : 'assets/frontend/icons/afcon-group-logo.svg') }}"
                                alt="" class="pyb-60" />
                        </a>

                        <p class="head--2 wht--clr mb-0">Subscribe To Our Newsletter</p>
                    </div>
                    <div class="footer--searchbar text-center d-flex justify-content-center pyb-60">
                        <form class="d-flex flex-md-row justify-content-center flex-column gap-3" role="search">
                            <input class="form-control me-4 newsletter-search w-md-0 w-100 " type="search"
                                placeholder="Enter Your Email . . . " aria-label="Search" />
                            <button class="primary-btn wht--clr m-auto" type="submit">
                                Search<img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                    class="ms-2" />
                            </button>
                        </form>
                    </div>
                    <div class="row  flex-md-row flex-column">
                        <div class="footer-quicklinks d-flex justify-content-md-start justify-content-center   mb-4 ">
                            <ul
                                class="navbar-nav d-flex flex-row justify-content-start justify-content-start footer-quick-links gap-lg-4 gap-md-3 gap-0">
                                <li class="nav-item">
                                    <a href="pages/contact-us.html"
                                        class="nav-link text-decoration-none wht--clr body-txt2">Contact Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/term-of-services.html"
                                        class="nav-link text-decoration-none wht--clr body-txt2">Term of Services</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/privacy-policy.html"
                                        class="nav-link text-decoration-none wht--clr body-txt2">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-socail-links d-flex justify-content-evenly align-items-center  mb-4">
                            <div class="socail-links d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/frontend/icons/fb-icon.svg') }}" alt="">
                            </div>
                            <div class="socail-links d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/frontend/icons/twitter-x-icon.svg') }}" alt="">
                            </div>
                            <div class="socail-links d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/frontend/icons/linkedin-icon.svg') }}" alt="">
                            </div>
                            <div class="socail-links d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/frontend/icons/insta-icon.svg') }}" alt="">
                            </div>
                        </div>
                        <div
                            class="footer-copyright d-flex justify-content-md-end justify-content-center align-items-center mb-4">
                            <p class="body-txt2 wht--clr mb-0">All rights reserved, 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="scrollToTopBtn">
        <i class="fa-solid fa-arrow-up"></i>
    </div>
    <!-- ///////////////////////// Footer Section Ends ///////////////////////// -->
    
    <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    @yield('custom-js')
</body>

</html>

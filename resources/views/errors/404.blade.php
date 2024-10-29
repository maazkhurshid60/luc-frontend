@extends('layouts.main-layout')

@section('title', 'Home')

@section('custom-styles')
@section('content')

    <div class="main">
        <div class="container-fluid afcon--hero-section contact-us-bg d-flex flex-column justify-content-center myb-40">
            <div class="container">
                <div class="row">
                    <h1 class="head--1 wht--clr text-center">404</h1>
                    <p class="body-txt1 wht--clr text-center">Page Not Found</p>
                </div>
            </div>
        </div>

        <div class="container-fluid d-flex flex-column justify-content-center myb-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <h1 class="head--2 secondary--clr ">Oops! Page not found</h1>
                        <p class="body-txt1 txt--clr">Oops! Page not found
                            Something went wrong. It’s look that your requested could not be found. It's look like the
                            link is broken or the page is removed.
                            Go back
                            home</p>
                        <div class="d-flex justify-content-md-start justify-content-center gap-4 esc-404-links">
                            <span class="">
                                <a href="{{ url()->previous() }}"
                                    class="text-decoration-none wht--clr primary-btn d-flex justify-content-center">
                                    <img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                        class="me-2 rotate-z">
                                    Go Back
                                </a>
                            </span>
                            <span class="">
                                <a href="{{ route('index') }}"
                                    class="text-decoration-none primary--clr secondary-btn d-flex  justify-content-center">
                                    Home
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('assets/frontend/images/404-img.webp') }}" alt=""
                            class="image-fluid w-100">
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

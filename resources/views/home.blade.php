@extends('layouts.main-layout')


@section('title', 'Home')

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

        @include('partials.services')

        @include('partials.projects')

        @include('partials.maps')

        @include('partials.blogs')

        @include('partials.career')

        @include('partials.quotation-form')

        @include('partials.faqs')
    </div>
@endsection
@section('custom-js')
@endsection

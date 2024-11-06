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

        @include('partials.breadcrumbs', [
            'bg_image' => asset('assets/frontend/images/careers-hero-sec-bg.webp'),
            'home' => ['name' => 'Home', 'route' => 'index'],
            'parent' => '',
            'page_title' => $data->name,
        ])

        <div class="container-fluid py-40px">
            <div class="container">
                <div class="row">
                    <h2 class="head--2 secondary--clr text-center pyb-40 mb-0">
                        Our Careers
                    </h2>
                    <p class="body-txt1 txt--clr text-center pyb-60 mb-0">
                        Nunc convallis semper justo quis tempor. Praesent molestie, lorem
                        sed imperdiet tempor, libero urna semper urna, facilisis vulputate
                        velit arcu vitae mi. Donec ac nisi ex.
                    </p>
                </div>
                <div class="row pyb-60">
                    <div class="col-md-12">
                        <div class="careers-search-bar">
                            <div class="careers-search-bar">
                                <form>
                                    <div
                                        class="form-row d-flex flex-md-row flex-column align-items-center justify-content-center">
                                        <div class="col-lg-5 col-md-6 col-12 position-relative">
                                            <label class="sr-only" for="inlineFormInput">Position</label>
                                            <input type="text" class="form-control mb-2 input--1" id="inlineFormInput"
                                                placeholder="What position are you looking for ?" />
                                            <img src="../assets/icons/magnifying-glass.svg" alt=""
                                                class="position-absolute input--icons" />
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12 pb-md-0 pb-4 position-relative">
                                            <!-- <div class="input-group mb-2 position-relative"> -->
                                            <label class="sr-only" for="inlineFormInputGroup">Location</label>
                                            <input type="text" class="form-control input--2 mb-2"
                                                id="inlineFormInputGroup" placeholder="Location" />
                                            <img src="../assets/icons/location.svg" alt=""
                                                class="position-absolute input--icons" />
                                            <!-- </div> -->
                                        </div>
                                        <div class="input-group custom-zero-width">
                                            <button type="submit"
                                                class="btn mb-2 search--btn wht--clr d-flex justify-content-center align-items-center">
                                                Search Job
                                                <img src="../assets/icons/arrow1.svg" alt="" class="ms-2" />
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row job-posts-listing d-flex flex-lg-row flex-column justify-content-between gy-4 ">

                    @include('partials.career-filters')

                    <div class="career-archives-sec d-flex flex-column justify-content-start gap-4 pyb-60 px-0">
                        <h3 class="head--3 secondary--clr mb-0">{{ $count > 1 ? $count . ' Jobs' : $count . ' Job' }}</h3>
                        @foreach ($jobs as $job)
                            <div class="col-md-12 mb-3">
                                @include('include.job-card')
                            </div>
                        @endforeach
                    </div>
                    <hr class="m-0" />
                    @include('include.pagination', ['paginator' => $jobs])
                </div>
            </div>
        </div>

        <div class="container-fluid d-flex flex-column justify-content-center py-40px afcon--our-services">
            <div class="container">
                <div class="row flex-column">
                    <div class="services-sec d-flex flex-column justify-content-center align-items-center text-center">
                        <h2 class="head--2 mb-0 pyb-40 secondary--clr text-center">
                            Why Join Us
                        </h2>
                        <p class="body-txt1 mb-0 pyb-60 txt--clr text-center">
                            Thousands of jobs in the computer, engineering and technology
                            sectors are waiting for you.
                        </p>
                    </div>
                    <div class="services-sec">
                        <div class="our--services d-flex justify-content-between flex-wrap">
                            <div class="our-services-card p-4 mb-4 anime-scale">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ asset('assets/frontend/icons/services-icon-1.svg') }}" alt=""
                                        class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">Technology</h3>
                                <p class="body-txt2 mb-4 txt--clr">
                                    Donec mi lorem, consequat a quam nec, pellentesque pulvinar
                                    sem. Morbi lacus magna.
                                </p>
                            </div>
                            <div class="our-services-card p-4 mb-4 anime-scale">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ asset('assets/frontend/icons/services-icon-3.svg') }}" alt=""
                                        class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">Technology</h3>
                                <p class="body-txt2 mb-4 txt--clr">
                                    Donec mi lorem, consequat a quam nec, pellentesque pulvinar
                                    sem. Morbi lacus magna.
                                </p>
                            </div>
                            <div class="our-services-card p-4 mb-4 anime-scale">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ asset('assets/frontend/icons/services-icon-4.svg') }}" alt=""
                                        class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">Technology</h3>
                                <p class="body-txt2 mb-4 txt--clr">
                                    Donec mi lorem, consequat a quam nec, pellentesque pulvinar
                                    sem. Morbi lacus magna.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
@endsection

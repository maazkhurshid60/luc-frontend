@extends('layouts.main-layout')


@section('title', 'Careers')

@section('custom-styles')
@endsection
@section('content')
    <div class="main">

        @include('partials.breadcrumbs', [
            'bg_image' => asset('assets/frontend/images/careers-hero-sec-bg.webp'),
            'home' => ['name' => 'Home', 'route' => 'index'],
            'parent' => '',
            'page_title' => 'Careers',
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
                        <h3 class="head--3 secondary--clr mb-0">3177 Jobs</h3>
                        <div class="career-post-archive p-4 d-flex flex-lg-row flex-column gap-4 anime-scale">
                            <div class="job-list-img">
                                <img src="../assets/icons/job-icon1.svg" alt="" />
                            </div>
                            <div class="job-list-detail d-flex flex-column">
                                <p class="body-txt1 secondary--clr mb-2">Linear Company</p>
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <h3 class="head--3 secondary--clr mb-0">
                                        Software Engineer
                                    </h3>
                                    <span class="fit-content d-inline-block ps-sm-5 ps-0"><a href="#"
                                            class="job-post-tag text-decoration-none primary--clr d-flex justify-content-center fw-sb">New
                                            Post</a></span>
                                </div>
                                <div class="d-flex flex-wrap mb-2 gap-2">
                                    <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                                            src="{{ asset('assets/frontend/icons/meta-job-loc.svg') }}" alt=""
                                            class="me-2" />
                                        <p class="mb-0">Brussels</p>
                                    </span>
                                    <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                                            src="{{ asset('assets/frontend/icons/meta-job-salary.svg') }}" alt=""
                                            class="me-2" />
                                        <p class="mb-0">50-55k</p>
                                    </span>
                                    <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                                            src="{{ asset('assets/frontend/icons/meta-job-type.svg') }}" alt=""
                                            class="me-2" />
                                        <p class="mb-0">Full time</p>
                                    </span>
                                    <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                                            src="{{ asset('assets/frontend/icons/calender.svg') }}" alt=""
                                            class="me-2" />
                                        <p class="mb-0">02 days ago</p>
                                    </span>
                                </div>
                                <p class="body-txt2 mb-3">
                                    Lorem ipsum dolor sit amet consectetur. Urna auctor laoreet
                                    at donec. Sed interdum laoreet accumsan sit netus
                                    craslaoreet. Nulla sed varius nibh mauris leo eu congue...
                                </p>
                                <span class=""><a href="career-details.html"
                                        class="text-decoration-none primary--clr secondary-btn d-flex justify-content-center">View
                                        Details<img src="../assets/icons/arrow2.svg" alt=""
                                            class="ms-2" /></a></span>
                            </div>
                        </div>
                    </div>
                    <hr class="m-0" />
                    <div class="pagination-wrapper mt-4">
                        <div class="page-navigation">
                            <nav aria-label="Page navigation">
                                <ul
                                    class="pagination shop-pagination w-100 d-flex justify-content-between align-items-center">
                                    <div class="back-link">
                                        <li class="page-item">
                                            <a class="page-link back-button secondary-btn d-flex justify-content-center align-items-center pg-res-btn"
                                                href="#" aria-label="Back">
                                                <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                                    class="rotate-z me-2" />
                                                <p class="body-txt1 d-md-block d-none mb-0">
                                                    Previous
                                                </p>
                                            </a>
                                        </li>
                                    </div>
                                    <div class="page-no d-flex">
                                        <li class="page-item">
                                            <a class="page-link pg-item body-txt1 secondary--clr pg-item-active"
                                                href="">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link pg-item body-txt1 secondary--clr pg-items"
                                                href="">2</a>
                                        </li>
                                        <li class="page-item d-md-block d-none">
                                            <a class="page-link pg-item body-txt1 secondary--clr pg-items"
                                                href="#">3</a>
                                        </li>
                                        <li class="page-item disabled">
                                            <a class="page-link pg-items body-txt1 secondary--clr" href="#">...</a>
                                        </li>
                                        <li class="page-item d-md-block d-none">
                                            <a class="page-link pg-item body-txt1 secondary--clr pg-items"
                                                href="#">8</a>
                                        </li>
                                        <li class="page-item d-sm-block d-none">
                                            <a class="page-link pg-item body-txt1 secondary--clr pg-items"
                                                href="#">9</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link pg-item body-txt1 secondary--clr pg-items"
                                                href="#">10</a>
                                        </li>
                                    </div>
                                    <div class="next-link">
                                        <li class="page-item">
                                            <a class="page-link next-button secondary-btn d-flex justify-content-center align-items-center pg-res-btn"
                                                href="#" aria-label="Next">
                                                <p class="body-txt1 d-md-block d-none mb-0">Next</p>
                                                <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                                    class="ms-2" />
                                            </a>
                                        </li>
                                    </div>
                                </ul>
                            </nav>
                        </div>
                    </div>
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

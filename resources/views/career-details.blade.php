@extends('layouts.main-layout')


@section('title', 'Software Engineer')

@section('custom-styles')
@endsection
@section('content')
    <div class="main">
        @include('partials.breadcrumbs', [
            'bg_image' => asset('assets/frontend/images/career-details-hero-bg.webp'),
            'home' => ['name' => 'Home', 'route' => 'index'],
            'parent' => ['name' => 'Careers', 'route' => 'careers.index'],
            'page_title' => $data['page']->title,
        ])

        <div class="container-fluid py-40px">
            <div class="container">
                <div class="row pyb-60">
                    <div class="career-post-details-wrapper flex-column gap-4">
                        <div class="job-post-details text-center">
                            <img src="{{ $data['page']->file ? asset('storage/images/' . $data['page']->file) : asset('assets/frontend/icons/job-icon1.svg') }}"
                                alt="" class="pyb-40 job-img">
                            <p class="body-txt1 secondary--clr mb-4">{{ $data['settings']->siteName }}</p>
                            <h2 class="head--2 secondary--clr mb-4">{{ $data['page']->title }}</h2>
                            <span class="fit-content d-inline-block pyb-40"><a href="#"
                                    class="job-post-tag text-decoration-none primary--clr d-flex justify-content-center fw-sb">{{ $data['page']->category->title }}</a></span>
                            <div class="d-flex flex-wrap justify-content-center gap-2">
                                <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                                        src="{{ asset('assets/frontend/icons/meta-job-loc.svg') }}" alt=""
                                        class="me-2 ">
                                    <p class="mb-0 ">{{ $data['page']->location }}</p>
                                </span>
                                <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                                        src="{{ asset('assets/frontend/icons/meta-job-salary.svg') }}" alt=""
                                        class="me-2 ">
                                    <p class="mb-0 ">{{ $data['page']->salary }}</p>
                                </span>
                                <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                                        src="{{ asset('assets/frontend/icons/meta-job-type.svg') }}" alt=""
                                        class="me-2 ">
                                    <p class="mb-0 ">{{ $data['page']->type }}</p>
                                </span>
                                <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                                        src="{{ asset('assets/frontend/icons/calender.svg') }}" alt=""
                                        class="me-2" />
                                    <p class="mb-0">
                                        {{ \Carbon\Carbon::parse($data['page']->created_at)->diffForHumans() }}</p>
                                </span>
                            </div>
                        </div>
                        <hr class="grey--clr">
                        <div class="job-list-detail text-md-start text-center">
                            <div class="d-flex flex-sm-row flex-column justify-content-between align-items-center">
                                <h3 class="head--3 secondary--clr">Job Description</h3>
                                <span class="body-txt1 secondary--clr d-flex align-items-center mb-0">
                                    <p class="body-txt1 txt--clr mb-0">Posted on: </p>
                                    {{ \Carbon\Carbon::parse($data['page']->created_at)->diffForHumans() }}
                                </span>
                            </div>
                            {!! $data['page']->contents !!}

                            <div class="d-flex flex-column gap-2">
                                <span class="mb-2"><a href="#"
                                        class="text-decoration-none wht--clr primary-btn d-flex justify-content-center w-100">Apply
                                        Now<img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                            class="ms-2"></a></span>
                                <span class="mt-2"><a href="{{route('careers.index')}}"
                                        class="text-decoration-none primary--clr body-txt2 fw-sb d-flex justify-content-center w-100">See
                                        All Jobs</a></span>
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

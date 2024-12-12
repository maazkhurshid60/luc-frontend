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
        {{-- <div class="container-fluid d-flex flex-column justify-content-center py-40px">
            <div class="container">
                <div class="row flex-md-row flex-column">
                    <div class="hero-sec-img d-md-flex flex-column justify-content-center align-items-start ">
                        <img src="{{ asset($data->image ? 'storage/images/' . $data->image : 'assets/frontend/images/engineer-cooperation-technician-maintenance.webp') }}"
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
                    </div>
                </div>
            </div>
        </div> --}}
        @include('partials.about-us')
        <!-- About Us Section End-->

        @include('partials.counter')

        <!-- Journey Section Start-->
        <div class="container-fluid py-40px">
            <div class="container">
                <div class="row gap-md-0 gap-4">
                    <div class="hero-sec-img d-flex flex-column justify-content-center">
                        <h2 class="head--2 secondary--clr text-md-start text-center pyb-40 mb-0">
                        {{$about_details->journey_heading}}
                        </h2>
                        <img src="{{ asset($about_details->journey_img ? 'storage/images/' . $about_details->journey_img : 'assets/frontend/images/low-angle-shot-high-buildings-with-metal-stairs-gloomy-day.webp') }}"
                            alt="" class="our-vision-sec-img">
                    </div>
                    <div class="col-md-6 timeline-sec">
                        @foreach ($journeys as $journey)
                            <div class="timline-item d-flex pyb-40">
                                <div class="timeline-icon">
                                    <img src="{{ asset('assets/frontend/icons/timeline-img.svg') }}" alt="Timeline Icon">
                                </div>
                                <div class="timeline-details">
                                    <p class="body-txt2 secondary--clr mb-0 pb-lg-3 pb-2">{{ $journey->year }} •
                                        {{ $journey->month }}</p>
                                    <h3 class="head--3 mb-0 pb-lg-2 pb-1">{{ $journey->title }}</h3>
                                    <p class="body-txt2 txt--clr mb-0">{{ $journey->description }}</p>
                                </div>
                            </div>
                        @endforeach
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
                        <h2 class="head--2 secondary--clr text-md-start text-center">{{$about_details->vision_heading}}</h2>
                        <p class="body-txt1 txt--clr text-md-start text-center">
                            {{$about_details->vision_desc}}
                        </p>
                    </div>
                    <div class="hero-sec-img-right">
                        <img src="{{ asset($about_details->vision_img ? 'storage/images/' . $about_details->vision_img : 'assets/frontend/images/our-vision-img.webp') }}" alt=""
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

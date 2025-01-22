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
            'bg_image' => asset('assets/frontend/images/services-bg.webp'),
            'home' => ['name' => __('lang.Home'), 'route' => 'index'],
            'parent' => '',
            'page_title' => $data->name,
        ])

        <div class="container-fluid d-flex flex-column justify-content-center py-40px afcon--our-services">
            <div class="container">
                <div class="row flex-column">
                    <div class="services-sec d-flex flex-column justify-content-center  align-items-center  text-center">
                        <h2 class="head--2 mb-0 pyb-40 secondary--clr text-center ">
                            {{ $data->name }}
                        </h2>
                        <p class="body-txt1 mb-0 pyb-60 txt--clr text-center">
                            {{ $data->short_description }}
                        </p>
                    </div>
                    <div class="services-sec">
                        <div class="our--services d-flex justify-content-between flex-wrap">
                            @foreach ($companies as $company)
                                <div class="our-services-card p-4 mb-4">
                                    <div class="card-img-wrap mb-4">
                                        <img src="{{ $company->companyIcon ? asset('storage/images/' . $company->companyIcon) : asset('assets/frontend/icons/services-icon-1.svg') }}"
                                            alt="" class="card-img" />
                                    </div>
                                    <h3 class="head--3 mb-3 secondary--clr">{{ $company->name }}</h3>
                                    <p class="body-txt2 mb-4 txt--clr">
                                        {{ $company->short_description }}
                                    </p>
                                    <span class="services-card-btn">
                                        <a href="{{ url('company' . '/' . $company->slug) }}"
                                            class="text-decoration-none wht--clr secondary-btn d-flex justify-content-center">
                                            Read More
                                            <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                                class="ms-2">
                                        </a>
                                    </span>
                                </div>
                            @endforeach

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

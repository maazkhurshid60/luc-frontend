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
            'bg_image' => asset('assets/frontend/images/contact-us-hero-bg.webp'),
            'home' => ['name' => 'Home', 'route' => 'index'],
            'parent' => '',
            'page_title' => 'Contact Us',
        ])

        <div class="container-fluid d-flex flex-column justify-content-center py-40px ">
            <div class="container">
                <div class="row flex-column">
                    <div class="services-sec">
                        <div class="our--services d-flex justify-content-between flex-wrap">
                            <div class="our-services-card p-4 mb-4 anime-scale">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ asset('assets/frontend/icons/email-icon.svg') }}" alt=""
                                        class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">Email</h3>
                                <p class="body-txt2 mb-4 txt--clr">Our friendly team is here to help you</p>
                                <a href="mailto:{{ $settings->email }}"
                                    class="head--4 primary--clr">{{ $settings->email }}</a>
                            </div>
                            <div class="our-services-card p-4 mb-4 anime-scale">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ asset('assets/frontend/icons/phone-icon.svg') }}" alt=""
                                        class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">Phone</h3>
                                <p class="body-txt2 mb-4 txt--clr">{{ $settings->timmings }}</p>
                                <a href="tel:{{ $settings->phone }}" class="head--4 primary--clr">{{ $settings->phone }}</a>
                            </div>
                            <div class="our-services-card p-4 mb-4 anime-scale">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ asset('assets/frontend/icons/services-icon-4.svg') }}" alt=""
                                        class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">Office</h3>
                                <p class="body-txt2 mb-4 txt--clr">Come say hello at our office HQ</p>
                                <a href="https://www.google.com/maps/search/?api=1&query={{ $settings->address }}"
                                    target="_blank" class="head--4 primary--clr">{{ $settings->address }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.contact-us-form')

    </div>
@endsection
@section('custom-js')
@endsection

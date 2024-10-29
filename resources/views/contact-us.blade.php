@extends('layouts.main-layout')


@section('title', 'Contact Us')

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
                                <h4 class="head--4 primary--clr">Brandi_Auer@hotmail.com</h4>
                            </div>
                            <div class="our-services-card p-4 mb-4 anime-scale">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ asset('assets/frontend/icons/phone-icon.svg') }}" alt=""
                                        class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">Phone</h3>
                                <p class="body-txt2 mb-4 txt--clr">Mon - Fri from 9am - 5pm
                                <h4 class="head--4 primary--clr">(601) 788-7839</h4>
                                </p>
                            </div>
                            <div class="our-services-card p-4 mb-4 anime-scale">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ asset('assets/frontend/icons/services-icon-4.svg') }}" alt=""
                                        class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">Office</h3>
                                <p class="body-txt2 mb-4 txt--clr">Come say hello at our office HQ
                                <h4 class="head--4 primary--clr">5636 Heather Close, Arvada 20091</h4>
                                </p>
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

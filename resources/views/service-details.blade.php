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
            'bg_image' => asset('assets/frontend/images/services-details-bg.webp'),
            'home' => ['name' => __('lang.Home'), 'route' => 'index'],
            'parent' => ['name' => __('lang.COMPANY'), 'route' => 'companies.index'],
            'page_title' => $data->name,
        ])

        <div class="container-fluid d-flex flex-column justify-content-center py-40px">
            <div class="container">
                <div class="row flex-md-row flex-column">
                    <div class="hero-sec-img d-md-flex flex-column justify-content-center align-items-start ">
                        <img src="{{ $data->image ? asset('storage/images/' . $data->image) : asset('assets/frontend/icons/services-icon-1.svg') }}"
                            class="img--2 w-100" alt="" />
                    </div>
                    <div
                        class="hero-sec-text d-flex flex-column justify-content-center align-items-md-start align-items-center  text-md-start text-center ">
                        {!! $data->contents !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid our-team-sec pyt-80 pyb-80 my-40px">
            <div class="container">
                <div class="row justify-content-center gy-4">
                    <div class="services-sec d-flex flex-column justify-content-center  align-items-center  text-center">
                        <h2 class="head--2 mb-0 pyb-40 wht--clr text-center ">
                            {{ __('lang.HOW_IT_WORKS') }}
                        </h2>
                        <p class="body-txt1 mb-0 pyb-60 wht--clr text-center">
                            {{ $data->short_description }}
                        </p>
                    </div>
                    <div class="our--services d-flex justify-content-between flex-wrap mt-0">


                        @foreach ($data->services as $service)
                            {{-- @dd($service->file2) --}}
                            <div class="our-services-card p-4 mb-4 bg-white">
                                <div class="card-img-wrap mb-4">
                                    <img src="{{ $service->file2 ? asset('storage/images/' . $service->file2) : asset('assets/frontend/icons/services-icon-1.svg') }}"
                                        alt="{{ $service->title }}" class="card-img" />
                                </div>
                                <h3 class="head--3 mb-3 secondary--clr">{{ $service->title }}</h3>
                                <p class="body-txt2 mb-4 txt--clr">
                                    {!! $service->description ?? 'Description not available.' !!}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('partials.related-blogs')
        <div class="container-fluid my-40px">
            <div class="container">
                <div class="row">
                    <h2 class="head--2 secondary--clr text-center pyb-40 mb-0">
                        {{ __('lang.project_idea_title') }}
                    </h2>
                    <p class="body-txt1 txt--clr text-center pyb-60 mb-0 px-5">
                        {{ __('lang.project_idea_desc') }}
                    </p>
                </div>
                <div class="row contact-details">
                    <div class="col-md-5 contact-details-sec">
                        <h3 class="head--3 wht--clr mb-0">{{ __('lang.contact_detail') }}</h3>
                        <p class="body-txt2 wht--clr">{{ __('lang.need_help') }}</p>
                        <h3 class="head--3 wht--clr mb-0">{{ __('lang.email') }}</h3>
                        <p class="body-txt2 wht--clr">{{ $data->company_email }}</p>
                        <h3 class="head--3 wht--clr mb-0">{{ __('lang.contact_no') }}</h3>
                        <p class="body-txt2 wht--clr">{{ $data->contact }}</p>
                        <h3 class="head--3 wht--clr mb-0">{{ __('lang.address_1') }}</h3>
                        <p class="body-txt2 wht--clr">{{ $data->address }}</p>
                        <h3 class="head--3 wht--clr mb-0">{{ __('lang.address_2') }}</h3>
                        <p class="body-txt2 wht--clr">{{ $data->address_2 }}</p>
                        <h3 class="head--3 wht--clr mb-0">{{ __('lang.follow_us') }}</h3>
                        <div class="d-flex justify-content-start ">
                            <div class="socail-links d-flex justify-content-center align-items-center me-2">
                                <a href="{{ $data->facebook }}">
                                    <img src="{{ asset('assets/frontend/icons/fb-icon.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="socail-links d-flex justify-content-center align-items-center me-2">
                                <a href="{{ $data->twitter }}">
                                    <img src="{{ asset('assets/frontend/icons/twitter-x-icon.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="socail-links d-flex justify-content-center align-items-center me-2">
                                <a href="{{ $data->linkedin }}">
                                    <img src="{{ asset('assets/frontend/icons/linkedin-icon.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="socail-links d-flex justify-content-center align-items-center">
                                <a href="{{ $data->instagram }}">
                                    <img src="{{ asset('assets/frontend/icons/insta-icon.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 contact-form-sec2">
                        <h3 class="head--3 secondary--clr text-start mb-3">{{ __('lang.request_quote') }}</h3>
                        <p class="body-txt2 txt--clr text-start mb-4">{{ __('lang.quote_desc') }}</p>
                        <form class="row g-4" id="quoteForm" method="POST" action="{{ route('submitForm') }}">
                            @csrf
                            <input type="hidden" id="formType" value="quote_form">
                            <div class="col-12">
                                <label for="nameinput"
                                    class="form-label mb-2 body-txt2 secondary--clr">{{ __('lang.name') }}</label>
                                <input type="text" class="form-control req-quote-input" id="nameinput"
                                    placeholder="{{ __('lang.name') }}">
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4"
                                    class="form-label mb-2 body-txt2 secondary--clr">{{ __('lang.email') }}</label>
                                <input type="email" class="form-control req-quote-input" id="inputEmail4"
                                    placeholder="{{ __('lang.email_placeholder') }}">
                            </div>
                            <div class="col-12">
                                <label for="subjectsInput"
                                    class="form-label mb-2 body-txt2 secondary--clr">{{ __('lang.subject') }}</label>
                                <input type="text" class="form-control req-quote-input" id="subjectsInput"
                                    placeholder="{{ __('lang.subject') }}">
                            </div>
                            <div class="col-12">
                                <label for="textArea"
                                    class="form-label mb-2 body-txt2 secondary--clr">{{ __('lang.message') }}</label>
                                <textarea class="form-control req-quote-input" id="textArea" rows="3"
                                    placeholder="{{ __('lang.message_placeholder') }}"></textarea>
                            </div>
                            <span class="error-message text-danger"></span>
                            <div class="col-12 d-flex justify-content-start">
                                <button type="submit"
                                    class=" primary-btn req-quote-sub wht--clr">{{ __('lang.submit') }}<img
                                        src="../assets/icons/arrow1.svg" alt="" class="ms-3"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.faqs')

    </div>
@endsection
@section('custom-js')
    <script src="{{ asset('assets/frontend/js/form.js') }}"></script>
@endsection

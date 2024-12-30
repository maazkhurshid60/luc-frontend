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
                                    class="text-decoration-none primary-btn d-flex  justify-content-center">{{ __('lang.REQUEST_A_QUOTE') }}<img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                        class="ms-2"></a></span>
                        </div>
                    </div>
                    <div class="hero-sec-img d-md-flex flex-column justify-content-end align-items-end  ">
                        <img src="{{ asset($data->image ? 'storage/images/' . $data->image : 'assets/frontend/images/conferrence-room.webp') }}"
                            class="img--1" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Section End-->

        @include('partials.brands')

        @include('partials.about-us')

        @include('partials.counter')

        <!-- Services Section Start-->
        @if ($latest_services)
            <div class="container-fluid d-flex flex-column justify-content-center py-40px afcon--our-services">
                <div class="container">
                    <div class="row flex-md-row flex-column">
                        <div
                            class="services-sec-col d-md-flex flex-column justify-content-center align-items-lg-start align-items-center text-lg-start text-md-center">
                            <h2 class="head--2 mb-0 pyb-40 secondary--clr">
                                {{ __('lang.EXPLORE_OUR_SERVICES') }}
                            </h2>
                            <p class="body-txt1 mb-0 pyb-60 txt--clr txt--clr">
                                {{ __('lang.SERVICES_DESCRIPTION') }}
                            </p>                            
                            <span class="d-lg-block d-none">
                                <a href="{{ route('companies.index') }}"
                                    class="text-decoration-none wht--clr primary-btn d-flex justify-content-center">{{ __('lang.VIEW_ALL') }}
                                    <img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                        class="ms-2">
                                </a>
                            </span>
                        </div>
                        <div class="services-sec-col d-flex flex-md-row flex-column justify-content-center gap-4">
                            <div class="ourservices--1 d-flex flex-column justify-content-center gap-4">
                                @if ($latest_services[0])
                                    <div class="our-services-card p-4">
                                        <div class="card-img-wrap mb-4">
                                            <img src="{{ asset($latest_services[0]->companyIcon ? 'storage/images/' . $latest_services[0]->companyIcon : 'assets/frontend/icons/services-icon-1.svg') }}"
                                                alt="" class="card-img" />
                                        </div>
                                        <h3 class="head--3 mb-3 secondary--clr">{{ $latest_services[0]->name }}</h3>
                                        <p class="body-txt2 mb-4 txt--clr">{{ $latest_services[0]->short_description }}</p>
                                        <a href="{{ url('company/' . $latest_services[0]->slug) }}"
                                            class="text-decoration-none">
                                            <button class="card-sec-btn primary--clr"> {{ __('lang.LEARN_MORE') }}
                                                <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                                    class="ms-2" />
                                            </button>
                                        </a>
                                    </div>
                                @endif
                                @if ($latest_services[1])
                                    <div class="our-services-card p-4">
                                        <div class="card-img-wrap mb-4">
                                            <img src="{{ asset($latest_services[1]->companyIcon ? 'storage/images/' . $latest_services[0]->companyIcon : 'assets/frontend/icons/services-icon-1.svg') }}"
                                                alt="" class="card-img" />
                                        </div>
                                        <h3 class="head--3 mb-3 secondary--clr">{{ $latest_services[1]->name }}</h3>
                                        <p class="body-txt2 mb-4 txt--clr">{{ $latest_services[1]->short_description }}</p>
                                        <a href="{{ url('company/' . $latest_services[1]->slug) }}"
                                            class="text-decoration-none">
                                            <button class="card-sec-btn primary--clr"> {{ __('lang.LEARN_MORE') }}
                                                <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                                    class="ms-2" />
                                            </button>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="ourservices--2 d-flex flex-column justify-content-center gap-4">
                                @if ($latest_services[2])
                                    <div class="our-services-card p-4">
                                        <div class="card-img-wrap mb-4">
                                            <img src="{{ asset($latest_services[2]->companyIcon ? 'storage/images/' . $latest_services[2]->companyIcon : 'assets/frontend/icons/services-icon-3.svg') }}"
                                                alt="" class="card-img" />
                                        </div>
                                        <h3 class="head--3 mb-3 secondary--clr">{{ $latest_services[2]->name }}</h3>
                                        <p class="body-txt2 mb-4 txt--clr">{{ $latest_services[2]->short_description }}</p>
                                        <a href="{{ url('company/' . $latest_services[2]->slug) }}"
                                            class="text-decoration-none">
                                            <button class="card-sec-btn primary--clr"> {{ __('lang.LEARN_MORE') }}
                                                <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                                    class="ms-2" />
                                            </button>
                                        </a>
                                    </div>
                                @endif
                                {{-- @if ($latest_services[3])
                                    <div class="our-services-card p-4">
                                        <div class="card-img-wrap mb-4">
                                            <img src="{{ asset($latest_services[3]->icon ? 'storage/images/' . $latest_services[3]->icon : 'assets/frontend/icons/services-icon-4.svg') }}"
                                                alt="" class="card-img" />
                                        </div>
                                        <h3 class="head--3 mb-3 secondary--clr">{{ $latest_services[3]->title }}</h3>
                                        <p class="body-txt2 mb-4 txt--clr">{{ $latest_services[3]->description }}</p>
                                        <a href="{{ url('services/' . $latest_services[3]->slug) }}"
                                            class="text-decoration-none">
                                            <button class="card-sec-btn primary--clr">Learn More
                                                <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                                    class="ms-2" />
                                            </button></a>
                                    </div>
                                @endif --}}
                            </div>
                        </div>
                        <span class="d-lg-none d-flex justify-content-center pyt-60">
                            <a href="{{ route('companies.index') }}"
                                class="text-decoration-none wht--clr primary-btn d-flex justify-content-center">{{ __('lang.VIEW_ALL') }}
                                <img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt="" class="ms-2">
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        @endif
        <!-- Services Section End-->

        @include('partials.projects')
        <div style="height: 200px"></div>
        {{-- @include('partials.maps') --}}

        @include('partials.latest-blogs')

        @include('partials.career')

        @include('partials.quotation-form')

        @include('partials.faqs')
    </div>
@endsection
@section('custom-js')
<script>
    $(document).ready(function () {
    function handleFormSubmission(formSelector, routeName) {
        $(formSelector).on('submit', function (e) {
            e.preventDefault(); // Prevent default form submission
            
            // Clear previous errors
            $(formSelector + ' .error-message').remove();
            $(formSelector + ' .success-message').remove();

            let formData = {
                name: $(formSelector + ' #nameinput').val(),
                email: $(formSelector + ' #inputEmail4').val(),
                subject: $(formSelector + ' #subjectsInput').val(),
                service: $(formSelector + ' #services').val(), 
                phone: $(formSelector + ' #mobile_code').val(),
                message: $(formSelector + ' #textArea').val(),
                type: $(formSelector + ' #formType').val(), // Form type
                _token: '{{ csrf_token() }}' // CSRF token for security
            };

            $.ajax({
                url: routeName,
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response.response === 'success') {
                        // Display success message
                        $(formSelector).append('<div class="success-message text-success text-center mt-3">' + response.message + '</div>');
                        $(formSelector)[0].reset(); // Reset form after success
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        let inputField = $(formSelector + ' #' + key);
                        inputField.after('<span class="error-message text-danger">' + value[0] + '</span>');
                    });
                }
            });
        });
    }

    handleFormSubmission('#quoteForm', '{{ route('quoteform') }}'); // For the quotation form
    handleFormSubmission('#contactForm', '{{ route('contactform') }}'); // For the contact form
    handleFormSubmission('#projectForm', '{{ route('projectform') }}');
});
</script>
@endsection

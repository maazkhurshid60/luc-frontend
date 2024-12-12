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
            'home' => ['name' => 'Home', 'route' => 'index'],
            'parent' => ['name' => 'Company', 'route' => 'companies.index'],
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
                            How It Works
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


                        {{-- <div class="our-services-card p-4 mb-4 bg-white">
                            <div class="card-img-wrap mb-4">
                                <img src="{{ asset('assets/frontend/icons/implementaion&integration.svg') }}" alt=""
                                    class="card-img" />
                            </div>
                            <h3 class="head--3 mb-3 secondary--clr">Implementation & Integration</h3>
                            <p class="body-txt2 mb-4 txt--clr">Lorem ipsum dolor sit amet consectetur. Sit odio etiam est
                                pellentesque
                                gravida tincidunt. Aenean eget pellentesque urna facilisi mattis. Quis in tempus massa ac
                                aliquet sit.
                                At vel egestas arcu etiam.
                            </p>
                        </div>
                        <div class="our-services-card p-4 mb-4 bg-white">
                            <div class="card-img-wrap mb-4">
                                <img src="{{ asset('assets/frontend/icons/support.svg') }}" alt=""
                                    class="card-img" />
                            </div>
                            <h3 class="head--3 mb-3 secondary--clr">Support & Optimization</h3>
                            <p class="body-txt2 mb-4 txt--clr">Lorem ipsum dolor sit amet consectetur. Sit odio etiam est
                                pellentesque
                                gravida tincidunt. Aenean eget pellentesque urna facilisi mattis. Quis in tempus massa ac
                                aliquet sit.
                                At vel egestas arcu etiam.
                            </p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        @include('partials.related-blogs')

        {{-- @include('partials.quotation-form') --}}
        <div class="container-fluid my-40px">
            <div class="container">
                <div class="row">
                    <h2 class="head--2 secondary--clr text-center pyb-40 mb-0">
                        Have A Project Idea! Drop Us A Line
                    </h2>
                    <p class="body-txt1 txt--clr text-center pyb-60 mb-0 px-5">
                        Nunc convallis semper justo quis tempor. Praesent molestie, lorem sed imperdiet tempor, libero urna
                        semper
                        urna, facilisis vulputate velit arcu vitae mi. Donec ac nisi ex.
                    </p>
                </div>
                <div class="row  contact-details">
                    <div class="col-md-5 contact-details-sec">
                        <h3 class="head--3 wht--clr mb-0">Contact Detail</h3>
                        <p class="body-txt2 wht--clr">Do you need our help? Feel free to contact us.</p>
                        <h3 class="head--3 wht--clr mb-0">Email:</h3>
                        <p class="body-txt2 wht--clr">{{ $data->company_email }}</p>
                        <h3 class="head--3 wht--clr mb-0">Contact No:</h3>
                        <p class="body-txt2 wht--clr">{{ $data->contact }}</p>
                        <h3 class="head--3 wht--clr mb-0">Address 01:</h3>
                        <p class="body-txt2 wht--clr">{{ $data->address }}</p>
                        <h3 class="head--3 wht--clr mb-0">Address 02:</h3>
                        <p class="body-txt2 wht--clr">{{ $data->address_2 }}</p>
                        <h3 class="head--3 wht--clr mb-0">Follow us on:</h3>
                        <div class="d-flex justify-content-start ">
                            <div class="socail-links d-flex justify-content-center align-items-center me-2">
                                <img src="{{ asset('assets/frontend/icons/fb-icon.svg') }}" alt="">
                            </div>
                            <div class="socail-links d-flex justify-content-center align-items-center me-2">
                                <img src="{{ asset('assets/frontend/icons/twitter-x-icon.svg') }}" alt="">
                            </div>
                            <div class="socail-links d-flex justify-content-center align-items-center me-2">
                                <img src="{{ asset('assets/frontend/icons/linkedin-icon.svg') }}" alt="">
                            </div>
                            <div class="socail-links d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/frontend/icons/insta-icon.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 contact-form-sec2">
                        <h3 class="head--3 secondary--clr text-start mb-3">Request A Quote — let’s work together.</h3>
                        <p class="body-txt2 txt--clr text-start mb-4">Got a project? Drop us a line if you want to work
                            together on
                            something exciting.</p>
                        <form class="row g-4" id="quoteForm">
                            <input type="hidden" id="formType" value="quote_form">
                            <div class="col-12">
                                <label for="nameinput" class="form-label mb-2 body-txt2 secondary--clr">Name</label>
                                <input type="text" class="form-control req-quote-input" id="nameinput"
                                    placeholder="Full Name">
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label mb-2 body-txt2 secondary--clr">Email</label>
                                <input type="email" class="form-control req-quote-input" id="inputEmail4"
                                    placeholder="Email Address">
                            </div>
                            <div class="col-12">
                                <label for="subjectsInput" class="form-label mb-2 body-txt2 secondary--clr">Subjects</label>
                                <input type="text" class="form-control req-quote-input" id="subjectsInput"
                                    placeholder="Subject">
                            </div>
                            <div class="col-12">
                                <label for="textArea" class="form-label mb-2 body-txt2 secondary--clr">Message</label>
                                <textarea class="form-control req-quote-input" id="textArea" rows="3"
                                    placeholder="Tell us about your project..."></textarea>
                            </div>
                            <div class="col-12 d-flex justify-content-start">
                                <button type="submit" class=" primary-btn req-quote-sub wht--clr">Submit<img
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
    <script>
        $(document).ready(function() {
            function handleFormSubmission(formSelector, routeName) {
                $(formSelector).on('submit', function(e) {
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
                        success: function(response) {
                            if (response.response === 'success') {
                                // Display success message
                                $(formSelector).append(
                                    '<div class="success-message text-success text-center mt-3">' +
                                    response.message + '</div>');
                                $(formSelector)[0].reset(); // Reset form after success
                            }
                        },
                        error: function(xhr) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                let inputField = $(formSelector + ' #' + key);
                                inputField.after(
                                    '<span class="error-message text-danger">' +
                                    value[0] + '</span>');
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

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
            'bg_image' => asset('assets/frontend/images/project-details-bg.webp'),
            'home' => ['name' => 'Home', 'route' => 'index'],
            'parent' => ['name' => 'Projects', 'route' => 'projects.index'],
            'page_title' => $data->name,
        ])

        <div class="container-fluid py-40px">
            <div class="container">
                <div class="row">
                    <div
                        class="project-details-section d-flex flex-md-row flex-column justify-content-between gap-md-0 gap-4">
                        <div class="project--detail-content">
                            <img src="{{ asset('storage/images/' . $data->details_image) }}" alt="" class="mb-4 anime-img">
                            <h3 class="head--3 secondary--clr mb-4">{{ $data->name }}</h3>
                            <p class="body-txt1 txt--clr mb-4">{!! $data->contents !!}</p>
                        </div>
                        <div class="project--detail-sidebar d-flex flex-column gap-4">
                            <div class="project-meta-details">
                                <h3 class="head--3 secondary--clr mb-0 pyb-40">{{ $data->name }}</h3>
                                <div class="d-flex">
                                    <div class="col--1">
                                        <div class="pb-3">
                                            <h4 class="head--4 secondary--clr">Client:</h4>
                                            <p class="body-txt2 txt--clr">{{ $data->client }}</p>
                                        </div>
                                        <div class="pb-3">
                                            <h4 class="head--4 secondary--clr">Location:</h4>
                                            <p class="body-txt2 txt--clr">New York, USA</p>
                                        </div>
                                        <div class="pb-3">
                                            <h4 class="head--4 secondary--clr">Website:</h4>
                                            <p class="body-txt2 txt--clr"><a
                                                    href="{{ $data->link }}">{{ $data->link }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col--2">
                                        <div class="pb-3">
                                            <h4 class="head--4 secondary--clr">Date:</h4>
                                            <p class="body-txt2 txt--clr">
                                                {{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</p>
                                        </div>
                                        <div class="pb-3">
                                            <h4 class="head--4 secondary--clr">Consultant:</h4>
                                            <p class="body-txt2 txt--clr">Potential Company</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="project-sidebar-cta d-flex flex-column justify-content-center align-items-center gap-4 ">
                                <h3 class="head--3 wht--clr text-center mb-0">Request a Customized Solution for Your
                                    Business!</h3>
                                <p class="body-txt1 wht--clr text-center mb-0">Every business is unique. Request a tailored
                                    solution
                                    crafted specifically for your organization's challenges and goals.</p>
                                <span class=""><a href="#"
                                        class="text-decoration-none wht--clr primary-btn d-flex  justify-content-center">Contact
                                        Us</a></span>
                            </div>
                            <div class="side-bor--form">
                                <form class="row g-4" id="projectForm">
                                    <input type="hidden" id="formType" value="project_form">
                                    <div class="col-12">
                                        <label for="nameinput" class="form-label mb-2 body-txt2 secondary--clr">Name</label>
                                        <input type="text" class="form-control req-quote-input" id="nameinput"
                                            placeholder="Full Name">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputEmail4"
                                            class="form-label mb-2 body-txt2 secondary--clr">Email</label>
                                        <input type="email" class="form-control req-quote-input" id="inputEmail4"
                                            placeholder="Email Address">
                                    </div>
                                    <div class="col-12">
                                        <label for="subjectsInput"
                                            class="form-label mb-2 body-txt2 secondary--clr">Services</label>
                                        <select class="form-select req-quote-input body-txt2 grey--clr "
                                            aria-label="Default select example" id="services">
                                            <option class="body-txt2 grey--clr" selected>Select Services</option>
                                            <option class="body-txt2 grey--clr" value="1">One</option>
                                            <option class="body-txt2 grey--clr" value="2">Two</option>
                                            <option class="body-txt2 grey--clr" value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="textArea"
                                            class="form-label mb-2 body-txt2 secondary--clr">Message</label>
                                        <textarea class="form-control req-quote-input" id="textArea" rows="3"
                                            placeholder="Tell us about your project..."></textarea>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn primary-btn project-det-register wht--clr">Get Quote<img
                                                src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                                class="ms-3"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $sections = json_decode($data->section_data);
        @endphp
        @foreach ($sections as $index => $section)
            <div class="container-fluid d-flex flex-column justify-content-center py-40px">
                <div class="container">
                    <div class="row {{ $index % 2 == 0 ? 'flex-md-row-reverse' : 'flex-md-row' }} flex-column">
                        <div
                            class="hero-sec-img{{ $index % 2 == 0 ? '-right' : '' }} d-md-flex flex-column justify-content-center align-items-{{ $index % 2 == 0 ? 'end' : 'center' }} ">
                            <img src="{{ asset($section->section_image ? 'storage/images/' . $section->section_image : 'assets/frontend/images/after-project-dtl-img' . $index . '.webp') }}"
                                class="img--2 w-100 anime-img" alt="" />
                        </div>
                        <div class="hero-sec-text d-flex flex-column justify-content-center align-items-start  ">
                            <h2 class="head--3 secondary--clr line-ht3 mb-0 ">
                                {{ $section->section_heading }}
                            </h2>
                            <p class="body-txt1 txt--clr mb-0">
                                {{ $section->section_text }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @php
            $gallery_images = json_decode($data->gallery_images) ?? [];
            $imageCount = count($gallery_images);
        @endphp

        @if ($imageCount > 0)
            <div class="container-fluid d-flex flex-column justify-content-center py-40px">
                <div class="container gap-4">
                    @if ($imageCount == 1)
                        <div class="row flex-md-row flex-column mb-4">
                            <img src="{{ asset('storage/images/' . $gallery_images[0]) }}"
                                class="projectdtl-gal-img anime-img" alt="">
                        </div>
                    @elseif ($imageCount == 2)
                        <div class="row gap-md-0 gap-4">
                            <div class="col-md-6">
                                <img src="{{ asset('storage/images/' . $gallery_images[0]) }}"
                                    class="projectdtl-gal-img anime-img" alt="">
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('storage/images/' . $gallery_images[1]) }}"
                                    class="projectdtl-gal-img anime-img" alt="">
                            </div>
                        </div>
                    @else
                        <div class="row flex-md-row flex-column mb-4">
                            <img src="{{ asset('storage/images/' . $gallery_images[0]) }}"
                                class="projectdtl-gal-img anime-img" alt="">
                        </div>
                        <div class="row gap-md-0 gap-4">
                            <div class="col-md-6">
                                <img src="{{ asset('storage/images/' . $gallery_images[1]) }}"
                                    class="projectdtl-gal-img anime-img" alt="">
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('storage/images/' . $gallery_images[2]) }}"
                                    class="projectdtl-gal-img anime-img" alt="">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif

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

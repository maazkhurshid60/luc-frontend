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
            'home' => ['name' => __('lang.Home'), 'route' => 'index'],
            'parent' => '',
            'page_title' => $data->name ?? '',
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
});
</script>
@endsection

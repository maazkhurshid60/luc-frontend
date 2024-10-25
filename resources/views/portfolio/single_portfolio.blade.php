<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="{{ $data['page']->meta_keywords }}" />
    <meta name="description" content="{{ $data['page']->meta_description }}">
    @if ($data['page']->search_engine)
        <meta name="robots" content="nofollow, noindex">
    @else
        <meta name="robots" content="follow, index">
    @endif
    <!-- Document title -->
    @if (is_null($data['page']->page_title))
        <title>{{ $data['settings']->siteName }}</title>
    @else
        <title>{{ $data['page']->page_title }}</title>
    @endif
    <link rel="canonical" href="{{ request()->url() }}">
    <link rel="icon" href="{{ asset('assets/img/redstar-icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <meta property="og:title" content="{{ $data['page']->og_title }}" />
    <meta property="og:description" content="{{ $data['page']->og_description }}" />
    <meta property="og:image" content="{{ asset('storage/images/' . $data['page']->og_image) }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="{{ $data['page']->og_type }}" />
    <meta property="og:site_name" content="{{ $data['settings']->siteName }}" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $data['page']->og_title }}">
    <meta name="twitter:description" content="{{ $data['page']->og_description }}">
    <meta name="twitter:image" content="{{ asset('storage/images/' . $data['page']->og_image) }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>RedStar Website</title>
    @vite(['resources/scss/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @include('header-script')
</head>

<body>
    @include('body-script')

    @include('layouts.nav')

    <section class="hero__section wrapper">
        <div class="hero__container ">
            <div class="hero__image"></div>
            <div class="hero-text">
                <h1>{{ $data['page']->name }}</h1>
            </div>
        </div>
    </section>

    <!-- {/* Bread Crumbs */} -->
    <div class="bread-crumbs-container wrapper">
        <div class="bread-crumbs-links">
            <a href="/">Home</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <a href="/portfolio">Portfolio</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <p>{{ $data['page']->name }}</p>
        </div>
    </div>


    <!-- end: Page title -->
    @php
        echo $data['page']->contents;
    @endphp


    <!-- {/* Footer */} -->
    @include('layouts.footer')

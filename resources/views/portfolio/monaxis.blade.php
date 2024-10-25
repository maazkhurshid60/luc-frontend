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

    <!-- {/* Navbar */} -->
    @include('layouts.nav')

    <!-- {/* Hero */} -->
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


    <header>
        <p class="portfolio-tool-heading">Monaxis</p>
    </header>

    <main class="wrapper">
        <section class="intro-section">
            <div class="intro-content">
                <h2 class="section-heading">Project Overview</h2>
                <p class="section-content">Monaxis was a comprehensive WordPress website that we built for our Canadian
                    client. We aimed to create a website that helps businesses of all sizes migrate their IT information
                    to a more secure and reliable server, the cloud. In addition, Monaxis offers clients various
                    monitoring tools to help them track their cloud data.</p>
                <img src="{{ asset('assets/img/portfolio/monaxis/monaxis-image.webp') }}" alt=""
                    class="section-image" id="image-mobile">
                <div class="link-wrapper"> <a href="{{ $data['page']->link }}" class="section-link">Visit Website</a>
                </div>
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/portfolio/monaxis/monaxis-image.webp') }}" alt=""
                    class="section-image" id="image-desktop">
            </figure>

        </section>

        <section class="tools-sub-detail ">
            <div class="image mid-section">
                <img src="{{ asset('assets/img/portfolio/monaxis/development.webp') }}" alt=""
                    class="detail-image">
            </div>
            <div class="more-detail">
                <h2 class="detail-heading">Development Framework</h2>
                <p class="detail-content">To bring Monaxis’ vision to life, we utilized WordPress & Elementor as the
                    foundational technologies for developing this website. These tools offered us the flexibility needed
                    to create a personalized online experience. Using Figma was like having a digital canvas where we
                    carefully designed every detail, aiming for a visually captivating interface.</p>
            </div>
        </section>

        <section class="tools-sub-detail ">
            <div class="more-detail">
                <h2 class="detail-heading">Challenges</h2>
                <p class="detail-content">The Creole Slider turned out to be a bit tricky; its default settings didn't
                    quite match the vibe we aimed for on the Monaxis site. Finally, with a little ingenuity and a whole
                    lot of coffee, we cracked it. The slider glided across the screen, smooth as butter, showcasing
                    Monaxis' services in all their glory.</p>
            </div>
            <div class="image">
                <img src="{{ asset('assets/img/portfolio/monaxis/monaxis-image.webp') }}" alt=""
                    class="detail-image">
            </div>
        </section>
    </main>

    <div class="portfolio-refrence">
        <a href="{{ $data['page']->link }}" class="portfolio-website-link">Visit Website</a>
    </div>


    <!-- {/* Footer */} -->
    @include('layouts.footer')


</body>




</html>

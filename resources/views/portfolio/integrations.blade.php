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
        <p class="portfolio-tool-heading">Integerations</p>
    </header>

    <main class="wrapper">
        <!-- INTRODUCTION SECTION START -->
        <div class="intro">
            <!-- LEFT SIDE SECTION START -->
            <div class="intro__left">
                <h2 class="intro__heading">Introduction</h2>

                <p class="intro__paragraph">Integration is the process of connecting different platforms or applications
                    to share data and functionality. It is crucial for achieving workflows and improving overall
                    efficiency in software applications.
                </p>
                <p class="intro__paragraph">Zapier and Make are the most popular integration platforms that allow users
                    to create automated workflows. </p>
                <a href="{{ url('hirepro') }}" class="intro__left--button-md">Hire Our Expert</a>

            </div>
            <!-- LEFT SIDE SECTION END -->

            <figure class="">
                <img src="{{ asset('assets/img/quality-assurance-images/IntroIntegeration.webp') }}" alt=""
                    class="section-image" id="image-desktop">
            </figure>

            <!-- RIGHT SIDE SECTION END -->
            <button class="intro__left--button-sm">Hire Our Expert</button>


        </div>

        <!--Card1 Panda Doc and Monday SECTION START -->
        <div class="card1">

            <div class="card1__left">
                <h2 class="intro__heading">Panda Doc and Monday</h2>
                <p class="intro__paragraph">
                    Integrating Pandadoc and Monday.com is a great way to automate tasks and improve your workflow.
                </p>
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/quality-assurance-images/CardIntegeration.webp') }}" alt=""
                    class="section-image" id="image-desktop">
            </figure>
        </div>
        <!--Card1 Panda Doc and Monday SECTION Ends -->
        <!--Card2 Panda Doc and Monday SECTION START -->
        <div class="card2">
            <figure class="tool-image">
                <img src="{{ asset('assets/img/quality-assurance-images/CardIntegeration.webp') }}" alt=""
                    class="section-image" id="image-desktop">
            </figure>
            <div class="card2__left">
                <h2 class="intro__heading">Google Sheets and Jira Software</h2>
                <p class="intro__paragraph">
                    Integrating Google Sheets and Jira can streamline your workflow by automating tasks.
                </p>
            </div>
        </div>
        <!--Card2 Panda Doc and Monday SECTION End -->
        <!--Card1 Panda Doc and Monday SECTION Start -->
        <div class="card1">
            <div class="card1__left">
                <h2 class="intro__heading">Google Sheets and Jira Software</h2>
                <p class="intro__paragraph">
                    Integrating Google Sheets and Jira can streamline your workflow by automating tasks.
                </p>
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/quality-assurance-images/CardIntegeration.webp') }}" alt=""
                    class="section-image" id="image-desktop">
            </figure>

        </div>
        <!--Card1 Panda Doc and Monday SECTION End -->
        <!--Card2 Panda Doc and Monday SECTION Start -->

        <div class="card2">
            <figure class="tool-image">
                <img src="{{ asset('assets/img/quality-assurance-images/CardIntegeration.webp') }}" alt=""
                    class="section-image" id="image-desktop">
            </figure>
            <div class="card2__left">
                <h2 class="intro__heading">Panda Doc and Monday</h2>
                <p class="card2__paragraph">
                    Integrating Pandadoc and Monday.com is a great way to automate tasks and improve your workflow. </p>
            </div>

        </div>
        <!--Card2 Panda Doc and Monday SECTION End -->
    </main>

    <!-- {/* Footer */} -->
    @include('layouts.footer')

</body>

</html>

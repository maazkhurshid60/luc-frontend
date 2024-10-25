<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="{{ $page->meta_keywords }}" />
    <meta name="description" content="{{ $page->meta_description }}">
    <!-- Document title -->
    @if ($page->search_engine)
        <meta name="robots" content="nofollow, noindex">
    @else
        <meta name="robots" content="follow, index">
    @endif
    @if (is_null($page->page_title))
        <title>{{ $settings->siteName }}</title>
    @else
        <title>{{ $page->page_title }}</title>
    @endif
    <link rel="canonical" href="{{ request()->url() }}">
    <link rel="icon" href="{{ asset('assets/img/redstar-icon.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <meta property="og:title" content="{{ $page->og_title }}" />
    <meta property="og:description" content="{{ $page->og_description }}" />
    <meta property="og:image" content="{{ asset('storage/images/' . $page->og_image) }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="{{ $page->og_type }}" />
    <meta property="og:site_name" content="{{ $settings->siteName }}" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $page->og_title }}">
    <meta name="twitter:description" content="{{ $page->og_description }}">
    <meta name="twitter:image" content="{{ asset('storage/images/' . $page->og_image) }}">

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
    <div class="services-hero">
        <section class="hero__section wrapper">
            <div class="hero__container ">
                <div class="hero__image"></div>
                <div class="hero-text">
                    <h1>Web Development</h1>
                </div>
            </div>
        </section>
    </div>


    <!-- {/* Bread Crumbs */} -->
    <div class="bread-crumbs-container wrapper">
        <div class="bread-crumbs-links">
            <a href="/">Home</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <a href="/services">Services</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <p>Web Development</p>
        </div>
    </div>


    <!-- Web Development Content Section -->
    <div class="wrapper">
        <section class=" webdevelopment-intro-section">
            <div class="webdevelopment-content">
                <h2 class="web-development-title">Web Development</h2>
                <p class="web-development-description">At Red Star Technologies, we're not just in the business of
                    building websites; we're in the business of transforming your digital footprint. In today's
                    fast-paced digital landscape, having a dynamic and user-friendly web application is essential for
                    growth and success. That's where we come in.
                </p>
                <br>
                <p class="web-development-description"> Web development involves building the functional and technical
                    aspects of a website or web application. Essentially, it's about constructing the digital
                    environment in which users interact with your online platform.</p>
                <img src="{{ asset('assets/img/web-development/web-intro-section-mobile-image.webp') }}"
                    alt="image of web development code" class="web-development-intro-mobile">
                <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                    class="btn portfolio-link">Visit Portfolio</a>
            </div>
            <div class="webdevelopment-image">
                <img src="{{ asset('assets/img/web-development/web-intro-section-image.webp') }}"
                    class="web-development-intro-desktop" alt="web development code image">
            </div>
        </section>
    </div>


    <!-- Web Development Banner -->
    <section class='web-development-banner-section'>
        <div class="banner-image-webdevelopment"></div>
        <p class="banner-text-web">“Revolutionize Your Online Presence with Innovative Web Development”</p>
    </section>

    <!-- Web Development Our Approach Section -->
    <div class="wrapper">
        <section class=" webdevelopment-approach-section">
            <img src="{{ asset('assets/img/web-development/our-approach-desktop-image.webp') }}"
                alt="person sitting on chair and writing web development code" class="desktop-image">
            <div class="our-approach-content">
                <h2 class="title">Our Approach</h2>
                <p class="description">We recognize that your website is often the first interaction customers have with
                    your brand. It's a reflection of your business values and identity. That's why our approach to web
                    development is rooted in collaboration and innovation. We don't just build websites; we create
                    digital experiences that resonate with your audience and create value.</p>
            </div>
            <div>
                <img src="{{ asset('assets/img/web-development/our-approach-section-image.webp') }}"
                    alt="person sitting on chair and writing web development code" class="development-image-mobile">
            </div>
        </section>
    </div>

    <div class="line"></div>


    <div class="animation-4-component"></div>


    <div class="tools_and_technology_web_dev"></div>


    <!--design in progress-->
    <!-- Web Development Tools Section
    <section class="tools">
        <div class="tools-content">
            <h1 class="tools-heading">Tools & Technologies</h1>
            <p class="tools-description">Our team of web developers will be by your side as we guide you through the selection of the best tools for your custom web development project.</p>
        </div>

        <img src="{{ asset('assets/img/tools-logos/FrontEnd.png') }}" alt="frontend tools">
    </section> -->
    <div class="wrapper">
        <section class="webdevelopment-importance-section">
            <div class="webdevelopment-importance-detail">
                <h2 class="title">Web Development is important for your business.</h2>
                <p class="description">Web Development is the artful arrangement of user interface and experience,
                    guiding users through a seamless journey in your app or website.</p>
                <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                    class="btn view-more-link">View More</a>
            </div>

            <img src="{{ asset('assets/img/web-development/web-developing-image.webp') }}"
                alt="people wririting code image" class="development-image">

        </section>

        <div class="wrapper">
            <div class="seo-description">
                <h1 class="seo-description-heading">{{ $page->seo_more_heading }}</h1>
                <?php
                $content = $page->seo_more_content;
                $allowedTags = '<p><a><b><i><strong><em><h1><h2><h3><h4><h5><h6><ul><ol><li>';
                $cleanedContent = strip_tags($content, $allowedTags);
                $strippedContent = strip_tags($cleanedContent);
                $truncatedContent = strlen($strippedContent) > 500 ? substr($strippedContent, 0, 500) . '...' : $cleanedContent;
                ?>
                <p class="seo-description-content" data-full-content="{{ $cleanedContent }}" data-truncated="true">
                    {!! $truncatedContent !!}
                </p>
                @if ($page->seo_more_content)
                    <a href="javascript:void(0);" onclick="toggleContent(this)" class="btn loadMorebtn">Load More</a>
                @endif
            </div>
        </div>
        <div class="seo-gap"></div>

        <section class="wrapper webdevelopment-section-container">
            <div class="background"></div>
            <div class="details">
                <p>Partner with Red Star Technologies, and let us be your guide through the ever-evolving world of web
                    development. We're not just building web apps; we're crafting digital experiences that drive success
                    for your business.</p>
                <a href="/contact-us">
                    <button class="btn connect-btn-link">Lets Connect</button>
                </a>
            </div>
        </section>
    </div>



    <br>
    @if (count($related) > 0)
        @include('services.relatedblog')
    @endif

    @include('layouts.footer')
    <script>
        function toggleContent(element) {
            const contentElement = element.previousElementSibling;
            const fullContent = contentElement.getAttribute('data-full-content');
            const truncatedContent = contentElement.innerText.substring(0, 500) + '...';

            if (contentElement.getAttribute('data-truncated') === 'true') {
                contentElement.innerHTML = fullContent;
                element.textContent = 'Show Less';
                contentElement.setAttribute('data-truncated', 'false');
            } else {
                contentElement.innerHTML = truncatedContent;
                element.textContent = 'Load More';
                contentElement.setAttribute('data-truncated', 'true');
            }
        }
    </script>
</body>

</html>

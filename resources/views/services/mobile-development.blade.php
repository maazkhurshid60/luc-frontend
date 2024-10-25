<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="{{ $page->meta_keywords }}" />
    <meta name="description" content="{{ $page->meta_description }}">
    @if ($page->search_engine)
        <meta name="robots" content="nofollow, noindex">
    @else
        <meta name="robots" content="follow, index">
    @endif
    <!-- Document title -->
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
                    <h1>Mobile Development</h1>
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
            <p>Mobile Development</p>
        </div>
    </div>


    <!-- Mobile Development Section -->
    <div class="wrapper">
        <div class=" mobdevelopment-section">
            <div class="mobdevelopment-details">
                <h2 class="mobdevelopment-details-heading">Mobile App Development</h2>
                <p class="mobdevelopment-details-content">At Red Star Technologies, we're driven by the art of crafting
                    captivating and high-performing mobile apps that bridge the gap between your vision and digital
                    reality. Our mobile app development team is dedicated to building apps that not only meet your
                    objectives but exceed your users' expectations.</p>
                <p class="mobdevelopment-details-content">App development is a multi-faceted process that includes
                    coding, user interface design, and database management to bring your app's features and
                    functionalities to life.</p>
                <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                    class="btn mobdevelopment-details-button-1">Visit Portfolio</a>
            </div>
            <div class="mobdevelopment-section-image ">
                <img src="{{ asset('assets/img/mamta-right.jpg') }}" class="mamta1" alt="none">
                <img src="{{ asset('assets/img/mobile-development-images/mobile-development-image.webp') }}"
                    class="image1" alt="image">
                <img src="{{ asset('assets/img/mobile-development-images/mobile-development-image-2.webp') }}"
                    class="image2" alt="image">
            </div>
            <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                class="btn mobdevelopment-details-button-2">Visit Portfolio</a>
        </div>
    </div>



    <!-- Banner -->
    <div class="mobdevelopment-banner">
        <p class="mobdevelopment-banner-text">"In the world of mobile apps, innovation is the brush, and technology is
            the canvas. We paint
            experiences that leave a lasting impression."</p>
        <img class="mobdevelopment-banner-image"
            src="{{ asset('assets/img/mobile-development-images/mobile-development-banner.webp') }}" alt="image">
    </div>

    <!-- Our Approach Section -->
    <div class="approach-section wrapper">
        <h2 class="approach-section-heading">Our Approach</h2>
        <p class="approach-section-content">Our approach to mobile app development is a fusion of creativity,
            technology, and user-centric design.</p>
        <img src="{{ asset('assets/img/mobile-development-images/mobile-development-appraoch.webp') }}"
            class="approach-section-image1" alt="image">
        <img src="{{ asset('assets/img/mobile-development-images/mobile-development-appraoch-2.webp') }}"
            class="approach-section-image2" alt="image">
        <div class="line "></div>
    </div>

    <!--Development Process Section !-->
    <!-- <div class="development-process wrapper">
        <div class="development-process-heading">Mobile Application Development Process</div>
        <div class="development-process-content">Our team of Web Application developers will be by your side as we guide you through the selection of the best tools for your custom web development project.</div>
    </div> -->

    <div class="animation-4-mobile-component"></div>

    <div class="tools_and_technology_mob_dev"></div>


    <!--Tools and Technology Section !-->
    {{-- <div class="tools-section">
        <h1 class="tools-section-heading">Tools & Technologies</h1>
        <p class="tools-section-content">Our team of web developers will be by your side as we guide you through the
            selection of the best tools for your custom web development project.</p>
    </div> --}}


    <!-- Section only visible on desktop -->
    <div class="wrapper">
        <div class="mob-development-section-2">
            <img src="{{ asset('assets/img/mobile-development-images/mob-development-description.webp') }}"
                alt="image">
            <div class="description">
                <h2 class="description-heading">Mobile App Development is important for your business.</h2>
                <p class="description-content">Mobile App Development is the artful arrangement of user interface and
                    experience, guiding users through a seamless journey in your app or website.</p>
                <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                    class="btn" style="text-align: center; padding-bottom: 33px;">View More</a>
            </div>
        </div>
    </div>

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

    <!-- Section -->
    <div class="wrapper">
        <div class="development-process">
            <div class="banner">
                <div class="gradient"></div>
                <div class="show">
                    <p class="banner-text">Partner with Red Star Technologies, and let us be your trusted guide through
                        the ever-evolving world of mobile app development. We're not just building apps; we're crafting
                        digital experiences that delight and deliver results.</p>
                    <a href="/contact-us">
                        <button class="btn-banner">Let’s Connect</button>
                    </a>
                </div>
            </div>
        </div>
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

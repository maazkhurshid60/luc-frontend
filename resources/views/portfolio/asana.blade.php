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

    <!-- Navbar  -->

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
        <p class="portfolio-tool-heading">Asana</p>
    </header>

    <main class="wrapper">
        <section class="intro-section asana">
            <div class="intro-content">
                <h2 class="section-heading">Introduction</h2>
                <p class="section-content">Asana is a comprehensive work management tool that helps teams keep track of
                    tasks, delegate responsibilities, monitor progress, and communicate in real-time. With its
                    centralized platform for collaboration, teams can stay organized and focused, ensuring that projects
                    are completed on time.</p>
                <img src="{{ asset('assets/img/asana/intro-section-image.webp') }}"
                    alt="main image of the tool on laptop" class="section-image" id="image-mobile">
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/asana/intro-section-image.webp') }}"
                    alt="main image of the tool on laptop" class="section-image" id="image-desktop">
            </figure>
        </section>



        <section class="jira-intro">
            <p class="heading">Asana</p>
            <figure>
                <img src="{{ asset('assets/img/asana/homepage-image.webp') }}" alt="asana image"
                    class="jira-sub-image">
            </figure>
        </section>


        <section class="asana-container">
            <ul class="asana-feature-list">
                <li class="asana-feature-item"><span class="asana-feature-heading">Task management: </span>Asana allows
                    users to break down projects into manageable tasks and assign them to team members.
                </li>
                <li class="asana-feature-item"><span class="asana-feature-heading">Project management: </span>Asana
                    facilitates the creation, planning, and administration of projects of all sizes for teams.</li>

                <li class="asana-feature-item"><span class="asana-feature-heading">Communication:</span> It serves as a
                    central hub for team communication, enabling discussion of tasks, file sharing, and commenting.</li>

                <li class="asana-feature-item"><span class="asana-feature-heading">Progress Tracking: </span> Serves as
                    a central location for team communication, enabling discussion of tasks, file sharing, and
                    commenting.
                </li>

                <li class="asana-feature-item"><span class="asana-feature-heading">Reporting: </span> Asana provides a
                    variety of reports that help teams track their progress, identify areas for improvement, and make
                    well-informed decisions.</li>

                <li class="asana-feature-item"><span class="asana-feature-heading">Improved Productivity:</span>
                    Facilitates more productive teamwork by helping them operate more effectively and efficiently.</li>

                <li class="asana-feature-item"><span class="asana-feature-heading">Enhances Collaboration: </span>Asana
                    fosters collaboration among team members, breaking down silos and ensuring that everyone is on the
                    same page.</li>
            </ul>
        </section>

    </main>


    <!-- slider -->
    <section id="portfolio-slider" class="slider-container">
        <div class="slider-box">
            <h3>Structure</h3>
            <h6>Asana</h6>
            <figure>
                <img src="{{ asset('assets/img/jira/slider-images/workflow.webp') }}" alt="jira image">
            </figure>
        </div>

        <div class="slider-box">
            <h3>Dashboards</h3>
            <h6>Asana</h6>
            <figure>
                <img src="{{ asset('assets/img/jira/slider-images/kanban-board.webp') }}" alt="jira image">
            </figure>
        </div>

        <div class="slider-box">
            <h3>Integration</h3>
            <h6>Asana</h6>
            <figure>
                <img src="{{ asset('assets/img/jira/slider-images/dependencies.webp') }}" alt="jira image">
            </figure>
        </div>

        <p>These services enable clients to boost their productivity, enhance collaboration, and optimize project
            outcomes by harnessing the capabilities of Asana, a flexible and customizable work management platform.</p>

        <!-- Add more slider boxes here -->
    </section>


    <div class="portfolio-refrence">
        <a href="{{ $data['page']->link }}" class="portfolio-website-link">Visit Website</a>
    </div>


    <!-- {/* Footer */} -->
    @include('layouts.footer')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const slider = document.querySelector('.slider-container');
            let isDown = false;
            let startX;
            let scrollLeft;

            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                slider.classList.add('active');
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });
            slider.addEventListener('mouseleave', () => {
                isDown = false;
                slider.classList.remove('active');
            });
            slider.addEventListener('mouseup', () => {
                isDown = false;
                slider.classList.remove('active');
            });
            slider.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 2; // Adjust the scrolling speed here
                slider.scrollLeft = scrollLeft - walk;
            });
        });
    </script>
</body>



</html>

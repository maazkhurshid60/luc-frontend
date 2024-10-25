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
        <p class="portfolio-tool-heading">Notion</p>
    </header>

    <main class="wrapper">
        <section class="intro-section notion">
            <div class="intro-content">
                <h2 class="section-heading">Introduction</h2>
                <p class="section-content">Notion is an all-in-one tool for productivity, allowing users to create,
                    organize and collaborate on various information.It combines database features, note-taking, project
                    management, and team work in a single platform.</p>
                <img src="{{ asset('assets/img/notion/intro-section-image.webp') }}"
                    alt="main image of the tool on laptop" class="section-image" id="image-mobile">
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/notion/intro-section-image.webp') }}"
                    alt="main image of the tool on laptop" class="section-image" id="image-desktop">
            </figure>
        </section>



        <section class="jira-intro">
            <h2 class="heading">Notion</h2>
            <figure>
                <img src="{{ asset('assets/img/notion/homepage-image.webp') }}" alt="notion image"
                    class="jira-sub-image">
            </figure>
        </section>


        <section class="notion-container">
            <ul class="notion-feature-list">
                <li class="notion-feature-item"><span class="notion-feature-heading">Notes and Documents: </span>Using
                    Notion, you may create and arrange documents and notes in a hierarchical format. It can be used for
                    basic note-taking, article writing, and document drafting.
                </li>
                <li class="notion-feature-item"><span class="notion-feature-heading">Task and Project Management:
                    </span>You can make to-do lists, schedule due dates, and oversee projects with Notion's task and
                    project management tools. For organizing tasks, it provides calendar views, lists, and boards in the
                    Kanban style.</li>

                <li class="notion-feature-item"><span class="notion-feature-heading">Database and Tables: </span>The
                    ability to create databases and tables is one of Notion's strongest features. Any page can be made
                    into a database, and tables can be customized with different attributes, views, and filters.</li>

                <li class="notion-feature-item"><span class="notion-feature-heading">Collaboration: </span> Notion is
                    built to be super collaborative, so it's simple for users to work together on projects in real-time
                    by sharing their workspaces, pages, or databases with other team members. Notifications, mentions,
                    and comments improve platform communication.
                </li>

                <li class="notion-feature-item"><span class="notion-feature-heading">Integration: </span>Notion allows
                    users to link their Notion workspace with other everyday applications by integrating with a wide
                    range of third-party tools and services. This involves interfaces with well-known programs like
                    Slack, Trello, and Google Drive.</li>
            </ul>
        </section>

    </main>

    <!-- slider jira tasks -->
    <section id="portfolio-slider" class="slider-container">
        <div class="slider-box">
            <h2>Structure</h2>
            <p>Notion</p>
            <figure>
                <img src="{{ asset('assets/img/notion/structure.webp') }}" alt="structure image">
            </figure>
        </div>

        <div class="slider-box">
            <h2>Integration</h2>
            <p>Notion</p>
            <figure>
                <img src="{{ asset('assets/img/notion/integeration.webp') }}" alt="integeration image">
            </figure>
        </div>

        <div class="slider-box">
            <h2>Dashboards</h2>
            <p>Notion</p>
            <figure>
                <img src="{{ asset('assets/img/notion/dashoard.webp') }}" alt="dashoard image">
            </figure>
        </div>

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

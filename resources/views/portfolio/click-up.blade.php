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
        <p class="portfolio-tool-heading">Click Up</p>
    </header>

    <main class="wrapper">
        <section class="intro-section click-up">
            <div class="intro-content">
                <h2 class="section-heading">Introduction</h2>
                <p class="section-content">ClickUp is a powerful suite of productivity and collaboration tools. You'll
                    be able to streamline your tasks and projects with it. It enhances your team's efficiency and
                    achieves remarkable results with its user-friendly interface, robust features, and customizability
                    options. With Click Up’s digital workspace, you can manage projects seamlessly, simplify
                    communication, and explore possibilities.</p>
                <img src="{{ asset('assets/img/click-up/intro-section-image.webp') }}"
                    alt="main image of the tool on laptop" class="section-image" id="image-mobile">
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/click-up/intro-section-image.webp') }}"
                    alt="main image of the tool on laptop" class="section-image" id="image-desktop">
            </figure>
        </section>



        <section class="jira-intro">
            <h2 class="heading">Click Up</h2>
            <figure>
                <img src="{{ asset('assets/img/click-up/homepage-image.webp') }}" alt="click up image"
                    class="jira-sub-image">
            </figure>
        </section>


        <section class="click-up-container">
            <ul class="click-up-feature-list">
                <li class="click-up-feature-item"><span class="click-up-feature-heading">Organizing your work:</span>
                    ClickUp provides a variety of features to help you organize your work, including tasks, projects,
                    lists, calendars, and more. This helps you to stay on top of your workload and to ensure that
                    nothing falls through the cracks.</li>
                <li class="click-up-feature-item"><span class="click-up-feature-heading">Automations: </span> ClickUp
                    automations can help you to save time and to be more productive. You can use automations to create,
                    assign and update tasks automatically.</li>

                <li class="click-up-feature-item"><span class="click-up-feature-heading">Integrations: </span> Unlock
                    the full potential of ClickUp by integrating it with other tools and apps you use daily.</li>

                <li class="click-up-feature-item"><span class="click-up-feature-heading">Tracking progress:
                    </span>ClickUp allows you to track the progress of your work in real time. This helps you to
                    identify areas where you may be falling behind and to make adjustments as needed.
                </li>

                <li class="click-up-feature-item"><span class="click-up-feature-heading">Collaborating with others:
                    </span>ClickUp makes it easy to collaborate with others on your work. You can share tasks, projects,
                    and other information with others, and you can communicate with them in real time.</li>

                <li class="click-up-feature-item"><span class="click-up-feature-heading">Delivering results: </span>
                    ClickUp helps you to deliver results by providing you with a clear view of your work and by helping
                    you to stay on track. This makes it easier to meet deadlines and deliver high-quality work.</li>

            </ul>
        </section>

    </main>

    <!-- slider -->
    <section id="portfolio-slider" class="slider-container">
        <a href="{{ url('/portfolio/click-up-workflow') }}">
            <div class="slider-box">
                <h2>Workflow</h2>
                <p>ClickUp Software </p>
                <figure>
                    <img src="{{ asset('assets/img/click-up/workflow.webp') }}" alt="workflow image">
                </figure>
            </div>
        </a>
        <a href="{{ url('/portfolio/click-up-structure') }}">
            <div class="slider-box">
                <h2>Structure</h2>
                <p>ClickUp Software </p>
                <figure>
                    <img src="{{ asset('assets/img//click-up/structure.webp') }}" alt="structure image">
                </figure>
            </div>
        </a>
        <a href="{{ url('/portfolio/click-up') }}">
            <div class="slider-box">
                <h2>Dashboards</h2>
                <p>ClickUp Software </p>
                <figure>
                    <img src="{{ asset('assets/img/click-up/dashboard.webp') }}" alt="dashboard image">
                </figure>
            </div>
        </a>
        <a href="{{ url('/portfolio/click-up') }}">
            <div class="slider-box">
                <h2>White Boards</h2>
                <p>ClickUp Software </p>
                <figure>
                    <img src="{{ asset('assets/img/click-up/whiteboards.webp') }}" alt="whiteboards image">
                </figure>
            </div>
        </a>
        <a href="{{ url('/portfolio/click-up') }}">
            <div class="slider-box">
                <h2>Effective Ticket Template</h2>
                <p>ClickUp Software </p>
                <figure>
                    <img src="{{ asset('assets/img/click-up/effectivetickettemplate.webp') }}"
                        alt="Effective Ticket Template image">
                </figure>
            </div>
        </a>
        <a href="{{ url('/portfolio/click-up') }}">
            <div class="slider-box">
                <h2>ClickUp Doc</h2>
                <p>ClickUp Software </p>
                <figure>
                    <img src="{{ asset('assets/img/click-up/clickupdoc.webp') }}" alt="clickup doc image">
                </figure>
            </div>
        </a>
        <a href="{{ url('/portfolio/click-up') }}">
            <div class="slider-box">
                <h2>ClickUp Automation </h2>
                <p>ClickUp Software </p>
                <figure>
                    <img src="{{ asset('assets/img/click-up/clickupautomation.webp') }}"
                        alt="clickup automation image">
                </figure>
            </div>
        </a>
        <a href="{{ url('/portfolio/click-up') }}">
            <div class="slider-box">
                <h2>ClickUp forms </h2>
                <p>ClickUp Software </p>
                <figure>
                    <img src="{{ asset('assets/img/click-up/clickupforms.webp') }}" alt="clickup forms image">
                </figure>
            </div>
        </a>
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

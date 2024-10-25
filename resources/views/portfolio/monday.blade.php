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
        <p class="portfolio-tool-heading">Monday.com</p>
    </header>

    <main class="wrapper">
        <section class="intro-section monday_com">
            <div class="intro-content">
                <h2 class="section-heading">Introduction</h2>
                <p class="section-content">The Monday.com platform is a versatile work operating system that provides
                    you with no-code building blocks for shaping your workflows and collaborating with your teams. It is
                    ideal for project management, task tracking, and team collaboration. Monday.com is known for its
                    user-friendly interface and its ability to be customized to meet the specific needs of each team.
                </p>
                <img src="{{ asset('assets/img/monday-com/intro-section-image.webp') }}"
                    alt="main image of the tool on laptop" class="section-image" id="image-mobile">
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/monday-com/intro-section-image.webp') }}"
                    alt="main image of the tool on laptop" class="section-image" id="image-desktop">
            </figure>
        </section>



        <section class="jira-intro">
            <h2 class="heading">Monday.com</h2>
            <figure>
                <img src="{{ asset('assets/img/monday-com/homepage-image.webp') }}" alt="monday.com page banner image"
                    class="jira-sub-image">
            </figure>
        </section>


        <section class="monday_com-container">
            <ul class="monday_com-feature-list">
                <li class="monday_com-feature-item"><span class="monday_com-feature-heading">Workflow Design:</span>
                    Assist in designing and implementing efficient workflows to optimize tasks and project management.
                </li>
                <li class="monday_com-feature-item"><span class="monday_com-feature-heading">Automations: </span> Create
                    automation rules to reduce manual tasks, improve efficiency, and enhance overall productivity.</li>

                <li class="monday_com-feature-item"><span class="monday_com-feature-heading">Integrations:</span>
                    Integrate Monday.com with other essential tools and platforms that clients use to streamline data
                    sharing and communication.</li>

                <li class="monday_com-feature-item"><span class="monday_com-feature-heading">Reporting and Analytics:
                    </span>Develop customized dashboards and reports to help clients gain valuable insights into their
                    project progress and performance.</li>

                <li class="monday_com-feature-item"><span class="monday_com-feature-heading">Onboarding and Training:
                    </span>Provide guidance and training to help clients effectively adopt and utilize Monday.com for
                    their projects.</li>

                <li class="monday_com-feature-item"><span class="monday_com-feature-heading">Data Migration: </span>
                    Help clients migrate their existing data and projects to Monday.com, ensuring a seamless transition.
                </li>

                <li class="monday_com-feature-item"><span class="monday_com-feature-heading">Project Management: </span>
                    Provide end-to-end project management services, from planning and execution to monitoring and
                    reporting.</li>

                <li class="monday_com-feature-item"><span class="monday_com-feature-heading">Collaboration Enhancement:
                    </span> Foster effective team collaboration by optimizing Monday.com collaborative features.</li>
            </ul>
        </section>

        <p class="monday_com-feature-conclusion">These services empower clients to enhance their productivity,
            collaboration, and project outcomes by leveraging the capabilities of Monday.com, a versatile and
            customizable work management platform.</p>

    </main>

    <!-- slider tasks -->
    <section id="portfolio-slider" class="slider-container">
        <div class="slider-box">
            <h2>Workflow</h2>
            <p>Monday.com</p>
            <figure>
                <img src="{{ asset('assets/img/monday-com/workflow.webp') }}" alt="workflow image">
            </figure>
        </div>

        <div class="slider-box">
            <h2>Structure</h2>
            <p>Monday.com</p>
            <figure>
                <img src="{{ asset('assets/img/monday-com/structure.webp') }}" alt="Structure image">
            </figure>
        </div>

        <div class="slider-box">
            <h2>Dashboards</h2>
            <p>Monday.com</p>
            <figure>
                <img src="{{ asset('assets/img/monday-com/dashboard.webp') }}" alt="dashboard image">
            </figure>
        </div>

        <div class="slider-box">
            <h2>Monday Forms</h2>
            <p>Monday.com</p>
            <figure>
                <img src="{{ asset('assets/img/monday-com/mondayform.webp') }}" alt="monday form image">
            </figure>
        </div>

        <div class="slider-box">
            <h2>Work Docs</h2>
            <p>Monday.com</p>
            <figure>
                <img src="{{ asset('assets/img/monday-com/mondayworkdoc.webp') }}" alt="monday work doc image">
            </figure>
        </div>

        <div class="slider-box">
            <h2>Monday Automation</h2>
            <p>Monday.com</p>
            <figure>
                <img src="{{ asset('assets/img/monday-com/mondayautomation.webp') }}" alt="monday automation image">
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

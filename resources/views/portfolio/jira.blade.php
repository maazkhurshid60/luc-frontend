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
        <p class="portfolio-tool-heading">Jira</p>
    </header>

    <main class="wrapper">
        <section class="intro-section jira">
            <div class="intro-content">
                <h2 class="section-heading">Introduction</h2>
                <p class="section-content">Jira Software is the #1 agile project management tool used by teams to plan,
                    track, release and support world-class software with confidence. It is the single source of truth
                    for your entire development lifecycle, empowering autonomous teams with the context to move quickly
                    while staying connected to the greater business goal. Whether used to manage simple projects or to
                    power your DevOps practices, Jira Software makes it easy for teams to move work forward, stay
                    aligned, and communicate in context.</p>
                <img src="{{ asset('assets/img/jira/jira-intro-image.webp') }}" alt="" class="section-image"
                    id="image-mobile">
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/jira/jira-intro-image.webp') }}" alt="" class="section-image"
                    id="image-desktop">
            </figure>
        </section>

        <section class="jira-intro">
            <h2 class="heading">Jira Software</h2>
            <figure>
                <img src="{{ asset('assets/img/jira/jira.webp') }}" alt="jira image" class="jira-sub-image">
            </figure>
        </section>


        <section class="jira-container">
            <ul class="jira-feature-list">
                <li class="jira-feature-item"><span class="jira-feature-heading">Streamlined Task Management:</span>
                    Jira excels in task organization, simplifying complex projects or daily to-do lists. It effortlessly
                    enables task creation, categorization, prioritization, and assignment, eliminating the struggle to
                    stay organized.</li>
                <li class="jira-feature-item"><span class="jira-feature-heading">Agile Workflows for Agile Goals:</span>
                    For agile goals like Scrum or Kanban, JIRA is your ideal partner. Its agile boards, sprints, and
                    backlog management let you plan, execute, and adapt projects step by step, with live progress
                    tracking.</li>
                <li class="jira-feature-item"><span class="jira-feature-heading">Customization to Fit Your
                        Vision:</span> Jira understands that each goal is distinct. It provides robust customization
                    options for workflows, issue types, fields, and permissions, enabling alignment with your unique
                    vision and rules.</li>
                <li class="jira-feature-item"><span class="jira-feature-heading">Seamless Collaboration:</span> JIRA
                    integrates with Confluence, Bitbucket, and Trello, enabling seamless collaboration and knowledge
                    sharing. Goals are achieved collectively, with JIRA as the communication hub.</li>
                <li class="jira-feature-item"><span class="jira-feature-heading">Informed Decision-Making:</span> JIRA
                    reporting and analytics capabilities provide you with insightful data on your projects progress,
                    bottlenecks, and performance trends. With this knowledge, you can make informed decisions and stay
                    on track with your goals.</li>
                <li class="jira-feature-item"><span class="jira-feature-heading">Efficient Automation:</span> JIRA
                    automation features let you automate routine processes, freeing up your time and energy for more
                    strategic activities. Achieve your goals faster by letting JIRA handle the monotonous tasks.</li>
                <li class="jira-feature-item"><span class="jira-feature-heading">Scalability for Growth:</span> As your
                    goals change and your team size grows, JIRA adapts. Its perfect for both small teams and big
                    companies, making it a versatile tool for any objective, whether personal or corporate.</li>
            </ul>
        </section>
    </main>

    <!-- slider -->
    <section id="portfolio-slider" class="slider-container">
        <a href="/portfolio/jira-workflow">
            <div class="slider-box">
                <h2>Workflow</h2>
                <p>Jira Software</p>
                <figure>
                    <img src="{{ asset('assets/img/jira/slider-images/workflow.webp') }}" alt="jira image">
                </figure>
            </div>
        </a>


        <a href="/portfolio/jira-kanban">
            <div class="slider-box">
                <h2>Kanban</h2>
                <p>Jira Software</p>
                <figure>
                    <img src="{{ asset('assets/img/jira/slider-images/kanban-board.webp') }}" alt="jira image">
                </figure>
            </div>
        </a>

        <a href="/portfolio/jira-dependency">
            <div class="slider-box">
                <h2>Jira Dependency</h2>
                <p>Jira Software</p>
                <figure>
                    <img src="{{ asset('assets/img/jira/slider-images/dependencies.webp') }}" alt="jira image">
                </figure>
            </div>
        </a>

        <a href="{{ url('/portfolio/jira-agile-ceremonies') }}">
            <div class="slider-box">
                <h2>Agile Ceremonies</h2>
                <p>Jira Software</p>
                <figure>
                    <img src="{{ asset('assets/img/jira/slider-images/agile-ceremonies.webp') }}" alt="jira image">
                </figure>
            </div>
        </a>

        <a href="{{ url('/portfolio/jira-story-estimation') }}">
            <div class="slider-box">
                <h2>Story Estimation</h2>
                <p>Jira Software</p>
                <figure>
                    <img src="{{ asset('assets/img/jira/slider-images/story-estimation.webp') }}" alt="jira image">
                </figure>
            </div>
        </a>

        <a href="{{ url('/portfolio/jira-risk-management') }}">
            <div class="slider-box">
                <h2>Risk Management</h2>
                <p>Jira Software</p>
                <figure>
                    <img src="{{ asset('assets/img/jira/slider-images/risk-management.webp') }}" alt="jira image">
                </figure>
            </div>
        </a>

        <a href="{{ url('/portfolio/jira-program-increment') }}">
            <div class="slider-box">
                <h2>Program Increment Planning</h2>
                <p>Jira Software</p>
                <figure>
                    <img src="{{ asset('assets/img/jira/slider-images/increment-planning.webp') }}" alt="jira image">
                </figure>
            </div>
        </a>
        <a href="{{ url('/portfolio/jira-user-stories') }}">
            <div class="slider-box">
                <h2>User Stories</h2>
                <p>Jira Software</p>
                <figure>
                    <img src="{{ asset('assets/img/jira/slider-images/user-stories.webp') }}" alt="jira image">
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

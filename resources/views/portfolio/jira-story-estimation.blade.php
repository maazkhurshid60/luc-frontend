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
                <h2>{{ $data['page']->name }}</h2>
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
            <a href="/portfolio/jira">Jira</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <h5>Story Estimation</h5>
        </div>
    </div>
    <header>
        <h1 class="portfolio-tool-heading">Jira</h1>
    </header>

    <main>
        <div class="wrapper">
            <section class="intro-section jira ">
                <div class="intro-content">
                    <h2 class="section-heading">Story Estimation</h2>
                    <p class="section-content">Story estimation in Jira is an important aspect of Agile software
                        development that helps teams determine the sort and complexity of user stories.</p>
                    <img src="{{ asset('assets/img/jira/story-estimation.webp') }}"
                        alt="image about agile user story best practices" class="section-image" id="image-mobile">
                </div>
                <figure class="tool-image">
                    <img src="{{ asset('assets/img/jira/story-estimation.webp') }}"
                        alt="image about agile user story best practices" class="section-image" id="image-desktop">
                </figure>
            </section>

            <section class="story-section ">
                <h1 class="main-heading">Story Points</h1>
                <div class="story-point-content">
                    <h4>Use Relative Sizing</h4>
                    <h6>Relative Estimation</h6>
                    <p>Relative estimation is the process of estimating task completion, not by units of time or no
                        days, but rather by comparing with other tasks in teerms of :</p>
                </div>
                <div class="container">
                    <ul>
                        <li>Complexity</li>
                        <li>Risk</li>
                        <li>Implementation</li>
                        <li>Deployment</li>
                        <li>Interdependencies</li>
                    </ul>
                    <img src="{{ asset('assets/img/jira/story-point-advantages.webp') }}" alt="advantages image"
                        class="advantage-image">
                </div>

                <p>Each Task is estimated by all the members in the team.</p>
                <img src="{{ asset('assets/img/jira/points.webp') }}" alt="points image" class="point-image">
            </section>
        </div>


        {{-- Story Estimation section --}}
        <div class="task-management-wrapper">
            <section class="task-management-section wrapper">
                <div class="section-intro">
                    <h3>Task Management</h3>
                    <p>Task management in Jira involves breaking stories into smaller tasks, estimating their size, and
                        implementing timeboxes to manage completion within specified time frames.</p>
                </div>

                <div class="container">
                    <div class="detail">
                        <h4>Break Down Stories</h4>
                        <p>Large and complex stories are harder to
                            estimate accurately. It is often beneficial to
                            break down such stories into smaller, more
                            manageable pieces. Smaller stories are
                            easier to estimate and provide better
                            visibility into the progress of the project.
                            Jira's Agile boards allow for breaking down
                            stories into sub-tasks for better tracking.</p>
                    </div>
                    <img src="{{ asset('assets/img/jira/breakdown-stories.webp') }}"
                        alt="image about break down stories in time estimation">
                </div>

                <div class="container">
                    <div class="detail">
                        <h4>T-Shirts Sizes</h4>
                        <p>T-Shirt sizing is a simple and intuitive
                            estimation technique. User stories are
                            assigned sizes based on t-shirt sizes such as
                            XS, S, M, L, and XL. The sizes represent the
                            relative effort or complexity of the stories.</p>
                    </div>
                    <img src="{{ asset('assets/img/jira/t-shirts.webp') }}" alt="">
                </div>

                <div class="container">
                    <div class="detail">
                        <h4>Timeboxing</h4>
                        <p>To prevent excessive time spent on
                            estimation, use timeboxing techniques. Set
                            a predefined time limit for estimation
                            discussions and encourage the team to
                            focus on reaching a consensus within that
                            timeframe.</p>
                    </div>
                    <img src="{{ asset('assets/img/jira/time-boxing.webp') }}" alt="">
                </div>

            </section>
        </div>

        {{-- Time Estimation section --}}
        <section class="time-estimation-section wrapper">
            <div class="section-intro">
                <h3>Time Estimates</h3>
                <p>Time estimation in Jira can be approached in different ways, depending on the needs and
                    preferences of your team.</p>
            </div>

            <div class="container">
                <div class="detail">
                    <h4>Original Time Estimate (OTE)</h4>
                    <p>Jira provides a field called "Original Time Estimate" to capture the estimated time
                        required to complete a task or user story. Team members estimate the effort in hours
                        or days and input their estimates in this
                        field. Jira uses this estimate to calculate
                        the remaining time and progress of the
                        task</p>
                </div>
                <img src="{{ asset('assets/img/jira/OTE-image.webp') }}" alt="">
            </div>

            <div class="container">
                <div class="detail">
                    <h4>Time-Based Tracking</h4>
                    <p>Jira offers time tracking features that allow team members
                        to log the actual time spent on a task or user story. This can be done using the
                        "Time Spent" field, where team members enter the time they have worked on a task. Jira then
                        calculates the total time spent, remaining time, and progress. This
                        approach provides real-time visibility into how much time has been invested in each
                        task.</p>
                </div>
                <img src="{{ asset('assets/img/jira/SPENT-image.webp') }}" alt="">
            </div>
        </section>



    </main>

    <!-- {/* Footer */} -->
    @include('layouts.footer')

</body>

</html>

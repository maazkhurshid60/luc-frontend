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
            <h5>Program Increment</h5>
        </div>
    </div>

    <header>
        <h1 class="portfolio-tool-heading">Jira</h1>
    </header>

    <main>
        <div class="wrapper">
            <section class="intro-section jira ">
                <div class="intro-content">
                    <h2 class="section-heading">Program Increment Planning</h2>
                    <p class="section-content">PI (Program Increment) planning is an essential part of the Agile
                        framework, particularly in the Scaled Agile Framework (Safe). While Jira is a popular project
                        management tool, it doesn't provide specific features for PI planning out-of-the-box.</p>
                    <img src="{{ asset('assets/img/jira/program-increment.webp') }}"
                        alt="program increment screenshot on laptop screen" class="section-image" id="image-mobile">
                </div>
                <figure class="tool-image">
                    <img src="{{ asset('assets/img/jira/program-increment.webp') }}"
                        alt="program increment screenshot on laptop screen" class="section-image" id="image-desktop">
                </figure>
            </section>
        </div>


        <div class="wrapper">
            <section class="planning-steps">
                <h3 class="main-heading">Highlights</h3>
                <div class="container">
                    <div class="sub-container">
                        <div class="detail">
                            <h3>Create Epics</h3>
                            <p>Identify the high-level initiatives or goals for
                                the upcoming Program Increment and
                                create epics in Jira to represent them. Epics
                                are large bodies of work that can be broken
                                down into smaller user stories.</p>
                        </div>
                        <img src="{{ asset('assets/img/jira/create-epics.webp') }}" alt="create epic screen shoot">
                    </div>

                    <div class="sub-container">
                        <div class="detail">
                            <h3>Define Dependencies</h3>
                            <p>Identify any dependencies between user
                                stories or epics and capture them in Jira.
                                This allows the teams to be aware of
                                dependencies during the planning session
                                and address them effectively.</p>
                        </div>
                        <img src="{{ asset('assets/img/jira/define-dependency.webp') }}"
                            alt="define dependency screenshot">
                    </div>

                    <div class="sub-container">
                        <div class="detail">
                            <h3>Refine and Prioritize the Backlog</h3>
                            <p>Review the existing backlog and refine user
                                stories or create new ones to ensure they
                                are clear, actionable, and aligned with the PI
                                objectives. Prioritize the backlog items
                                based on their importance</p>
                        </div>
                        <img src="{{ asset('assets/img/jira/backlog.webp') }}"
                            alt="screenshot image while creating backlog">
                    </div>
                </div>
            </section>
        </div>




        <div class="plan-visualization-wrapper">
            <section class="plan-visualization wrapper">
                <h3>Visualize the Plan</h3>
                <p>Use Jira's Agile Boards or other visualization tools to create a Program Board or a Portfolio Board.
                    This board can display the assigned user stories, their dependencies, and the
                    estimated effort, providing a visual representation of plan.</p>
                <img src="{{ asset('assets/img/jira/plan-visualization.webp') }}"
                    alt="image with people assigned role">
            </section>
        </div>


        <section class="pi-planning-section wrapper">
            <h3>PI Planning Meeting</h3>
            <p>Share the prepared backlog, objectives, dependencies, and assigned user stories with the
                relevant stakeholders ahead of the PI planning meeting. Encourage participants to review
                and provide feedback in advance to make the planning session more productive.</p>
            <img src="{{ asset('assets/img/jira/pi-planning.webp') }}" alt="chart describing pi planning meeting">
        </section>

    </main>

    <!-- {/* Footer */} -->
    @include('layouts.footer')

</body>

</html>

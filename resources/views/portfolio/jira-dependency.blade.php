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
            <a href="/portfolio/jira">Jira</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <p>Jira Dependency</p>
        </div>
    </div>


    <header>
        <h2 class="portfolio-tool-heading">Jira</h2>
    </header>

    <main class="wrapper">
        <section class="intro-section jira">
            <div class="intro-content">
                <h2 class="section-heading">Jira Dependencies</h2>
                <p class="section-content">In Jira, dependencies refer to the relationships or connections between
                    different tasks, issues, or work items within a project. Dependencies indicate that one item is
                    dependent on another for its completion or progress.</p>
                <img src="{{ asset('assets/img/jira/jira-dependency.webp') }}" alt="" class="section-image"
                    id="image-mobile">
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/jira/jira-dependency.webp') }}" alt="" class="section-image"
                    id="image-desktop">
            </figure>
        </section>

        <section>
            <div class="dependency-management">
                <div class="jira-dependency-content">
                    <h2>Linking issues</h2>
                    <p>Create links between different issues
                        to represent dependencies. You can
                        establish relationships such as
                        "blocks," "is blocked by," "relates to,"
                        or custom link types.</p>
                </div>
                <figure>
                    <img src="{{ asset('assets/img/jira/issues-linking.webp') }}" alt="jira">
                </figure>
            </div>

            <div class="dependency-management">
                <div class="jira-dependency-content">
                    <h2>Issue Hierarchy</h2>
                    <p>We can create parent-child relationships
                        between issues. it's useful when you have
                        a complex task that needs to be broken
                        down into smaller subtasks.</p>
                </div>
                <figure>
                    <img src="{{ asset('assets/img/jira/issues-hierarchy.webp') }}" alt="issues linking screensheet">
                </figure>
            </div>

            <div class="dependency-management">
                <div class="jira-dependency-content">
                    <h2>Agile Boards</h2>
                    <p>Indicates dependencies between user
                        stories or tasks using columns, it's
                        useful in visualizing and managing
                        dependencies within the context of
                        an Agile project.</p>
                </div>
                <figure>
                    <img src="{{ asset('assets/img/jira/agile-board.webp') }}" alt="agile board">
                </figure>
            </div>

            <div class="dependency-management">
                <div class="jira-dependency-content">
                    <h2>Gantt Charts</h2>
                    <p>It provide a visual representation of tasks,
                        their timelines, and dependencies. create and
                        manage dependencies directly on the Gantt
                        chart, making it easier to identify and track
                        dependencies across your project.</p>
                </div>
                <figure>
                    <img src="{{ asset('assets/img/jira/gantt-chart.webp') }}" alt="gantt chart">
                </figure>
            </div>

            <div class="dependency-management">
                <div class="jira-dependency-content">
                    <h2>Custom fields</h2>
                    <p>Create a custom field to indicate the
                        dependent issue's ID or link, and use
                        workflow conditions or validators to
                        enforce dependency rules.</p>
                </div>
                <figure>
                    <img src="{{ asset('assets/img/jira/custom-field.webp') }}" alt="custom field screenshot">
                </figure>
            </div>
        </section>
    </main>

    <section class="advance-roadmap-section">
        <div class="wrapper">
            <h2>Dependency in Advance Roadmaps</h2>
            <p>Dependencies in Advanced Roadmaps indicate which issues are contingent on others being completed first.
                There are two types of dependencies in Advanced Roadmaps.</p>
            <ul class="roadmap-list">
                <li class="roadmap-item">Outgoing dependency (“blocks”) means the issue blocks the next issue being
                    started,
                    indicated by a badge on the right side of the schedule bar.
                </li>
                <li class="roadmap-item">Incoming dependency (“is blocked by”) means the issue is dependent on the
                    previous issue being completed, indicated by a badge on the left side of the schedule bar.
                </li>
            </ul>
        </div>

        <figure>
            <img src="{{ asset('assets/img/jira/advance-dependency.webp') }}" alt="">
        </figure>
    </section>

    <div class="wrapper">
        <section class="builtin-jira-dependency-section">
            <div>
                <h2>Built-in Dependencies statuses in Jira</h2>
                <p>In Jira, the "Link" feature allows you to establish connections or relationships between different
                    issues to represent dependencies, duplications, or general associations. Here is a brief explanation
                    of commonly used link types in Jira</p>
            </div>
            <figure>
                <img src="{{ asset('assets/img/jira/built-in-dependency.webp') }}" alt="image">
            </figure>
        </section>
    </div>



    <section class="jira-dependency-advantages-section">
        <div class="text-container">
            <h2>Advantages</h2>
            <p>Managing dependencies in Jira offers the following benefits</p>
        </div>
        <div class="wrapper dependency-benefits-container">
            {{-- main container --}}
            <div class="jira-dependency-benefits">
                {{-- image container --}}
                <div class="star-container"></div>
                {{-- text container --}}
                <div class="benefits-details">
                    <h3>Visibility</h3>
                    <p>Dependencies provide a clear understanding of how work items are
                        connected and rely on each other</p>
                </div>
            </div>

            <div class="jira-dependency-benefits">
                <div class="star-container"></div>
                <div class="benefits-details">
                    <h3>Plan and schedule</h3>
                    <p>Identifying dependencies helps in accurate sequencing of
                        tasks and resource allocation
                    </p>
                </div>
            </div>

            <div class="jira-dependency-benefits">
                <div class="star-container"></div>
                <div class="benefits-details">
                    <h3>Risk mitigation</h3>
                    <p>Identifying dependencies enables early detection of potential risks and allows proactive measures
                        to mitigate them.</p>
                </div>
            </div>

            <div class="jira-dependency-benefits">
                <div class="star-container"></div>
                <div class="benefits-details">
                    <h3>Track and report</h3>
                    <p>Clear visibility into dependencies enhances project tracking
                        and reporting</p>
                </div>
            </div>

        </div>

    </section>

    <!-- {/* Footer */} -->
    @include('layouts.footer')

</body>

</html>

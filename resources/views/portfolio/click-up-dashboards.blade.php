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
            <p>{{ $data['page']->name }}</p>
        </div>
    </div>


    <header>
        <h2 class="portfolio-tool-heading">ClickUp</h2>
    </header>

    <main class="wrapper">
        <!-- INTRODUCTION SECTION START -->
        <div class="intro">
            <!-- LEFT SIDE SECTION START -->
            <div class="intro__left">
                <h2 class="intro__heading">Introduction</h2>

                <p class="intro__paragraph">In ClickUp, Structure is a way to organize your work into a hierarchy of
                    Spaces, Folders, Lists, and Tasks.
                    This hierarchy provides a visual and organized way to manage complex projects by breaking them down
                    into manageable components, facilitating better task tracking and management.
                </p>
            </div>
            <!-- LEFT SIDE SECTION END -->

            <figure class="tool-image">
                <img src="{{ asset('assets/img/click-up-dashboard/dashboardIntro.webp') }}" alt=""
                    id="image-desktop" class="section-image">
            </figure>

            <!-- RIGHT SIDE SECTION END -->

        </div>
        <h2 class="intro__heading intro__heading--sub">Dashboards</h2>

        <!--Card1 Panda Doc and Monday SECTION START -->
        <div class="card1">

            <figure class="tool-image">
                <img src="{{ asset('assets/img/click-up-dashboard/ActivitiesPerProgramer.webp') }}" alt=""
                    class="section-image" id="image-desktop">
            </figure>
            <div class="card1__left">
                <h2 class="intro__heading">Activities Per Programer</h2>
                <p class="intro__paragraph">
                    It is a focused view that provides an insightful breakdown of tasks and projects assigned to
                    individual programmers or developers. This dashboard enables teams to track the workload, progress,
                    and efficiency of each programmer, facilitating better resource allocation and project management.
                </p>
            </div>
        </div>
        <!--Card1 Panda Doc and Monday SECTION Ends -->

        <!--Card2 Panda Doc and Monday SECTION START -->
        <div class="card2">
            <div class="card2__left">
                <h2 class="intro__heading">Programmer Allocation</h2>
                <p class="intro__paragraph">
                    It is a powerful tool that provides a clear and concise overview of your team's resource allocation
                    within your programming or development projects. It offers real-time insights into who is working on
                    what, project progress, and resource availability. With this dashboard, you can optimize work
                    distribution, avoid bottlenecks, and ensure efficient utilization of your programming talent. </p>
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/click-up-dashboard/ProgrammerAllocation.webp') }}" alt=""
                    id="image-desktop" class="section-image">
            </figure>
        </div>
        <!--Card2 Panda Doc and Monday SECTION End -->
        <!--Card1 Panda Doc and Monday SECTION Start -->
        <div class="card1">
            <figure class="tool-image">
                <img src="{{ asset('assets/img/click-up-dashboard/TaskReport.webp') }}" alt=""
                    class="section-image" id="image-desktop">
            </figure>
            <div class="card1__left">
                <h2 class="intro__heading">Task Report</h2>
                <p class="intro__paragraph">
                    It is your go-to command center for tracking and analyzing task-related data. It provides a
                    comprehensive visual summary of your team's progress, task statuses, deadlines, and more. With
                    intuitive charts and graphs, this dashboard transforms complex task data into actionable insights,
                    helping you make informed decisions, allocate resources effectively, and ensure project success.
                </p>
            </div>


        </div>
        <!--Card1 Panda Doc and Monday SECTION End -->

        <!--Card2 Panda Doc and Monday SECTION Start -->

        <div class="card2">

            <div class="card2__left">
                <h2 class="intro__heading">Redo Task Per Programmer</h2>
                <p class="card2__paragraph">
                    It is your go-to command center for tracking and analyzing task-related data. It provides a
                    comprehensive visual summary of your team's progress, task statuses, deadlines, and more. With
                    intuitive charts and graphs, this dashboard transforms complex task data into actionable insights,
                    helping you make informed decisions, allocate resources effectively, and ensure project success.
                </p>
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/click-up-dashboard/RedoTaskPerProgrammer.webp') }}" alt=""
                    id="image-desktop" class="section-image">
            </figure>

        </div>
        <!--Card2 Panda Doc and Monday SECTION End -->
        <!--Card1 Panda Doc and Monday SECTION Start -->
        <div class="card1">
            <figure class="toll-image">
                <img src="{{ asset('assets/img/click-up-dashboard/AssignedHourvsAllocatedPerProject.webp') }}"
                    alt="" class="section-image" id="image-desktop">
            </figure>
            <div class="card1__left">
                <h2 class="intro__heading">Assigned Hour vs Allocated Per Project</h2>
                <p class="intro__paragraph">
                    It provides a concise overview of task allocation efficiency. It helps teams assess how many hours
                    are assigned to a project versus the actual hours allocated, ensuring resources are optimally
                    utilized for successful project management.
                </p>
            </div>


        </div>
        <!--Card1 Panda Doc and Monday SECTION End -->
        <!--Card2 Panda Doc and Monday SECTION Start -->

        <div class="card2">

            <div class="card2__left">
                <h2 class="intro__heading">Redo Task Per Programmer</h2>
                <p class="card2__paragraph">
                    It provides a snapshot of quality assurance efforts within a software development team. It tracks
                    the number of QA tests conducted by each programmer, ensuring accountability and efficient bug
                    resolution. This tool aids in maintaining high software quality and streamlining the development
                    process.
                </p>
            </div>
            <figure class="tool-image">

                <img src="{{ asset('assets/img/click-up-dashboard/RedoTaskPerProgrammer.webp') }}" alt=""
                    class="section-image" id="image-desktop">
            </figure>
        </div>

        <!--Card2 Panda Doc and Monday SECTION End -->
        <!--Card1 Panda Doc and Monday SECTION Start -->
        <div class="card1">
            <figure class="tool-image">
                <img src="{{ asset('assets/img/click-up-dashboard/ProgressOverTime.webp') }}" alt=""
                    class="section-image" id="image-desktop">
            </figure>
            <div class="card1__left">
                <h2 class="intro__heading">Progress Over Time</h2>
                <p class="intro__paragraph">
                    This dashboard provides a visual timeline of how your work has evolved, helping you track
                    milestones, identify trends, and measure performance. With this dashboard, you can make data-driven
                    decisions, stay on top of deadlines, and celebrate your team's achievements as you navigate the
                    ever-changing landscape of your projects.
                </p>
            </div>
        </div>
        <!--Card1 Panda Doc and Monday SECTION End -->
        <!--Card2 Panda Doc and Monday SECTION Start -->

        <div class="card2">

            <div class="card2__left">
                <h2 class="intro__heading">Assigned Task</h2>
                <p class="intro__paragraph">
                    It provides a real-time overview of all tasks assigned to each team member, making it easy to manage
                    and track their work. With a quick glance, you can see priorities, due dates, and progress, allowing
                    you to manage tasks efficiently and meet deadlines with ease.
                </p>
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/click-up-dashboard/AssignedTask.webp') }}" alt=""
                    class="section-image" id="image-desktop">
            </figure>
        </div>
        <!--Card2 Panda Doc and Monday SECTION End -->
        <!--Card1 Panda Doc and Monday SECTION Start -->
        <div class="card1">
            <figure class="tool-image">
                <img src="{{ asset('assets/img/click-up-dashboard/ProjectAllocation.webp') }}" alt=""
                    class="section-image" id="image-desktop">
            </figure>
            <div class="card1__left">
                <h2 class="intro__heading">Project Allocation</h2>
                <p class="intro__paragraph">
                    It provides a clear and concise overview of how your team's time and skills are distributed across
                    various projects. With intuitive visualizations and real-time data, this dashboard enables you to
                    optimize workloads, allocate resources efficiently, and ensure projects stay on schedule.
                </p>
            </div>
        </div>
        <!--Card1 Panda Doc and Monday SECTION End -->

    </main>

    <!-- {/* Footer */} -->
    @include('layouts.footer')

</body>

</html>

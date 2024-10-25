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
            <p>Kanban</p>
        </div>
    </div>


    <header>
        <h2 class="portfolio-tool-heading">Jira</h2>
    </header>

    <main>
        <div class="wrapper">
            <section class="intro-section jira ">
                <div class="intro-content">
                    <h2 class="section-heading">Kanban Board</h2>
                    <p class="section-content">Kanban is a popular agile project management framework that focuses on
                        visualizing work and optimizing workflow efficiency.</p>
                    <img src="{{ asset('assets/img/jira/jira-kanban.webp') }}" alt="" class="section-image"
                        id="image-mobile">
                </div>
                <figure class="tool-image">
                    <img src="{{ asset('assets/img/jira/jira-kanban.webp') }}" alt="" class="section-image"
                        id="image-desktop">
                </figure>
            </section>
        </div>

        <div class="wrapper">
            <section class=" kanban-elements">
                <h2 class="heading">Elements of Kanban Board</h2>
                <div class="container">
                    <figure class="figure-container">
                        <img src="{{ asset('assets/img/jira/kanban-steps.webp') }}" alt="kanban-steps-image"
                            class="kanban-steps-image">
                    </figure>
                    <div class="kanban-elements-list">
                        <h3 class="kanban-steps">Set Kanban Board</h3>
                        <h3 class="kanban-steps">Track Work</h3>
                        <h3 class="kanban-steps">Swimlanes</h3>
                        <h3 class="kanban-steps">Visualize work</h3>
                        <h3 class="kanban-steps">Limit work in progress </h3>
                        <h3 class="kanban-steps">Continuously update Cards</h3>
                    </div>
                </div>
            </section>

            <section class=" kanban-usage-guide">
                <h2 class="heading">How to Effectively Use Kanban</h2>
                <div class="container">
                    <div class="kanban-detail">
                        <h3>Workflow</h3>
                        <p>Team can move cards around columns. Each column represents a
                            different stage in the workflow, such as Backlog, In Progress, and Done</p>
                    </div>
                    <div class="kanban-detail">
                        <h3>Add tasks, bugs, or user stories to the backlog</h3>
                        <p>In the Backlog column, you can add tasks, bugs, or user stories. You
                            can also add details about each item, such as the due date, priority, and
                            assignee</p>
                    </div>
                    <div class="kanban-detail">
                        <h3>Prioritize the backlog</h3>
                        <p>We can prioritize them by dragging and dropping them into different
                            positions.</p>
                    </div>
                    <div class="kanban-detail">
                        <h3>Select work from the
                            backlog</h3>
                        <p>When you are ready to start working on an item, select it from the
                            backlog and move it to the In Progress column</p>
                    </div>
                    <div class="kanban-detail">
                        <h3>Track your progress</h3>
                        <p>We can track progress by moving them through the different columns.</p>
                    </div>
                    <div class="kanban-detail">
                        <h3>Standups</h3>
                        <p>The board is used to manage work during meetings called standups.
                            The stand-up is designed to inform everyone quickly of what's going on
                            across the team, Focused on</p>
                    </div>
                </div>
            </section>

        </div>

        <section class="kanban-benefits-section">
            <h2 class="main-heading">Benefits</h2>
            <div class="wrapper kanban-benefits-container">
                {{-- main container --}}
                <div class="kanban-benefits">
                    {{-- image container --}}
                    <div class="star-container"></div>
                    {{-- text container --}}
                    <div class="benefits-details">
                        <h3>Visualize work</h3>
                        <p>Help teams to identify bottlenecks and improve the flow of work</p>
                    </div>
                </div>

                <div class="kanban-benefits">
                    <div class="star-container"></div>
                    <div class="benefits-details">
                        <h3>Improve flow</h3>
                        <p>Improve the flow of work by identifying bottlenecks and making adjustments to the
                            workflow
                        </p>
                    </div>
                </div>

                <div class="kanban-benefits">
                    <div class="star-container"></div>
                    <div class="benefits-details">
                        <h3>Increase transparency</h3>
                        <p>Help teams to collaborate more effectively and to make better decisions
                            about the work that needs to be done
                        </p>
                    </div>
                </div>

                <div class="kanban-benefits">
                    <div class="star-container"></div>
                    <div class="benefits-details">
                        <h3>Limit work</h3>
                        <p>Limits the amount of work that is in progress at any given time</p>
                    </div>
                </div>

            </div>

        </section>


    </main>



    <!-- {/* Footer */} -->
    @include('layouts.footer')


</body>

</html>

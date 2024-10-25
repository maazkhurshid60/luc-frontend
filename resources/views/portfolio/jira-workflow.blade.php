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
            <p>Workflow</p>
        </div>
    </div>

    <header>
        <h2 class="portfolio-tool-heading">Jira</h2>
    </header>

    <main class="wrapper">
        <section class="intro-section jira">
            <div class="intro-content">
                <h2 class="section-heading">Workflow</h2>
                <p class="section-content">Jira Software is the #1 agile project management tool used by teams to plan,
                    track, release and support world-class software with confidence. It is the single source of truth
                    for your entire development lifecycle, empowering autonomous teams with the context to move quickly
                    while staying connected to the greater business goal. Whether used to manage simple projects or to
                    power your DevOps practices, Jira Software makes it easy for teams to move work forward, stay
                    aligned, and communicate in context.</p>
                <img src="{{ asset('assets/img/jira/jira-workflow.webp') }}" alt="img" class="section-image"
                    id="image-mobile">
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/jira/jira-workflow.webp') }}" alt="img" class="section-image"
                    id="image-desktop">
            </figure>
        </section>

        <section class="intro-sub-section">
            <h2 class="heading">Workflow - SaaS App</h2>
            <figure>
                <img src="{{ asset('assets/img/jira/jira-workflow-steps.webp') }}" alt="workflow steps" srcset=""
                    class="workflow-steps">
            </figure>
        </section>


        <section class="jira-container">
            <h2><span class="status-heading">Review</span></h2>
            <ul id="jira-workflow">
                <li class="jira-workflow-list">This is the first status of the workflow, which will be given to a new
                    card (issue) that could contain a new feature or a bug related to an existing feature (card).</li>
                <li class="jira-workflow-list">Under this status, all new cards (issues) will be assigned to the
                    concerned person who will review and update the status accordingly (the status could be changed to
                    <span class="bold-text">“TODO“, “HOLD“</span> or <span class="bold-text">“ARCHIVED“</span>).
                </li>
                <li class="jira-workflow-list">Whenever a Bug card is created, it should be linked to its existing card.
                </li>
                <li class="jira-workflow-list">Whenever a Task is created, it should be linked to its related Epic.</li>
                <li class="jira-workflow-list">A review is required by IT Team:
                    <ul>
                        <li>Perform analysis, research, and discussions.</li>
                    </ul>
                </li>
            </ul>


            <h2><span class="status-heading">To Do</span></h2>
            <ul id="jira-workflow">
                <li class="jira-workflow-list">Once the status of the card (issue) is changed to <span
                        class="bold-text">“TODO“</span> , this means the same card can be included in the sprint and can
                    be assigned to a developer.</li>
                <li class="jira-workflow-list">All cards in <span class="bold-text">“TO DO“</span> will be assigned to
                    developers during weekly sprint planning.</li>
                <li class="jira-workflow-list">Whenever a card is assigned to a developer with a <span
                        class="bold-text"> “TODO“</span> status, assigning person must add “Original estimate" to
                    evaluate the timeline.</li>
            </ul>



            <h2><span class="status-heading">In Progress</span></h2>
            <ul id="jira-workflow">
                <li class="jira-workflow-list">This status indicates the developer is working on the card (issue).</li>
                <li class="jira-workflow-list">Once developers will start working on the <span
                        class="bold-text">“TODO“</span> card, they must change the status to <span
                        class="bold-text">“INPROGRESS“</span>.</li>
            </ul>



            <h2><span class="status-heading">Code Review</span></h2>
            <ul id="jira-workflow">
                <li class="jira-workflow-list">The purpose of this status is to maintain the quality of code by
                    engaging
                    another developer to review the code.</li>
                <li class="jira-workflow-list">Once a developer has completed the coding part of <span
                        class="bold-text">“In Progress“</span> cards, they can update the status to <span
                        class="bold-text">“Code Review“</span>.</li>
                <li class="jira-workflow-list">Then the same card will be assigned to a new developer for <span
                        class="bold-text">“Code Review”</span>.</li>
                <li class="jira-workflow-list">On completion, the new developer will update the status to <span
                        class="bold-text">“Integration Testing“</span> and will assign the card to the QA person for
                    manual QA.</li>
            </ul>



            <h2><span class="status-heading">Integration Testing</span></h2>
            <ul id="jira-workflow">
                <li class="jira-workflow-list">The purpose of this status is to ensure quality during the development
                    phase.</li>
                <li class="jira-workflow-list">The QA person will apply all related use cases on the live link and will
                    remove bugs if found, so QA Team should not spend much time on <span class="bold-text">“Staging
                        UAT“</span> status.</li>
            </ul>



            <h2><span class="status-heading">Done</span></h2>
            <ul id="jira-workflow">
                <li class="jira-workflow-list">Once <span class="bold-text">“Integration Testing“</span> for a card is
                    done, the developer will change the status to <span class="bold-text">“Done“</span>.</li>
                <li class="jira-workflow-list">On closing the sprint all cards with <span
                        class="bold-text">“Done”</span> status will be removed from the current sprint and all other
                    pending ( <span class="bold-text">“To Do”</span>, <span class="bold-text">“In Progress“</span>,
                    etc.) cards will be bumped to the newsprint or backlog.</li>
            </ul>


            <h2><span class="status-heading">Staging UAT</span></h2>
            <ul id="jira-workflow">
                <li class="jira-workflow-list">A new card will be created with a status of <span
                        class="bold-text">“Staging UAT“</span> for each Epic inside Backlog.</li>
                <li class="jira-workflow-list">Each Epic can have single or multiple cards linked with a <span
                        class="bold-text">“Done“</span> status.</li>
                <li class="jira-workflow-list">Same cards with <span class="bold-text">“Done“</span> status will also
                    be linked to its relevant <span class="bold-text">“Staging UAT“</span> card.</li>
                <li class="jira-workflow-list">Status <span class="bold-text">“Staging UAT“</span> indicates, that a
                    card can be moved to sprint and can be assigned to a person for QA.</li>
                <li class="jira-workflow-list">While doing Staging UAT, if the QA person founds any bug, a new card
                    will be created with the status of <span class="bold-text">“Review“</span> and will be linked to
                    the relevant tasks and Epics. A new task or a bug will follow the same process.</li>
                <li class="jira-workflow-list">QA person will not change the status of the <span
                        class="bold-text">“Staging UAT”</span> task unless linked bugs are resolved. QA person must
                    apply all relevant use cases.</li>
                <li class="jira-workflow-list">The purpose of this status is to do the manual User Acceptance Testing
                    on the staging environment.</li>
            </ul>



            <h2><span class="status-heading">Ready to Merge</span></h2>
            <ul id="jira-workflow">
                <li class="jira-workflow-list">Once all the use cases are applied and all related/linked bugs (if any)
                    are resolved, QA person can change the status from <span class="bold-text">“Staging UAT“</span> to
                    <span class="bold-text">“Ready to Merge“</span>.
                </li>
                <li class="jira-workflow-list">This status indicates that cards can be merged into the production
                    environment.</li>
            </ul>



            <h2><span class="status-heading">Deployment/Prod UAT</span></h2>
            <ul id="jira-workflow">
                <li class="jira-workflow-list">Once a card is deployed on production and is ready for the Production
                    UAT, <span class="bold-text">“Deployed/Prod UAT“</span> status will be updated.</li>
                <li class="jira-workflow-list">If Bugs are found during <span class="bold-text">“Production
                        UAT“</span>, QA person will create new bugs in Backlog with the <span
                        class="bold-text">“Review“</span> status.</li>
                <li class="jira-workflow-list">QA person will not change the status of <span
                        class="bold-text">“Production UAT”</span> task unless all linked bugs are resolved.</li>
            </ul>



            <h2><span class="status-heading">Completed</span></h2>
            <ul id="jira-workflow">
                <li class="jira-workflow-list">Once all the testing is done on Production and all related bugs are
                    resolved, card status will be changed to <span class="bold-text">“Completed“</span>.</li>
                <li class="jira-workflow-list">On closing the sprint all cards with <span
                        class="bold-text">“Completed“</span> status will be removed from the sprint.</li>
            </ul>



            <h2><span class="status-heading">On Hold</span></h2>
            <ul id="jira-workflow">
                <li class="jira-workflow-list">Cards (issues) with the status of <span class="bold-text">“On
                        Hold“</span> will not be considered for development, QA, and Deployment for some time.</li>
                <li class="jira-workflow-list">Tasks that IT Team wants to hold off for some time, or the ones that
                    will be considered in future can have <span class="bold-text">“On Hold“</span> status.</li>
                <li class="jira-workflow-list">All <span class="bold-text">“On Hold“</span> cards will be part of
                    Backlog.</li>
            </ul>



            <h2><span class="status-heading">Archived</span></h2>
            <ul id="jira-workflow">
                <li class="jira-workflow-list">Cards (issues) with the status of <span
                        class="bold-text">“Archived“</span> will not be considered for development, QA, and deployment.
                </li>
                <li class="jira-workflow-list">All <span class="bold-text">“Archived“</span> cards will be part of
                    Backlog.</li>
            </ul>
        </section>
    </main>


    <!-- {/* Footer */} -->
    @include('layouts.footer')


</body>

</html>

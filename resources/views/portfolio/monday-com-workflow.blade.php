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
            <a href="/monday">Monday.com</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <p>WorkFlow</p>
        </div>
    </div>

    <header>
        <p class="portfolio-tool-heading">Monday.com</p>
    </header>

    <main class="wrapper">
        <section class="intro-section monday_com">
            <div class="intro-content">
                <h2 class="section-heading">Workflow</h2>
                <p class="section-content">Workflow is a series of tasks that describe how something goes from being
                    undone to being accomplished. It outlines the path of how things progress from start to finish.</p>
                <img src="{{ asset('assets/img/monday-com/monday_com-workflow.webp') }}" alt="img"
                    class="section-image" id="image-mobile">
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/monday-com/monday_com-workflow.webp') }}" alt="img"
                    class="section-image" id="image-desktop">
            </figure>
        </section>

        <section class="intro-sub-section">
            <h2 class="heading">Step by Step Instructions</h2>
            <figure>
                <img src="{{ asset('assets/img/monday-com/steps-flowchart.webp') }}" alt="workflow steps flowchart"
                    class="workflow-steps">
            </figure>
        </section>


        <section class="monday_com-container">
            <h2><span class="status-heading">Review</span></h2>
            <ul id="monday_com-workflow">
                <li class="monday_com-workflow-list">This is the first status of the workflow, which will be given to a
                    new task that could contain a new feature or a bug related to an existing feature.</li>

                <li class="monday_com-workflow-list">Under this status, all new tasks will be assigned to the concerned
                    person who will review and update the status accordingly.</li>

                <li class="monday_com-workflow-list">The concerned person will verify that the task has proper.
                    <ol class="roman-list">
                        <li>Background</li>
                        <li>Requirement</li>
                        <li>Acceptance Criteria (Definition of Done)</li>
                    </ol>
                </li>
                <li class="monday_com-workflow-list">Whenever a Bug/Enhancement card is created, it should be added as a
                    dependency to its
                    existing card.
                </li>
                <li class="monday_com-workflow-list">A review is required by IT Team:
                    <ul>
                        <li>Perform analysis, research, and discussions.</li>
                    </ul>
                </li>
            </ul>


            <h2><span class="status-heading">Ready to Start</span></h2>
            <ul id="monday_com-workflow">
                <li class="monday_com-workflow-list">Once the status of the task is changed to "Ready to Start", this
                    means the same task can be included in the sprint and can be assigned to a developer.</li>

                <li class="monday_com-workflow-list">All tasks in "Ready to Start" will be assigned to developers during
                    weekly sprint planning.</li>

                <li class="monday_com-workflow-list">Whenever a task is assigned to a developer with a "Ready to Start"
                    status, the assigning person must add "Time estimation" to evaluate the timeline.</li>
            </ul>



            <h2><span class="status-heading">In Progress</span></h2>
            <ul id="monday_com-workflow">
                <li class="monday_com-workflow-list">This status indicates the developer is working on the task.</li>
                <li class="monday_com-workflow-list">Once developers start working on the "Ready to Start" task, they
                    must change the status to "In Progress" and add a "Due Date" to that task.</li>
            </ul>



            <h2><span class="status-heading">Waiting for Review</span></h2>
            <ul id="monday_com-workflow">
                <li class="monday_com-workflow-list">The purpose of this status is to maintain the quality of the code
                    and design by engaging another developer to review the code and design.</li>
                <li class="monday_com-workflow-list">Once a developer has completed the coding part of "In Progress"
                    tasks, they can update the status to "Waiting for Review".</li>
                <ul>
                    <li>The developer should remove the "Due Date" from the task before moving the task to "Waiting for
                        Review" status.
                    </li>
                </ul>
                <li class="monday_com-workflow-list">Then the same task will be assigned to a new developer for "Waiting
                    for Review".</li>
                <li class="monday_com-workflow-list">On completion, the new developer will update the status to
                    "Testing" and will assign the task to the QA person for manual QA.</li>
                <ul>
                    <li>If the "Waiting for Review" person finds some issue in the code or design, he/she will move the
                        task back to the "Ready to Start" section with a with a label "Waiting for Review Rejected".
                    </li>
                </ul>
            </ul>


            <h2><span class="status-heading">Testing</span></h2>
            <ul id="monday_com-workflow">
                <li class="monday_com-workflow-list">The purpose of this status is to ensure quality during the
                    development phase.</li>
                <li class="monday_com-workflow-list">The QA person will execute all relevant use cases on the live link
                    and promptly address any discovered bugs during the "Staging UAT" phase to minimize the time spent
                    at this status.</li>
                <ul>
                    <li>Once a QA person finds a bug, he/she will add the bugs in a comment and will move the ticket
                        back to the "Ready to
                        Start" section with the "QA Rejected" label.</li>
                </ul>
                <li class="monday_com-workflow-list"> QA person will add his/her "Due Date" to QA for this task.</li>

            </ul>



            <h2><span class="status-heading">Staging UAT</span></h2>
            <ul id="monday_com-workflow">
                <li class="monday_com-workflow-list">Once a task is in Staging UAT, then it should be assigned to
                    someone from the IT team to perform the UAT.</li>
                <li class="monday_com-workflow-list">IT team members will add "Due Date" for Staging UAT for the
                    assigned task.</li>
                <li class="monday_com-workflow-list">While doing Staging UAT, if the UAT person finds any bug, he will
                    add a comment containing the issues found and move this task back to the "Ready to Start" section.
                </li>
                <li class="monday_com-workflow-list">The purpose of this status is to do the manual User Acceptance
                    Testing on the staging environment.</li>
                <li class="monday_com-workflow-list"> UAT person will remove the Due Date from the task before changing
                    its status to "Ready to Merge".</li>
            </ul>



            <h2><span class="status-heading">Ready to Merge</span></h2>
            <ul id="monday_com-workflow">
                <li class="monday_com-workflow-list">Once all the use cases are applied and all related/linked bugs (if
                    any) are resolved, UAT person can change the status from "Staging UAT" to "Ready to Merge".</li>
                <li class="monday_com-workflow-list">This status indicates that tasks can be merged into the production
                    environment.</li>
                <li class="monday_com-workflow-list">Someone from the IT team will add the deployment label to the task
                    for the preferred deployment day.</li>

            </ul>



            <h2><span class="status-heading">Deploy</span></h2>
            <ul id="monday_com-workflow">
                <li class="monday_com-workflow-list">Once a task is deployed on production and is ready for the
                    Production UAT, "Deployed/Prod UAT" status will be updated.</li>
                <li class="monday_com-workflow-list">Once a ticket is deployed it should be smoke tested/verified
                    within
                    a couple of days of deployment and then moved to "Done".</li>
                <li class="monday_com-workflow-list">If Bugs are found during "Production UAT", UAT person will create
                    new tasks for bugs with the "Review" status, if the bug can be catered to stand alone. Otherwise UAT
                    person will move the task back to "Ready to Start" with "UAT Rejected" label.</li>
                <li class="monday_com-workflow-list">QA person will not change the status of "Production UAT" task
                    unless all linked bugs are resolved.</li>
            </ul>

            <h2><span class="status-heading">Done</span></h2>
            <ul id="monday_com-workflow">
                <li class="monday_com-workflow-list">Once all the testing is done on the Production level and all
                    related bugs are resolved, the task status will be changed to “Done”.</li>
                <li class="monday_com-workflow-list">On closing the sprint all tasks with "Done" status will not be
                    bumped to the next sprint.</li>
            </ul>

        </section>
    </main>



    <!-- {/* Footer */} -->
    @include('layouts.footer')


</body>

</html>

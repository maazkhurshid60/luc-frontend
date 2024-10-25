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
            <a href="portfolio/clickup">Click Up</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <p>Workflow</p>
        </div>
    </div>


    <header>
        <h2 class="portfolio-tool-heading">ClickUp</h2>
    </header>

    <main class="wrapper">
        <section class="intro-section click-up">
            <div class="intro-content">
                <h2 class="section-heading">Workflow</h2>
                <p class="section-content">A ClickUp workflow is a structured process or series of steps that users
                    follow within the Click Up project management platform to manage tasks, collaborate on projects, and
                    track progress efficiently. It encompasses task creation, assignment, prioritization, and
                    completion, enabling teams to work together seamlessly.</p>
                <img src="{{ asset('assets/img/click-up/click-up-workflow.webp') }}" alt="img"
                    class="section-image" id="image-mobile">
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/click-up/click-up-workflow.webp') }}" alt="img"
                    class="section-image" id="image-desktop">
            </figure>
        </section>

        <section class="intro-sub-section">
            <h2 class="heading">Step by Step Instructions</h2>
            <figure>
                <img src="{{ asset('assets/img/click-up/flowchart.webp') }}" alt="workflow steps flowchart"
                    class="workflow-steps">
            </figure>
        </section>


        <section class="click-up-container">
            <h3><span class="status-heading">Review</span></h3>
            <ul id="click-up-workflow">
                <li class="click-up-workflow-list">This is the first status of the workflow, which will be given to a
                    new card (issue) that could contain a new feature or a bug related to an existing feature (card).
                </li>

                <li class="click-up-workflow-list">Under this status, all new cards (issues) will be assigned to the
                    concerned person who will review and update the status accordingly.
                </li>

                <li class="click-up-workflow-list">The concerned person will verify that the task has proper
                    <ol class="roman-list">
                        <li>Background</li>
                        <li>Requirement</li>
                        <li>Acceptance Criteria (Definition of Done)</li>
                    </ol>
                </li>
                <li class="click-up-workflow-list">Whenever a Bug/Enhancement card is created, it should be added as a
                    dependency to its existing card.
                </li>
                <li class="click-up-workflow-list">A review is required by IT Team:
                    <ul>
                        <li>Perform analysis, research, and discussions.</li>
                    </ul>
                </li>
            </ul>


            <h3><span class="status-heading">To Do</span></h3>
            <ul id="click-up-workflow">
                <li class="click-up-workflow-list">Once the status of the card (issue) is changed to “TODO“, this means
                    the same card can be included in the sprint and can be assigned to a developer.</li>
                <li class="click-up-workflow-list">All cards in “ TO DO “ will be assigned to developers during weekly
                    sprint planning.</li>
                <li class="click-up-workflow-list">Whenever a card is assigned to a developer with a “TODO“ status,
                    assigning person must add “Time estimation“ to evaluate the timeline</li>
            </ul>



            <h3><span class="status-heading">In Progress</span></h3>
            <ul id="click-up-workflow">
                <li class="click-up-workflow-list">This status indicates the developer is working on the card (issue).
                </li>
                <li class="click-up-workflow-list">Once developers will start working on the “TODO“ card, they must
                    change the status to “INPROGRESS“ add a “Due Date” to that card.</li>
            </ul>



            <h3><span class="status-heading">Code Review</span></h3>
            <ul id="click-up-workflow">
                <li class="click-up-workflow-list">The purpose of this status is to maintain the quality of code by
                    engaging another developer to review the code.</li>
                <li class="click-up-workflow-list">Once a developer has completed the coding part of “In Progress“
                    cards, they can update the status to “Code Review“.</li>
                <ul>
                    <li class="click-up-workflow-list">Developer should remove the “Due Date” from the card before
                        moving the card to “Code Review” status.</li>
                </ul>
                <li class="click-up-workflow-list">Then the same card will be assigned to a new developer for “Code
                    Review”.</li>
                <li class="click-up-workflow-list">On completion, the new developer will update the status to
                    “Integration Testing“ and will assign the card to the QA person for manual QA.</li>
                <ul>
                    <li class="click-up-workflow-list">If the “Code Review” person finds some issue in the code, he/she
                        will move the card back to the “To Do” section with a label “Code Review Rejected”.</li>
                </ul>
            </ul>



            <h3><span class="status-heading">Integration Testing</span></h3>
            <ul id="click-up-workflow">
                <li class="click-up-workflow-list">The purpose of this status is to ensure quality during the
                    development phase.</li>
                <li class="click-up-workflow-list">The QA person will apply all related use cases on the live link and
                    will remove bugs if found, so QA Team should not spend much time on “Staging UAT“ status.</li>
                <ul>
                    <li class="click-up-workflow-list">Once a QA person will find a bug, he/she will add the bugs in a
                        comment and will move the ticket back to the “To Do” section with the “QA Rejected” label.</li>
                </ul>
                <li class="click-up-workflow-list">QA person will add his/her “Due Date” to QA this card.</li>
            </ul>




            <h3><span class="status-heading">Done</span></h3>
            <ul id="click-up-workflow">
                <li class="click-up-workflow-list">Once “Integration Testing“ for a card is done, the developer will
                    change the status to “Done“.</li>
                <li class="click-up-workflow-list">On closing the sprint all cards with “Done” status will be removed
                    from the current sprint and all other pending (“To Do”, “In progress“, etc.) cards will be bumped to
                    the newsprint or backlog.</li>
            </ul>


            <h3><span class="status-heading">Staging UAT</span></h3>
            <ul id="click-up-workflow">
                <li class="click-up-workflow-list">Once a card is in Staging UAT, then it should be assigned to someone
                    from the IT team to perform the UAT.</li>
                <li class="click-up-workflow-list">IT team members will add “Due Date” for Staging UAT for the assigned
                    task.</li>
                <li class="click-up-workflow-list">While doing Staging UAT, if the UAT person finds any bug, he will
                    add
                    a comment containing the issues found and move this card back to “To Do”.</li>
                <li class="click-up-workflow-list">The purpose of this status is to do the manual User Acceptance
                    Testing on the staging environment.</li>
                <li class="click-up-workflow-list">UAT person will remove the Due Date from the card before changing
                    its
                    status to “Ready to Merge”.</li>
            </ul>



            <h3><span class="status-heading"> Ready To Merge</span></h3>
            <ul id="click-up-workflow">
                <li class="click-up-workflow-list">Once all the use cases are applied and all related/linked bugs (if
                    any) are resolved, UAT person can change the status from “Staging UAT” to “Ready to Merge”</li>
                <li class="click-up-workflow-list">This status indicates that cards can be merged into the production
                    environment.</li>
                <li class="click-up-workflow-list">Someone from the IT team will add the deployment label to the card
                    for the preferable deployment day.</li>
            </ul>



            <h3><span class="status-heading">Deployment/Prod UAT</span></h3>
            <ul id="click-up-workflow">
                <li class="click-up-workflow-list">Once a card is deployed on production and is ready for the
                    Production UAT, “Deployed/Prod UAT” status will be updated.</li>
                <li class="click-up-workflow-list">Once a ticket is deployed it should be smoke tested / verified
                    within a couple of days of deployment and then moved to “Completed”.</li>
                <li class="click-up-workflow-list">If Bugs are found during “Production UAT”, UAT person will create
                    new bugs in Backlog with the “Review” status, if the bug can be catered standalone. Otherwise UAT
                    person will inform Sahil to roll the change back and move the card back to “To Do” with “UAT
                    Rejected” label.</li>
                <li class="click-up-workflow-list">QA person will not change the status of “Production UAT” task unless
                    all linked bugs are resolved.</li>
            </ul>



            <h3><span class="status-heading">Completed</span></h3>
            <ul id="click-up-workflow">
                <li class="click-up-workflow-list">Once all the testing is done on Production level and all related
                    bugs are resolved, card status will be changed to “Completed”.</li>
                <li class="click-up-workflow-list">On closing the sprint all cards with “Completed” status will not be
                    bumped to the next sprint.</li>
            </ul>



            <h3><span class="status-heading">Back Burner</span></h3>
            <ul id="click-up-workflow">
                <li class="click-up-workflow-list">If an “Urgent Task or Production Bug Task” comes under priority,
                    then the ongoing card(issue) is moved from “In Progress” to “Back Burner”.
                </li>
                <li class="click-up-workflow-list">This status indicates the developer was working on the card (issue)
                    and moved it from “In Progress”.</li>
                <li class="click-up-workflow-list">A Card can also be moved to “Back Burner” from “In Progress”, if the
                    developer faces some conflicts and it’s required some time by the IT team to answer.</li>
            </ul>
        </section>
    </main>



    <!-- {/* Footer */} -->
    @include('layouts.footer')
</body>

</html>

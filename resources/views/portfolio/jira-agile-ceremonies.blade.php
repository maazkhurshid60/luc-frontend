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
            <p>Agile Ceremonies</p>
        </div>
    </div>


    <header>
        <h2 class="portfolio-tool-heading">Jira</h2>
    </header>

    <main>
        <div class="wrapper">
            <section class="intro-section jira">
                <div class="intro-content">
                    <h2 class="section-heading">Agile Ceremonies</h2>
                    <p class="section-content">In Jira, Agile events, are regular meetings or gatherings held within
                        Agile methodologies to facilitate collaboration, communication, and alignment among team
                        members.</p>
                    <img src="{{ asset('assets/img/jira/agile-ceremonies.webp') }}"
                        alt="agile ceremonies image on laptop screen" class="section-image" id="image-mobile">
                </div>
                <figure class="tool-image">
                    <img src="{{ asset('assets/img/jira/agile-ceremonies.webp') }}"
                        alt="agile ceremonies image on laptop screen" class="section-image" id="image-desktop">
                </figure>
            </section>


            <section class="sprint-planning-section ">
                <h2 class="main-heading">Sprint Planning</h2>
                <div class="sprint-container">
                    <img src="{{ asset('assets/img/jira/sprint-planning.webp') }}" alt="an image about sprint planning"
                        class="sprint-logo-image">

                    <div class="sprint-steps-container">
                        <div class="sprint-planning-step">
                            <h3>Review Backlog</h3>
                            <p>The Product Owner presents the top items from the product backlog</p>
                        </div>

                        <div class="sprint-planning-step">
                            <h3>Sprint Goal Discussion</h3>
                            <p>Helps guide the team's focus and decision-making during the sprint.</p>
                        </div>

                        <div class="sprint-planning-step">
                            <h3>Definition of Done</h3>
                            <p>The team discusses and reaffirms the Definition of Done, which outlines the criteria that
                                must be met for a user story. </p>
                        </div>

                        <div class="sprint-planning-step">
                            <h3>Task Assignment</h3>
                            <p>The team members assign themselves to the tasks they will work on during the sprint.</p>
                        </div>

                        <div class="sprint-planning-step">
                            <h3>Estimations</h3>
                            <p>The development team estimates the eort or complexity of the user stories or features
                                using techniques such as planning poker or relative sizing</p>
                        </div>
                    </div>

                </div>
            </section>
        </div>




        <section class="daily-standup-section ">
            <div class="text-container wrapper">
                <h2>Daily Stand-up</h2>
                <p>Daily Stand-up serves as a forum for the development team members to provide updates on their
                    progress, coordinate their efforts, and identify any obstacles.
                </p>
            </div>

            <div class="wrapper">
                <img src="{{ asset('assets/img/jira/scrum-banner.webp') }}"
                    alt="image showcasing scrum roles and details" class="scrum-detail-image">
            </div>

            <div class="scrum-detail-container wrapper">
                <div class="scrum-detail">
                    <h3>Scrum Master's Role</h3>
                    <p>The Scrum Master ensures that the meeting stays focused, encourages active
                        participation from all team members.
                    </p>
                </div>

                <div class="scrum-detail">
                    <h3>Duration</h3>
                    <p>It is typically kept short, often lasting around 15 minutes, to ensure it remains focused and
                        efficient.
                    </p>
                </div>

                <div class="scrum-detail">
                    <h3>Time</h3>
                    <p>The Daily Stand-up is a time-boxed meeting that is typically held at the same time and place
                        every day.</p>
                </div>
            </div>

        </section>


        <div class="wrapper">
            <section class="questions-section">
                <div class="section-heading">
                    <h2>Each Team Member Provides an Update</h2>
                    <p>In a round-robin fashion, each team member answers
                        three main questions</p>
                </div>

                <div class="sub-container">
                    <figure>
                        <img src="{{ asset('assets/img/jira/questions-list.webp') }}"
                            alt="image containing 3 questions about the scrum" class="scrum-question-image">
                    </figure>

                    <div class="question-container">
                        <div class="questions">
                            <h3>What did I accomplish yesterday?</h3>
                            <p>Each team member shares the tasks or work items they completed since the
                                last Daily Stand up</p>
                        </div>
                        <div class="questions">
                            <h3>What am I planning to do today?</h3>
                            <p>Team members discuss the tasks or work items they intend to work on
                                during the current day.</p>
                        </div>
                        <div class="questions">
                            <h3>Is there any impediment?</h3>
                            <p>Team members discuss any challenges they are facing that may hinder their progress or
                                require assistance from the team to overcome.</p>
                        </div>
                    </div>



                </div>

            </section>
        </div>



        <section class="retrospective-section ">
            <div class="heading wrapper">
                <h2>Retrospective</h2>
                <p>The Retrospective Meeting, also known as the Sprint Retrospective, is a regular Agile ceremony
                    conducted at the end of each sprint. Its purpose is to reflect on the completed sprint, identify
                    areas of improvement, and define action items to enhance the team's effectiveness and efficiency.
                </p>
            </div>
            <figure class="wrapper">
                <img src="{{ asset('assets/img/jira/retrospective.webp') }}"
                    alt="retrospective meeting details image" class="retrospective-process-image">
            </figure>

        </section>

    </main>

    <!-- {/* Footer */} -->
    @include('layouts.footer')

</body>

</html>

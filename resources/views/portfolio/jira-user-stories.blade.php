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
            <p>User Stories</p>
        </div>
    </div>


    <header>
        <h2 class="portfolio-tool-heading">Jira</h2>
    </header>

    <main>

        <section class="intro-section jira wrapper">
            <div class="intro-content">
                <h2 class="section-heading">User Stories</h2>
                <p class="section-content">Represents a requirement expressed from the perspective of the user.</p>
                <img src="{{ asset('assets/img/jira/user-stories.webp') }}"
                    alt="image about agile user story best practices" class="section-image" id="image-mobile">
            </div>
            <figure class="tool-image">
                <img src="{{ asset('assets/img/jira/user-stories.webp') }}"
                    alt="image about agile user story best practices" class="section-image" id="image-desktop">
            </figure>
        </section>


        <section class="user-story-section wrapper">
            <h2 class="main-heading">Description</h2>
            <div class="user-story-section-container">

                <img src="{{ asset('assets/img/jira/user-story-roles.webp') }}" alt="user story roles"
                    class="user-roles-image">


                <div class="description-container">
                    <div class="description">
                        <h3>As a [role],</h3>
                        <p class="description-head">Role</p>
                        <p>Identify the role or persona of the user who will benefit from the story. This could be a
                            specific user, a user group, or even a system.
                        </p>
                    </div>
                    <div class="description">
                        <h3>I want [goal/desire],</h3>
                        <p class="description-head">Goal/Desire</p>
                        <p>Describe what the user wants to achieve or the specific functionality they
                            require. Focus on the user's needs and avoid technical implementation details.
                        </p>
                    </div>
                    <div class="description">
                        <h3>so that [benefit/value].</h3>
                        <p class="description-head">Benefit/Value</p>
                        <p>Explain the value or benefit that the user will gain from the
                            implementation of the story. This helps to provide context and prioritize the user story.
                        </p>
                    </div>
                </div>



            </div>
        </section>


        <div class="acceptence-criteria-wrapper">
            <section class="acceptence-criteria-section wrapper">
                <div class="section-intro">
                    <h3>Acceptance Criteria</h3>
                    <p>Specific conditions that must be met for a user story to be considered complete and implemented
                        successfully.</p>
                </div>
                <div class="acceptence-criteria-container">
                    <img src="{{ asset('assets/img/jira/acceptence-criteria.webp') }}"
                        alt="image explaining accetence criteria">
                    <div>
                        <div class="description">
                            <h3>Given that [some context],</h3>
                            <p>Use the given keyword to describe the context for a business behavior. For
                                instance: “I am a Visa Classic Cardholder"</p>
                        </div>
                        <div class="description">
                            <h3>when [some action is carried out],</h3>
                            <p>Describes the action required in order to produce the output,
                                i.e. “I pay with my Visa Classic”</p>
                        </div>
                        <div class="description">
                            <h3>then [a set of observable outcomes should occur].</h3>
                            <p>Describes the expected output, i.e. “My Visa is accepted”</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <section class="user-stories-cs wrapper">
            <div class="section-intro">
                <h3>3C's Of Effective User Stories</h3>
                <p>In a round-robin fashion, each team member answers three main questions</p>
            </div>
            <img src="{{ asset('assets/img/jira/user-stroy-3cs.webp') }}"
                alt="image explaining three C's of effective user story" class="three-cs-image">

            <div class="effective-communication-description">
                <div>
                    <h3>Card</h3>
                    <p>A user story is written on a card, typically an index card. This helps to keep the
                        story concise.</p>
                </div>

                <div>
                    <h3>Conversation</h3>
                    <p>This conversation helps to clarify the requirements of the
                        story and to identify any potential risks or challenges. </p>
                </div>

                <div>
                    <h3>Confirmation</h3>
                    <p>Once the conversation is complete, the story is confirmed. This confirmation can be done by the
                        team lead. </p>
                </div>
            </div>
        </section>



    </main>

    <!-- {/* Footer */} -->
    @include('layouts.footer')

</body>

</html>

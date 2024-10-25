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
            <h5>Risk Management</h5>
        </div>
    </div>


    <header>
        <h1 class="portfolio-tool-heading">Jira</h1>
    </header>

    <main>
        <div class="wrapper">
            <section class="intro-section jira ">
                <div class="intro-content">
                    <h2 class="section-heading">Risk Management</h2>
                    <p class="section-content">There are a number of ways to manage risk in Jira.Risk management is
                        important because it helps to ensure that projects are completed on time, within budget, and to
                        the required quality standards.</p>
                    <img src="{{ asset('assets/img/jira/risk-management.webp') }}" alt="" class="section-image"
                        id="image-mobile">
                </div>
                <figure class="tool-image">
                    <img src="{{ asset('assets/img/jira/risk-management.webp') }}" alt="" class="section-image"
                        id="image-desktop">
                </figure>
            </section>


            <section class="risk-management-main ">
                <h3 class="main-heading">Risk Management</h3>
                <img src="{{ asset('assets/img/jira/risk-management-process.webp') }}"
                    alt="risk management process image" class="risk-management-steps" />
            </section>
        </div>

        <div class="risk-type-wrapper">
            <section class="risk-type-section wrapper">
                <h3>Risk Issue types</h3>
                <div class="risk-types-container">
                    <div>
                        <div class="risk-type">
                            <h4>Issue Types</h4>
                            <p>Create specific issue types for risks, such as "Risk" or "Risk Event." This allows you to
                                distinguish risks from other types of issues and track them separately</p>
                        </div>

                        <div class="risk-type">
                            <h4>Custom Fields</h4>
                            <p>Define custom fields to capture relevant risk information, such as probability, impact,
                                mitigation strategies, and risk owners. These fields can be added to the risk issue type
                                to provide a comprehensive view of each risk</p>
                        </div>

                        <div class="risk-type">
                            <h4>Workflows</h4>
                            <p>Design workflows that include risk-related statuses, such as "Identified,"
                                "Assessed,"Mitigated," and "Closed."</p>
                        </div>
                    </div>
                    <img src="{{ asset('assets/img/jira/risk-types.webp') }}"
                        alt="image explaining issues related to risk types" class="risk-type-image">
                </div>
            </section>

        </div>



        <section class="risk-issue-template wrapper">
            <h3>Risk Issue template</h3>
            <img src="{{ asset('assets/img/jira/issue-template-screenshot.webp') }}"
                alt="risk issue template screen shot" class="issue-template-screenshot">
            <div class="risk-issue-container">
                <div class="template-details">
                    <h4>Description</h4>
                    <p>The description field should provide a
                        clear and concise summary of the
                        identified risk. It should include
                        relevant details such as the nature of
                        the risk, its potential impact on the
                        project, and any specific
                        circumstances or factors contributing
                        to the risk</p>
                </div>

                <div class="template-details">
                    <h4>I/R/D Resolution</h4>
                    <p>Outline the impact, level of risk, and
                        any dependencies associated with
                        the identified risk. Specify the severity
                        or likelihood of the risk and describe
                        its potential consequences on project
                        objectives, timelines, resources, or
                        deliverables.</p>
                </div>

                <div class="template-details">
                    <h4>Progress is Blocked Comments</h4>
                    <p>Comments to track updates, discussions, and actions related to
                        the risk. Team members, stakeholders, and risk owners can
                        provide regular updates, share insights, propose mitigation
                        strategies, or discuss progress in
                        resolving the risk.</p>
                </div>
            </div>
        </section>

    </main>

    <!-- {/* Footer */} -->
    @include('layouts.footer')

</body>

</html>

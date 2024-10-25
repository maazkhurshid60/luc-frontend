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
        <div class="bread-crumbs-links"><a href="/">Home</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <a href="/portfolio">Portfolio</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <p>{{ $data['page']->name }}</p>
        </div>
    </div>

    <header>
        <p class="portfolio-tool-heading">The Balancer</p>
    </header>

    <main class="wrapper">
        <section class="intro-section balancer ">
            <div class="intro-content">
                <h2 class="section-heading">Project Overview</h2>
                <p class="section-content">"The Balancer" is a mobile application designed to help users manage their
                    daily tasks and maintain a healthy work-life balance. With its user-friendly interface, users can
                    easily schedule their tasks, prioritize them, and receive timely reminders so they never miss a
                    deadline. The Balancer is not a scheduling app, it keeps track of user activities and generates
                    annual, monthly and weekly report charts based on their performance.</p>
                <div>
                    <img src="{{ asset('assets/img/portfolio/balancer/balancer-image.webp') }}"
                        alt="image of balancer app on laptop" class="section-image" id="image-mobile">
                    <div class="center-wrapper-mobile">
                        <p class="platform-availability">Available on both Google Play and App Store </p>
                        <div class="icon">
                            <img src="{{ asset('assets/img/portfolio/balancer/app-store-icon.svg') }}"
                                alt="apple app store icon">
                            <img src="{{ asset('assets/img/portfolio/balancer/google-play-icon.svg') }}"
                                alt="google play store icon">
                        </div>
                    </div>
                    <div class="link-wrapper"> <a href="{{ $data['page']->link }}" class="section-link-balancer">Visit
                            Website</a></div>
                </div>



                <div class="center-wrapper">
                    <p class="platform-availability">Available on both Google Play and App Store </p>
                    <div class="icon">
                        <img src="{{ asset('assets/img/portfolio/balancer/app-store-icon.svg') }}"
                            alt="apple app store icon">
                        <img src="{{ asset('assets/img/portfolio/balancer/google-play-icon.svg') }}"
                            alt="google play store icon">
                    </div>
                </div>



            </div>

            <figure class="tool-image">
                <img src="{{ asset('assets/img/portfolio/balancer/balancer-image.webp') }}"
                    alt="image of balancer app on laptop" class="section-image" id="image-desktop">
            </figure>
        </section>

        <section class="balancer-app-challenges ">
            <h2 class="heading">Challenge</h2>
            <p class="challenges-detail">Building the complex SaaS System just based on the Firebase backend was a
                challenge in this project. The project has 3 user roles with a matrix of permissions which wasn't easy
                to implement with the Firebase Functions. Groovy took the challenge and delivered a high-quality
                product.</p>
        </section>

        <section class="core-features ">
            <p class="sub-heading">Core Features</p>
            <h2 class="heading">Enhancing App Experience</h2>

            <div class="core-features-description">
                <div class="feature-container">
                    <div class="feature-heading">
                        <img src="{{ asset('assets/img/portfolio/balancer/icon-Scan-Business.svg') }}" alt="icon">
                        <h3>Scan Business</h3>
                    </div>
                    <p class="feature-detail">For booking any services you need to first scan the business or enter the
                        business code it will simply take you to the business & you can make the bookings.
                    </p>
                </div>

                <div class="feature-container">
                    <div class="feature-heading">
                        <img src="{{ asset('assets/img/portfolio/balancer/icon-Upcoming-Appointments.svg') }}"
                            alt="icon">
                        <h3>Upcoming Appointments</h3>
                    </div>
                    <p class="feature-detail">You will receive the notifications for the upcoming booking & you will
                        receive your last notification before 2 hour when service gets started.
                    </p>
                </div>

                <div class="feature-container">
                    <div class="feature-heading">
                        <img src="{{ asset('assets/img/portfolio/balancer/icon-Import-Export.svg') }}"
                            alt="icon">
                        <h3>Import and Export</h3>
                    </div>
                    <p class="feature-detail">You can keep the backup of you scanned business or incase you want to
                        share the business with other you can simply import and export files within a minute.
                    </p>
                </div>

                <div class="feature-container">
                    <div class="feature-heading">
                        <img src="{{ asset('assets/img/portfolio/balancer/icon-Professional-Profile.svg') }}"
                            alt="icon">
                        <h3>Professional Profile Building</h3>
                    </div>
                    <p class="feature-detail">
                        This holds the basic information about the professional like First and last name, Job title,
                        Email, Other name, upload profile photo and can select the his or her services.
                    </p>
                </div>
            </div>
        </section>


        <section class="other-features-section ">
            <h2 class="main-heading">Other Features</h2>
            <div class="feature-container wrapper">
                <div class="feature-detail-container">
                    <h3 class="feature-heading">Signup</h3>
                    <p class="feature-detail">You can simply sign up by using your phone number &
                        enter OTP except that no other special kind of
                        verification is needed.</p>
                </div>
                <div class="feature-detail-container">
                    <h3 class="feature-heading">Login</h3>
                    <p class="feature-detail">It’s working simply write down your register phone
                        number & enter the OTP</p>
                </div>
                <div class="feature-detail-container">
                    <h3 class="feature-heading">Reschedule Booking</h3>
                    <p class="feature-detail">User can reschedule the time slot again it will ask the
                        above steps you just need to reschedule the
                        service/branch/professional/ date time slot/ address/
                        user message.</p>
                </div>
                <div class="feature-detail-container">
                    <h3 class="feature-heading">Cancel Appointment</h3>
                    <p class="feature-detail">You can cancel the appointment by simply clicking on
                        cancel booking button. Note: You can cancel the
                        booking upto limited time only after that you will get
                        blocked for a month if you cancel the booking multiple
                        times.</p>
                </div>
                <div class="feature-detail-container">
                    <h3 class="feature-heading">Accept Booking</h3>
                    <p class="feature-detail">This feature allows the professional to accept the user
                        booking</p>
                </div>
                <div class="feature-detail-container">
                    <h3 class="feature-heading">Reject Booking</h3>
                    <p class="feature-detail">This Feature allows professionals to reject the booking.</p>
                </div>
            </div>
        </section>

        <section class="similar-idea-consultation ">
            <h2 class="heading">Looking For Something Similar?</h2>
            <p class="details">If you have a similar idea in mind, click the button below. Our Tech Lead, with 12+
                years of experience, will be in a call with you to understand and validate your idea. You'll receive a
                quote within 24 working hours. :)</p>
            <button class="consultation-button">Get Free Consultation</button>
        </section>


        <section class=" balancer-app-visuals">
            <p class="section-heading">Project Visuals</p>
            <h2 class="section-main-heading">The Balancer App</h2>
            <div class="balancer-app-images">
                <img src="{{ asset('assets/img/portfolio/balancer/balancer-app-visual-1.webp') }}"
                    alt="screenshot of balancer app">
                <img src="{{ asset('assets/img/portfolio/balancer/balancer-app-visual-2.webp') }}"
                    alt="screenshot of balancer app">
                <img src="{{ asset('assets/img/portfolio/balancer/balancer-app-visual-3.webp') }}"
                    alt="screenshot of balancer app">
                <img src="{{ asset('assets/img/portfolio/balancer/balancer-app-visual-4.webp') }}"
                    alt="screenshot of balancer app">
                <img src="{{ asset('assets/img/portfolio/balancer/balancer-app-visual-5.webp') }}"
                    alt="screenshot of balancer app">
                <img src="{{ asset('assets/img/portfolio/balancer/balancer-app-visual-6.webp') }}"
                    alt="screenshot of balancer app">
                <img src="{{ asset('assets/img/portfolio/balancer/balancer-app-visual-7.webp') }}"
                    alt="screenshot of balancer app">

            </div>

        </section>
    </main>




    <!-- {/* Footer */} -->
    @include('layouts.footer')


</body>

</html>

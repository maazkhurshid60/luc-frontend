<!DOCTYPE html>
<html lang="en">
@php $settings = DB::table('settings')->find(1); @endphp

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Canonical SEO -->
    <link rel="canonical" href="{{ request()->url() }}/">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/redstar-icon.png') }}">

    <!-- Page Title -->
    <title>@yield('title') | {{ $settings->siteName ?? env('APP_NAME') }}</title>

    <!-- Meta Data -->
    <meta name="keywords" content="@yield('meta-keywords')" />
    <meta name="description" content="@yield('meta-description')">

    <!-- Meta Tags -->
    <meta name="robots" content="@yield('robots')">

    <!-- General OG Card -->
    <meta property="og:title" content="@yield('og-tile')" />
    <meta property="og:description" content="@yield('og-description')" />
    <meta property="og:image" content="@yield('og-image')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="@yield('og-type')" />
    <meta property="og:site_name" content="{{ $settings->siteName ?? env('APP_NAME') }}" />

    <!-- Og Card for TWITTER -->
    {{-- <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter-title')">
    <meta name="twitter:description" content="@yield('twitter-description')">
    <meta name="twitter:image" content="@yield('twitter-image')"> --}}

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/fontawesome-free-6.6.0-web/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/slick/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/mainstyle.css') }}" />
    <link rel="icon" href="{{ asset('assets/frontend/icons/afcon-group-logo.svg') }}">

    @yield('custom-styles')
</head>

<body id="content" class="fade-in">

    @include('layouts.navbar')

    @yield('content')
    <!-- ///////////////////////// Footer Section ///////////////////////// -->
    <footer>
        <div class="container-fluid afcon--footer myt-40">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="footer-logo text-center pyb-40">
                        <a href="{{url('/')}}">
                            <img src="{{ asset($settings->logo ? 'storage/images/' . $settings->logo : 'assets/frontend/icons/afcon-group-logo.svg') }}"
                                alt="" class="pyb-60" />
                        </a>

                        <p class="head--2 wht--clr mb-0">{{ __('lang.SUBSCRIBE_TO_OUR_NEWSLETTER') }}</p>
                    </div>
                    <div class="footer--searchbar text-center d-flex justify-content-center pyb-60">
                        <form class="d-flex flex-md-row justify-content-center flex-column gap-3" role="search">
                            <input class="form-control me-4 newsletter-search w-md-0 w-100 " type="search"
                                placeholder="{{ __('lang.ENTER_YOUR_EMAIL') }}" aria-label="Search" />
                            <button class="primary-btn wht--clr m-auto" type="submit">
                                {{ __('lang.subscribe') }}<img src="{{ asset('assets/frontend/icons/arrow1.svg') }}"
                                    alt="" class="ms-2" />
                            </button>
                        </form>
                    </div>

                    <div class="row flex-md-row flex-column">
                        <div class="footer-quicklinks d-flex justify-content-md-start justify-content-center mb-4">
                            <ul
                                class="navbar-nav d-flex flex-row justify-content-start justify-content-start footer-quick-links gap-lg-4 gap-md-3 gap-0">
                                <li class="nav-item">
                                    <a href="{{ Route('contact-us.index') }}"
                                        class="nav-link text-decoration-none wht--clr body-txt2">{{ __('lang.CONTACT_US') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/terms-of-services') }}"
                                        class="nav-link text-decoration-none wht--clr body-txt2">{{ __('lang.TERM_OF_SERVICES') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/privacy-policy') }}"
                                        class="nav-link text-decoration-none wht--clr body-txt2">{{ __('lang.PRIVACY_POLICY') }}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="footer-socail-links d-flex justify-content-evenly align-items-center mb-4">
                            <a href="{{ $settings->fb }}">
                                <div class="socail-links d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/frontend/icons/fb-icon.svg') }}" alt="">
                                </div>
                            </a>
                            <a href="{{ $settings->twitter }}">
                                <div class="socail-links d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/frontend/icons/twitter-x-icon.svg') }}" alt="">
                                </div>
                            </a>
                            <a href="{{ $settings->linkedin }}">
                                <div class="socail-links d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/frontend/icons/linkedin-icon.svg') }}" alt="">
                                </div>
                            </a>
                            <a href="{{ $settings->instagram }}">
                                <div class="socail-links d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/frontend/icons/insta-icon.svg') }}" alt="">
                                </div>
                            </a>
                        </div>

                        <div
                            class="footer-copyright d-flex justify-content-md-end justify-content-center align-items-center mb-4">
                            <p class="body-txt2 wht--clr mb-0">
                                &copy; {{ date('Y') }} {{ $settings->siteName ?? env('APP_NAME') }} -
                                {{ __('lang.ALL_RIGHTS_RESERVED') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="scrollToTopBtn">
        <i class="fa-solid fa-arrow-up"></i>
    </div>
    <!-- ///////////////////////// Footer Section Ends ///////////////////////// -->

    <!-- Scripts -->
    <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    @yield('custom-js')
    @if (request()->routeIs('index') && $isNewUser && $activeAnnouncement)
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Check if the "visited_before" cookie is already set in JavaScript
                if (!document.cookie.split('; ').find(row => row.startsWith('visited_before='))) {
                    // Show the modal
                    $('#new-project').modal('show');

                    // Set the cookie to mark the user as visited, with a 24-hour expiry
                    const expiryDate = new Date();
                    expiryDate.setTime(expiryDate.getTime() + (24 * 60 * 60 * 1000)); // 24 hours
                    document.cookie = `visited_before=true; path=/; expires=${expiryDate.toUTCString()}`;
                }

                // Timer Code
                const targetDate = new Date("{{ $activeAnnouncement->end_date }}"); // Dynamic end date from backend

                function updateTimer() {
                    const now = new Date();
                    const timeDiff = targetDate - now;

                    if (timeDiff <= 0) {
                        // Stop the timer if the target date has passed
                        clearInterval(timerInterval);
                        document.querySelectorAll('.time-num').forEach(el => el.textContent = '0');
                        return;
                    }

                    // Calculate hours, minutes, and seconds
                    const hours = Math.floor(timeDiff / (1000 * 60 * 60));
                    const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

                    // Update the timer display
                    const digits = document.querySelectorAll('.time-num');
                    if (digits.length >= 6) {
                        digits[0].textContent = Math.floor(hours / 10); // Tens place of hours
                        digits[1].textContent = hours % 10; // Ones place of hours
                        digits[2].textContent = Math.floor(minutes / 10); // Tens place of minutes
                        digits[3].textContent = minutes % 10; // Ones place of minutes
                        digits[4].textContent = Math.floor(seconds / 10); // Tens place of seconds
                        digits[5].textContent = seconds % 10; // Ones place of seconds
                    }
                }

                // Initialize the timer
                updateTimer();
                const timerInterval = setInterval(updateTimer, 1000);
            });

            // Function to close the modal (optional functionality)
            function closeModal() {
                $('#new-project').modal('hide');
            }
        </script>
    @endif
    <script>
        function setLanguage(lang) {
            localStorage.setItem('lang', lang);

            const flagImg = document.getElementById('current-lang-flag');
            const langText = document.getElementById('current-lang-text');

            if (lang === 'fr') {
                flagImg.src = '{{ asset('assets/frontend/icons/french-flag.svg') }}';
                langText.innerText = 'French';
            } else {
                flagImg.src = '{{ asset('assets/frontend/icons/english-flag.svg') }}';
                langText.innerText = 'English';
            }

            window.location.reload();
        }

        let currentLang = localStorage.getItem('lang') || 'en';

        document.addEventListener('DOMContentLoaded', function() {
            const flagImg = document.getElementById('current-lang-flag');
            const langText = document.getElementById('current-lang-text');

            if (currentLang === 'fr') {
                flagImg.src = '{{ asset('assets/frontend/icons/french-flag.svg') }}';
                langText.innerText = 'French';
            } else {
                flagImg.src = '{{ asset('assets/frontend/icons/english-flag.svg') }}';
                langText.innerText = 'English';
            }

            const links = document.querySelectorAll('a');
            links.forEach(link => {
                let url = new URL(link.href);
                if (!url.origin === window.location.origin) return;

                if (!url.searchParams.has('lang')) {
                    url.searchParams.set('lang', currentLang);
                    link.href = url.toString();
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            // Select all the <li> elements inside .hero-sec-text ul
            const listItems = document.querySelectorAll(".hero-sec-text ul li");

            // Loop through each <li> and prepend an image with the desired class
            listItems.forEach(li => {
                const img = document.createElement("img");
                img.src = "{{asset('assets/frontend/icons/cube-icon.svg')}}"; // Replace with the actual image path
                img.alt = "Icon"; // Optional: Add alternative text
                img.classList.add("me-4"); // Add the 'me-4' class to the image
                li.prepend(img);
            });
        });
    </script>
</body>

</html>

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
        <title>{{ $settings->siteName }}</title>
    @else
        <title>{{ $data['page']->page_title }}</title>
    @endif
    <link rel="canonical" href="{{ request()->url() }}">
    <link rel="icon" href="{{ asset('assets/img/redstar-icon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <meta property="og:title" content="{{ $data['page']->og_title }}" />
    <meta property="og:description" content="{{ $data['page']->og_description ?? '' }}" />
    <meta property="og:image" content="{{ asset('storage/images/' . $data['page']->og_image) }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="{{ $data['page']->og_type ?? '' }}" />
    <meta property="og:site_name" content="{{ $data['settings']->siteName }}" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $data['page']->og_title ?? '' }}">
    <meta name="twitter:description" content="{{ $data['page']->og_description ?? '' }}">
    <meta name="twitter:image" content="{{ asset('storage/images/' . $data['page']->og_image) }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
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
    <div class="hero-privacy-policy">
        <section class="hero__section wrapper">
            <div class="hero__container ">
                <div class="hero__image"></div>
                <div class="hero-text">
                    <h2>Privacy Policy</h2>
                </div>
            </div>
        </section>
    </div>

    <!-- {/* Bread Crumbs */} -->
    <div class="bread-crumbs-container wrapper">
        <div class="bread-crumbs-links">
            <a href="/">Home</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <h5>Privacy Policy</h5>
        </div>
    </div>

    <main>
        <section class="privacy-policy-section wrapper">
            <div class="service-description">
                <h1 class="main-heading">Privacy Policy</h1>
                <p>Red Star Technologies ("us", "we", or "our") operates <a
                        href="http://redstartechs.com/">http://redstartechs.com/</a> website (the "Service").</p>
                <p class="privacy-policy-intro">With the help of your data, we provide and improve the Service. You
                    agree to the collection and use of information following this policy by using this service. Terms
                    used in privacy policy have a similar meaning as in our terms and conditions.</p>
            </div>

            <div class="information-collection container">
                <p>Information Collection And Use</p>
                <p>To provide and improve our Service to you we collect various types of information for various
                    purposes.</p>
                <p class="sub-heading">Types of Data Collected</p>
                {{-- <ol class="data-types "> --}}
                {{-- <li class="container data-type-1"> --}}
                <h4 class="data-type">Personal Data</h4>
                <p>When you are using our service, we may ask you to give us certain personally identifiable information
                    that can help us to contact or identify you ("Personal Data"). Personally, identifiable information
                    may consist of:</p>
                <ul>
                    <li>Email address</li>
                    <li>First name and last name</li>
                    <li>Phone number</li>
                    <li>Address, State, Province, ZIP/Postal code, City</li>
                    <li>Cookies and Usage Data</li>
                </ul>
                {{-- </li> --}}
                {{-- <li class="container data-type-2"> --}}
                <h4 class="data-type">Usage Data</h4>
                <p>How the Service is accessed and used, we may also collect information. This Usage Data may contain
                    information such as Internet Protocol address (e.g. IP address), browser type, browser version, the
                    pages of our Service that you visit, the date and time of your visit, the time which you spent on
                    those pages, unique device identifiers and other diagnostic data.</p>
                {{-- </li> --}}
                {{-- <li class="container data-type-3"> --}}
                <h4 class="data-type ">Tracking & Cookies Data</h4>
                <p>We use cookies and similar tracking technologies to follow the action on our Service and hold certain
                    data. Cookies may include an anonymous unique identifier and obtain files with a limited amount of
                    data. Cookies are stored on your device and sent to your browser from a website. You may not be able
                    to use some portions of our Service if you do not accept cookies.</p>
                <p>Examples of Cookies we use:</p>
                <ul>
                    <li>Session Cookies: These are utilized to operate our Service.</li>
                    <li>Preference Cookies: We use these Cookies to constantly remember your preferences.</li>
                    <li>Security Cookies: These cookies are used for security matters.</li>
                </ul>
                {{-- </li> --}}
                {{-- </ol> --}}
            </div>

            <div class="use-of-data container">
                <h3>Use of Data</h3>
                <p>Red Star Technologies utilizes the collected data for various purposes:</p>
                <ul>
                    <li>To provide and maintain the Service</li>
                    <li>To notify you about the changing in our service</li>
                    <li>To provide customer care and support</li>
                    <li>To provide valuable information so that with the help of information we can improve the service
                    </li>
                    <li>To monitor the usage of the Service</li>
                    <li>To detect, prevent and address technical issues.</li>
                </ul>
            </div>

            <div class="transfer-disclosure container">
                <h3>Transfer of Data</h3>
                <p>Red Star Technologies will take all steps reasonably required to ensure that your data is treated
                    securely and no transfer of your Personal Information will take place to an organization or a
                    country.</p>
            </div>

            <div class="disclosure-of-data container">
                <h3>Disclosure of Data</h3>
                <p>Legal Requirements</p>
                <p>Red Star Technologies may disclose your data in the good faith belief that such action is necessary
                    to:</p>
                <ul>
                    <li>To comply with a legal obligation</li>
                    <li>To protect and defend the rights or Red Star Technologies</li>
                    <li>To investigate possible wrongdoing in connection with the Service</li>
                    <li>To protect against legal liability</li>
                </ul>
            </div>

            <div class="security-children-service-providers container">
                <h3>Security of Data</h3>
                <p>No mode of transmission over the Internet or technique of electronic storage is 100% secure. The
                    security of your data is significant to us. While we try to use commercially acceptable measures to
                    protect your Personal Information, we cannot assure its absolute security.</p>
            </div>

            <div class="container">
                <h3>Children’s Privacy</h3>
                <p>We do not address children under the age of 13 as we do not collect personally identifiable
                    information from children. For the situation we find that a kid under 13 has with individual data,
                    we rapidly remove this from our servers. If you are a parent or guardian and you know that your
                    child has given personal information, feel free to contact us so that we will be able to take rapid
                    action.</p>
            </div>


            <div class="container">
                <h3>Service Providers</h3>
                <p>To facilitate our Service, we may employ third-party companies and individuals ("Service Providers"),
                    which provide the Service on our behalf or to assist us in analyzing how we can use our service.
                    These third parties have access to your Personal Information just to perform these tasks on our
                    behalf and are responsible not to disclose or use it for any other purpose.</p>
            </div>

            <div class="changes-to-privacy-policy container">
                <h3>Changes To This Privacy Policy</h3>
                <p>From time to time we may update our privacy policies. We will notify you of any information regarding
                    changes by posting the new Privacy Policy on this page. You are requested to review this Privacy
                    Policy frequently for any changes. When privacy policies are posted on this page, these changes are
                    effective.</p>
            </div>

        </section>
    </main>

    <!-- {/* Footer */} -->
    @include('layouts.footer')

</body>

</html>

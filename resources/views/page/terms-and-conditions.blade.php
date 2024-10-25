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

    <meta property="og:title" content="{{ $data['page']->og_title ?? '' }}" />
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
    <div class="hero-terms-and-condition">
        <section class="hero__section wrapper">
            <div class="hero__container ">
                <div class="hero__image"></div>
                <div class="hero-text">
                    <h2>Terms And Conditions</h2>
                </div>
            </div>
        </section>
    </div>

    <!-- {/* Bread Crumbs */} -->
    <div class="bread-crumbs-container wrapper">
        <div class="bread-crumbs-links">
            <a href="/">Home</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <h5>Terms and Conditions</h5>
        </div>
    </div>
    <main class="wrapper">
        <div class="terms-and-conditions-intro">
            <h2 class="main-heading">Terms and Conditions</h2>
            <p>Welcome to Red Star Technologies!</p>
            <p> These terms and conditions outline the rules and regulations for the use of Red Star Technologies,
                located at http://redstartechs.com/</p>
            <p> You accept these terms and conditions when you will approach this website. Do not continue to use Red
                Star Technologies if you do not agree to take all of the terms and conditions stated on this page.
                The below-mentioned terms address to these Privacy policies, terms and conditions, and Disclaimer
                Notice: “Client”, “Your” and “You” refers to you, the person getting to this website and accepting the
                Company’s terms and conditions. All terms are applicable to the offer, acceptance, and consideration of
                payment necessary to undertake the process of our assistance to the Client in the most proper way. Use
                of the above terms or words in any form like singular, plural, capitalization and/or/she/he or they, are
                considered as interchangeable and taken to the same.</p>
        </div>

        <section class="terms-and-conditions">
            <section id="cookies" class="terms-and-conditions-detail">
                <h2>Cookies</h2>
                <p>We employ the use of cookies. By accessing <a
                        href="http://redstartechs.com/">http://redstartechs.com/</a>, you agree to use cookies in
                    agreement with the Red Star Technologies’ Privacy Policy.</p>
                <p>Cookies are used by most modern interactive procedures that allow us to redeem user details for a
                    single visit. These are used in some areas of our site to allow the functionality of this area and
                    make it easier to use for those people who visit.</p>
            </section>

            <section id="license" class="terms-and-conditions-detail">
                <h2>License</h2>
                <p>Unless otherwise stated, Red Star Technologies and/or its licensors own the intellectual property
                    rights for all material on <a href="http://redstartechs.com/">http://redstartechs.com/</a>. All
                    intellectual property rights are reserved. You may access this for your personal use subjected to
                    restrictions set in these terms and conditions.</p>
                <p>You must not:</p>
                <ul>
                    <li>Republish material from <a href="http://redstartechs.com/">http://redstartechs.com/</a></li>
                    <li>Sell, rent or sub-license material from <a
                            href="http://redstartechs.com/">http://redstartechs.com/</a></li>
                    <li>Reproduce, duplicate or copy material from <a
                            href="http://redstartechs.com/">http://redstartechs.com/</a></li>
                    <li>Redistribute content from <a href="http://redstartechs.com/">http://redstartechs.com/</a></li>
                </ul>
            </section>

            <section id="hyperlinking" class="terms-and-conditions-detail">
                <h2>Hyperlinking to our Content</h2>
                <p>Without any written approval below mentioned organizations may link to our website:</p>
                <ul>
                    <li>Government organizations;</li>
                    <li>Search engines;</li>
                    <li>News agencies;</li>
                </ul>
                <p>These organizations may link to our home page, to publications or other Website data so long as the
                    link: (a) is not in any way misleading and ambiguous; (b) does not falsely involve sponsorship,
                    confirmation of the linking party and its products and/or services.</p>
            </section>

            <section id="content-liability" class="terms-and-conditions-detail">
                <h2>Content Liability</h2>
                <p>We shall have no obligation or responsibility for any content showing up on your webpage. You consent
                    to indemnify and safeguard us against all cases emerging out of or based upon your Website.</p>
                <p>No link(s) may show up on any page on your website or inside any context containing content or
                    materials that might be interpreted as hostile, obscene or criminal, or which encroaches, generally
                    disregards, or advocates the violation or other infringement of, any third party rights.</p>
            </section>

            <section id="reservation" class="terms-and-conditions-detail">
                <h2>Reservation of Rights</h2>
                <p>We reserve the right at any time and in its sole discretion to request that you expel all links or
                    any specific link to our Web site. You consent to promptly remove all links to our Web site upon
                    such request.</p>
                <p>We additionally maintain whatever authority is needed to revise these terms and conditions and its
                    connecting approach at any time. When you continue and willing to link to our Website, you accept
                    the terms and conditions and are bound to follow.</p>
            </section>

            <section id="removal" class="terms-and-conditions-detail">
                <h2>Removal of links from our website</h2>
                <p>If you find any link on our Website that is unacceptable in any way, you are free to contact and
                    inform us at any time. We will consider requests to remove links however, we are not committed to or
                    so or to respond to you immediately.</p>
                <p>We do not assure that the data on this website is correct, we do not warrant its precision or
                    accuracy; nor do we promise to guarantee that the website remains accessible or that the material on
                    the site is staying up with the latest data.</p>
            </section>

        </section>

    </main>



    <!-- {/* Footer */} -->
    @include('layouts.footer')



</body>

</html>

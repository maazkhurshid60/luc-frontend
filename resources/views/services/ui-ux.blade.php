<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="{{ $page->meta_keywords }}" />
    <meta name="description" content="{{ $page->meta_description }}">
    @if ($page->search_engine)
        <meta name="robots" content="nofollow, noindex">
    @else
        <meta name="robots" content="follow, index">
    @endif
    <!-- Document title -->
    @if (is_null($page->page_title))
        <title>{{ $settings->siteName }}</title>
    @else
        <title>{{ $page->page_title }}</title>
    @endif
    <link rel="canonical" href="{{ request()->url() }}">
    <link rel="icon" href="{{ asset('assets/img/redstar-icon.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <meta property="og:title" content="{{ $page->og_title }}" />
    <meta property="og:description" content="{{ $page->og_description }}" />
    <meta property="og:image" content="{{ asset('storage/images/' . $page->og_image) }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="{{ $page->og_type }}" />
    <meta property="og:site_name" content="{{ $settings->siteName }}" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $page->og_title }}">
    <meta name="twitter:description" content="{{ $page->og_description }}">
    <meta name="twitter:image" content="{{ asset('storage/images/' . $page->og_image) }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>RedStar Website</title>
    @vite(['resources/scss/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @viteReactRefresh
    @include('header-script')
</head>

<body>
    @include('body-script')

    <!-- {/* Navbar */} -->
    @include('layouts.nav')

    <!-- {/* Hero */} -->
    <div class="services-hero">
        <section class="hero__section wrapper">
            <div class="hero__container ">
                <div class="hero__image"></div>
                <div class="hero-text">
                    <h1>UI/UX Design</h1>
                </div>
            </div>
        </section>
    </div>

    <!-- {/* Bread Crumbs */} -->
    <!-- {/* Bread Crumbs */} -->
    <div class="bread-crumbs-container wrapper">
        <div class="bread-crumbs-links">
            <a href="/">Home</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <a href="/services">Services</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <p>UI/UX Design</p>
        </div>
    </div>



    <!-- Services ui/ux main -->
    <!-- <section class="uiux-main">
        <div class="uiux-main__body wrapper">
            <div class="left-text">
                <div class="left-text__content">
                    <h2>UI/UX Design</h2>
                    <p>UI/UX Design is designing the user experience and user interface. Or, basically, designing your
                        user’s journey throughout their entire use of your app or website. </p>
                    <br>
                    <p> Common elements of UI/UX design include designing the navigation, information architecture,
                        workflow, and heuristics of your product. This should all be done as you’re making sure all of
                        these elements abide by consistent and relatable branding that encompasses a look and feel
                        that’s tailored to your users.</p>

                    <div class="hero__btn content-btn">
                        <a href="/contact-us">
                            <button class="btn">Lets Connect</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="right-image">
                <img src="{{ asset('assets/img/services-uiux.png') }}" alt="uiux image">
            </div>
        </div>

        <div class="hero__btn uiux-main-btn">
            <a href="#">
                <button class="btn">Lets Connect</button>
            </a>
        </div>
    </section> -->

    <main class="wrapper">
        <!-- Web Development Content Section -->
        <section class=" ui-ux-intro-section">
            <div class="ui-ux-content">
                <h2 class="ui-ux-title">UI/UX Design</h2>
                <p class="ui-ux-description">UI/UX Design is designing the user experience and user interface. Or,
                    basically, designing your user’s journey throughout their entire use of your app or website. </p>
                <br>
                <p class="ui-ux-description"> Common elements of UI/UX design include designing the navigation,
                    information architecture, workflow, and heuristics of your product. This should all be done as
                    you’re making sure all of these elements abide by consistent and relatable branding that encompasses
                    a look and feel that’s tailored to your users.</p>
                <img src="{{ asset('assets/img/ui-ux-design/intro-section-desktop-image.webp') }}"
                    alt="ui ux design image poster" class="ui-ux-intro-mobile">
                <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                    class="btn portfolio-link">Visit Portfolio</a>
            </div>
            <div class="webdevelopment-image">
                <img src="{{ asset('assets/img/ui-ux-design/intro-section-mobile-image.webp') }}"
                    class="ui-ux-intro-desktop" alt="ui ux design image">
            </div>
        </section>

        <div class="animation-2-component"></div>

        <section class=" our-process-section">
            <h2 class="heading">Our UI/UX Process </h2>
            <p class="description">A decade in design has allowed our team to perfect the process of delivering UI and
                UX services. We follow established design standards, workflows, and guidelines you get the product you
                need, delivered by expert designers within the set timeframe.</p>
            <!-- <video class="video" autoplay muted loop>
            <source src="path/to/your/video.mp4" type="video/mp4">
            </video> -->

            <img src="{{ asset('assets/img/ui-ux-design/video-tag.webp') }}" alt="Fallback Image"
                class="video-tag-image">
        </section>

        <div class="tools_and_technology_ui_ux"></div>

        <!-- <section class="tools">
      
    <section class="wrapper header-center">
        <div class="header">
            <h2 class="consulting-uiux-heading">Tools & Technologies</h2>
            <p class="process-head">Unlock the full potential of your digital
                vision with Red Star Technologies. Our comprehensive
                suite of services empowers your journey towards software
                excellence. Red Star Technologies is your dedicated partner
                in innovation and development. Explore our range of services designed
                to transform your ideas into exceptional software solutions.</p>
        </div>
    </section>

    <section class="tools-logos">
        <h1 class="logo-heading">UI/UX Design</h1>
        <div>
            <img class="tools-image" src="{{ asset('assets/img/figma-logo.png') }}" alt="error loading imgage" srcset="">
            <p>Figma</p>
        </div>
        <div>
            <img class="tools-image" src="{{ asset('assets/img/adobeXD-logo.png') }}" alt="error loading imgage" srcset="">
            <p>Adobe XD</p>
        </div>
        <div>
            <img class="tools-image" src="{{ asset('assets/img/invision-logo.png') }}" alt="error loading imgage">
            <p>Invision</p>
        </div>
        <div>
            <img class="tools-image" src="{{ asset('assets/img/photoshop-logo2.png') }}" alt="error loading imgage">
            <p>Photoshop</p>
        </div>
        <div>
            <img class="tools-image" src="{{ asset('assets/img/illustrator-logo.png') }}" alt="error loading imgage">
            <p>illustrator</p>
        </div>
    </section>
    </section> -->


        <!-- {/* further steps Header */} -->
        <!-- <section class="wrapper header-center">
        <div class="header">
            <h2 class="consulting-uiux-heading">These are the steps we followed for every design.</h2>
        </div>

        <div class="subclass">
            <div class="content-left">
                <button class="process-btn" id="research-btn">
                    Research
                </button>
                <button class="process-btn" id="storyboarding-btn">
                    Story Boarding
                </button>
                <button class="process-btn" id="sketches-btn">
                    Sketches
                </button>
                <button class="process-btn" id="wireframes-btn">
                    Wireframes
                </button>
                <button class="process-btn" id="visualdesign-btn">
                    Visual Design
                </button>
            </div>

            <div class="content-right">
                <div id="research-text">
                    <h3 class="process-header" id="research-header">Research</h3>
                    <p class="sub-text">At Red Star Technologies, thorough research is the first step in the UI/UX design process. This step involves completely understanding the target market and the issue that the program aims to address. Designers gain important ideas using techniques including consumer interviews, surveys, and competition analyses. These observations aid in the development of user personas and the mapping of user journeys, which serve as the framework for the design process. The team makes sure that the finished product will actually connect with its intended audience by empathizing with people and their needs.</p>
                </div>
                <div id="storyboarding-text">
                    <h3 class="process-header">Story Boarding</h3>
                    <p class="sub-text">At Red Star Technologies, storyboarding is a pivotal stage in our UI/UX design process. We translate our research findings into visual narratives that depict the user journey and interactions with the product. Storyboarding allows us to map out key moments, transitions, and user touchpoints, ensuring a seamless and intuitive experience.</p>
                </div>
            </div>
        </div>
    </section> -->


        <section class="uiux-business-importance  header-center">
            <div class="uiux-image">
                <img src="{{ asset('assets/img/ui-ux-design/uiux-user.webp') }}" alt="image of prototype on a page"
                    class="ui-ux-prototype">
            </div>
            <div class="business-content">
                <h2 class="business-heading">UI/UX is important for your business.</h2>
                <p class="business-text">UI/UX Design is the artful arrangement of user interface and experience,
                    guiding users through a seamless journey in your app or website.</p>
                <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                    class="btn" style="text-align: center; padding-bottom: 33px;">View More</a>
            </div>
        </section>

        <div class="seo-gap"></div>
        <div class="wrapper">
            <div class="seo-description">
                <h1 class="seo-description-heading">{{ $page->seo_more_heading }}</h1>
                <?php
                $content = $page->seo_more_content;
                $allowedTags = '<p><a><b><i><strong><em><h1><h2><h3><h4><h5><h6><ul><ol><li>';
                $cleanedContent = strip_tags($content, $allowedTags);
                $strippedContent = strip_tags($cleanedContent);
                $truncatedContent = strlen($strippedContent) > 500 ? substr($strippedContent, 0, 500) . '...' : $cleanedContent;
                ?>
                <p class="seo-description-content" data-full-content="{{ $cleanedContent }}" data-truncated="true">
                    {!! $truncatedContent !!}
                </p>
                @if ($page->seo_more_content)
                    <a href="javascript:void(0);" onclick="toggleContent(this)" class="btn loadMorebtn">Load More</a>
                @endif
            </div>
        </div>

        <div class="wrapper">
            <section class="uiux-further-details-section ">
                <div class="content">
                    <h2 class="content-heading">Want to know more about Our Expertise</h2>
                    <a href="/contact-us" class="btn connect-link">Lets Connect</a>
                </div>
                <div class="logo-image">
                    <img src="{{ asset('assets/img/redstar-icon.png') }}" alt="redstar technologies section"
                        class="redstar-main-logo">
                </div>
            </section>
        </div>


    </main>


    <br>
    @if (count($related) > 0)
        @include('services.relatedblog')
    @endif

    @include('layouts.footer')
    <script>
        function toggleContent(element) {
            const contentElement = element.previousElementSibling;
            const fullContent = contentElement.getAttribute('data-full-content');
            const truncatedContent = contentElement.innerText.substring(0, 500) + '...';

            if (contentElement.getAttribute('data-truncated') === 'true') {
                contentElement.innerHTML = fullContent;
                element.textContent = 'Show Less';
                contentElement.setAttribute('data-truncated', 'false');
            } else {
                contentElement.innerHTML = truncatedContent;
                element.textContent = 'Load More';
                contentElement.setAttribute('data-truncated', 'true');
            }
        }
    </script>
</body>

</html>

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
                    <h1> Software Business Analysis</h1>
                </div>
            </div>
        </section>
    </div>

    <!-- {/* Bread Crumbs */} -->
    <div class="bread-crumbs-container wrapper">
        <div class="bread-crumbs-links">
            <a href="/">Home</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <a href="/services">Services</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg">
            <p>Software Business Analysis</p>
        </div>
    </div>

    <!-- Buisness Analysis Section -->
    <div class="wrapper">
        <div class="project-management-section ">
            <div class="project-management-details">
                <h2 class="project-management-details-heading">Software Business Analysis</h2>
                <p class="project-management-details-content">Take your software projects to the next level with Red
                    Star Technologies. With a keen eye for detail and a strategic mindset, we decipher your business
                    needs, streamline processes, and sculpt tailored software solutions that propel your business to new
                    heights.</p>
                <p class="project-management-details-content">From careful analysis to strategic planning, Trust Red
                    Star Technologies to be your partner in progress, translating complexities into opportunities, and
                    paving the way for seamless digital transformation.</p>
                <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                    class="btn project-management-details-button">Visit Portfolio</a>
            </div>
            <div class="project-management-section-image">
                <img src="{{ asset('assets/img/mamta-right.jpg') }}" class="mamta1" alt="none">
                <img src="{{ asset('assets/img/business-analysis-images/business-analysis-image2.webp') }}"
                    alt="" srcset="" class="image1">
                <img src="{{ asset('assets/img/business-analysis-images/business-analysis-image1.webp') }}"
                    alt="" srcset="" class="image2">
            </div>
            <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                class="button-mobile btn">Visit Portfolio</a>

        </div>
    </div>


    <!-- Business Analysis Offer Section !-->
    <div class="offer-section ">
        <div class="offer-detail">
            <h2 class="offer-detail-heading">What we offer</h2>
            <p class="offer-detail-text">We meticulously gather detailed business requirements and strategically map out
                plans, optimizing processes, enhancing collaboration and providing ongoing support for continuous
                improvement post-implementation.</p>
        </div>
        <div class="project-management-services">
            <div class="service">
                <img src="{{ asset('assets/img/business-analysis-images/icon-1.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Requirements Analysis</h3>
                <p class="service-detail">We delve deep into your business processes to gather detailed and precise
                    requirements, ensuring a solid foundation for your software project.</p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/business-analysis-images/icon-2.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Strategic Planning</h3>
                <p class="service-detail">Our Software Business Analysts map out a strategic plan, creating a roadmap
                    that aligns your business objectives seamlessly with the software development process.</p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/business-analysis-images/icon-3.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Process Optimization</h3>
                <p class="service-detail">We identify inefficiencies and bottlenecks in your current processes,
                    offering insights and recommendations for optimization to enhance overall efficiency.</p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/business-analysis-images/icon-4.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Stakeholder Communication</h3>
                <p class="service-detail">Facilitating effective communication, we ensure seamless collaboration
                    between stakeholders, bridging the gap between technical and non-technical team members.</p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/business-analysis-images/icon-5.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">User Experience Enhancement</h3>
                <p class="service-detail">Our focus extends beyond functionality to user experience. We
                    provide recommendations to enhance the usability and overall user satisfaction of your software
                    solution.</p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/business-analysis-images/icon-6.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Iterative Improvement</h3>
                <p class="service-detail">Remains by your side post-implementation, offering continuous support and
                    guidance for iterative improvements based on feedback and evolving business needs.</p>
            </div>
        </div>
        <div class="buttons">
            <a href="/contact-us">
                <button class="connect-button btn">Let's Connect</button>
            </a>
            <a href="/hirepro">
                <button class="hire-expert-button btn">Hire our Expert</button>
            </a>

        </div>
    </div>
    </div>


    <!-- Management Approach Section -->
    <div class="wrapper">
        <div class="management-approach-section">
            <div class="management-approach-section-image">
                <img src="{{ asset('assets/img/business-analysis-images/our-approach-image2.webp') }}"
                    class="management-approach-section-image-desktop" alt="Secondary Image"
                    style="width: 560px; height: 440px;">
            </div>
            <div class="management-approach-section-content">
                <h2 class="management-approach-section-heading">Our Approach</h2>
                <div class="management-approach-section-text">
                    <p>At Red Star Technologies, the way we handle projects is about making things work smoothly and
                        efficiently for you. We don’t just handle tasks; we make sure everything in your project works
                        together seamlessly. We plan things carefully, adapting to changes in your project with
                        flexibility. Our focus is on making things run well by using smart tools and taking out any
                        manual obstacles that slow things down.</p>
                    <div style="margin-bottom: 10px;"></div>
                    <p>We have regular meetings to talk openly, solve problems, and make sure everyone is on the same
                        page. At Red Star Technologies, our way of working is like putting together a puzzle with the
                        right pieces – making things clear, flexible, efficient, and successful for your project.</p>
                </div>
            </div>
            <img src="{{ asset('assets/img/business-analysis-images/our-approach.webp') }}"
                class="management-approach-section-mobile-image" alt="Mobile Image">
        </div>
    </div>

    <div class="line"></div>



    <!-- Business Analysis Banner !-->
    <div class="project-management-banner">
        <img src="{{ asset('assets/img/business-analysis-images/business-analysis-banner.webp') }}" alt="img"
            class="project-management-banner-image">
        <p class="project-management-banner-text">“Elevate Your Software Strategy with Expert Business Analysts”</p>
    </div>


    <!-- Business Analysis Process Section !-->
    <div class="business-analysis wrapper">
        <h2 class="business-analysis-heading">Our Software Business Analysis Process</h2>
        <div class="business-analysis-process">
            <!--Section only visible on mobile !-->
            <div class="process-steps">
                <button class="step" id="step-1">1</button>
                <button class="step" id="step-2">2</button>
                <button class="step" id="step-3">3</button>
                <button class="step" id="step-4">4</button>
                <button class="step" id="step-5">5</button>
            </div>

            <h2 class="process-title">Need Identification</h2>
            <div class="process-details">
                <div id="title-part-1">
                    <h3 class="title detail-title-stakeholder">Stakeholder</h3>
                    <h3 class="title detail-title-requirements">Requirements</h3>
                    <h3 class="title detail-title-challenges">Challenges</h3>
                    <h3 class="title detail-title-opportunities">Opportunities</h3>
                </div>

                <div id="title-part-2">
                    <h3 class="title detail-title-requirements">Requirements</h3>
                    <h3 class="title detail-title-challenges">Challenges</h3>
                    <h3 class="title detail-title-opportunities">Opportunities</h3>
                    <h3 class="title detail-title-gap-analysis">Gap Analysis</h3>
                    <h3 class="title detail-title-documentation">Documentation</h3>
                </div>

                <div id="title-part-3">
                    <h3 class="title detail-title-gap-analysis">Gap Analysis</h3>
                    <h3 class="title detail-title-documentation">Documentation</h3>
                    <h3 class="title detail-title-cost-benefit-analysis">Cost Benefit Analysis</h3>
                    <h3 class="title detail-title-continues-improvement">Continues Improvement</h3>
                </div>
                <div id="title-part-4">
                    <h3 class="title detail-title-documentation">Documentation</h3>
                    <h3 class="title detail-title-solution-design">Solution Design</h3>
                    <h3 class="title detail-title-testing-verification">Testing & Verification</h3>
                    <h3 class="title detail-title-continues-improvement">Continues Improvement</h3>
                    <h3 class="title detail-title-risk-management">Risk Management</h3>
                </div>
                <div id="title-part-5">
                    <h3 class="title detail-title-documentation">Documentation</h3>
                    <h3 class="title detail-title-validation">Validation</h3>
                    <h3 class="title detail-title-continues-improvement">Continues Improvement</h3>
                    <h3 class="title detail-title-risk-management">Risk Management</h3>
                </div>
                <p class="detail-description">The initial phase involves a meticulous process of Stakeholder
                    Identification, where key individuals and groups are pinpointed to understand their interests and
                    concerns. Concurrently, Requirement Gathering is undertaken to capture and document the diverse
                    needs of stakeholders. Challenges and opportunities are actively discovered, laying the groundwork
                    for a comprehensive understanding of scope and objectives.</p>
            </div>
        </div>
    </div>

    <div class="spm-ba">
        <h2 class="business-analysis-heading">Our Software Business Analysis Process</h2>
        <div class="spm-cont">
            <div class="spm-wrapper">
                <div class="grid-container">
                    <div class="grid-item">
                        <div class="heading" id="h-1">
                            <div class="index">1</div>
                            <h3 class="title">Need Identification</h3>
                        </div>
                    </div>

                    <div class="grid-item">
                        <div class="heading">
                            <div class="index">2</div>
                            <h3 class="title">Current State Analysis</h3>
                        </div>
                    </div>

                    <div class="grid-item">
                        <div class="heading">
                            <div class="index">3</div>
                            <h3 class="title">Future State Prediction</h3>
                        </div>
                    </div>

                    <div class="grid-item">
                        <div class="heading">
                            <div class="index">4</div>
                            <h3 class="title">Solution Evaluation</h3>
                        </div>
                    </div>

                    <div class="grid-item">
                        <div class="heading">
                            <div class="index">5</div>
                            <h3 class="title">Implementation</h3>
                        </div>
                    </div>

                    <div class="grid-item">
                        <p class="timeline" id="tm-1">
                            Stakeholders
                        </p>
                    </div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-2">
                            Requirements Gathering
                        </p>
                    </div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-3"></p>
                    </div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-4">
                            Challenges & Oppurtunities
                        </p>
                    </div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-5"></p>
                    </div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-6">
                            Gap Analysis
                        </p>
                    </div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-7"></p>
                    </div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-8">
                            Documentation
                        </p>
                    </div>
                    <div class="grid-item">
                        <div class="timeline" id="tm-9"></div>
                    </div>
                    <div class="grid-item">
                        <div class="timeline" id="tm-10"></div>
                    </div>
                    <div class="grid-item">
                        <div class="timeline" id="tm-11"></div>
                    </div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-12">
                            Solution Design
                        </p>
                    </div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-13"></p>
                    </div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-14">
                            Cost Benefit Analysis
                        </p>
                    </div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-15">
                            Testing & Verification
                        </p>
                    </div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-16">
                            Validation
                        </p>
                    </div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-17">
                            Final Deliverables
                        </p>
                    </div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-18"></p>
                    </div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-19"></p>
                    </div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-20">
                            Risk Management
                        </p>
                    </div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-21"></p>
                    </div>
                </div>

                <div class="overlap-cont">
                    <div class="olap" id="ol-1"></div>
                    <div class="olap" id="ol-2"></div>
                    <div class="olap" id="ol-3"></div>
                    <div class="olap" id="ol-4"></div>
                    <div class="olap" id="ol-5"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="spm-detail-container">
        <div id="need-identification">
            <div class="primary-heading">
                <h3 class="primary-heading-title">Need Identification</h3>
            </div>
            <div class="detail">
                <div class="detail-items">
                    <h3 class="detail-item blue">Stakeholder</h3>
                    <h3 class="detail-item green">Requirements</h3>
                    <h3 class="detail-item yellow">Challenges</h3>
                    <h3 class="detail-item red">Challenges</h3>
                </div>
                <p class="detail-description">
                    The initial phase involves a meticulous process of Stakeholder
                    Identification, where key individuals and groups are pinpointed to understand their interests and
                    concerns. Concurrently, Requirement Gathering is undertaken to capture and document the diverse
                    needs of stakeholders. Challenges and opportunities are actively discovered, laying the groundwork
                    for a comprehensive understanding of scope and objectives.
                </p>
            </div>
        </div>

        <div id="current-state-analysis">
            <div class="primary-heading">
                <h3 class="primary-heading-title">Current State Analysis</h3>
            </div>
            <div class="detail">
                <div class="detail-items">
                    <h3 class="detail-item green">Requirements</h3>
                    <h3 class="detail-item yellow">Challenges</h3>
                    <h3 class="detail-item red">Oppurtunities</h3>
                    <h3 class="detail-item dark-blue">Gap Analysis</h3>
                    <h3 class="detail-item purple">Documentation</h3>
                </div>
                <p class="detail-description">
                    In this phase, a detailed Gap Analysis is performed to assess the existing business processes,
                    systems, and workflows. This phase involves a thorough examination of the business environment, with
                    a keen focus on understanding the strengths and weaknesses of the current state. Documentation
                    becomes a key component, initiating the record-keeping process that will serve as a baseline for
                    future stages.
                </p>
            </div>
        </div>

        <div id="future-state-prediction">
            <div class="primary-heading">
                <h3 class="primary-heading-title">Future State Prediction</h3>
            </div>
            <div class="detail">
                <div class="detail-items">
                    <h3 class="detail-item dark-blue">Gap Analysis</h3>
                    <h3 class="detail-item purple">Documentation</h3>
                    <h3 class="detail-item orange">Cost Benefit Analysis</h3>
                    <h3 class="detail-item light-blue">Continues Improvement</h3>
                </div>
                <p class="detail-description">
                    Continuing with Gap Analysis and documentation, the Future State Prediction stage emerges as a
                    critical juncture. Here, the business analyst envisions and designs a solution for the future state,
                    addressing the gaps identified in the current state. This phase encompasses not only the design
                    process but also involves conducting a Cost-Benefit Analysis to evaluate the potential impact of the
                    proposed changes. The emphasis on continuous improvement ensures that the envisioned future state
                    aligns with evolving business needs.
                </p>
            </div>
        </div>

        <div id="solution-evaluation">
            <div class="primary-heading">
                <h3 class="primary-heading-title">Solution Evaluation</h3>
            </div>
            <div class="detail">
                <div class="detail-items">
                    <h3 class="detail-item purple">Documentation</h3>
                    <h3 class="detail-item orange">Solution Design</h3>
                    <h3 class="detail-item gray">Testing & Verification</h3>
                    <h3 class="detail-item light-blue">Continues Improvement</h3>
                    <h3 class="detail-item red">Risk Management</h3>
                </div>
                <p class="detail-description">
                    In the Solution Evaluation stage, the continuous refinement of the solution design is complemented
                    by ongoing improvements. Solutions are rigorously tested and verified to ensure they meet the
                    specified requirements. This stage emphasizes a dynamic process of assessment and enhancement, where
                    feedback loops contribute to the iterative improvement of the proposed solutions.
                </p>
            </div>
        </div>

        <div id="implementation">
            <div class="primary-heading">
                <h3 class="primary-heading-title">Implementation</h3>
            </div>
            <div class="detail">
                <div class="detail-items">
                    <h3 class="detail-item purple">Documentation</h3>
                    <h3 class="detail-item gray">Validation</h3>
                    <h3 class="detail-item light-blue">Continues Improvement</h3>
                    <h3 class="detail-item red">Risk Management</h3>
                </div>
                <p class="detail-description">
                    The final stage, Implementation, marks the culmination of the software business analysis process.
                    The verified solution undergoes validation against the requirements outlined during the Future State
                    Prediction. This stage involves the practical execution of the proposed changes, ensuring a seamless
                    transition from the current state to the envisioned future state. The successful implementation
                    represents the realization of the business analyst's insights and recommendations, contributing to
                    the overall improvement of business processes and outcomes.
                </p>
            </div>
        </div>
    </div>

    <div class="tools_and_technology_ba"></div>


    <!--Business Analysis Section only visible on desktop -->
    <div class="wrapper">
        <div class="mob-development-section-2">
            <div class="description">
                <h2 class="description-heading">Software Business Analysis is important for your business.</h2>
                <p class="description-content">Software Business Analysis is the artful arrangement of user interface
                    and experience, guiding users through a seamless journey in your app or website.</p>
                <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                    class="btn btn-2">View More</a>
            </div>
            <div>
                <img src="{{ asset('assets/img/business-analysis-images/business-analysis-desktop.webp') }}"
                    alt="image">
            </div>
        </div>
    </div>

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


    <!-- Quote Box !-->
    <div class="quote-message-box wrapper">
        <img class="quote-icon" src="{{ asset('assets/img/project-management-images/quote-icon.png') }}"
            alt="">
        <img class="quote-icon-2" src="{{ asset('assets/img/quote-icon-2.png') }}" alt="icon">
        <img class="message-box " src="{{ asset('assets/img/project-management-images/quote-box-2.webp') }}"
            alt="image">
        <p class="quote-text">Red Star Technology's Software Business Analysts are committed to delivering software
            solutions that empower your business.</p>
        <a href="/hirepro">
            <button class="connect-button">Hire Our Expert</button>
        </a>

    </div>

    <br>
    @if (count($related) > 0)
        @include('services.relatedblog')
    @endif

    <!-- {/* Footer */} -->
    @include('layouts.footer')

    <!-- JavaScript -->
    <script>
        const processTitle = document.querySelector('.process-title');
        const detailDescription = document.querySelector('.detail-description');
        // const detailTitle2 = document.querySelector('#detail-title-2');
        // const detailTitle3 = document.querySelector('#detail-title-3');
        const titleSection1 = document.querySelector("#title-part-1");
        const titleSection2 = document.querySelector('#title-part-2');
        const titleSection3 = document.querySelector("#title-part-3")
        const titleSection4 = document.querySelector("#title-part-4")
        const titleSection5 = document.querySelector("#title-part-5");

        console.log('T1: ', titleSection1);
        console.log('T2: ', titleSection2);
        console.log('T3: ', titleSection3);
        console.log('T4: ', titleSection4);
        console.log('T5: ', titleSection5);

        const cont1 = document.querySelector('#ol-1');
        const cont2 = document.querySelector('#ol-2');
        const cont3 = document.querySelector('#ol-3');
        const cont4 = document.querySelector('#ol-4');
        const cont5 = document.querySelector('#ol-5');

        const button1 = document.querySelector('#step-1');
        const button2 = document.querySelector('#step-2');
        const button3 = document.querySelector('#step-3');
        const button4 = document.querySelector('#step-4');
        const button5 = document.querySelector('#step-5');

        const needIdentification = document.getElementById('need-identification');
        const currentStateAnalysis = document.getElementById('current-state-analysis');
        const futureStatePrediction = document.getElementById('future-state-prediction');
        const solutionEvaluation = document.getElementById('solution-evaluation');
        const implementation = document.getElementById('implementation');

        const contList = [cont1, cont2, cont3, cont4, cont5];

        const buttonsList = [button1, button2, button3, button4, button5];

        const dataList = [needIdentification, currentStateAnalysis, futureStatePrediction, solutionEvaluation,
            implementation
        ];

        let currentData = null;
    </script>
    <script>
        function makeSelectedTab(contList, buttonsList, activeCont, activeTab) {
            contList.forEach(cont => {
                if (cont.style.backgroundColor === 'transparent') {
                    cont.style.backgroundColor = 'rgb(255, 255, 255, 0.4)';
                }
            });
            buttonsList.forEach(button => {
                if (button.style.borderColor === 'rgb(255, 0, 0)') {
                    button.style.borderColor = '#000000';
                    button.style.borderWidth = '1px';
                }
            });
            activeCont.style.backgroundColor = 'transparent';
            activeTab.style.borderColor = '#ff0000';
            activeTab.style.borderWidth = '2px';

        }
        document.addEventListener('DOMContentLoaded', function() {

            makeSelectedTab(contList, buttonsList, cont1, button1);
            needIdentification.style.display = 'block';
            currentData = needIdentification;

            cont1.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont1, button1)
                if (currentData) {
                    currentData.style.display = 'none';
                    needIdentification.style.display = 'block';
                    currentData = needIdentification;
                } else {
                    needIdentification.style.display = 'block';
                    currentData = needIdentification;
                }
            });

            cont2.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont2, button2);
                if (currentData) {
                    currentData.style.display = 'none';
                    currentStateAnalysis.style.display = 'block';
                    currentData = currentStateAnalysis;
                } else {
                    currentStateAnalysis.style.display = 'block';
                    currentData = currentStateAnalysis;
                }
            });

            cont3.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont3, button3);
                if (currentData) {
                    currentData.style.display = 'none';
                    futureStatePrediction.style.display = 'block';
                    currentData = futureStatePrediction;
                } else {
                    futureStatePrediction.style.display = 'block';
                    currentData = futureStatePrediction;
                }
            });

            cont4.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont4, button4);
                if (currentData) {
                    currentData.style.display = 'none';
                    solutionEvaluation.style.display = 'block';
                    currentData = solutionEvaluation;
                } else {
                    solutionEvaluation.style.display = 'block';
                    currentData = solutionEvaluation;
                }
            });

            cont5.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont5, button5);
                if (currentData) {
                    currentData.style.display = 'none';
                    implementation.style.display = 'block';
                    currentData = implementation;
                } else {
                    implementation.style.display = 'block';
                    currentData = implementation;
                }
            });


        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            makeSelectedTab(contList, buttonsList, cont1, button1);
            needIdentification.style.display = 'block';
            currentData = needIdentification;

            button1.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont1, button1)
                processTitle.textContent = "Need Identification";
                detailDescription.textContent =
                    "The initial phase involves a meticulous process of Stakeholder Identification, where key individuals and groups are pinpointed to understand their interests and concerns. Concurrently, Requirement Gathering is undertaken to capture and document the diverse needs of stakeholders. Challenges and opportunities are actively discovered, laying the groundwork for a comprehensive understanding of scope and objectives.";
                titleSection1.style.display = 'block'
                titleSection2.style.display = 'none'
                titleSection3.style.display = 'none'
                titleSection4.style.display = 'none'
                titleSection5.style.display = 'none'

                if (currentData) {
                    currentData.style.display = 'none';
                    needIdentification.style.display = 'block';
                    currentData = needIdentification;
                } else {
                    needIdentification.style.display = 'block';
                    currentData = needIdentification;
                }

            });

            button2.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont2, button2)
                processTitle.textContent = "Current State Analysis";
                detailDescription.textContent =
                    "In this phase, a detailed Gap Analysis is performed to assess the existing business processes, systems, and workflows. This phase involves a thorough examination of the business environment, with a keen focus on understanding the strengths and weaknesses of the current state. Documentation becomes a key component, initiating the record-keeping process that will serve as a baseline for future stages.";
                titleSection2.style.display = 'block'
                titleSection1.style.display = 'none'
                titleSection3.style.display = 'none'
                titleSection4.style.display = 'none'
                titleSection5.style.display = 'none'

                if (currentData) {
                    currentData.style.display = 'none';
                    currentStateAnalysis.style.display = 'block';
                    currentData = currentStateAnalysis;
                } else {
                    currentStateAnalysis.style.display = 'block';
                    currentData = currentStateAnalysis;
                }


            });

            button3.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont3, button3)
                processTitle.textContent = "Future State Prediction";
                detailDescription.textContent =
                    "Continuing with Gap Analysis and documentation, the Future State Prediction stage emerges as a critical juncture. Here, the business analyst envisions and designs a solution for the future state, addressing the gaps identified in the current state. This phase encompasses not only the design process but also involves conducting a Cost-Benefit Analysis to evaluate the potential impact of the proposed changes. The emphasis on continuous improvement ensures that the envisioned future state aligns with evolving business needs.";
                titleSection3.style.display = 'block'
                titleSection2.style.display = 'none'
                titleSection1.style.display = 'none'
                titleSection4.style.display = 'none'
                titleSection5.style.display = 'none'


                if (currentData) {
                    currentData.style.display = 'none';
                    futureStatePrediction.style.display = 'block';
                    currentData = futureStatePrediction;
                } else {
                    futureStatePrediction.style.display = 'block';
                    currentData = futureStatePrediction;
                }
            });


            button4.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont4, button4)
                processTitle.textContent = "Solution Evaluation";
                detailDescription.textContent =
                    "In the Solution Evaluation stage, the continuous refinement of the solution design is complemented by ongoing improvements. Solutions are rigorously tested and verified to ensure they meet the specified requirements. This stage emphasizes a dynamic process of assessment and enhancement, where feedback loops contribute to the iterative improvement of the proposed solutions.";
                titleSection3.style.display = 'none'
                titleSection2.style.display = 'none'
                titleSection1.style.display = 'none'
                titleSection4.style.display = 'block'
                titleSection5.style.display = 'none'

                if (currentData) {
                    currentData.style.display = 'none';
                    solutionEvaluation.style.display = 'block';
                    currentData = solutionEvaluation;
                } else {
                    solutionEvaluation.style.display = 'block';
                    currentData = solutionEvaluation;
                }

            });

            button5.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont5, button5)
                processTitle.textContent = "Implementation";
                detailDescription.textContent =
                    "The final stage, Implementation, marks the culmination of the software business analysis process. The verified solution undergoes validation against the requirements outlined during the Future State Prediction. This stage involves the practical execution of the proposed changes, ensuring a seamless transition from the current state to the envisioned future state. The successful implementation represents the realization of the business analyst's insights and recommendations, contributing to the overall improvement of business processes and outcomes.";
                titleSection3.style.display = 'none'
                titleSection2.style.display = 'none'
                titleSection1.style.display = 'none'
                titleSection4.style.display = 'none'
                titleSection5.style.display = 'block'

                if (currentData) {
                    currentData.style.display = 'none';
                    implementation.style.display = 'block';
                    currentData = implementation;
                } else {
                    implementation.style.display = 'block';
                    currentData = implementation;
                }

            });
        });
    </script>
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

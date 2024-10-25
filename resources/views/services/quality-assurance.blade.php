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
                    <h1>Software Quality Assurance</h1>
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
            <p>Software Quality Assurance</p>
        </div>
    </div>


    <!-- Quality Assurance Section -->
    <div class="wrapper">
        <div class="project-management-section ">
            <div class="project-management-details">
                <h2 class="project-management-details-heading">Software Quality Assurance</h2>
                <p class="project-management-details-content">Elevate your software quality assurance standards with Red
                    Star Technologies. We ensure thorough testing and validation at every project phase, from careful
                    planning to flawless execution. Our commitment lies in maintaining the integrity and reliability of
                    your software products, prioritizing a smooth user experience. </p>
                <p class="project-management-details-content">At Red Star Technologies, we focus on delivering the
                    highest quality standards, making sure your software excels with precision and professionalism at
                    every step. </p>
                <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                    class="btn project-management-details-button">Visit Portfolio</a>
            </div>
            <div class="project-management-section-image">
                <img src="{{ asset('assets/img/mamta-right.jpg') }}" class="mamta1" alt="none">
                <img src="{{ asset('assets/img/quality-assurance-images/QA-mobile.webp') }}" alt=""
                    srcset="" class="image1">
                <img src="{{ asset('assets/img/quality-assurance-images/QA-desktop.webp') }}" alt=""
                    srcset="" class="image2">
            </div>
        </div>
    </div>


    <!-- Offer Section -->
    <div class="offer-section ">
        <div class="offer-detail">
            <h2 class="offer-detail-heading">What we offer</h2>
            <p class="offer-detail-text">Testing tools in quality assurance streamline processes, enhance consistency,
                and expedite defect identification, contributing to more efficient and reliable software development.
            </p>
        </div>
        <div class="project-management-services">
            <div class="service">
                <img src="{{ asset('assets/img/quality-assurance-images/icon-1.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Planning and Strategy</h3>
                <p class="service-detail">Developing a comprehensive test plan to guide the overall testing process and
                    align it with project goals and requirements.</p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/quality-assurance-images/icon-2.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Test Case Design</h3>
                <p class="service-detail">Designing test cases based on requirements and executing them to identify
                    defects, inconsistencies, and areas for improvement.</p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/quality-assurance-images/icon-3.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Tracking and Management</h3>
                <p class="service-detail">Identifying and documenting defects, assigning severity levels, and
                    collaborating with development teams.</p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/quality-assurance-images/icon-4.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Performance Testing</h3>
                <p class="service-detail">Conducting tests to evaluate system speed, responsiveness, and stability,
                    optimizing performance, and scalability issues.</p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/quality-assurance-images/icon-5.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Framework Mastery</h3>
                <p class="service-detail">Implementing rigorous testing frameworks to ensure comprehensive coverage and
                    reliability.
                </p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/quality-assurance-images/icon-6.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Documentation</h3>
                <p class="service-detail">Creating and maintaining comprehensive documentation, generating reports to
                    communicate testing progress and outcomes.</p>
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

    <!-- Quality Assurance Approach Section -->
    <div class="management-approach-section wrapper">
        <div class="management-approach-section-image">
            <img src="{{ asset('assets/img/quality-assurance-images/our-approach-QA.webp') }}"
                class="management-approach-section-image-desktop" alt="Secondary Image" srcset=""
                style="width: 570px; height: 450px;">
        </div>
        <div class="management-approach-section-content">
            <h2 class="management-approach-section-heading">Our Approach</h2>
            <div class="management-approach-section-text">
                <p>At Red Star Technologies, we are committed to ensuring that your software operates smoothly and
                    reliably. We carefully plan and adapt to changes, using smart tools to eliminate manual obstacles
                    that might compromise software quality. </p>
                <div style="margin-bottom: 10px;"></div>
                <p>Opting for our services is like meticulously assembling a puzzle with the right QA pieces
                    –constructing software that embodies transparency, adaptability, efficiency, and a clear path toward
                    quality success.</p>
            </div>
        </div>
        <img src="{{ asset('assets/img/quality-assurance-images/QA-our-approach-mobile.webp') }}"
            class="management-approach-section-mobile-image" alt="Mobile Image">
    </div>
    <div class="line"></div>


    <!-- Quality Assurance Banner !-->
    <div class="project-management-banner">
        <img src="{{ asset('assets/img/quality-assurance-images/QA-banner.webp') }}" alt="img" srcset=""
            class="project-management-banner-image">
        <p class="project-management-banner-text">“Quality is never an accident; it is always the result of high
            intention, sincere effort, intelligent direction, and skillful execution.”</p>
    </div>

    <div class="spm-qa">
        <h2 class="business-analysis-heading">Our Software Quality Assurance Process</h2>
        <div class="spm-cont">
            <div class="spm-wrapper">
                <div class="grid-container">
                    <div class="grid-item">
                        <div class="heading" id="h-1">
                            <div class="index">1</div>
                            <h3 class="title">Quality Planning</h3>
                        </div>
                    </div>

                    <div class="grid-item">
                        <div class="heading">
                            <div class="index">2</div>
                            <h3 class="title">Quality Assurance Process Level</h3>
                        </div>
                    </div>

                    <div class="grid-item">
                        <div class="heading">
                            <div class="index">3</div>
                            <h3 class="title">Quality Assurance Product Level</h3>
                        </div>
                    </div>

                    <div class="grid-item">
                        <div class="heading">
                            <div class="index">4</div>
                            <h3 class="title">Audit & Compliance</h3>
                        </div>
                    </div>

                    <div class="grid-item">
                        <p class="timeline" id="tm-1">
                            Quality Policy
                        </p>
                    </div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-2">
                            Quality Planning
                        </p>
                    </div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-3">
                            Challenges & Oppurtunities
                        </p>
                    </div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-4">
                            Testing & Evaluation
                        </p>
                    </div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-5"></p>
                    </div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-6">
                            Validation & Verification
                        </p>
                    </div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-7"></p>
                    </div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-8">
                            Solution Design
                        </p>
                    </div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-9"></p>
                    </div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-10"></p>
                    </div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item"></div>
                    <div class="grid-item">
                        <p class="timeline" id="tm-11">
                            Internal & External Audit
                        </p>
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
        <div id="quality-planning">
            <div class="primary-heading">
                <h2 class="primary-heading-title">Quality Planning</h2>
            </div>
            <div class="detail">
                <div class="detail-items">
                    <h3 class="detail-item blue">Quality Policy</h3>
                    <h3 class="detail-item green">Quality Planning</h3>
                    <h3 class="detail-item yellow">Data Collection</h3>
                </div>
                <p class="detail-description">
                    In the initial phase of software quality assurance, Quality Planning
                    takes center stage. This involves the formulation of a Quality Policy, and setting the
                    organizational commitment to quality standards. It extends to meticulous planning, outlining
                    strategies for maintaining and enhancing quality throughout the software development lifecycle.
                    Simultaneously, data collection mechanisms are established to gather pertinent information, laying
                    the groundwork for comprehensive quality assessments.
                </p>
            </div>
        </div>

        <div id="quality-assurance-process-level">
            <div class="primary-heading">
                <h3 class="primary-heading-title">Quality Assurance Process Level</h3>
            </div>
            <div class="detail">
                <div class="detail-items">
                    <h3 class="detail-item dark-blue">Testing & Evaluation</h3>
                    <h3 class="detail-item purple">Validation & Verification</h3>
                    <h3 class="detail-item red">Documentation Review</h3>
                    <h3 class="detail-item light-blue">Release & Approval</h3>
                </div>
                <p class="detail-description">
                    In the initial phase of software quality assurance, Quality Planning
                    takes center stage. This involves the formulation of a Quality Policy, and setting the
                    organizational commitment to quality standards. It extends to meticulous planning, outlining
                    strategies for maintaining and enhancing quality throughout the software development lifecycle.
                    Simultaneously, data collection mechanisms are established to gather pertinent information, laying
                    the groundwork for comprehensive quality assessments.
                </p>
            </div>
        </div>

        <div id="quality-assurance-product-level">
            <div class="primary-heading">
                <h3 class="primary-heading-title">Quality Assurance Product Level</h3>
            </div>
            <div class="detail">
                <div class="detail-items">
                    <h3 class="detail-item dark-blue">Testing & Evaluation</h3>
                    <h3 class="detail-item purple">Validation & Verification</h3>
                    <h3 class="detail-item red">Documentation Review</h3>
                    <h3 class="detail-item light-blue">Release & Approval</h3>
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

        <div id="audit-compliance">
            <div class="primary-heading">
                <h3 class="primary-heading-title">Audit & Compliance</h3>
            </div>
            <div class="detail">
                <div class="detail-items">
                    <h3 class="detail-item purple">Release & Approval</h3>
                    <h3 class="detail-item orange">Internal & External Audit/h3>
                </div>
                <p class="detail-description">
                    In the Solution Evaluation stage, the continuous refinement of the solution design is complemented
                    by ongoing improvements. Solutions are rigorously tested and verified to ensure they meet the
                    specified requirements. This stage emphasizes a dynamic process of assessment and enhancement, where
                    feedback loops contribute to the iterative improvement of the proposed solutions.
                </p>
            </div>
        </div>

    </div>


    <!-- Quality Assurance Process Section !-->
    <div class="quality-assurance wrapper">
        <h2 class="quality-assurance-heading">Our Software Quality Assurance Process</h2>
        <div class="quality-assurance-process">
            <!-- Still in Developing Phase !-->
            <!-- <div class="main-container">
                <div class="process-container">
                    <h1 class="heading">1</h1>
                    <h1 class="heading-steps">Quality Planning</h1>
                    <div class="progress-bar">
                        <p class="project-scope">Quality Policy</p>
                        <p class="main-container-text">Quality Planning</p>
                        <p class="main-container-text">Data Collection</p>
                    </div>
                </div>

                <div class="process-container">
                    <h1 class="heading">2</h1>
                    <h1 class="heading-steps">Quality Assurance Process level</h1>
                    <div>
                        <p class="main-container-text">Work Breakdown</p>
                        <p class="main-container-text">Cost & budget</p>
                    </div>
                </div>

                <div class="process-container">
                    <h1 class="heading">3</h1>
                    <h1 class="heading-steps">Quality Assurance Product level</h1>
                    <div>
                        <p class="main-container-text">Work Implementation</p>
                        <p class="main-container-text">Quality Assurance & Resource Management</p>
                        <p class="main-container-text">Issue Change Management</p>
                    </div>
                </div>

                <div class="process-container">
                    <h1 class="heading">4</h1>
                    <h1 class="heading-steps">Audit & Compliance</h1>
                    <p class="main-container-text">Internal and External Audit</p>
                </div>

                <div class="process-container">
                    <h1 class="heading">5</h1>
                    <h1 class="heading-steps"> Project Closure</h1>
                    <p class="main-container-text">Final Deliverable</p>
                </div>
            </div> -->
            <!--Section only visible on mobile !-->
            <div class="process-steps">
                <button class="step" id="step-1">1</button>
                <button class="step" id="step-2">2</button>
                <button class="step" id="step-3">3</button>
                <button class="step" id="step-4">4</button>
            </div>

            <h1 class="process-title">Quality Planning</h1>
            <div class="process-details">
                <div id="title-part-1">
                    <h3 class="title detail-title-policy">Quality Policy</h3>
                    <h3 class="title detail-title-planning">Quality Planning</h3>
                    <h3 class="title detail-title-collection">Data Collection</h3>
                </div>

                <div id="title-part-2">
                    <h3 class="title detail-title-testing">Testing & Evaluation</h3>
                    <h3 class="title detail-title-validation">Validation & Verification</h3>
                    <h3 class="title detail-title-doc-review">Documentation Review</h3>
                    <h3 class="title detail-title-approval">Release & Approval</h3>
                </div>

                <div id="title-part-3">
                    <h3 class="title detail-title-approval">Release & Approval</h3>
                    <h3 class="title detail-title-audit">Internal & External Audit</h3>
                </div>

                <p class="detail-description">In the initial phase of software quality assurance, Quality Planning
                    takes center stage. This involves the formulation of a Quality Policy, and setting the
                    organizational commitment to quality standards. It extends to meticulous planning, outlining
                    strategies for maintaining and enhancing quality throughout the software development lifecycle.
                    Simultaneously, data collection mechanisms are established to gather pertinent information, laying
                    the groundwork for comprehensive quality assessments.</p>
            </div>
        </div>
    </div>


    <div class="tools_and_technology_qa"></div>


    <!-- QA Section only visible on desktop -->
    <div class="wrapper">
        <div class="mob-development-section-2 ">
            <div class="description">
                <h2 class="description-heading">Software Quality Assurance is important for your business.</h2>
                <p class="description-content">Software Quality Assurance is the artful arrangement of user interface
                    and experience, guiding users through a seamless journey in your app or website.</p>
                <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                    class="btn" style="text-align: center; padding-bottom: 33px;">View More</a>
            </div>
            <div>
                <img src="{{ asset('assets/img/quality-assurance-images/QA-right-desktop.webp') }}" alt="img"
                    srcset="">
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
        <img class="quote-icon-2" src="{{ asset('assets/img/quote-icon-2.png') }}" alt="image">
        <img class="message-box " src="{{ asset('assets/img/project-management-images/quote-box-2.webp') }}"
            alt="image">
        <p class="quote-text">At Red Star Technologies unparalleled quality assurance engineers for streamlined
            operations and timely delivery, providing unmatched peace of mind.</p>
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

        console.log('T1: ', titleSection1);
        console.log('T2: ', titleSection2);
        console.log('T3: ', titleSection3);

        const cont1 = document.querySelector('#ol-1');
        const cont2 = document.querySelector('#ol-2');
        const cont3 = document.querySelector('#ol-3');
        const cont4 = document.querySelector('#ol-4');

        const button1 = document.querySelector('#step-1');
        const button2 = document.querySelector('#step-2');
        const button3 = document.querySelector('#step-3');
        const button4 = document.querySelector('#step-4');

        const qualityPlanning = document.getElementById('quality-planning');
        const qualityAssuranceProcessLevel = document.getElementById('quality-assurance-process-level');
        const qualityAssuranceProduct = document.getElementById('quality-assurance-product-level');
        const auditCompliance = document.getElementById('audit-compliance');

        const contList = [cont1, cont2, cont3, cont4];

        const buttonsList = [button1, button2, button3, button4];

        const dataList = [qualityPlanning, qualityAssuranceProcessLevel, qualityAssuranceProduct, auditCompliance];

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
            qualityPlanning.style.display = 'block';
            currentData = qualityPlanning;

            cont1.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont1, button1)
                if (currentData) {
                    currentData.style.display = 'none';
                    qualityPlanning.style.display = 'block';
                    currentData = qualityPlanning;
                } else {
                    qualityPlanning.style.display = 'block';
                    currentData = qualityPlanning;
                }
            });

            cont2.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont2, button2);
                if (currentData) {
                    currentData.style.display = 'none';
                    qualityAssuranceProcessLevel.style.display = 'block';
                    currentData = qualityAssuranceProcessLevel;
                } else {
                    qualityAssuranceProcessLevel.style.display = 'block';
                    currentData = qualityAssuranceProcessLevel;
                }
            });

            cont3.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont3, button3);
                if (currentData) {
                    currentData.style.display = 'none';
                    qualityAssuranceProduct.style.display = 'block';
                    currentData = qualityAssuranceProduct;
                } else {
                    qualityAssuranceProduct.style.display = 'block';
                    currentData = qualityAssuranceProduct;
                }
            });

            cont4.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont4, button4);
                if (currentData) {
                    currentData.style.display = 'none';
                    auditCompliance.style.display = 'block';
                    currentData = auditCompliance;
                } else {
                    auditCompliance.style.display = 'block';
                    currentData = auditCompliance;
                }
            });

        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            makeSelectedTab(contList, buttonsList, cont1, button1);
            qualityPlanning.style.display = 'block';
            currentData = qualityPlanning;

            button1.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont1, button1);
                processTitle.textContent = "Quality Planning";
                detailDescription.textContent =
                    "In the initial phase of software quality assurance, Quality Planning takes center stage. This involves the formulation of a Quality Policy, and setting the organizational commitment to quality standards. It extends to meticulous planning, outlining strategies for maintaining and enhancing quality throughout the software development lifecycle. Simultaneously, data collection mechanisms are established to gather pertinent information, laying the groundwork for comprehensive quality assessments.";
                titleSection1.style.display = 'block'
                titleSection2.style.display = 'none'
                titleSection3.style.display = 'none';

                if (currentData) {
                    currentData.style.display = 'none';
                    qualityPlanning.style.display = 'block';
                    currentData = qualityPlanning;
                } else {
                    qualityPlanning.style.display = 'block';
                    currentData = qualityPlanning;
                }

            });

            button2.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont2, button2);
                processTitle.textContent = "Quality Assurance Process Level";
                detailDescription.textContent =
                    "Moving to the Quality Assurance (Process Level) stage, the focus shifts to the dynamic testing and evaluation of processes. Validation and verification processes are implemented to ensure that the defined processes meet established quality standards. Document review is a key component, ensuring that process documentation aligns with quality policies. The release and approval processes are executed, and any detected bugs are thoroughly documented and reported for immediate attention and resolution.";
                titleSection2.style.display = 'block'
                titleSection1.style.display = 'none'
                titleSection3.style.display = 'none';

                if (currentData) {
                    currentData.style.display = 'none';
                    qualityAssuranceProcessLevel.style.display = 'block';
                    currentData = qualityAssuranceProcessLevel;
                } else {
                    qualityAssuranceProcessLevel.style.display = 'block';
                    currentData = qualityAssuranceProcessLevel;
                }

            });

            button3.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont3, button3);
                processTitle.textContent = "Quality Assurance Product Level";
                detailDescription.textContent =
                    "Continuing into the Quality Assurance (Product Level) stage, the emphasis remains on the continuous testing and evaluation of the product itself. Validation and verification processes extend to product-level testing, ensuring that the end product meets specified quality criteria. Document review and the release and approval processes persist, ensuring that the product documentation aligns with established quality standards. Similar to the process level, any bugs identified during testing are meticulously documented and reported for swift resolution.";
                titleSection2.style.display = 'block'
                titleSection1.style.display = 'none'
                titleSection3.style.display = 'none';

                if (currentData) {
                    currentData.style.display = 'none';
                    qualityAssuranceProduct.style.display = 'block';
                    currentData = qualityAssuranceProduct;
                } else {
                    qualityAssuranceProduct.style.display = 'block';
                    currentData = qualityAssuranceProduct;
                }
            });


            button4.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont4, button4);
                processTitle.textContent = "Audit & Compliance";
                detailDescription.textContent =
                    "In the final stage of software quality assurance, Audit, and compliance takes precedence. The release and approval processes continue to ensure that the product meets the required quality standards. Internal and external audits are conducted to assess compliance with organizational policies and regulations. This stage serves as a comprehensive review, validating that all quality assurance processes were followed diligently. It ensures that the software product aligns with both internal quality policies and any external compliance requirements, fostering a robust and reliable software development environment.";
                titleSection3.style.display = 'block'
                titleSection2.style.display = 'none'
                titleSection1.style.display = 'none';

                if (currentData) {
                    currentData.style.display = 'none';
                    auditCompliance.style.display = 'block';
                    currentData = auditCompliance;
                } else {
                    auditCompliance.style.display = 'block';
                    currentData = auditCompliance;
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

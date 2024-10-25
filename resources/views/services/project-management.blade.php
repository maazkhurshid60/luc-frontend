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
                    <h1>Software Project Management</h1>
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
            <p>Software Project Management</p>
        </div>
    </div>


    <!-- Software Project Management Section -->
    <div class="wrapper">
        <div class="project-management-section">
            <div class="project-management-details">
                <h2 class="project-management-details-heading">Software Project Management</h2>
                <p class="project-management-details-content">Experience seamless software project management with Red
                    Star Technologies, ensuring maximum productivity and timely delivery. From meticulous planning to
                    flawless execution, we take the lead, allowing you to focus on business growth. </p>
                <p class="project-management-details-content">Our emphasis is on making your projects feel effortless.
                    Ensuring smooth collaboration, soaring productivity without overwhelming technicalities, and
                    deadlines that are not just met but embraced for a truly exceptional project management experience.
                </p>
                <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                    class="btn project-management-details-button">Visit Portfolio</a>
            </div>
            <div class="project-management-section-image">
                <img src="{{ asset('assets/img/mamta-right.jpg') }}" class="mamta1" alt="none">
                <img src="{{ asset('assets/img/project-management-images/project-management-section-image.webp') }}"
                    alt="" srcset="" class="image1">
                <img src="{{ asset('assets/img/project-management-images/project-management-section-image-2.webp') }}"
                    alt="" srcset="" class="image2">
            </div>
            <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                class="button-mobile btn">Visit Portfolio</a>
        </div>
    </div>



    <div class="offer-section ">
        <div class="offer-detail">
            <h2 class="offer-detail-heading">What we offer</h2>
            <p class="offer-detail-text">Offering a holistic range of project management services, we excel in
                optimizing workflows, implementing automation, fostering dynamic collaboration, and expertly managing
                risks to ensure both operational efficiency and project success.</p>
        </div>
        <div class="project-management-services">
            <div class="service">
                <img src="{{ asset('assets/img/project-management-images/icon-1.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Agile Workflow Evolution</h3>
                <p class="service-detail">Mastering system workflows for seamless operations and evolving strategically
                    with agile skills to ensure adaptable and efficient processes.</p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/project-management-images/icon-2.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Precise Automation Solutions</h3>
                <p class="service-detail">Boost project efficiency with tailored automation, eliminating manual
                    bottlenecks for streamlined workflows.</p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/project-management-images/icon-3.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Insightful Dashboards </h3>
                <p class="service-detail">Visualize your project's journey with custom dashboards, gaining clear
                    insights for informed decision-making.</p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/project-management-images/icon-4.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Timely Milestone Planning </h3>
                <p class="service-detail">Stay ahead with meticulous timelines, ensuring your project exceeds
                    expectations for successful completion.</p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/project-management-images/icon-5.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Dynamic Collaboration Sessions</h3>
                <p class="service-detail">Fuel collaboration through Sprint, Standup and Retrospective sessions,
                    fostering real-time communication and team alignment for collective success.</p>
            </div>
            <div class="service">
                <img src="{{ asset('assets/img/project-management-images/icon-6.svg') }}" alt=""
                    class="service-icon">
                <h3 class="service-heading">Risk Management</h3>
                <p class="service-detail">Identify, assess, and mitigate software project risks through transparent
                    communication and continuous monitoring for successful project management.</p>
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



    <!-- Management Approach Section -->
    <div class="management-approach-section wrapper">
        <div class="management-approach-section-image">
            <img src="{{ asset('assets/img/project-management/our-approach.webp') }}"
                class="management-approach-section-image-desktop" alt="Secondary Image">
        </div>
        <div class="management-approach-section-content">
            <h2 class="management-approach-section-heading">Our Approach</h2>
            <div class="management-approach-section-text">
                <p>At Red Star Technologies, the way we handle projects is about making things work smoothly and
                    efficiently for you. We don’t just handle tasks; we make sure everything in your project works
                    together seamlessly. We plan things carefully, adapting to changes in your project with flexibility.
                    Our focus is on making things run well by using smart tools and taking out any manual obstacles that
                    slow things down.</p>
                <p>We have regular meetings to talk openly, solve problems, and make sure everyone is on the same page.
                    At Red Star Technologies, our way of working is like putting together a puzzle with the right pieces
                    – making things clear, flexible, efficient, and successful for your project.</p>
            </div>
        </div>
        <img src="{{ asset('assets/img/project-management-images/our-approach.webp') }}"
            class="management-approach-section-mobile-image" alt="Mobile Image">
    </div>

    <div class="line "></div>

    <!-- Project Management Banner !-->
    <div class="project-management-banner">
        <img src="{{ asset('assets/img/project-management-images/project-management-banner.webp') }}" alt="img"
            srcset="" class="project-management-banner-image">
        <p class="project-management-banner-text">“Efficient Project Management Solutions for Seamless Success”</p>
    </div>


    <!-- Project Management Process Section !-->
    <div class="project-management-wrapper wrapper">
        <h2 class="project-management-wrapper-heading">Our Software Project Management Process</h2>
        <div class="project-management-process">
            <div class="process-steps">
                <button class="step" id="step-1">1</button>
                <button class="step" id="step-2">2</button>
                <button class="step" id="step-3">3</button>
                <button class="step" id="step-4">4</button>
                <button class="step" id="step-5">5</button>
            </div>
            <h1 class="process-title">Project Initiation</h1>
            <div class="process-details">
                <div id="title">
                    <h3 class="detail-title">Project Scope</h3>
                    <h3 class="detail-title" id="detail-title-2">Stakeholder Analysis</h3>
                    <h3 class="detail-title" id="detail-title-3">Feasibility Study</h3>
                </div>
                <div id="title-part-2">
                    <h3 id="detail-title-1">Work Implementation</h3>
                    <h3 id="detail-title-2">Quality Assurance</h3>
                    <h3 id="detail-title-3">Resource Management</h3>
                    <h3 id="detail-title-4">Change Management</h3>
                    <h3 id="detail-title-5">Scope Control</h3>
                </div>
                <p class="detail-description">In the project initiation phase, defining the project scope is a crucial
                    step that outlines project objectives, deliverables, and constraints. Initially, stakeholders are
                    identified and analyzed to understand their interests and impact, fostering effective communication
                    strategies. The feasibility study, another integral component, involves a comprehensive assessment
                    of technical, financial, and operational aspects to ensure the project's practicality and alignment
                    with organizational goals. This meticulous initiation process lays the groundwork for a well-defined
                    and viable project, setting the stage for successful development.</p>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <!-- hover animations   -->

        <div class="spm">
            <h2 class="project-management-wrapper-heading">Our Software Project Management Process</h2>
            <div class="spm-cont">
                <div class="spm-wrapper">
                    <div class="grid-container">
                        <div class="grid-item">
                            <div class="heading">
                                <div class="index">1</div>
                                <h3 class="title">Project Initiation</h3>
                            </div>
                        </div>

                        <div class="grid-item">
                            <div class="heading">
                                <div class="index">2</div>
                                <h3 class="title">Project Planning</h3>
                            </div>
                        </div>

                        <div class="grid-item">
                            <div class="heading">
                                <div class="index">3</div>
                                <h3 class="title">Project Execution</h3>
                            </div>
                        </div>

                        <div class="grid-item">
                            <div class="heading">
                                <div class="index">4</div>
                                <h3 class="title">Project Monitoring & Control</h3>
                            </div>
                        </div>

                        <div class="grid-item">
                            <div class="heading">
                                <div class="index">5</div>
                                <h3 class="title">Project Closure</h3>
                            </div>
                        </div>

                        <div class="grid-item">
                            <p class="timeline" id="tm-1">
                                Project Scope
                            </p>
                        </div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-2"></p>
                        </div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-3">
                                Stakeholders
                            </p>
                        </div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-4">
                                Work Break Down
                            </p>
                        </div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-5">
                                Feasibility Study
                            </p>
                        </div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-6">
                                Cost & Budget
                            </p>
                        </div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-7">
                                Work Implementation
                            </p>
                        </div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-8">
                                Quality Assurance & Resource
                            </p>
                        </div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-9">
                                Management
                            </p>
                        </div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-10"></p>
                        </div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-11">
                                Issue Change Management
                            </p>
                        </div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-12"></p>
                        </div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-13">
                                Scope
                            </p>
                        </div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-14">
                                Control
                            </p>
                        </div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-15"></p>
                        </div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item"></div>
                        <div class="grid-item">
                            <p class="timeline" id="tm-16">
                                Final Deliverables
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
            <div id="project-initiation">
                <div class="primary-heading">
                    <h3 class="primary-heading-title">Project Initiation</h3>
                </div>
                <div class="detail">
                    <div class="detail-items">
                        <h3 class="detail-item blue">Project Scope</h3>
                        <h3 class="detail-item green">Stakeholder Analysis</h3>
                        <h3 class="detail-item yellow">Feasibility Study</h3>
                    </div>
                    <p class="detail-description">
                        In the project initiation phase, Defining the project scope is a crucial step that outlines
                        project objectives, deliverables, and constraints. Initially, stakeholders are identified and
                        analyzed to understand their interests and impact, fostering effective communication strategies.
                        The feasibility study, another integral component, involves a comprehensive assessment of
                        technical, financial, and operational aspects to ensure the project's practicality and alignment
                        with organizational goals. This meticulous initiation process lays the groundwork for a
                        well-defined and viable project, setting the stage for successful development.
                    </p>
                </div>
            </div>

            <div id="project-planning">
                <div class="primary-heading">
                    <h3 class="primary-heading-title">Project Planning</h3>
                </div>
                <div class="detail">
                    <div class="detail-items">
                        <h3 class="detail-item blue">Project Scope</h3>
                        <h3 class="detail-item green">Work Break Down </h3>
                        <h3 class="detail-item yellow">Cost & Budget</h3>
                    </div>
                    <p class="detail-description">
                        In the project planning stage, a comprehensive Work Breakdown Structure (WBS) is created based
                        on the defined scope. This hierarchical decomposition of the project's deliverables into
                        manageable tasks facilitates organized planning and resource allocation. Simultaneously,
                        meticulous attention is given to cost and budget considerations. This stage serves as the
                        bedrock for effective project execution, providing a clear roadmap through the WBS while
                        maintaining financial transparency and adherence to budgetary constraints.
                    </p>
                </div>
            </div>

            <div id="project-execution">
                <div class="primary-heading">
                    <h3 class="primary-heading-title">Project Execution</h3>
                </div>
                <div class="detail">
                    <div class="detail-items">
                        <h3 class="detail-item dark-blue">Work Implementation </h3>
                        <h3 class="detail-item purple">Quality Assurance & Resource Management</h3>
                        <h3 class="detail-item orange">Issue Change Management</h3>
                        <h3 class="detail-item gray">Scope Control</h3>
                    </div>
                    <p class="detail-description">
                        In project monitoring and control, QA processes are continued in this phase to verify and
                        validate deliverables, maintaining adherence to defined quality standards and orchestrating the
                        allocation and utilization of resources efficiently based on the requirements. Any issues and
                        changes that are prompted are addressed and implemented accordingly while keeping an eye on
                        maintaining the scope within defined boundaries.
                    </p>
                </div>
            </div>

            <div id="project-monitoring">
                <div class="primary-heading">
                    <h3 class="primary-heading-title">Project Monitering & Control</h3>
                </div>
                <div class="detail">
                    <div class="detail-items">
                        <h3 class="detail-item purple">Quality Assurance & Resource Management</h3>
                        <h3 class="detail-item orange">Issue Change Management</h3>
                        <h3 class="detail-item gray">Scope Control</h3>
                    </div>
                    <p class="detail-description">
                        In the project initiation phase, Defining the project scope is a crucial step that outlines
                        project objectives, deliverables, and constraints. Initially, stakeholders are identified and
                        analyzed to understand their interests and impact, fostering effective communication strategies.
                        The feasibility study, another integral component, involves a comprehensive assessment of
                        technical, financial, and operational aspects to ensure the project's practicality and alignment
                        with organizational goals. This meticulous initiation process lays the groundwork for a
                        well-defined and viable project, setting the stage for successful development.
                    </p>
                </div>
            </div>

            <div id="project-closure">
                <div class="primary-heading">
                    <h3 class="primary-heading-title">Project Closure</h3>
                </div>
                <div class="detail">
                    <div class="detail-items">
                        <h3 class="detail-item purple">Quality Assurance & Resource Management</h3>
                        <h3 class="detail-item gray">Scope Control</h3>
                        <h3 class="detail-item light-blue">Final deliverable</h3>
                    </div>
                    <p class="detail-description">
                        In the project closure phase, the project manager oversees the finalization of all project
                        activities and deliverables. This involves completing remaining tasks, obtaining formal
                        acceptance from stakeholders, and conducting a comprehensive project review. Lessons learned are
                        identified for future improvements, and all project documentation is archived for reference and
                        audits. Contracts are closed, and resources, including the project team, are formally released.
                        The closure phase ensures a structured conclusion to the project, emphasizing reflection,
                        documentation, and the seamless handover of outcomes to clients or end-users.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!--Tools and Technology Section !-->
    <div class="tools_and_technology_pm"></div>
    <!-- <div class="tools-container">
        <h1>Tools & Technologies</h1>
        <p>Software project management tools streamline processes, enhance coordination, and expedite issue resolution,
            contributing to more efficient and reliable software development.</p>
    </div> -->


    <!-- Section only visible on desktop -->
    <div class="wrapper">
        <div class="mob-development-section-2">
            <div class="description">
                <h2 class="description-heading">Software Project Management is important for your business.</h2>
                <p class="description-content">Software Project Management is the artful arrangement of user interface
                    and experience, guiding users through a seamless journey in your app or website.</p>
                <a href="{{ url('portfolio') }}" onclick="setCategory('{{ $page->projectcategory }}')"
                    class="btn btn-2">View More</a>
            </div>
            <div>
                <img src="{{ asset('assets/img/project-management-images/project-management-buisness.webp') }}"
                    alt="project management image">
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
        <img class="quote-icon-2" src="{{ asset('assets/img/quote-icon-2.png') }}" alt="">
        <img class="message-box " src="{{ asset('assets/img/project-management-images/quote-box-2.webp') }}"
            alt="">
        <p class="quote-text">Effortless Project Success with RedStar Technologies. Partner with us for streamlined
            operations, timely delivery, and peace of mind.</p>
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
        const detailTitle2 = document.querySelector('#detail-title-2');
        const detailTitle3 = document.querySelector('#detail-title-3');
        const titleSection2 = document.querySelector('#title-part-2');
        const titleSection1 = document.querySelector("#title");

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

        const projectInitiation = document.getElementById('project-initiation');
        const projectPlanning = document.getElementById('project-planning');
        const projectExecution = document.getElementById('project-execution');
        const projectIClosure = document.getElementById('project-closure');
        const projectMonitor = document.getElementById('project-monitoring');

        const contList = [cont1, cont2, cont3, cont4, cont5];

        const buttonsList = [button1, button2, button3, button4, button5];

        const dataList = [projectInitiation, projectPlanning, projectExecution, projectMonitor, projectIClosure];

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
            projectInitiation.style.display = 'block';
            currentData = projectInitiation;

            cont1.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont1, button1)
                if (currentData) {
                    currentData.style.display = 'none';
                    projectInitiation.style.display = 'block';
                    currentData = projectInitiation;
                } else {
                    projectInitiation.style.display = 'block';
                    currentData = projectInitiation;
                }
            });

            cont2.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont2, button2);
                if (currentData) {
                    currentData.style.display = 'none';
                    projectPlanning.style.display = 'block';
                    currentData = projectPlanning;
                } else {
                    projectPlanning.style.display = 'block';
                    currentData = projectPlanning;
                }
            });

            cont3.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont3, button3);
                if (currentData) {
                    currentData.style.display = 'none';
                    projectExecution.style.display = 'block';
                    currentData = projectExecution;
                } else {
                    projectExecution.style.display = 'block';
                    currentData = projectExecution;
                }
            });

            cont4.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont4, button4);
                if (currentData) {
                    currentData.style.display = 'none';
                    projectMonitor.style.display = 'block';
                    currentData = projectMonitor;
                } else {
                    projectMonitor.style.display = 'block';
                    currentData = projectMonitor;
                }
            });

            cont5.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont5, button5);
                if (currentData) {
                    currentData.style.display = 'none';
                    projectIClosure.style.display = 'block';
                    currentData = projectIClosure;
                } else {
                    projectIClosure.style.display = 'block';
                    currentData = projectIClosure;
                }
            });


        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            makeSelectedTab(contList, buttonsList, cont1, button1);
            projectInitiation.style.display = 'block';
            currentData = projectInitiation;

            button1.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont1, button1)
                processTitle.textContent = "Project Initiation";
                detailDescription.textContent =
                    "In the project initiation phase, defining the project scope is a crucial step that outlines project objectives, deliverables, and constraints. Initially, stakeholders are identified and analyzed to understand their interests and impact, fostering effective communication strategies. The feasibility study, another integral component, involves a comprehensive assessment of technical, financial, and operational aspects to ensure the project's practicality and alignment with organizational goals. This meticulous initiation process lays the groundwork for a well-defined and viable project, setting the stage for successful development.";

                if (currentData) {
                    currentData.style.display = 'none';
                    projectInitiation.style.display = 'block';
                    currentData = projectInitiation;
                } else {
                    projectInitiation.style.display = 'block';
                    currentData = projectInitiation;
                }
            });

            button2.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont2, button2);
                processTitle.textContent = "Project Planning";
                detailDescription.textContent =
                    "In the project planning stage, a comprehensive Work Breakdown Structure (WBS) is created based on the defined scope. This hierarchical decomposition of the project's deliverables into manageable tasks facilitates organized planning and resource allocation. Simultaneously, meticulous attention is given to cost and budget considerations.  This stage serves as the bedrock for effective project execution, providing a clear roadmap through the WBS while maintaining financial transparency and adherence to budgetary constraints.";
                detailTitle2.textContent = "Work Break Down"
                detailTitle3.textContent = "Cost and Budget";

                if (currentData) {
                    currentData.style.display = 'none';
                    projectPlanning.style.display = 'block';
                    currentData = projectPlanning;
                } else {
                    projectPlanning.style.display = 'block';
                    currentData = projectPlanning;
                }
            });

            button3.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont3, button3)
                processTitle.textContent = "Project Execution";
                detailDescription.textContent =
                    "In the project execution stage,  the actual implementation of the planned work is carried out, ensuring that tasks are according to the project-defined plan. QA processes are actively engaged to verify and validate deliverables, maintaining adherence to defined quality standards. Resource management is a focal point, to orchestrate the allocation and utilization of resources efficiently. Change management is integral during this phase, project team addresses issues and changes promptly, ensuring that the project remains on course while keeping a vigilant eye on maintaining the scope within defined boundaries an quoting separately for items that were not included in scope.";
                titleSection2.style.display = 'block';
                titleSection1.style.display = 'none';

                if (currentData) {
                    currentData.style.display = 'none';
                    projectExecution.style.display = 'block';
                    currentData = projectExecution;
                } else {
                    projectExecution.style.display = 'block';
                    currentData = projectExecution;
                }
            });


            button4.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont4, button4)
                processTitle.textContent = "Project Monitoring & Control";
                detailDescription.textContent =
                    "In project monitoring and control, QA processes are continued in this phase to verify and validate deliverables, maintaining adherence to defined quality standards and orchestrating the allocation and utilization of resources efficiently based on the requirements. Any issues and changes that are prompted are addressed and implemented accordingly while keeping an eye on maintaining the scope within defined boundaries.";
                titleSection2.style.display = 'block';
                titleSection1.style.display = 'none';

                if (currentData) {
                    currentData.style.display = 'none';
                    projectMonitor.style.display = 'block';
                    currentData = projectMonitor;
                } else {
                    projectMonitor.style.display = 'block';
                    currentData = projectMonitor;
                }
            });

            button5.addEventListener('click', () => {
                makeSelectedTab(contList, buttonsList, cont5, button5);
                processTitle.textContent = "Project Closure";
                detailDescription.textContent =
                    "In the project closure phase, the project manager oversees the finalization of all project activities and deliverables. This involves completing remaining tasks, obtaining formal acceptance from stakeholders, and conducting a comprehensive project review. Lessons learned are identified for future improvements, and all project documentation is archived for reference and audits. Contracts are closed, and resources, including the project team, are formally released. The closure phase ensures a structured conclusion to the project, emphasizing reflection, documentation, and the seamless handover of outcomes to clients or end-users.";
                titleSection2.style.display = 'block';
                titleSection1.style.display = 'none';

                if (currentData) {
                    currentData.style.display = 'none';
                    projectIClosure.style.display = 'block';
                    currentData = projectIClosure;
                } else {
                    projectIClosure.style.display = 'block';
                    currentData = projectIClosure;
                }
            });
        });

        // const ol1 = document.getElementById('ol-1');
        // const ol2 = document.getElementById('ol-2');
        // const ol3 = document.getElementById('ol-3');
        // const ol4 = document.getElementById('ol-4');
        // const ol5 = document.getElementById('ol-5');
        // Select the project-initiation element


        // // Add event listener for hover
        // ol1.addEventListener('mouseover', () => {
        //     projectInitiation.style.display = 'block';
        // });

        // ol1.addEventListener('mouseout', () => {
        //     projectInitiation.style.display = 'none';
        // });

        // // Add event listener for hover
        // ol2.addEventListener('mouseover', () => {
        //     // clearPrevSelectedData()
        //     projectPlanning.style.display = 'block';
        //     projectInitiation.style.display = 'none';
        // });

        // ol2.addEventListener('mouseout', () => {
        //     projectPlanning.style.display = 'none';
        //     projectInitiation.style.display = 'block';
        // });

        // // Add event listener for hover
        // ol3.addEventListener('mouseover', () => {
        //     projectExecution.style.display = 'block';
        //     projectInitiation.style.display = 'none';
        // });

        // ol3.addEventListener('mouseout', () => {
        //     projectExecution.style.display = 'none';
        //     projectInitiation.style.display = 'block';
        // });

        // // Add event listener for hover
        // ol4.addEventListener('mouseover', () => {
        //     projectMonitor.style.display = 'block';
        //     projectInitiation.style.display = 'none';
        // });

        // ol4.addEventListener('mouseout', () => {
        //     projectMonitor.style.display = 'none';
        //     projectInitiation.style.display = 'block';
        // });

        // // Add event listener for hover
        // ol5.addEventListener('mouseover', () => {
        //     projectIClosure.style.display = 'block';
        //     projectInitiation.style.display = 'none';
        // });

        // ol5.addEventListener('mouseout', () => {
        //     projectIClosure.style.display = 'none';
        //     projectInitiation.style.display = 'block';
        // });
    </script>

    <script>
        function setCategory(categoryId) {
            sessionStorage.setItem('selectedCategory', categoryId);
        }
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

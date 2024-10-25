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
    <!-- Fonts -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700;900&display=swap" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@100;300;400;700;900&display=swap"
        rel="stylesheet">
    <title>RedStar Website</title>
    @vite(['resources/scss/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @include('header-script')

    <style>
        .hidden {
            display: none;
        }

        .tab.active a {
            border-bottom: 2px solid #d1202d;
            text-decoration: none;
            color: #333;
            padding: 5.5px 10px;
            transition: #d1202d 0.3s ease;
        }

        /* Add your CSS styling here */
    </style>
</head>

<body>
    @include('body-script')

    <!-- Navbar -->
    @include('layouts.nav')

    <!-- Hero -->
    <section class="hero__section wrapper">
        <div class="hero__container">
            <div class="hero__image"></div>
            <div class="hero-text">
                <h1>{{ $data['page']->name }}</h1>
            </div>
        </div>
    </section>

    <!-- Breadcrumbs -->
    <div class="bread-crumbs-container wrapper">
        <div class="bread-crumbs-links">
            <a href="/">Home</a>
            <img src="{{ asset('assets/img/landing-page/arrow.svg') }}" id="svg" alt="Arrow">
            <p>{{ $data['page']->name }}</p>
        </div>
    </div>


    <div class="portfolio-section wrapper">
        <p class="portfolio-heading-main">Portfolio</p>
        <h2 class="portfolio-main-description">Where IT meets your Vision.</h2>
        <p>Explore our diverse portfolio of successful projects that showcase our ability to deliver outstanding
            software solutions across various industries.</p>
    </div>

    <!-- Sub Navigation -->
    <div class="wrapper">
        <nav id="sub-navbar" aria-label="Portfolio Categories">
            <ul>
                <li class="tab" data-category="all"><a href="#">All</a></li>
                @foreach ($data['projectCategories'] as $element)
                    <li class="tab" data-category="{{ $element->id }}"><a href="#">{{ $element->title }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
    <!-- Portfolio Projects -->
    <section class="wrapper portfolio">
        <div id="data-1">
            @foreach ($data['projects'] as $key => $project)
                <article class="project-container pos-project" data-categories='@json(array_map('intval', json_decode($project->categories_id)))'
                    style="background-color: {{ $project->color_code }};">
                    {{-- <a href="{{ url('portfolio/' . $project->slug) }}"> --}}
                    <h3>{{ $project->name }}</h3>
                    <p>
                        @foreach (json_decode($project->categories_id) as $categoryId)
                            {{ App\Helpers\Helper::projectcategories($categoryId) }}@if (!$loop->last)
                                |
                            @endif
                        @endforeach
                    </p>
                    <a href="{{ url('portfolio/' . $project->slug) }}"> <img
                            src="{{ asset('storage/images/' . $project->image) }}" alt="{{ $project->name }} Image"
                            class="project-image"></a>
                    <div class="hover-effects">
                        <p class="project-details">{{ $project->description }}</p>
                        <br>
                        <div class="links-box">
                            <a href="{{ url('portfolio/' . $project->slug) }}" class="links"
                                aria-label="View project details for {{ $project->name }}">
                                <img src="{{ asset('assets/img/portfolio/link-1.png') }}" alt="Portfolio Link Icon">
                            </a>
                            @if (!empty($project->link))
                                <a href="{{ $project->link }}" class="links" target="_blank"
                                    aria-label="Visit external link for {{ $project->name }}">
                                    <img src="{{ asset('assets/img/portfolio/link-2.png') }}" alt="External Link Icon">
                                </a>
                            @endif
                        </div>
                    </div>
                    {{-- </a> --}}
                </article>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
            const projects = document.querySelectorAll('.project-container');

            // Function to activate the correct tab
            function activateTab(category) {
                tabs.forEach(tab => {
                    if (tab.getAttribute('data-category') === category) {
                        tab.classList.add('active');
                    } else {
                        tab.classList.remove('active');
                    }
                });
            }

            // Function to filter projects based on the category
            function filterProjects(category) {
                projects.forEach(project => {
                    const categories = JSON.parse(project.getAttribute('data-categories'));
                    if (category === 'all' || categories.includes(parseInt(category, 10))) {
                        project.classList.remove('hidden');
                    } else {
                        project.classList.add('hidden');
                    }
                });
            }

            // Retrieve the selected category from sessionStorage
            const selectedCategory = sessionStorage.getItem('selectedCategory') || 'all';

            // Activate tab and filter projects based on the retrieved category
            activateTab(selectedCategory);
            filterProjects(selectedCategory);

            // Add event listener to tabs
            tabs.forEach(tab => {
                tab.addEventListener('click', function(event) {
                    event.preventDefault();
                    const category = tab.getAttribute('data-category');
                    activateTab(category);
                    filterProjects(category);

                    // Save the selected category to sessionStorage
                    sessionStorage.setItem('selectedCategory', category);
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(function(navItem) {
                navItem.addEventListener('click', function() {
                    sessionStorage.setItem('selectedCategory', 'all');
                });
            });
        });
    </script>




</body>

</html>

@extends('layouts.main-layout')

@section('title', $data->page_title)

@section('meta-keywords', $data->meta_keywords ?? '')
@section('meta-description', $data->meta_description ?? '')

@if ($data->search_engine)
    @section('robots', 'nofollow, noindex')
@else
    @section('robots', 'follow, index')
@endif

@section('og-title', $data->og_title ?? '')
@section('og-description', $data->og_description ?? '')
@section('og-image', $data->og_image ?? '')
@section('og-type', $data->og_type ?? 'website')

@section('twitter-title', $data->twitter_title ?? '')
@section('twitter-description', $data->twitter_description ?? '')
@section('twitter-image', $data->twitter_image ?? '')

@section('custom-styles')
@endsection

@section('content')
    <div class="main">

        @include('partials.breadcrumbs', [
            'bg_image' => asset('assets/frontend/images/blog-details-bg.webp'),
            'home' => ['name' => __('lang.Home'), 'route' => 'index'],
            'parent' => ['name' => 'Blogs', 'route' => 'blogs.index'],
            'page_title' => $data->title,
        ])
    {{-- @dd($data->category) --}}
        <div class="container-fluid py-40px">
            <div class="container">
                <div class="row flex-md-row flex-column-reverse gap-md-0 gap-4 pyb-80">
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="rblog-card-content d-flex flex-column ">
                            <div class="cat-tag-wrap mb-lg-3 mb-2 align-self-md-start align-self-center">
                                <span class="d-flex align-items-center body-txt2 primary--clr mb-0">
                                    <p class="body-txt2 primary--clr mb-0 blog-detail-cat-tag me-2">
                                        {{ $data->category->title }}</p>
                                </span>
                            </div>
                            <div class="position-relative text-md-start text-center">
                                <h2 class="head--2 secondary--clr mb-lg-3 mb-2">{{ $data->title }}
                                </h2>
                                <p class="body-txt1 txt--clr mb-lg-4 mb-2">{{ $data->short_description }}</p>
                            </div>
                            <div class="blog-profile-img d-flex justify-content-md-start justify-content-center">
                                <div class="auth-profile-img me-lg-3 me-2">
                                    <img src="{{ asset('assets/icons/blog-auth-img.svg') }}" alt="">
                                </div>
                                <div class="blog-card-meta ">
                                    <h3 class="head--4 secondary--clr mb-0">{{ $data->user }}</h3>
                                    <div class="body-txt2 txt--clr mb-0">
                                        {{ \Carbon\Carbon::parse($data->date)->format('d-M-Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                        <img src="{{ asset('storage/images/' . $data->cover_image) }}" class="blog-dtl-fet-img anime-scale"
                            alt="">
                    </div>
                </div>
                <div class="row ">
                    <div
                        class="blog-details-section d-flex flex-md-row flex-column-reverse justify-content-between gap-md-0 gap-4">
                        <div class="blog--detail-content text-md-start text-center blog-content">
                            {!! $data->contents !!}
                        </div>
                        <div class="blog--detail-sidebar d-flex flex-column gap-4">
                            <div class="blog-content-table text-md-start text-center">
                                <hr class="grey--clr mb-4">
                                <div class="toc">
                                    <h3 class="head--3 primary--clr">Table of contents</h3>
                                </div>

                                {{-- <a href="#introduction" class="text-decoration-none">
                                    <p class="body-txt1 txt--clr">Introduction</p>
                                </a>
                                <a href="#software" class="text-decoration-none">
                                    <p class="body-txt1 txt--clr">Software and tools</p>
                                </a>
                                <a href="#resources" class="text-decoration-none">
                                    <p class="body-txt1 txt--clr">Other resources</p>
                                </a>
                                <a href="#conclusion" class="text-decoration-none">
                                    <p class="body-txt1 txt--clr">Conclusion</p>
                                </a>
                                <hr class="grey--clr m-0"> --}}
                                <div
                                    class="blog-socail-icons d-flex justify-content-md-start justify-content-center align-items-center gap-lg-4 gap-2 mt-4">
                                    <a href="#" class="text-decoration-none" id="copyLinkBtn">
                                        <span class="body-txt1 primary--clr d-flex align-items-center">
                                            <img src="{{ asset('assets/frontend/icons/copy.svg') }}" alt="">
                                            Copy Link
                                        </span>
                                    </a>
                                    <a href="#">
                                        <span>
                                            <img src="{{ asset('assets/frontend/icons/twitter--x.svg') }}" alt="">
                                        </span>
                                    </a>
                                    <a href="#">
                                        <span>
                                            <img src="{{ asset('assets/frontend/icons/fb.svg') }}" alt="">
                                        </span>
                                    </a>
                                    <a href="#">
                                        <span>
                                            <img src="{{ asset('assets/frontend/icons/linkedin.svg') }}" alt="">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="grey--clr m-0">
            </div>
        </div>

        @include('partials.related-blogs', ['data' => $related])

    </div>
@endsection
@section('custom-js')
    <script>
        // toc scripts
        document.addEventListener('DOMContentLoaded', () => {
            const contentDiv = document.querySelector('.blog-content');
            const tocDiv = document.querySelector('.toc');
            const navbarHeight = 80; // Adjust this value to match your navbar's height

            if (!contentDiv || !tocDiv) return;

            const toc = document.createElement('ul');
            const headings = Array.from(contentDiv.querySelectorAll('h1, h2, h3, h4, h5, h6'));

            headings.forEach((heading, index) => {
                const id = `heading-${index}`;
                heading.id = id;

                const li = document.createElement('li');
                li.classList.add('body-txt1', 'txt--clr'); // Add classes to the <li> element

                const a = document.createElement('a');
                a.href = `#${id}`;
                a.textContent = heading.textContent;
                a.classList.add('text-decoration-none'); // Add the class to the <a> element
                a.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetElement = document.querySelector(a.getAttribute('href'));
                    window.scrollTo({
                        top: targetElement.offsetTop - navbarHeight, // Adjust position
                        behavior: 'smooth'
                    });
                });

                li.appendChild(a);
                toc.appendChild(li);
            });

            tocDiv.appendChild(toc);

            // Highlight active heading
            const updateActiveClass = () => {
                const scrollPosition = window.scrollY + navbarHeight; // Adjust for fixed navbar height

                let currentActive = null;

                headings.forEach((heading, index) => {
                    const headingTop = heading.offsetTop;
                    const nextHeading = headings[index + 1];
                    const nextHeadingTop = nextHeading ? nextHeading.offsetTop : Infinity;

                    if (scrollPosition >= headingTop && scrollPosition < nextHeadingTop) {
                        currentActive = heading;
                    }
                });

                if (currentActive) {
                    toc.querySelectorAll('a').forEach(link => link.classList.remove('active'));
                    const id = currentActive.getAttribute('id');
                    const tocLink = toc.querySelector(`a[href='#${id}']`);
                    if (tocLink) {
                        tocLink.classList.add('active');
                    }
                }
            };

            // Update active class on scroll
            document.addEventListener('scroll', updateActiveClass);

            // Also update on page load to handle initial active class
            updateActiveClass();
        });
        document.addEventListener('DOMContentLoaded', () => {
            const copyLinkBtn = document.getElementById('copyLinkBtn');

            if (!copyLinkBtn) return;

            copyLinkBtn.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent the default action (following the link)

                // Get the current page URL
                const currentUrl = window.location.href;

                // Create a temporary input element to copy the URL
                const tempInput = document.createElement('input');
                tempInput.value = currentUrl;
                document.body.appendChild(tempInput);

                // Select and copy the URL
                tempInput.select();
                document.execCommand('copy');

                // Remove the temporary input element
                document.body.removeChild(tempInput);

                // Optionally, show a confirmation message (could be in a tooltip or a flash message)
                alert('Link copied to clipboard!');
            });
        });
    </script>
@endsection

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
            'bg_image' => asset('assets/frontend/images/blogs-hero-bg.webp'),
            'home' => ['name' => 'Home', 'route' => 'index'],
            'parent' => '',
            'page_title' => $data->name,
        ])

        {{-- @if ($latest->isNotEmpty())
            <div class="container-fluid d-flex flex-column justify-content-center py-40px afcon--our-services">
                <div class="container">
                    <div class="row flex-column">
                        <div class="services-sec d-flex flex-column justify-content-center align-items-center text-center">
                            <h2 class="head--2 mb-0 pyb-40 secondary--clr text-center">
                                Recent Blogs
                            </h2>
                        </div>
                        <div class="blog-sec d-flex flex-md-row flex-column justify-content-between">
                            @foreach ($latest as $key => $blog)
                                @if ($key == 0)
                                    <div class="recent-blog-col1">
                                        <div class="our-rblog-card mb-4">
                                            <div class="blog-img-wrap">
                                                <a href="{{ url('blog/' . $blog->slug) }}">
                                                    <img src="{{ asset('storage/images/' . $blog->cover_image) }}"
                                                        alt="" class="card-img rcard-img-left" /></a>
                                            </div>
                                            <div class="rblog-card-content p-4">
                                                <div class="cat-tag-wrap mb-lg-3 mb-2">
                                                    <p class="body-txt2 primary--clr mb-0">{{ $blog->category->title }}</p>
                                                </div>
                                                <div class="position-relative">
                                                    <img src="{{ asset('assets/frontend/icons/forward-arrow.svg') }}"
                                                        alt="" class="forward-arrow position-absolute" />
                                                    <h3 class="head--3 secondary--clr mb-lg-3 mb-2">
                                                        {{ $blog->title }}
                                                    </h3>
                                                    <p class="body-txt2 txt--clr mb-lg-4 mb-2">
                                                        {{ $blog->short_description }}
                                                    </p>
                                                </div>
                                                <div class="blog-profile-img d-flex">
                                                    <div class="auth-profile-img me-lg-3 me-2">
                                                        <img src="{{ asset('assets/frontend/icons/blog-auth-img.svg') }}"
                                                            alt="" />
                                                    </div>
                                                    <div class="blog-card-meta">
                                                        <h3 class="head--4 secondary--clr mb-0">{{ $blog->user }}</h3>
                                                        <div class="body-txt2 txt--clr mb-0">
                                                            {{ \Carbon\Carbon::parse($blog->date)->format('d-M-Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="recent-blog-col2">
                                        <div class="our-rblog-card d-flex flex-md-row flex-column mb-4">
                                            <div class="blog-img-wrap w-md-50">
                                                <a href="{{ url('blog/' . $blog->slug) }}"><img
                                                        src="{{ asset('storage/images/' . $blog->cover_image) }}"
                                                        alt="" class="card-img rcard-img-right" /></a>
                                            </div>
                                            <div class="rblog-card-content w-md-50 p-4">
                                                <div class="cat-tag-wrap mb-lg-3 mb-2">
                                                    <p class="body-txt2 primary--clr mb-0">{{ $blog->category->title }}</p>
                                                </div>
                                                <div class="position-relative">
                                                    <img src="{{ asset('assets/frontend/icons/forward-arrow.svg') }}"
                                                        alt="" class="forward-arrow position-absolute" />
                                                    <h3 class="head--3 secondary--clr mb-lg-3 mb-2">
                                                        {{ $blog->title }}
                                                    </h3>
                                                    <p class="body-txt2 txt--clr mb-lg-4 mb-2">
                                                        {{ $blog->short_description }} <br>
                                                        <a href="{{ url('/blog/' . $blog->slug) }}"
                                                            class="blog-excerpt-readmore">Read More</a>
                                                    </p>
                                                </div>
                                                <div class="blog-profile-img d-flex">
                                                    <div class="auth-profile-img me-lg-3 me-2">
                                                        <img src="{{ asset('assets/frontend/icons/blog-auth-img.svg') }}"
                                                            alt="author img" />
                                                    </div>
                                                    <div class="blog-card-meta">
                                                        <h3 class="head--4 secondary--clr mb-0">{{ $blog->user }}</h3>
                                                        <div class="body-txt2 txt--clr mb-0">
                                                            {{ \Carbon\Carbon::parse($blog->date)->format('d-M-Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif --}}

        @if ($latest->isNotEmpty())
            <div class="container-fluid d-flex flex-column justify-content-center py-40px afcon--our-services">
                <div class="container">
                    <div class="row flex-column">
                        <div class="services-sec d-flex flex-column justify-content-center align-items-center text-center">
                            <h2 class="head--2 mb-0 pyb-40 secondary--clr text-center">
                                Recent Blogs
                            </h2>
                        </div>
                        <div class="blog-sec d-flex flex-md-row flex-column justify-content-between">
                            @if (!empty($latest[0]))
                                <a href="{{ url('blog' . $latest[0]->slug) }}">
                                    <div class="recent-blog-col1">
                                        <div class="our-rblog-card mb-4">
                                            <div class="blog-img-wrap">
                                                <a href="{{ url('blog/' . $latest[0]->slug) }}"><img
                                                        src="{{ asset('storage/images/' . $latest[0]->cover_image) }}"
                                                        alt="" class="card-img rcard-img-left" /></a>
                                            </div>
                                            <div class="rblog-card-content p-4">
                                                <div class="cat-tag-wrap mb-lg-3 mb-2">
                                                    <p class="body-txt2 primary--clr mb-0">Technology</p>
                                                </div>
                                                <div class="position-relative">
                                                    <img src="{{ asset('assets/frontend/icons/forward-arrow.svg') }}"
                                                        alt="" class="forward-arrow position-absolute" />
                                                    <h3 class="head--3 secondary--clr mb-lg-3 mb-2">
                                                        {{ $latest[0]->title }}
                                                    </h3>
                                                    <p class="body-txt2 txt--clr mb-lg-4 mb-2">
                                                        {{ $latest[0]->short_description }}
                                                    </p>
                                                </div>
                                                <div class="blog-profile-img d-flex">
                                                    <div class="auth-profile-img me-lg-3 me-2">
                                                        <img src="{{ asset('assets/frontend/icons/blog-auth-img.svg') }}"
                                                            alt="" />
                                                    </div>
                                                    <div class="blog-card-meta">
                                                        <h3 class="head--4 secondary--clr mb-0">{{ $latest[0]->user }}</h3>
                                                        <div class="body-txt2 txt--clr mb-0">
                                                            {{ \Carbon\Carbon::parse($latest[0]->date)->format('d-M-Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif

                            <div class="recent-blog-col2">
                                @for ($i = 1; $i < 3; $i++)
                                    @if (!empty($latest[$i]))
                                        <div class="our-rblog-card d-flex flex-md-row flex-column mb-4">
                                            <div class="blog-img-wrap w-md-50">
                                                <a href="{{ url('blog/' . $latest[$i]->slug) }}"><img
                                                        src="{{ asset('storage/images/' . $latest[$i]->cover_image) }}"
                                                        alt="" class="card-img rcard-img-right" /></a>
                                            </div>
                                            <div class="rblog-card-content w-md-50 p-4">
                                                <div class="cat-tag-wrap mb-lg-3 mb-2">
                                                    <p class="body-txt2 primary--clr mb-0">Technology</p>
                                                </div>
                                                <div class="position-relative">
                                                    <img src="{{ asset('assets/frontend/icons/forward-arrow.svg') }}"
                                                        alt="" class="forward-arrow position-absolute" />
                                                    <h3 class="head--3 secondary--clr mb-lg-3 mb-2">
                                                        {{ $latest[$i]->title }}
                                                    </h3>
                                                    <p class="body-txt2 txt--clr mb-lg-4 mb-2">
                                                        {{ $latest[$i]->short_description }} <br>
                                                        <a href="{{ url('/blog/' . $latest[$i]->slug) }}"
                                                            class="blog-excerpt-readmore">Read More</a>
                                                    </p>
                                                </div>
                                                <div class="blog-profile-img d-flex">
                                                    <div class="auth-profile-img me-lg-3 me-2">
                                                        <img src="{{ asset('assets/frontend/icons/blog-auth-img.svg') }}"
                                                            alt="auther img" />
                                                    </div>
                                                    <div class="blog-card-meta">
                                                        <h3 class="head--4 secondary--clr mb-0">{{ $latest[$i]->user }}
                                                        </h3>
                                                        <div class="body-txt2 txt--clr mb-0">
                                                            {{ \Carbon\Carbon::parse($latest[$i]->date)->format('d-M-Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="container-fluid d-flex flex-column justify-content-center py-40px afcon--our-services">
            <div class="container">
                <div class="row flex-column">
                    <div class="services-sec d-flex flex-column justify-content-center align-items-center text-center">
                        <h2 class="head--2 mb-0 pyb-40 secondary--clr text-center">All Blog Posts</h2>
                    </div>
                    <div class="blog-sec">
                        <div class="tabs d-flex flex-column justify-content-center">
                            <div class="fit-content align-self-center p-2 mbl-full-width">
                                <!-- START tabs-nav -->
                                <ul id="tabs-nav" class="d-md-block d-none">
                                    <li>
                                        <a href="#all" class="body-txt2 txt--clr text-decoration-none text-center active"
                                            data-category-id="0">All</a>
                                    </li>
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="#{{ $category->id }}"
                                                class="body-txt2 txt--clr text-decoration-none text-center"
                                                data-category-id="{{ $category->id }}">{{ $category->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- END tabs-nav -->
                                <div class="dropdown d-md-none d-block w-100">
                                    <button class="btn dropdown-toggle w-100 tabs-mbl-dropper" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">All</button>
                                    <ul class="dropdown-menu w-100" id="tabs-nav">
                                        <li><a href="#all" class="body-txt2 txt--clr text-decoration-none text-center"
                                                data-category-id="0">All</a></li>
                                        @foreach ($categories as $category)
                                            <li><a href="#{{ $category->id }}"
                                                    class="body-txt2 txt--clr text-decoration-none text-center"
                                                    data-category-id="{{ $category->id }}">{{ $category->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div id="tabs-content">
                                <div id="all" class="tab-content active">
                                    <div class="our--blog d-flex justify-content-between flex-wrap">
                                        @foreach ($blogs as $blog)
                                            @include('include.blog-card', ['blog' => $blog])
                                        @endforeach
                                    </div>
                                    <hr class="m-0" />
                                    @include('include.pagination', ['paginator' => $blogs])
                                </div>
                                @foreach ($categories as $category)
                                    <div id="{{ $category->id }}" class="tab-content">
                                        <!-- This will be populated by AJAX -->
                                    </div>
                                @endforeach
                            </div>
                            <!-- END tabs-content -->
                        </div>
                        <!-- END tabs -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
    <script>
        $(document).ready(function() {
            // Handle tab clicks
            $('#tabs-nav a').on('click', function(event) {
                event.preventDefault();

                // Remove active class from all tabs and add it to the clicked tab
                $('#tabs-nav a').removeClass('active');
                $(this).addClass('active');

                var categoryId = $(this).data('category-id');
                var targetId = $(this).attr('href').substring(1);

                // Hide all tab contents and show the selected one
                $('.tab-content').removeClass('active');
                $('#' + targetId).addClass('active');

                // Make the AJAX request to get blogs based on the selected category
                $.ajax({
                    url: '{{ route('blogs.index') }}',
                    type: 'GET',
                    data: {
                        category_id: categoryId
                    },
                    success: function(data) {
                        // Update the content of the selected tab
                        $('#' + targetId).html(data);

                        // Update the URL without reloading the page
                        history.pushState(null, '', '?category_id=' + categoryId);
                    },
                    error: function() {
                        alert('Error loading blogs. Please try again.');
                    }
                });
            });

            // Handle browser back/forward navigation
            window.onpopstate = function(event) {
                var urlParams = new URLSearchParams(window.location.search);
                var categoryId = urlParams.get('category_id');

                if (categoryId) {
                    $('#tabs-nav a[data-category-id="' + categoryId + '"]').click();
                } else {
                    $('#tabs-nav a[data-category-id="0"]').click(); // Load "All" tab
                }
            };
        });
    </script>
@endsection
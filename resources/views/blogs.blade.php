@extends('layouts.main-layout')


@section('title', 'Blogs')

@section('custom-styles')
@endsection

@section('content')
    <div class="main">
        @include('partials.breadcrumbs', [
            'bg_image' => asset('assets/frontend/images/blogs-hero-bg.webp'),
            'home' => ['name' => 'Home', 'route' => 'index'],
            'parent' => '',
            'page_title' => 'Blogs',
        ])

        <div class="container-fluid d-flex flex-column justify-content-center py-40px afcon--our-services">
            <div class="container">
                <div class="row flex-column">
                    <div class="services-sec d-flex flex-column justify-content-center align-items-center text-center">
                        <h2 class="head--2 mb-0 pyb-40 secondary--clr text-center">
                            Recent Blogs
                        </h2>
                    </div>
                    <div class="blog-sec d-flex flex-md-row flex-column justify-content-between">
                        <div class="recent-blog-col1">
                            <div class="our-rblog-card mb-4">
                                <div class="blog-img-wrap">
                                    <a href="blog-details.html"><img
                                            src="{{ asset('assets/frontend/images/recent-blogs-img1.webp') }}"
                                            alt="" class="card-img rcard-img-left" /></a>
                                </div>
                                <div class="rblog-card-content p-4">
                                    <div class="cat-tag-wrap mb-lg-3 mb-2">
                                        <p class="body-txt2 primary--clr mb-0">Technology</p>
                                    </div>
                                    <div class="position-relative">
                                        <img src="{{ asset('assets/frontend/icons/forward-arrow.svg') }}" alt=""
                                            class="forward-arrow position-absolute" />
                                        <h3 class="head--3 secondary--clr mb-lg-3 mb-2">
                                            Blog title heading will go here
                                        </h3>
                                        <p class="body-txt2 txt--clr mb-lg-4 mb-2">
                                            How do you create compelling presentations that wow your
                                            colleagues and impress your managers?
                                        </p>
                                    </div>
                                    <div class="blog-profile-img d-flex">
                                        <div class="auth-profile-img me-lg-3 me-2">
                                            <img src="{{ asset('assets/frontend/icons/blog-auth-img.svg') }}"
                                                alt="" />
                                        </div>
                                        <div class="blog-card-meta">
                                            <h3 class="head--4 secondary--clr mb-0">Full name</h3>
                                            <div class="body-txt2 txt--clr mb-0">
                                                11 Dec 2024 • 5 min read
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="recent-blog-col2">
                            <div class="our-rblog-card d-flex flex-md-row flex-column mb-4">
                                <div class="blog-img-wrap w-md-50">
                                    <a href="blog-details.html"><img
                                            src="{{ asset('assets/frontend/images/recent-blogs-img2.webp') }}"
                                            alt="" class="card-img rcard-img-right" /></a>
                                </div>
                                <div class="rblog-card-content w-md-50 p-4">
                                    <div class="cat-tag-wrap mb-lg-3 mb-2">
                                        <p class="body-txt2 primary--clr mb-0">Technology</p>
                                    </div>
                                    <div class="position-relative">
                                        <img src="{{ asset('assets/frontend/icons/forward-arrow.svg') }}" alt=""
                                            class="forward-arrow position-absolute" />
                                        <h3 class="head--3 secondary--clr mb-lg-3 mb-2">
                                            Lorem ipsum dolor
                                        </h3>
                                        <p class="body-txt2 txt--clr mb-lg-4 mb-2">
                                            Linear helps streamline software projects, sprints...
                                            <a href="pages/blog-details.html" class="blog-excerpt-readmore">Read More</a>
                                        </p>
                                    </div>
                                    <div class="blog-profile-img d-flex">
                                        <div class="auth-profile-img me-lg-3 me-2">
                                            <img src="{{ asset('assets/frontend/icons/blog-auth-img.svg') }}"
                                                alt="" />
                                        </div>
                                        <div class="blog-card-meta">
                                            <h3 class="head--4 secondary--clr mb-0">Full name</h3>
                                            <div class="body-txt2 txt--clr mb-0">
                                                11 Dec 2024 • 5 min read
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="our-rblog-card d-flex flex-md-row flex-column mb-4">
                                <div class="blog-img-wrap w-md-50">
                                    <a href=""><img
                                            src="{{ asset('assets/frontend/images/recent-blogs-img3.webp') }}"
                                            alt="" class="card-img rcard-img-right" /></a>
                                </div>
                                <div class="rblog-card-content w-md-50 p-4">
                                    <div class="cat-tag-wrap mb-lg-3 mb-2">
                                        <p class="body-txt2 primary--clr mb-0">Technology</p>
                                    </div>
                                    <div class="position-relative">
                                        <img src="{{ asset('assets/frontend/icons/forward-arrow.svg') }}" alt=""
                                            class="forward-arrow position-absolute" />
                                        <h3 class="head--3 secondary--clr mb-lg-3 mb-2">
                                            Lorem ipsum dolor
                                        </h3>
                                        <p class="body-txt2 txt--clr mb-lg-4 mb-2">
                                            Linear helps streamline software projects, sprints...
                                            <a href="pages/blog-details.html" class="blog-excerpt-readmore">Read More</a>
                                        </p>
                                    </div>
                                    <div class="blog-profile-img d-flex">
                                        <div class="auth-profile-img me-lg-3 me-2">
                                            <img src="{{ asset('assets/frontend/icons/blog-auth-img.svg') }}"
                                                alt="" />
                                        </div>
                                        <div class="blog-card-meta">
                                            <h3 class="head--4 secondary--clr mb-0">Full name</h3>
                                            <div class="body-txt2 txt--clr mb-0">
                                                11 Dec 2024 • 5 min read
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid d-flex flex-column justify-content-center py-40px afcon--our-services">
            <div class="container">
                <div class="row flex-column">
                    <div class="services-sec d-flex flex-column justify-content-center align-items-center text-center">
                        <h2 class="head--2 mb-0 pyb-40 secondary--clr text-center">
                            All Blog Posts
                        </h2>
                    </div>
                    <div class="blog-sec">
                        <div class="tabs d-flex flex-column justify-content-center">
                            <div class="fit-content align-self-center p-2 mbl-full-width">
                                <ul id="tabs-nav" class="d-md-block d-none">
                                    <li>
                                        <a href="#all"
                                            class="body-txt2 txt--clr text-decoration-none text-center">All</a>
                                    </li>
                                    <li>
                                        <a href="#technology"
                                            class="body-txt2 txt--clr text-decoration-none text-center">Technology</a>
                                    </li>
                                    <li>
                                        <a href="#trading_less"
                                            class="body-txt2 txt--clr text-decoration-none text-center">Trading
                                            Less Often</a>
                                    </li>
                                    <li>
                                        <a href="#trading_more"
                                            class="body-txt2 txt--clr text-decoration-none text-center">Trading
                                            More Often</a>
                                    </li>
                                </ul>
                                <!-- END tabs-nav -->
                                <div class="dropdown d-md-none d-block w-100">
                                    <button class="btn dropdown-toggle w-100 tabs-mbl-dropper" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        All
                                    </button>
                                    <ul class="dropdown-menu w-100" id="tabs-nav">
                                        <li>
                                            <a href="#all"
                                                class="body-txt2 txt--clr text-decoration-none text-center">All</a>
                                        </li>
                                        <li>
                                            <a href="#technology"
                                                class="body-txt2 txt--clr text-decoration-none text-center">Technology</a>
                                        </li>
                                        <li>
                                            <a href="#trading_less"
                                                class="body-txt2 txt--clr text-decoration-none text-center">Trading Less
                                                Often</a>
                                        </li>
                                        <li>
                                            <a href="#trading_more"
                                                class="body-txt2 txt--clr text-decoration-none text-center">Trading More
                                                Often</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="tabs-content">
                                <div id="all" class="tab-content">
                                    <div class="our--blog d-flex justify-content-between flex-wrap">
                                        @include('include.blog-card')
                                    </div>
                                    <hr class="m-0" />
                                    @include('include.pagination')
                                </div>
                                <div id="technology" class="tab-content">
                                    <div class="our--blog d-flex justify-content-between flex-wrap">
                                        @include('include.blog-card')
                                    </div>
                                    <hr class="m-0" />
                                    @include('include.pagination')
                                </div>
                                <div id="trading_less" class="tab-content">
                                    <div class="our--blog d-flex justify-content-between flex-wrap">
                                        @include('include.blog-card')
                                    </div>
                                    <hr class="m-0" />
                                    @include('include.pagination')
                                </div>
                                <div id="trading_more" class="tab-content">
                                    <div class="our--blog d-flex justify-content-between flex-wrap">
                                        @include('include.blog-card')
                                    </div>
                                    <hr class="m-0" />
                                    @include('include.pagination')
                                </div>
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
@endsection

<!-- ///////////////////////// Header Section /////////////////////// -->
@php
    $projects = App\Models\Project::where('status', 'active')->latest()->take(5)->get();
    $logo = \DB::table('settings')->where('id', 1)->pluck('logo')->first();
@endphp
<header>
    <!-- Top Navigation Bar -->
    <div class="container-fluid top--menu-bar d-md-block d-none d-flex flex-row align-items-center bg-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-6 d-flex justify-content-start align-items-center">
                    <div class="whatsapp-contact d-flex justify-content-start align-items-center">
                        <img src="{{ asset('assets/frontend/icons/whatsapp-icon.svg') }}" alt="" />
                        <p class="body-txt2 mb-0 ms-2">+1(888)-855-5328</p>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <div class="btn-group secondary--font">
                        <button type="button" class="btn dropdown-toggle lang-switch-selected p-0 body-txt2"
                            data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            <span>
                                <img id="current-lang-flag" src="{{ asset('assets/frontend/icons/english-flag.svg') }}"
                                    class="me-2" alt="" />
                                <span id="current-lang-text">English</span>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end mt-2 lang-dropdown">
                            <li>
                                <a class="dropdown-item lang-switch-drop body-txt2" href="#" data-lang="en"
                                    onclick="setLanguage('en')">
                                    <img src="{{ asset('assets/frontend/icons/english-flag.svg') }}" alt=""
                                        class="me-2" />
                                    English
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item lang-switch-drop body-txt2" href="#" data-lang="fr"
                                    onclick="setLanguage('fr')">
                                    <img src="{{ asset('assets/frontend/icons/french-flag.svg') }}" alt=""
                                        class="me-2" />
                                    French
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Primary Navigation Bar -->
    <div class="container-fluid primary--bar-wrapper my-lg-4 my-2 position-absolute d-md-block d-none">
        <div class="container primary--menu-bar">
            <div class="row">
                <div class="col-2 d-flex align-items-center">
                    <a href="{{ route('index') }}"><img
                            src="{{ asset($logo ? 'storage/images/' . $logo : 'assets/frontend/icons/afcon-group-logo.svg') }}"
                            alt="logo" class="afcon-group-logo" /></a>
                </div>
                <div class="col-10 d-flex justify-content-end px-0">
                    <nav class="navbar navbar-expand-md py-0">
                        <div class="container-fluid px-0">
                            <div class="navbar py-0" id="navbarNavDropdown">
                                <ul class="navbar-nav d-flex">
                                    <li class="nav-item">
                                        <a class="nav-link primary-menu-links body-txt1 wht--clr {{ request()->routeIs('index') ? 'active' : '' }}"
                                            aria-current="page" href="{{ route('index') }}">{{ __('lang.home') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link body-txt1 wht--clr primary-menu-links {{ request()->routeIs('about-us.index') ? 'active' : '' }}"
                                            href="{{ route('about-us.index') }}">{{ __('lang.about_us') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link body-txt1 wht--clr primary-menu-links {{ request()->routeIs('companies.index') ? 'active' : '' }}"
                                            href="{{ route('companies.index') }}">{{ __('lang.services') }}</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle primary-menu-links body-txt1 wht--clr {{ request()->routeIs('projects.index') ? 'active' : '' }}"
                                            href="{{ route('projects.index') }}" role="button" aria-expanded="false">
                                            {{ __('lang.projects') }}
                                        </a>
                                        @if (count($projects) > 0)
                                            <ul class="dropdown-menu hover-dropdown-menu">
                                                @foreach ($projects as $project)
                                                    <li>
                                                        <a class="dropdown-item secondary--font fw-md"
                                                            href="{{ url('projects') . '/' . $project->slug }}">{{ $project->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link primary-menu-links body-txt1 wht--clr {{ request()->routeIs('blogs.index') ? 'active' : '' }}"
                                            href="{{ route('blogs.index') }}">{{ __('lang.blog') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link primary-menu-links body-txt1 wht--clr {{ request()->routeIs('careers.index') ? 'active' : '' }}"
                                            href="{{ route('careers.index') }}">{{ __('lang.careers') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link primary-menu-links body-txt1 wht--clr {{ request()->routeIs('contact-us.index') ? 'active' : '' }}"
                                            href="{{ route('contact-us.index') }}">{{ __('lang.CONTACT_US') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (visible on small screens) -->
    <div class="container-fluid mob--offcanvas-menu d-md-none d-sm-block position-absolute py-4">
        <div class="container">
            <div class="row m-0">
                <!-- Mobile Logo -->
                <div class="col-6">
                    <div class="mob-menu-logo">
                        <a href="{{ route('index') }}"><img
                                src="{{ asset($logo ? 'storage/images/' . $logo : 'assets/frontend/icons/afcon-group-logo.svg') }}"
                                class="afcon-group-logo" alt="E-cart Logo" /></a>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <div id="myNav" class="overlay">
                        <div class="row mob-top-bar d-flex flex-row justify-content-between">
                            <div class="col-6 position-relative">
                                <div class="btn-group secondary--font position-absolute">
                                    <button type="button"
                                        class="btn dropdown-toggle lang-switch-selected p-0 body-txt2 mbl-lang-switcher"
                                        data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                        <span>
                                            <img src="{{ asset('assets/frontend/icons/english-flag.svg') }}"
                                                class="me-2" alt="" />English</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-lg-end mt-2 lang-dropdown">
                                        <li>
                                            <a class="dropdown-item lang-switch-drop body-txt2" href="#">
                                                <img src="{{ asset('assets/frontend/icons/english-flag.svg') }}"
                                                    alt="" class="me-2" />English</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item lang-switch-drop body-txt2" href="#">
                                                <img src="{{ asset('assets/frontend/icons/french-flag.svg') }}"
                                                    alt="" class="me-2" />French</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 position-relative">
                                <a href="javascript:void(0)" class="closebtn position-absolute"
                                    onclick="closeNav()">&times;</a>
                            </div>
                        </div>
                        <div class="overlay-content">
                            <nav class="navbar navbar-expand-md">
                                <div class="container-fluid px-0">
                                    <div class="navbar w-100" id="navbarNavDropdown">
                                        <ul class="navbar-nav d-flex w-100">
                                            <li class="nav-item">
                                                <a class="nav-link active primary-menu-links body-txt1 wht--clr text-start"
                                                    aria-current="page" href="index.html">Home</a>
                                            </li>
                                            <hr />
                                            <li class="nav-item">
                                                <a class="nav-link body-txt1 wht--clr primary-menu-links text-start"
                                                    href="pages/about-us.html">About Us</a>
                                            </li>
                                            <hr />
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle body-txt1 wht--clr primary-menu-links text-start"
                                                    href="pages/services.html" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Services
                                                </a>
                                                <ul class="dropdown-menu w-100 mob-dropdown">
                                                    <li>
                                                        <a class="dropdown-item secondary--font fw-md secondary--font fw-md text-start"
                                                            href="pages/services-detail.html">Technology</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item secondary--font fw-md secondary--font fw-md text-start"
                                                            href="pages/services-detail.html">Construction</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item secondary--font fw-md secondary--font fw-md text-start"
                                                            href="pages/services-detail.html">General Trade</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item secondary--font fw-md secondary--font fw-md text-start"
                                                            href="pages/services-detail.html">Real Estate</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <hr />
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle primary-menu-links body-txt1 wht--clr text-start"
                                                    href="pages/projects.html" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Projects
                                                </a>
                                                <ul class="dropdown-menu mob-dropdown ">
                                                    <li>
                                                        <a class="dropdown-item secondary--font fw-md"
                                                            href="pages/project-details.html">PMR</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item secondary--font fw-md"
                                                            href="pages/project-details.html">PMR 2</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item secondary--font fw-md"
                                                            href="pages/project-details.html">PMR 3</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <hr />
                                            <li class="nav-item">
                                                <a class="nav-link primary-menu-links body-txt1 wht--clr text-start"
                                                    href="pages/our-reach.html">Our Reach</a>
                                            </li>
                                            <hr />
                                            <li class="nav-item">
                                                <a class="nav-link primary-menu-links body-txt1 wht--clr text-start"
                                                    href="pages/blogs.html">Blog</a>
                                            </li>
                                            <hr />
                                            <li class="nav-item">
                                                <a class="nav-link primary-menu-links body-txt1 wht--clr text-start"
                                                    href="pages/careers.html">Careers</a>
                                            </li>
                                            <hr />
                                            <li class="nav-item">
                                                <a class="nav-link primary-menu-links body-txt1 wht--clr text-start"
                                                    href="pages/contact-us.html">Contact Us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <span style="font-size: 30px; cursor: pointer" class="wht--clr"
                        onclick="openNav()">&#9776;</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- /////////////////////////Header Section Ends /////////////////////// -->

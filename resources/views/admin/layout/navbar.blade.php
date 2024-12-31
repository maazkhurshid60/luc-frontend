<header class="main-header skin-blue">
    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>AG</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{{ $settings->siteName ?? env('APP_NAME') }}</span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if (auth()->user()->image)
                            <img src="{{ asset('storage/images/' . $user_image) }}" class="user-image rounded-circle"
                                alt="User Image">
                        @else
                            <img src="{{ asset('assets/backend/images/' . $user_image) }}"
                                class="user-image rounded-circle" alt="User Image">
                        @endif
                    </a>
                    <ul class="dropdown-menu scale-up">
                        <!-- User image -->
                        <li class="user-header">
                            @if (auth()->user()->image)
                                <img src="{{ asset('storage/images/' . $user_image) }}" class="rounded float-left"
                                    alt="User Image">
                            @else
                                <img src="{{ asset('assets/backend/images/' . $user_image) }}"
                                    class="user-image rounded-circle" alt="User Image">
                            @endif
                            <p>
                                {{ Auth::user()->name }}
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">

                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-block btn-primary">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                    class="btn btn-block btn-danger">{{ __('Sign out') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <a  class=" dropdown-toggle lang-switch-selected p-0 body-txt2" href="#" data-toggle="dropdown" type="button">
                        <img id="current-lang-flag" src="{{ asset('assets/frontend/icons/english-flag.svg') }}" class="user-image" alt="Language Flag" />
                        <span id="current-lang-text">English</span>
                    </a>
                    <ul class="dropdown-menu scale-up">
                        <!-- Dropdown Header -->
                        <li class="user-header">
                            <img id="current-lang-flag" src="{{ asset('assets/frontend/icons/english-flag.svg') }}" class="img-circle" alt="Language Flag" />
                        </li>
                        <!-- Dropdown Body -->
                        <li class="user-body">
                            <div class="row align-items-center justify-content-around">
                                <div class="col-xs-12">
                                    <a href="#" class="lang-switch-drop body-txt2" data-lang="en" onclick="setLanguage('en')">
                                        <img src="{{ asset('assets/frontend/icons/english-flag.svg') }}" alt="English Flag" class="me-2" />
                                        English
                                    </a>
                                </div>
                                <div class="col-xs-12">
                                    <a href="#" class="lang-switch-drop body-txt2" data-lang="fr" onclick="setLanguage('fr')">
                                        <img src="{{ asset('assets/frontend/icons/french-flag.svg') }}" alt="French Flag" class="me-2" />
                                        French
                                    </a>
                                </div>
                            </div>
                        </li>
              
                    </ul>
                </li>                
            </ul>
        </div>
    </nav>
</header>

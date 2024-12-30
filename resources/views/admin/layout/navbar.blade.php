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
            </ul>
        </div>
    </nav>
</header>

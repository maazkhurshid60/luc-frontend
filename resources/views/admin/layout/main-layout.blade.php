@include('admin.layout.header')

<body
    class="hold-transition skin-black fixed  @isset($other['menu-class']) {{ $other['menu-class'] }} @endisset sidebar-mini">

    <div class="wrapper">
        @php
            if (is_null(Auth::user()->image)) {
                $user_image = 'user-default.png';
            } else {
                $user_image = Auth::user()->image;
            }
        @endphp

        @include('admin.layout.navbar')

        <!-- Control Sidebar Toggle Button -->
        <div>
            {{-- <button class="control-sidebar-btn btn btn-dark" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></button> --}}
        </div>
        <!-- Left side column. contains the logo and sidebar -->

        @include('admin.layout.sidebar')
        <!-- Content Wrapper. Contains page content -->
        @yield('content')

        @include('admin.layout.footer')
</body>

</html>

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
        <script>
            function setLanguage(lang) {
                // Save selected language in localStorage
                localStorage.setItem('lang', lang);

                // Update the flag and text for the current language
                const flagImg = document.getElementById('current-lang-flag');
                const langText = document.getElementById('current-lang-text');

                if (flagImg && langText) {
                    if (lang === 'fr') {
                        flagImg.src = '{{ asset('assets/frontend/icons/french-flag.svg') }}';
                        langText.innerText = 'French';
                    } else {
                        flagImg.src = '{{ asset('assets/frontend/icons/english-flag.svg') }}';
                        langText.innerText = 'English';
                    }
                }

                // Forcefully reload the page without including the current session lang
                const url = new URL(window.location.href);
                url.searchParams.set('lang', lang); // Override with the new language
                window.location.href = url.toString();
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Get the saved language from localStorage or default to 'en'
                const currentLang = localStorage.getItem('lang') || 'en';

                // Update the current language in the dropdown UI
                const flagImg = document.getElementById('current-lang-flag');
                const langText = document.getElementById('current-lang-text');

                if (flagImg && langText) {
                    if (currentLang === 'fr') {
                        flagImg.src = '{{ asset('assets/frontend/icons/french-flag.svg') }}';
                        langText.innerText = 'French';
                    } else {
                        flagImg.src = '{{ asset('assets/frontend/icons/english-flag.svg') }}';
                        langText.innerText = 'English';
                    }
                }

                // Update internal links, skipping those with the 'lang-switch-drop' class
                const links = document.querySelectorAll('a');
                links.forEach(link => {
                    if (link.classList.contains('lang-switch-drop')) return; // Skip language change links

                    let url;
                    try {
                        url = new URL(link.href, window.location.origin); // Handle relative links
                    } catch {
                        // Skip invalid or missing links
                        return;
                    }
                    if (url.origin !== window.location.origin) return;

                    // Add the lang parameter if it doesn't already exist
                    if (!url.searchParams.has('lang')) {
                        url.searchParams.set('lang', currentLang);
                        link.href = url.toString();
                    }
                });
            });
        </script>

</body>

</html>

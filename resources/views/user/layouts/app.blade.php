<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="{{ __('Union Group - Leading manufacturer of premium paints, coatings, and industrial solutions in the Middle East.') }}">
    <meta name="author" content="Union Group">
    <title>{{ $title ?? __('Home') }} - {{ __('Union Group') }}</title>

    <link rel="shortcut icon" href="{{ asset('user/images/logo.png') }}" type="image/x-icon">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('user/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/custom.css') }}" rel="stylesheet">

    <!-- JavaScripts -->
    <script src="{{ asset('user/js/modernizr.js') }}"></script>

    <!-- Online Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @stack('styles')

</head>

<body>

    <!-- LOADER -->
    <div id="loader">
        <div class="position-center-center">
            {{-- <div class="ldr"></div> --}}
            <img src="{{ asset('user/images/logo.gif') }}" alt="{{ __('Union Group') }}" class="img-responsive" style="max-height: 350px;">
        </div>
    </div>

    <!-- Wrap -->
    <div id="wrap">

        <!-- header -->
        @include('user.layouts.header')

        @yield('content')

        <!--======= FOOTER =========-->
        @include('user.layouts.footer')

    </div>

    <script src="{{ asset('user/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('user/js/own-menu.js') }}" defer></script>
    <script src="{{ asset('user/js/jquery.lighter.js') }}" defer></script>
    <script src="{{ asset('user/js/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('user/js/main.js') }}" defer></script>
    <script src="{{ asset('user/js/scroll-reveal.js') }}" defer></script>
    <script>
        (function() {
            function isMobileNav() { return window.innerWidth <= 991; }

            function initMobileNavDropdown() {
                if (typeof jQuery === 'undefined') return;
                var $doc = jQuery(document);

                // Products dropdown: toggle on tap (prevent Bootstrap from also toggling so menu stays open)
                $doc.on('click', '#nav-open-btn .nav .dropdown .dropdown-toggle', function(e) {
                    if (isMobileNav()) {
                        e.preventDefault();
                        e.stopPropagation();
                        e.stopImmediatePropagation();
                        jQuery(this).closest('.dropdown').toggleClass('open');
                        return false;
                    }
                });

                // Language: capture phase so we run before Bootstrap; position menu fixed below toggle
                document.addEventListener('click', function langDropdownCapture(e) {
                    if (!isMobileNav()) return;
                    var target = e.target;
                    var toggle = target.closest && target.closest('.nav-right .dropdown .dropdown-toggle');
                    if (toggle) {
                        e.preventDefault();
                        e.stopPropagation();
                        var dropdown = toggle.closest('.dropdown');
                        if (dropdown) {
                            var menu = dropdown.querySelector('.dropdown-menu');
                            var isOpening = !dropdown.classList.contains('open');
                            dropdown.classList.toggle('open');
                            if (menu && isOpening) {
                                var rect = toggle.getBoundingClientRect();
                                menu.style.top = (rect.bottom + 4) + 'px';
                                menu.style.left = rect.left + 'px';
                                menu.style.right = 'auto';
                                if (document.documentElement.getAttribute('lang') === 'ar') {
                                    menu.style.left = 'auto';
                                    menu.style.right = (window.innerWidth - rect.right) + 'px';
                                }
                            }
                        }
                        return;
                    }
                    var inLang = target.closest && target.closest('.nav-right .dropdown');
                    if (!inLang) {
                        var open = document.querySelector('.nav-right .dropdown.open');
                        if (open) open.classList.remove('open');
                    }
                }, true);

                // Let dropdown menu links navigate on first tap (don’t close before click)
                $doc.on('click', '#nav-open-btn .nav .dropdown-menu a[href]', function() {
                    if (isMobileNav()) {
                        // Allow default navigation; collapse will close when page changes
                    }
                });
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initMobileNavDropdown);
            } else {
                initMobileNavDropdown();
            }
        })();
    </script>

    @stack('scripts')

</body>

</html>

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

    @stack('scripts')

</body>

</html>

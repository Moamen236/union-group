@php
    $navCategories = \App\Models\ProductCategory::active()->ordered()->take(8)->get();
    $navFeaturedProducts = \App\Models\Product::with(['category', 'images'])
        ->active()
        ->favorite()
        ->ordered()
        ->take(3)
        ->get();
@endphp

<header class="header-compact">
    <div class="sticky">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{ route('user.index') }}">
                        <img class="img-responsive" src="{{ asset('user/images/logo.gif') }}"
                            alt="{{ __('Union Group') }}">
                    </a>
                </div>

                <nav class="navbar ownmenu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#nav-open-btn" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"><i class="fa fa-navicon"></i></span>
                        </button>
                    </div>

                    <!-- NAV (collapse contains only nav links; nav-right stays next to tabs on mobile) -->
                    <div class="collapse navbar-collapse" id="nav-open-btn">
                        <ul class="nav">
                            <li class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
                                <a href="{{ route('user.index') }}">{{ __('Home') }}</a>
                            </li>

                            <li class="{{ request()->routeIs('user.about') ? 'active' : '' }}">
                                <a href="{{ route('user.about') }}">{{ __('About') }}</a>
                            </li>

                            <li class="dropdown {{ request()->routeIs('user.shop') || request()->routeIs('user.product-detail') ? 'active' : '' }}">
                                <a href="{{ route('user.shop') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    {{ __('Products') }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('user.shop') }}">{{ __('All Products') }}</a></li>
                                    @if($navCategories->isNotEmpty())
                                        <li role="separator" class="divider"></li>
                                        @foreach($navCategories as $cat)
                                            <li class="{{ request()->routeIs('user.shop') && request()->get('category') === $cat->slug ? 'active' : '' }}">
                                                <a href="{{ route('user.shop', ['category' => $cat->slug]) }}">{{ $cat->name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>

                            <li class="{{ request()->routeIs('user.projects') ? 'active' : '' }}">
                                <a href="{{ route('user.projects') }}">{{ __('Projects') }}</a>
                            </li>

                            <li class="{{ request()->routeIs('user.certificates') ? 'active' : '' }}">
                                <a href="{{ route('user.certificates') }}">{{ __('Certificates') }}</a>
                            </li>

                            <li class="{{ request()->routeIs('user.contact') ? 'active' : '' }}">
                                <a href="{{ route('user.contact') }}">{{ __('Contact') }}</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Nav Right (language + search) – next to tabs / hamburger on mobile -->
                    <div class="nav-right">
                        <ul class="navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                    <i class="fa fa-globe"></i>
                                    {{ app()->getLocale() == 'ar' ? 'العربية' : 'EN' }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('user.set-locale', 'en') }}">English</a></li>
                                    <li><a href="{{ route('user.set-locale', 'ar') }}">العربية</a></li>
                                </ul>
                            </li>
                            <li class="navbar-search">
                                <form action="{{ route('user.shop') }}" method="GET" class="nav-search-form">
                                    <div class="nav-search">
                                        <input type="search" name="search"
                                            placeholder="{{ __('Search Products...') }}">
                                        <button type="submit"><i class="icon-magnifier"></i></button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

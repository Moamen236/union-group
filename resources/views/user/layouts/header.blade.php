@php
    $navCategories = \App\Models\ProductCategory::active()->ordered()->take(8)->get();
    $navFeaturedProducts = \App\Models\Product::with(['category', 'images'])
        ->active()
        ->favorite()
        ->ordered()
        ->take(3)
        ->get();
@endphp

<header>
    <div class="sticky">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{ route('user.index') }}">
                        <img class="img-responsive" src="{{ asset('user/images/logo.png') }}"
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

                    <!-- NAV -->
                    <div class="collapse navbar-collapse" id="nav-open-btn">
                        <ul class="nav">
                            <li class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
                                <a href="{{ route('user.index') }}">{{ __('Home') }}</a>
                            </li>

                            <li class="{{ request()->routeIs('user.about') ? 'active' : '' }}">
                                <a href="{{ route('user.about') }}">{{ __('About') }}</a>
                            </li>

                            <!-- Products Dropdown -->
                            <li
                                class="dropdown {{ request()->routeIs('user.shop') || request()->routeIs('user.product-detail') ? 'active' : '' }}">
                                <a href="{{ route('user.shop') }}" class="dropdown-toggle"
                                    data-toggle="dropdown">{{ __('Products') }}</a>
                                <div class="dropdown-menu two-option">
                                    <div class="row">
                                        <ul class="col-sm-6">
                                            @foreach ($navCategories->take(4) as $category)
                                                <li><a
                                                        href="{{ route('user.shop', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <ul class="col-sm-6">
                                            @foreach ($navCategories->skip(4)->take(4) as $category)
                                                <li><a
                                                        href="{{ route('user.shop', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                            <li><a
                                                    href="{{ route('user.shop') }}"><strong>{{ __('View All Products') }}</strong></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
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

                    <!-- Nav Right -->
                    <div class="nav-right">
                        <ul class="navbar-right">
                            <!-- Language Switcher -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                    <i class="fa fa-globe"></i>
                                    {{ app()->getLocale() == 'ar' ? 'العربية' : 'EN' }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('locale/en') }}">English</a></li>
                                    <li><a href="{{ url('locale/ar') }}">العربية</a></li>
                                </ul>
                            </li>

                            <!-- SEARCH BAR -->
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="search-open"><i class="icon-magnifier"></i></a>
                                <div class="search-inside animated bounceInUp">
                                    <i class="icon-close search-close"></i>
                                    <div class="search-overlay"></div>
                                    <div class="position-center-center">
                                        <div class="search">
                                            <form action="{{ route('user.shop') }}" method="GET">
                                                <input type="search" name="search"
                                                    placeholder="{{ __('Search Products...') }}">
                                                <button type="submit"><i class="icon-check"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

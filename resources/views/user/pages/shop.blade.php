@extends('user.layouts.app')

@section('content')

    <!--======= SUB BANNER =========-->
    <section class="sub-bnr" data-stellar-background-ratio="0.5">
        <div class="position-center-center">
            <div class="container">
                <h4>{{ $currentCategory ? $currentCategory->name : __('Our Products') }}</h4>
                <p>{{ $currentCategory ? $currentCategory->description : __('Explore our comprehensive range of premium paints, coatings, and specialty products.') }}
                </p>
                <ol class="breadcrumb">
                    <li><a href="{{ route('user.index') }}">{{ __('Home') }}</a></li>
                    @if ($currentCategory)
                        <li><a href="{{ route('user.shop') }}">{{ __('Shop') }}</a></li>
                        <li class="active">{{ $currentCategory->name }}</li>
                    @else
                        <li class="active">{{ __('Shop') }}</li>
                    @endif
                </ol>
            </div>
        </div>
    </section>

    <!-- Content -->
    <div id="content">

        <!-- Products Section -->
        <section class="shop-page padding-top-100 padding-bottom-100 reveal-on-scroll">
            <div class="container">
                <div class="row">
                    <!-- Sidebar with Categories (always visible list) -->
                    <div class="col-md-3">
                        <div class="shop-sidebar">
                            <h5 class="sidebar-title">{{ __('Categories') }}</h5>
                            <ul class="category-list">
                                <li class="{{ !$currentCategory ? 'active' : '' }}">
                                    <a href="{{ route('user.shop', request()->only('sort', 'search')) }}">
                                        {{ __('All Products') }}
                                        <span class="badge">{{ $totalProductsCount }}</span>
                                    </a>
                                </li>
                                @foreach ($categories as $category)
                                    <li class="{{ $currentCategory && $currentCategory->id == $category->id ? 'active' : '' }}">
                                        <a href="{{ route('user.shop', array_merge(request()->only('sort', 'search'), ['category' => $category->slug])) }}">
                                            {{ $category->name }}
                                            <span class="badge">{{ $category->products_count }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="col-md-9">
                        <div class="item-display">
                            <div class="row">
                                <div class="col-xs-6">
                                    <span class="product-num">
                                        {{ __('Showing') }} {{ $products->firstItem() ?? 0 }} -
                                        {{ $products->lastItem() ?? 0 }} {{ __('of') }} {{ $products->total() }}
                                        {{ __('products') }}
                                    </span>
                                </div>
                                <div class="col-xs-6">
                                    <div class="pull-right">
                                        <select class="selectpicker" onchange="window.location.href=this.value">
                                            <option
                                                value="{{ route('user.shop', array_merge(request()->except('sort'), ['sort' => 'order'])) }}"
                                                {{ $currentSort == 'order' ? 'selected' : '' }}>{{ __('Default Order') }}
                                            </option>
                                            <option
                                                value="{{ route('user.shop', array_merge(request()->except('sort'), ['sort' => 'name_asc'])) }}"
                                                {{ $currentSort == 'name_asc' ? 'selected' : '' }}>{{ __('Name A-Z') }}
                                            </option>
                                            <option
                                                value="{{ route('user.shop', array_merge(request()->except('sort'), ['sort' => 'name_desc'])) }}"
                                                {{ $currentSort == 'name_desc' ? 'selected' : '' }}>{{ __('Name Z-A') }}
                                            </option>
                                            <option
                                                value="{{ route('user.shop', array_merge(request()->except('sort'), ['sort' => 'newest'])) }}"
                                                {{ $currentSort == 'newest' ? 'selected' : '' }}>{{ __('Newest First') }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($products->count() > 0)
                            <div class="papular-block row">
                                @foreach ($products as $product)
                                    {{-- <div class="col-md-4"> --}}
                                    <div class="item">
                                        @if ($product->is_favorite)
                                            <div class="on-sale">
                                                <i class="fa fa-star"></i>
                                                <span>{{ __('TOP') }}</span>
                                            </div>
                                        @endif

                                        <div class="item-img">
                                            @if ($product->mainImage())
                                                <img class="img-1" src="{{ $product->main_image_url }}"
                                                    alt="{{ $product->name }}" loading="lazy">
                                                <img class="img-2"
                                                    src="{{ $product->second_image_url ?? $product->main_image_url }}"
                                                    alt="{{ $product->name }}" loading="lazy">
                                            @else
                                                <img class="img-1"
                                                    src="{{ asset('user/images/product-placeholder.jpg') }}"
                                                    alt="{{ $product->name }}" loading="lazy">
                                                <img class="img-2"
                                                    src="{{ asset('user/images/product-placeholder.jpg') }}"
                                                    alt="{{ $product->name }}" loading="lazy">
                                            @endif
                                            <div class="overlay">
                                                <div class="position-center-center">
                                                    <div class="inn">
                                                        @if ($product->mainImage())
                                                            <a href="{{ $product->main_image_url }}" data-lighter><i
                                                                    class="icon-magnifier"></i></a>
                                                        @endif
                                                        <a href="{{ route('user.product-detail', $product->slug) }}"><i
                                                                class="icon-eye"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item-name">
                                            <a
                                                href="{{ route('user.product-detail', $product->slug) }}">{{ $product->name }}</a>
                                            <p>{{ $product->category ? $product->category->name : '' }}</p>
                                        </div>
                                        @if ($product->code)
                                            <span class="price">{{ $product->code }}</span>
                                        @endif
                                    </div>
                                    {{-- </div> --}}
                                @endforeach
                            </div>

                            <!-- Pagination (preserves category, sort, search) -->
                            @if ($products->hasPages())
                                <div class="margin-top-50 pagination-wrap text-center">
                                    {{ $products->withQueryString()->links() }}
                                </div>
                            @endif
                        @else
                            <div class="text-center padding-top-50 padding-bottom-50">
                                <h4>{{ __('No products found') }}</h4>
                                <p>{{ __('Try selecting a different category or check back later.') }}</p>
                                <a href="{{ route('user.shop') }}"
                                    class="btn margin-top-20">{{ __('View All Products') }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('styles')
    <style>
        .shop-sidebar {
            background: #f9f9f9;
            padding: 20px;
            margin-bottom: 30px;
        }

        .shop-sidebar .sidebar-title {
            margin: 0 0 15px 0;
            padding-bottom: 10px;
            border-bottom: 2px solid #333;
            font-weight: 600;
            color: #333;
        }

        .category-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .category-list li {
            margin-bottom: 10px;
        }

        .category-list li a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background: #fff;
            color: #333;
            transition: all 0.3s;
        }

        .category-list li a:hover,
        .category-list li.active a {
            background: #333;
            color: #fff;
        }

        .category-list li a .badge {
            background: #999;
        }

        .category-list li.active a .badge,
        .category-list li a:hover .badge {
            background: #fff;
            color: #333;
        }

        .on-sale {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #f39c12;
            color: #fff;
            padding: 5px 10px;
            font-size: 12px;
            z-index: 1;
        }

        .papular-block.row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            padding: 0 20px;
        }

        .papular-block.row:before {
            content: "";
            display: none;
        }

        /* Pagination styles are in public/user/css/custom.css (.pagination-wrap) */
    </style>
@endpush

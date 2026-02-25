@extends('user.layouts.app')

@section('content')

    <!--======= SUB BANNER =========-->
    <section class="sub-bnr" data-stellar-background-ratio="0.5">
        <div class="position-center-center">
            <div class="container">
                <h4>{{ $product->name }}</h4>
                <p>{{ $product->category ? $product->category->name : '' }}</p>
                <ol class="breadcrumb">
                    <li><a href="{{ route('user.index') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('user.shop') }}">{{ __('Shop') }}</a></li>
                    @if ($product->category)
                        <li><a
                                href="{{ route('user.shop', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                        </li>
                    @endif
                    <li class="active">{{ $product->name }}</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Content -->
    <div id="content">

        <!-- Product Detail -->
        <section class="padding-top-100 padding-bottom-100 reveal-on-scroll">
            <div class="container">
                <div class="shop-detail">
                    <div class="row">

                        <!-- Product Images: main image + grid of variations -->
                        <div class="col-md-7">
                            <div class="product-gallery" id="product-gallery">
                                @php
                                    $galleryImages = $product->images->count() > 0
                                        ? $product->images->sortBy('order')->values()
                                        : collect();
                                @endphp
                                <div class="product-gallery-main">
                                    @if ($product->images->count() > 0)
                                        @php $first = $galleryImages->first(); @endphp
                                        <img id="product-gallery-main-img" class="img-responsive" src="{{ asset('storage/' . $first->image) }}"
                                            alt="{{ $product->name }}" loading="eager">
                                    @else
                                        <img id="product-gallery-main-img" class="img-responsive"
                                            src="{{ asset('user/images/product-placeholder.jpg') }}"
                                            alt="{{ $product->name }}" loading="eager">
                                    @endif
                                    <button type="button" class="product-gallery-nav product-gallery-prev" aria-label="{{ __('Previous') }}"><i class="fa fa-angle-left"></i></button>
                                    <button type="button" class="product-gallery-nav product-gallery-next" aria-label="{{ __('Next') }}"><i class="fa fa-angle-right"></i></button>
                                </div>
                                <div class="product-gallery-grid" role="tablist">
                                    @if ($product->images->count() > 0)
                                        @foreach ($galleryImages as $index => $image)
                                            <button type="button" class="product-gallery-thumb {{ $index === 0 ? 'active' : '' }}"
                                                data-color-id="{{ $image->color_id ?? 'all' }}"
                                                data-src="{{ asset('storage/' . $image->image) }}"
                                                role="tab"
                                                aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                                                aria-label="{{ $product->name }} {{ $index + 1 }}">
                                                <img src="{{ asset('storage/' . $image->image) }}" alt="" loading="lazy">
                                            </button>
                                        @endforeach
                                    @else
                                        <button type="button" class="product-gallery-thumb active" data-src="{{ asset('user/images/product-placeholder.jpg') }}" role="tab" aria-selected="true">
                                            <img src="{{ asset('user/images/product-placeholder.jpg') }}" alt="" loading="lazy">
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Product Content -->
                        <div class="col-md-5">
                            <h4>{{ $product->name }}</h4>

                            @if ($product->code)
                                <span class="price">{{ __('Code') }}: {{ $product->code }}</span>
                            @endif

                            @if ($product->is_favorite)
                                <div class="on-sale" style="position: relative; display: inline-block; margin-left: 10px;">
                                    <i class="fa fa-star"></i> {{ __('Featured') }}
                                </div>
                            @endif

                            <ul class="item-owner margin-top-20">
                                @if ($product->category)
                                    <li>{{ __('Category') }}: <span>{{ $product->category->name }}</span></li>
                                @endif
                                @if ($product->code)
                                    <li>{{ __('Product Code') }}: <span>{{ $product->code }}</span></li>
                                @endif
                            </ul>

                            <!-- Product Description -->
                            @if ($product->description)
                                <div class="product-description margin-top-20">
                                    <p>{{ $product->description }}</p>
                                </div>
                            @endif

                            <!-- Product Colors -->
                            @if ($product->colors->count() > 0)
                                <div class="product-colors-section margin-top-30">
                                    <h6 class="colors-title">{{ __('Available Colors') }}</h6>
                                    <div class="color-swatches">
                                        <button type="button" class="color-swatch active" data-color-id="all"
                                            title="{{ __('All Colors') }}">
                                            <span class="swatch-all">
                                                <i class="fa fa-th"></i>
                                            </span>
                                            <span class="color-name">{{ __('All') }}</span>
                                        </button>
                                        @foreach ($product->colors as $color)
                                            <button type="button" class="color-swatch" data-color-id="{{ $color->id }}"
                                                title="{{ $color->name }}">
                                                <span class="swatch-color"
                                                    style="background: {{ $color->hex_code }};"></span>
                                                <span class="color-name">{{ $color->name }}</span>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Contact Button -->
                            <div class="margin-top-30">
                                <a href="{{ route('user.contact') }}" class="btn">{{ __('Request Quotation') }}</a>
                            </div>

                            <!-- Share Product -->
                            <div class="inner-info margin-top-30">
                                <h6>{{ __('SHARE THIS PRODUCT') }}</h6>
                                <ul class="social_icons">
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                            target="_blank"><i class="icon-social-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($product->name) }}"
                                            target="_blank"><i class="icon-social-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($product->name) }}"
                                            target="_blank"><i class="icon-social-linkedin"></i></a></li>
                                    <li><a href="https://wa.me/?text={{ urlencode($product->name . ' - ' . request()->url()) }}"
                                            target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!--======= PRODUCT TABS =========-->
                <div class="item-decribe margin-top-50">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs animate fadeInUp" data-wow-delay="0.4s" role="tablist">
                        <li role="presentation" class="active"><a href="#descr" role="tab"
                                data-toggle="tab">{{ __('DESCRIPTION') }}</a></li>
                        @if ($product->features)
                            <li role="presentation"><a href="#features" role="tab"
                                    data-toggle="tab">{{ __('FEATURES') }}</a></li>
                        @endif
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content animate fadeInUp" data-wow-delay="0.4s">
                        <!-- DESCRIPTION -->
                        <div role="tabpanel" class="tab-pane fade in active" id="descr">
                            @if ($product->description)
                                <p>{{ $product->description }}</p>
                            @else
                                <p>{{ __('No description available for this product.') }}</p>
                            @endif
                        </div>

                        <!-- FEATURES -->
                        @if ($product->features)
                            <div role="tabpanel" class="tab-pane fade" id="features">
                                <h6>{{ __('PRODUCT FEATURES') }}</h6>
                                <ul>
                                    @foreach (explode("\n", $product->features) as $feature)
                                        @if (trim($feature))
                                            <li>
                                                <p>{{ trim(str_replace('•', '', $feature)) }}</p>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Products -->
        @if ($relatedProducts->count() > 0)
            <section class="light-gray-bg padding-top-150 padding-bottom-150 reveal-on-scroll">
                <div class="container">
                    <div class="heading text-center">
                        <h4>{{ __('Related Products') }}</h4>
                        <span>{{ __('You may also be interested in these products from the same category.') }}</span>
                    </div>

                    <div class="papular-block block-slide">
                        @foreach ($relatedProducts as $relatedProduct)
                            <div class="item">
                                <div class="item-img">
                                    @if ($relatedProduct->mainImage())
                                        <img class="img-1" src="{{ $relatedProduct->main_image_url }}"
                                            alt="{{ $relatedProduct->name }}" loading="lazy">
                                        <img class="img-2" src="{{ $relatedProduct->main_image_url }}"
                                            alt="{{ $relatedProduct->name }}" loading="lazy">
                                    @else
                                        <img class="img-1" src="{{ asset('user/images/product-placeholder.jpg') }}"
                                            alt="{{ $relatedProduct->name }}" loading="lazy">
                                        <img class="img-2" src="{{ asset('user/images/product-placeholder.jpg') }}"
                                            alt="{{ $relatedProduct->name }}" loading="lazy">
                                    @endif
                                    <div class="overlay">
                                        <div class="position-center-center">
                                            <div class="inn">
                                                @if ($relatedProduct->mainImage())
                                                    <a href="{{ $relatedProduct->main_image_url }}" data-lighter><i
                                                            class="icon-magnifier"></i></a>
                                                @endif
                                                <a href="{{ route('user.product-detail', $relatedProduct->slug) }}"><i
                                                        class="icon-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-name">
                                    <a
                                        href="{{ route('user.product-detail', $relatedProduct->slug) }}">{{ $relatedProduct->name }}</a>
                                    <p>{{ $relatedProduct->category ? $relatedProduct->category->name : '' }}</p>
                                </div>
                                @if ($relatedProduct->code)
                                    <span class="price">{{ $relatedProduct->code }}</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </div>

@endsection

@push('styles')
    <style>
        .sub-bnr{
            min-height: 300px;
        }
        .product-description {
            line-height: 1.8;
        }

        .on-sale {
            background: #f39c12;
            color: #fff;
            padding: 5px 10px;
            font-size: 12px;
        }

        /* Color Swatches Styles */
        .product-colors-section {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
        }

        .colors-title {
            margin-bottom: 15px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #333;
        }

        .color-swatches {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .color-swatch {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 8px;
            background: #fff;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 70px;
        }

        .color-swatch:hover {
            border-color: #999;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .color-swatch.active {
            border-color: #333;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .swatch-color {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .swatch-all {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6b6b 0%, #feca57 25%, #48dbfb 50%, #ff9ff3 75%, #54a0ff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 16px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .color-name {
            margin-top: 6px;
            font-size: 11px;
            color: #666;
            text-align: center;
            max-width: 60px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .color-swatch.active .color-name {
            color: #333;
            font-weight: 600;
        }

        /* Product gallery: main image + grid of variations */
        .product-gallery {
            background: #f9f9f9;
            border-radius: 12px;
            overflow: hidden;
            padding: 16px;
            border: 1px solid #eee;
        }

        .product-gallery-main {
            position: relative;
            width: 100%;
            aspect-ratio: 1;
            max-height: 480px;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-gallery-main img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .product-gallery-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            border: none;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.95);
            color: #333;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.15);
            transition: background 0.2s, color 0.2s;
            z-index: 2;
        }

        .product-gallery-nav:hover {
            background: #333;
            color: #fff;
        }

        .product-gallery-prev { left: 12px; }
        .product-gallery-next { right: 12px; }

        .product-gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        @media (min-width: 768px) {
            .product-gallery-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 767px) {
            .product-gallery-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .product-gallery-thumb {
            aspect-ratio: 1;
            padding: 0;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            background: #fff;
            cursor: pointer;
            overflow: hidden;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .product-gallery-thumb:hover {
            border-color: #999;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .product-gallery-thumb.active {
            border-color: #2d3a4b;
            box-shadow: 0 4px 12px rgba(45, 58, 75, 0.25);
        }

        .product-gallery-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .product-gallery-thumb.color-hidden {
            display: none !important;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const gallery = document.querySelector('#product-gallery');
            if (!gallery) return;

            const mainImg = document.getElementById('product-gallery-main-img');
            const thumbs = Array.from(gallery.querySelectorAll('.product-gallery-thumb'));
            const prevBtn = gallery.querySelector('.product-gallery-prev');
            const nextBtn = gallery.querySelector('.product-gallery-next');
            const colorSwatches = document.querySelectorAll('.color-swatch');

            function getVisibleThumbs() {
                return thumbs.filter(function(t) { return !t.classList.contains('color-hidden'); });
            }

            function setMainImage(src) {
                if (mainImg && src) mainImg.src = src;
            }

            function setActiveThumb(thumb) {
                thumbs.forEach(function(t) { t.classList.remove('active'); t.setAttribute('aria-selected', 'false'); });
                if (thumb) {
                    thumb.classList.add('active');
                    thumb.setAttribute('aria-selected', 'true');
                }
            }

            thumbs.forEach(function(thumb) {
                thumb.addEventListener('click', function() {
                    if (this.classList.contains('color-hidden')) return;
                    var src = this.getAttribute('data-src');
                    setMainImage(src);
                    setActiveThumb(this);
                });
            });

            if (prevBtn) {
                prevBtn.addEventListener('click', function() {
                    var visible = getVisibleThumbs();
                    var current = visible.find(function(t) { return t.classList.contains('active'); });
                    var idx = current ? visible.indexOf(current) : 0;
                    idx = idx <= 0 ? visible.length - 1 : idx - 1;
                    var prev = visible[idx];
                    if (prev) { setMainImage(prev.getAttribute('data-src')); setActiveThumb(prev); }
                });
            }
            if (nextBtn) {
                nextBtn.addEventListener('click', function() {
                    var visible = getVisibleThumbs();
                    var current = visible.find(function(t) { return t.classList.contains('active'); });
                    var idx = current ? visible.indexOf(current) : -1;
                    idx = idx >= visible.length - 1 ? 0 : idx + 1;
                    var next = visible[idx];
                    if (next) { setMainImage(next.getAttribute('data-src')); setActiveThumb(next); }
                });
            }

            if (colorSwatches.length > 0) {
                colorSwatches.forEach(function(swatch) {
                    swatch.addEventListener('click', function() {
                        var colorId = this.getAttribute('data-color-id');
                        colorSwatches.forEach(function(s) { s.classList.remove('active'); });
                        this.classList.add('active');

                        thumbs.forEach(function(thumb) {
                            var tid = thumb.getAttribute('data-color-id');
                            if (colorId === 'all' || tid === colorId || tid === 'all') {
                                thumb.classList.remove('color-hidden');
                            } else {
                                thumb.classList.add('color-hidden');
                            }
                        });

                        var visible = getVisibleThumbs();
                        var first = visible[0];
                        if (first) {
                            setMainImage(first.getAttribute('data-src'));
                            setActiveThumb(first);
                        }
                    });
                });
            }
        });
    </script>
@endpush

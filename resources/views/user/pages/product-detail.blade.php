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
        <section class="padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="shop-detail">
                    <div class="row">

                        <!-- Product Images Slider -->
                        <div class="col-md-7">
                            <div class="images-slider" id="product-slider">
                                <ul class="slides">
                                    @if ($product->images->count() > 0)
                                        @foreach ($product->images as $image)
                                            <li data-thumb="{{ asset('storage/' . $image->image) }}"
                                                data-color-id="{{ $image->color_id ?? 'all' }}">
                                                <img class="img-responsive" src="{{ asset('storage/' . $image->image) }}"
                                                    alt="{{ $product->name }}">
                                            </li>
                                        @endforeach
                                    @else
                                        <li data-thumb="{{ asset('user/images/product-placeholder.jpg') }}">
                                            <img class="img-responsive"
                                                src="{{ asset('user/images/product-placeholder.jpg') }}"
                                                alt="{{ $product->name }}">
                                        </li>
                                    @endif
                                </ul>
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
            <section class="light-gray-bg padding-top-150 padding-bottom-150">
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
                                            alt="{{ $relatedProduct->name }}">
                                        <img class="img-2" src="{{ $relatedProduct->main_image_url }}"
                                            alt="{{ $relatedProduct->name }}">
                                    @else
                                        <img class="img-1" src="{{ asset('user/images/product-placeholder.jpg') }}"
                                            alt="{{ $relatedProduct->name }}">
                                        <img class="img-2" src="{{ asset('user/images/product-placeholder.jpg') }}"
                                            alt="{{ $relatedProduct->name }}">
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

        /* Slide visibility animation */
        .images-slider .slides li {
            transition: opacity 0.3s ease;
        }

        .images-slider .slides li.color-hidden {
            display: none !important;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const colorSwatches = document.querySelectorAll('.color-swatch');
            const slider = document.querySelector('#product-slider');

            if (colorSwatches.length === 0 || !slider) return;

            // Store all original slides
            const allSlides = Array.from(slider.querySelectorAll('.slides li'));
            const allSlideData = allSlides.map((slide, index) => ({
                element: slide,
                colorId: slide.getAttribute('data-color-id'),
                thumb: slide.getAttribute('data-thumb'),
                imgSrc: slide.querySelector('img').getAttribute('src')
            }));

            colorSwatches.forEach(swatch => {
                swatch.addEventListener('click', function() {
                    const colorId = this.getAttribute('data-color-id');

                    // Update active state
                    colorSwatches.forEach(s => s.classList.remove('active'));
                    this.classList.add('active');

                    // Filter images based on color
                    filterSlidesByColor(colorId);
                });
            });

            function filterSlidesByColor(colorId) {
                // Get the flexslider instance
                const flexslider = slider.querySelector('.flex-viewport');

                if (colorId === 'all') {
                    // Show all slides
                    allSlides.forEach(slide => {
                        slide.classList.remove('color-hidden');
                    });
                } else {
                    // Filter slides - show only matching color or unassigned images
                    allSlides.forEach(slide => {
                        const slideColorId = slide.getAttribute('data-color-id');
                        if (slideColorId === colorId || slideColorId === 'all') {
                            slide.classList.remove('color-hidden');
                        } else {
                            slide.classList.add('color-hidden');
                        }
                    });
                }

                // Try to refresh flexslider if it exists
                if (typeof jQuery !== 'undefined' && jQuery('#product-slider').data('flexslider')) {
                    const flex = jQuery('#product-slider').data('flexslider');

                    // Find first visible slide
                    let firstVisibleIndex = 0;
                    allSlides.forEach((slide, index) => {
                        if (!slide.classList.contains('color-hidden') && firstVisibleIndex === 0) {
                            firstVisibleIndex = index;
                        }
                    });

                    // Navigate to first visible slide
                    flex.flexAnimate(firstVisibleIndex);

                    // Update thumbnails visibility
                    const thumbNav = slider.querySelector('.flex-control-thumbs');
                    if (thumbNav) {
                        const thumbs = thumbNav.querySelectorAll('li');
                        thumbs.forEach((thumb, index) => {
                            if (allSlides[index].classList.contains('color-hidden')) {
                                thumb.style.display = 'none';
                            } else {
                                thumb.style.display = '';
                            }
                        });
                    }
                }
            }
        });
    </script>
@endpush

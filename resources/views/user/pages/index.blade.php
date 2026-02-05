@extends('user.layouts.app')

@section('content')

    <!--======= HOME MAIN SLIDER =========-->
    <section class="home-slider">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    @forelse ($sliders as $index => $slider)
                        <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                            <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}" data-bgposition="center center"
                                data-bgfit="cover" data-bgrepeat="no-repeat">

                            @if ($slider->subtitle)
                                <div class="tp-caption font-playfair sfb tp-resizeme" data-x="center" data-hoffset="0"
                                    data-y="center" data-voffset="-150" data-speed="800" data-start="500"
                                    data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none"
                                    data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"
                                    style="z-index: 7; font-size:18px; color:#fff; max-width: auto; max-height: auto; white-space: nowrap;">
                                    {{ $slider->subtitle }}
                                </div>
                            @endif

                            @if ($slider->title)
                                <div class="tp-caption sfr font-extra-bold tp-resizeme" data-x="center" data-hoffset="0"
                                    data-y="center" data-voffset="0" data-speed="800" data-start="800"
                                    data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none"
                                    data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"
                                    style="z-index: 6; font-size:80px; color:#fff; text-transform:uppercase; white-space: nowrap;">
                                    {{ $slider->title }}
                                </div>
                            @endif

                            @if ($slider->button_text && $slider->button_url)
                                <div class="tp-caption lfb tp-resizeme" data-x="center" data-hoffset="0" data-y="center"
                                    data-voffset="120" data-speed="800" data-start="1500" data-easing="Power3.easeInOut"
                                    data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"
                                    data-scrolloffset="0" style="z-index: 8;">
                                    <a href="{{ $slider->button_url }}" class="btn">{{ $slider->button_text }}</a>
                                </div>
                            @endif
                        </li>
                    @empty
                        <!-- Default slide when no sliders in database -->
                        <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                            <img src="{{ asset('user/images/slider.jpg') }}" alt="slider" data-bgposition="center center"
                                data-bgfit="cover" data-bgrepeat="no-repeat">
                            <div class="tp-caption font-playfair sfb tp-resizeme" data-x="left" data-hoffset="0"
                                data-y="center" data-voffset="-150" data-speed="800" data-start="500"
                                data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none"
                                data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"
                                style="z-index: 7; font-size:18px; color:#fff; max-width: auto; max-height: auto; white-space: nowrap;">
                                {{ __('Premium Paints & Coatings') }}
                            </div>
                            <div class="tp-caption sfr font-extra-bold tp-resizeme" data-x="left" data-hoffset="0"
                                data-y="center" data-voffset="0" data-speed="800" data-start="800"
                                data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none"
                                data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"
                                style="z-index: 6; font-size:80px; color:#fff; text-transform:uppercase; white-space: nowrap;">
                                {{ __('UNION GROUP') }}
                            </div>
                            <div class="tp-caption lfb tp-resizeme" data-x="left" data-hoffset="0" data-y="center"
                                data-voffset="120" data-speed="800" data-start="1500" data-easing="Power3.easeInOut"
                                data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"
                                data-scrolloffset="0" style="z-index: 8;">
                                <a href="{{ route('user.shop') }}" class="btn">{{ __('EXPLORE PRODUCTS') }}</a>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </section>

    <!-- Content -->
    <div id="content">

        <!-- About Section -->
        <section class="small-about padding-top-150 padding-bottom-150 bg-blue">
            <div class="container">
                <div class="heading text-center">
                    <h4 class="text-white">{{ __('About Union Group') }}</h4>
                    <p class="text-white">
                        {{ __('Union Group is one of Egypt’s leading manufacturers of premium sanitary fittings, established in 1950 with a clear mission: to deliver high-quality, reliable and affordable sanitary solutions to the Egyptian and regional markets.') }}
                    </p>
                </div>
                <div class="text-center margin-top-30">
                    <a href="{{ route('user.about') }}" class="btn-secondary">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Product Categories -->
        @if ($categories->count() > 0)
            <section class="padding-top-100 padding-bottom-100">
                <div class="container">
                    <div class="heading text-center">
                        <h4>{{ __('Our Product Categories') }}</h4>
                        <span>{{ __('Discover our comprehensive range of premium paints, coatings, and specialty products designed for every application.') }}</span>
                    </div>

                    <div class="arrival-block">
                        @foreach ($categories as $category)
                            <div class="item">
                                @if ($category->image)
                                    <img class="img-1" src="{{ $category->image_url }}" alt="{{ $category->name }}">
                                    <img class="img-2" src="{{ $category->image_url }}" alt="{{ $category->name }}">
                                @else
                                    <img class="img-1" src="{{ asset('user/images/product-placeholder.jpg') }}"
                                        alt="{{ $category->name }}">
                                    <img class="img-2" src="{{ asset('user/images/product-placeholder.jpg') }}"
                                        alt="{{ $category->name }}">
                                @endif
                                <div class="overlay">
                                    <span class="price">{{ $category->products_count }} {{ __('Products') }}</span>
                                    <div class="position-center-center">
                                        <a href="{{ route('user.shop', ['category' => $category->slug]) }}"><i
                                                class="icon-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="item-name">
                                    <a
                                        href="{{ route('user.shop', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                    <p>{{ Str::limit($category->description, 50) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Featured Products -->
        {{-- @if ($featuredProducts->count() > 0)
            <section class="padding-top-50 padding-bottom-150">
                <div class="container">
                    <div class="heading text-center">
                        <h4>{{ __('Featured Products') }}</h4>
                        <span>{{ __('Explore our most popular and highly-rated products trusted by professionals and homeowners alike.') }}</span>
                    </div>

                    <div class="papular-block block-slide" dir="ltr">
                        @foreach ($featuredProducts as $product)
                            <div class="item">
                                <div class="item-img">
                                    @if ($product->mainImage())
                                        <img class="img-1" src="{{ $product->main_image_url }}"
                                            alt="{{ $product->name }}">
                                        <img class="img-2"
                                            src="{{ $product->second_image_url ?? $product->main_image_url }}"
                                            alt="{{ $product->name }}">
                                    @else
                                        <img class="img-1" src="{{ asset('user/images/product-placeholder.jpg') }}"
                                            alt="{{ $product->name }}">
                                        <img class="img-2" src="{{ asset('user/images/product-placeholder.jpg') }}"
                                            alt="{{ $product->name }}">
                                    @endif
                                    <div class="overlay">
                                        <div class="position-center-center">
                                            <div class="inn">
                                                @if ($product->mainImage())
                                                    <a href="{{ $product->main_image_url }}" data-lighter><i
                                                            class="icon-magnifier"></i></a>
                                                @endif
                                                <a href="{{ route('user.product-detail', $product->slug) }}"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('View Details') }}"><i class="icon-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-name">
                                    <a href="{{ route('user.product-detail', $product->slug) }}">{{ $product->name }}</a>
                                    <p>{{ $product->category ? $product->category->name : '' }}</p>
                                </div>
                                @if ($product->code)
                                    <span class="price">{{ $product->code }}</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif --}}

        <!-- Popular Products -->
        <section class="padding-bottom-150 padding-top-150 bg-blue">
            <div class="container">

                <!-- Main Heading -->
                <div class="heading text-center">
                    <h4 class="text-white">{{ __('Built to Last. Designed to Perform.') }}</h4>
                    <span
                        class="text-white">{{ __('What makes Union Group a trusted choice? It is our commitment to certified quality, advanced manufacturing, reliable service and long-term warranty. These pillars define the standard behind every Union Group product.') }}</span>
                </div>

                <!-- NEW ARRIVAL - Promise Slider -->
                <div class="new-arrival-list">
                    <div class="owl-carousel owl-theme promise-slider">
                        <div class="item">
                            <article class="promise-card">
                                <div class="promise-card-img">
                                    <img class="img-responsive" src="{{ asset('user/images/promise2.avif') }}"
                                        alt="{{ __('Manufacturing Excellence.') }}">
                                </div>
                                <div class="promise-card-caption">
                                    <h4>{{ __('Manufacturing Excellence.') }}</h4>
                                    <p>{{ __('High-purity brass, advanced casting, machining and plating technologies ensuring superior durability, perfect water flow and long product life.') }}
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="item">
                            <article class="promise-card">
                                <div class="promise-card-img">
                                    <img class="img-responsive" src="{{ asset('user/images/promise3.avif') }}"
                                        alt="{{ __('Certified & Government Approved') }}">
                                </div>
                                <div class="promise-card-caption">
                                    <h4>{{ __('Certified & Government Approved') }}</h4>
                                    <p>{{ __('Union Group holds national and international quality certifications and is officially accredited by major governmental authorities and research institutions.') }}
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="item">
                            <article class="promise-card">
                                <div class="promise-card-img">
                                    <img class="img-responsive" src="{{ asset('user/images/promise4.avif') }}"
                                        alt="{{ __('Trusted in National Mega Projects') }}">
                                </div>
                                <div class="promise-card-caption">
                                    <h4>{{ __('Trusted in National Mega Projects') }}</h4>
                                    <p>{{ __('Our products are installed in government buildings, hospitals, universities, residential compounds, resorts and infrastructure projects across Egypt.') }}
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="item">
                            <article class="promise-card">
                                <div class="promise-card-img">
                                    <img class="img-responsive" src="{{ asset('user/images/promise1.avif') }}"
                                        alt="{{ __('Sustainability & Water Efficiency') }}">
                                </div>
                                <div class="promise-card-caption">
                                    <h4>{{ __('Sustainability & Water Efficiency') }}</h4>
                                    <p>{{ __('Engineered water-saving solutions supporting environmental responsibility and long-term resource conservation.') }}
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="item">
                            <article class="promise-card">
                                <div class="promise-card-img">
                                    <img class="img-responsive" src="{{ asset('user/images/promise2.avif') }}"
                                        alt="{{ __('Competitive Pricing — Premium Quality') }}">
                                </div>
                                <div class="promise-card-caption">
                                    <h4>{{ __('Competitive Pricing — Premium Quality') }}</h4>
                                    <p>{{ __('International-standard quality delivered at highly competitive market pricing.') }}
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="item">
                            <article class="promise-card">
                                <div class="promise-card-img">
                                    <img class="img-responsive" src="{{ asset('user/images/promise3.avif') }}"
                                        alt="{{ __('After-Sales Support & Technical Service') }}">
                                </div>
                                <div class="promise-card-caption">
                                    <h4>{{ __('After-Sales Support & Technical Service') }}</h4>
                                    <p>{{ __('Dedicated customer service and professional technical support ensuring smooth installation, operation, maintenance and long-term performance.') }}
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="item">
                            <article class="promise-card">
                                <div class="promise-card-img">
                                    <img class="img-responsive" src="{{ asset('user/images/promise4.avif') }}"
                                        alt="{{ __('Warranty & Long-Term Reliability') }}">
                                </div>
                                <div class="promise-card-caption">
                                    <h4>{{ __('Warranty & Long-Term Reliability') }}</h4>
                                    <p>{{ __('Union Group products are backed by a manufacturer warranty, guaranteeing reliability, durability and customer peace of mind.') }}
                                    </p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Partners -->
        <section class="partners-section padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="heading text-center">
                    <h4>{{ __('Our Partners') }}</h4>
                    <span>{{ __('Trusted by industry leaders. We work with renowned partners to deliver excellence.') }}</span>
                </div>
                <div class="partners-logos">
                    <div class="partner-item">
                        <img src="{{ asset('user/images/partners/1.png') }}" alt="Partner 1" loading="lazy">
                    </div>
                    <div class="partner-item">
                        <img src="{{ asset('user/images/partners/2.png') }}" alt="Partner 2" loading="lazy">
                    </div>
                    <div class="partner-item">
                        <img src="{{ asset('user/images/partners/3.png') }}" alt="Partner 3" loading="lazy">
                    </div>
                    <div class="partner-item">
                        <img src="{{ asset('user/images/partners/7.png') }}" alt="Partner 5" loading="lazy">
                    </div>
                    <div class="partner-item">
                        <img src="{{ asset('user/images/partners/8.png') }}" alt="Partner 5" loading="lazy">
                    </div>
                    <div class="partner-item">
                        <img src="{{ asset('user/images/partners/4.png') }}" alt="Partner 4" loading="lazy">
                    </div>
                    <div class="partner-item">
                        <img src="{{ asset('user/images/partners/5.png') }}" alt="Partner 5" loading="lazy">
                    </div>
                    <div class="partner-item">
                        <img src="{{ asset('user/images/partners/6.png') }}" alt="Partner 5" loading="lazy">
                    </div>
                </div>
            </div>
        </section>

        {{-- <!-- Newsletter -->
        <section class="news-letter padding-top-150 padding-bottom-150">
            <div class="container">
                <div class="heading light-head text-center margin-bottom-30">
                    <h4>{{ __('NEWSLETTER') }}</h4>
                    <span>{{ __('Subscribe to our newsletter to receive the latest updates on new products, projects, and industry news.') }}</span>
                </div>
                <form>
                    <input type="email" placeholder="{{ __('Enter your email address') }}" required>
                    <button type="submit">{{ __('SUBSCRIBE') }}</button>
                </form>
            </div>
        </section> --}}
    </div>

@endsection

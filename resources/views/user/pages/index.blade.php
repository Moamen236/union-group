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
                                <div class="tp-caption font-playfair sfb tp-resizeme"
                                    data-x="{{ $index % 2 == 0 ? 'left' : 'center' }}" data-hoffset="0"
                                    data-y="center" data-voffset="-150" data-speed="800" data-start="500"
                                    data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none"
                                    data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"
                                    style="z-index: 7; font-size:18px; color:#fff; max-width: auto; max-height: auto; white-space: nowrap;">
                                    {{ $slider->subtitle }}
                                </div>
                            @endif

                            @if ($slider->title)
                                <div class="tp-caption sfr font-extra-bold tp-resizeme"
                                    data-x="{{ $index % 2 == 0 ? 'left' : 'center' }}" data-hoffset="0"
                                    data-y="center" data-voffset="0" data-speed="800" data-start="800"
                                    data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none"
                                    data-elementdelay="0.07" data-endelementdelay="0.1" data-endspeed="300"
                                    style="z-index: 6; font-size:80px; color:#fff; text-transform:uppercase; white-space: nowrap;">
                                    {{ $slider->title }}
                                </div>
                            @endif

                            @if ($slider->button_text && $slider->button_url)
                                <div class="tp-caption lfb tp-resizeme"
                                    data-x="{{ $index % 2 == 0 ? 'left' : 'center' }}" data-hoffset="0"
                                    data-y="center" data-voffset="120" data-speed="800" data-start="1500"
                                    data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1"
                                    data-endspeed="300" data-scrolloffset="0" style="z-index: 8;">
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
                                data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1"
                                data-endelementdelay="0.1" data-endspeed="300"
                                style="z-index: 7; font-size:18px; color:#fff; max-width: auto; max-height: auto; white-space: nowrap;">
                                {{ __('Premium Paints & Coatings') }}
                            </div>
                            <div class="tp-caption sfr font-extra-bold tp-resizeme" data-x="left" data-hoffset="0"
                                data-y="center" data-voffset="0" data-speed="800" data-start="800"
                                data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none"
                                data-elementdelay="0.07" data-endelementdelay="0.1" data-endspeed="300"
                                style="z-index: 6; font-size:80px; color:#fff; text-transform:uppercase; white-space: nowrap;">
                                {{ __('UNION GROUP') }}
                            </div>
                            <div class="tp-caption lfb tp-resizeme" data-x="left" data-hoffset="0" data-y="center"
                                data-voffset="120" data-speed="800" data-start="1500" data-easing="Power3.easeInOut"
                                data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" data-scrolloffset="0"
                                style="z-index: 8;">
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
        @if ($featuredProducts->count() > 0)
            <section class="padding-top-50 padding-bottom-150">
                <div class="container">
                    <div class="heading text-center">
                        <h4>{{ __('Featured Products') }}</h4>
                        <span>{{ __('Explore our most popular and highly-rated products trusted by professionals and homeowners alike.') }}</span>
                    </div>

                    <div class="papular-block block-slide">
                        @foreach ($featuredProducts as $product)
                            <div class="item">
                                <div class="item-img">
                                    @if ($product->mainImage())
                                        <img class="img-1" src="{{ $product->main_image_url }}"
                                            alt="{{ $product->name }}">
                                        <img class="img-2" src="{{ $product->second_image_url ?? $product->main_image_url }}"
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
        @endif

        <!-- Projects Section -->
        @if ($projects->count() > 0)
            <section class="light-gray-bg padding-top-150 padding-bottom-150">
                <div class="container">
                    <div class="heading text-center">
                        <h4>{{ __('Our Projects') }}</h4>
                        <span>{{ __('See how our products have been used in landmark projects across the region.') }}</span>
                    </div>
                    <div class="knowledge-share">
                        <ul class="row">
                            @foreach ($projects->take(4) as $project)
                                <li class="col-md-6">
                                    <div class="date">
                                        <span>{{ $project->completion_date ? $project->completion_date->format('M') : '' }}</span>
                                        <span
                                            class="huge">{{ $project->completion_date ? $project->completion_date->format('Y') : '' }}</span>
                                    </div>
                                    <a href="{{ route('user.about') }}#projects">{{ $project->name }}</a>
                                    <p>{{ Str::limit($project->description, 150) }}</p>
                                    <span>{{ __('Client') }}: <strong>{{ $project->client }}</strong></span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="text-center margin-top-30">
                        <a href="{{ route('user.about') }}#projects" class="btn">{{ __('View All Projects') }}</a>
                    </div>
                </div>
            </section>
        @endif

        <!-- Certificates Section -->
        @if ($certificates->count() > 0)
            <section class="testimonial padding-top-100 padding-bottom-100">
                <div class="container">
                    <div class="heading text-center">
                        <h4>{{ __('Our Certifications') }}</h4>
                        <span>{{ __('We are proud to hold international quality certifications that guarantee the excellence of our products.') }}</span>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="single-slide">
                                @foreach ($certificates->take(3) as $certificate)
                                    <div class="testi-in">
                                        <i class="fa fa-certificate"></i>
                                        <p>{{ $certificate->name }}</p>
                                        <h5>{{ $certificate->issuer }}</h5>
                                        @if ($certificate->issue_date)
                                            <small>{{ __('Issued') }}:
                                                {{ $certificate->issue_date->format('M Y') }}</small>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- About Section -->
        <section class="small-about padding-top-150 padding-bottom-150">
            <div class="container">
                <div class="heading text-center">
                    <h4>{{ __('About Union Group') }}</h4>
                    <p>{{ __('Union Group is a leading manufacturer and supplier of premium paints, coatings, and industrial solutions in the Middle East. With decades of experience and a commitment to quality, we provide products that meet the highest international standards.') }}
                    </p>
                </div>
                <ul class="social_icons">
                    <li><a href="#."><i class="icon-social-facebook"></i></a></li>
                    <li><a href="#."><i class="icon-social-twitter"></i></a></li>
                    <li><a href="#."><i class="icon-social-instagram"></i></a></li>
                    <li><a href="#."><i class="icon-social-linkedin"></i></a></li>
                    <li><a href="#."><i class="icon-social-youtube"></i></a></li>
                </ul>
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

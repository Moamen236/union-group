@extends('user.layouts.app')

@section('content')
    <!--======= SUB BANNER =========-->
    <section class="sub-bnr" data-stellar-background-ratio="0.5">
        <div class="position-center-center">
            <div class="container">
                <h4>{{ __('About Union Group') }}</h4>
                <p>{{ __('Leading manufacturer of premium sanitary fittings since 1950') }}</p>
                <ol class="breadcrumb">
                    <li><a href="{{ route('user.index') }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('About') }}</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Content -->
    <div id="content">

        <!-- About Us Intro -->
        <section class="history-block padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 center-block">
                        <div class="col-sm-10 center-block">
                            <h4>{{ __('About Us') }}</h4>
                            <p class="about-intro-lead">
                                {{ __('Union Group is one of Egypt\'s leading manufacturers of premium sanitary fittings. Established in 1950, we specialize in designing and producing high-quality bathroom mixers and water control solutions for homes, projects and large developments across Egypt and international markets.') }}
                                <br>
                                {{ __('For more than 70 years, Union Group has combined engineering excellence, modern technology and competitive pricing to deliver reliable, certified and long-lasting sanitary products.') }}
                            </p>
                        </div>

                        <!-- IMG -->
                        <img class="img-responsive margin-top-80 margin-bottom-80"
                            src="{{ asset('user/images/slider2.jpg') }}" alt=""
                            style="max-height: 400px;width: 100%;object-fit: cover;">
                        <div class="row about-cards-row">
                            <div class="col-xs-12 col-sm-6 margin-bottom-40">
                                <article class="about-card">
                                    <div class="about-card-icon text-center"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </div>
                                    <h4 class="about-card-title">{{ __('Vision') }}</h4>
                                    <p class="about-card-lead">
                                        {{ __('The company aims to strengthen its position in the local and global market through:') }}
                                    </p>
                                    <ul class="about-list about-list-check">
                                        <li>{{ __('Competing effectively in the sanitary manufacturing sector') }}</li>
                                        <li>{{ __('Closing the gap between increasing domestic demand and local production') }}
                                        </li>
                                        <li>{{ __('Reducing dependence on imports and supporting the national balance of payments') }}
                                        </li>
                                    </ul>
                                </article>
                            </div>
                            <div class="col-xs-12 col-sm-6 margin-bottom-40">
                                <article class="about-card">
                                    <div class="about-card-icon text-center"><i class="fa fa-bullseye"
                                            aria-hidden="true"></i></div>
                                    <h4 class="about-card-title">{{ __('Mission') }}</h4>
                                    <p class="about-card-lead">{{ __('The company targets to serve:') }}</p>
                                    <ul class="about-list about-list-check">
                                        <li>{{ __('Local individual consumers and direct users') }}</li>
                                        <li>{{ __('National mega projects aligned with the state\'s strategy') }}</li>
                                        <li>{{ __('Export to foreign markets through agreements such as COMESA (Africa) and Arab Joint Cooperation agreements') }}
                                        </li>
                                    </ul>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- History -->
        <section class="about-intro light-gray-bg padding-top-100 padding-bottom-80">
            <div class="container">
                <div class="heading text-center margin-bottom-50">
                    <h4>{{ __('History') }}</h4>
                </div>
                <div class="row about-section-with-img">
                    <div class="col-xs-12 col-sm-6 col-md-6 margin-bottom-30">
                        <div class="about-section-img-wrap">
                            <img src="{{ asset('user/images/promise1.avif') }}" alt="{{ __('Our History') }}"
                                class="img-responsive about-section-img">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 history-block">
                        <p class="about-support-p">
                            {{ __('Union Group was founded in 1950 by Eng. Abdel Fattah Ahmed Mohamed to meet the growing Egyptian market demand for high-quality sanitary products at affordable prices. At that time, most premium sanitary ware was imported. Union Group was created to bridge this gap and lead local manufacturing.') }}
                        </p>
                        <p class="about-support-p">
                            {{ __('Today, the company is proudly managed by the third generation, continuing the legacy while adopting modern manufacturing standards and global market requirements.') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Brand Evolution -->
        <section class="about-intro padding-top-100 padding-bottom-80">
            <div class="container">
                <div class="heading text-center margin-bottom-50">
                    <h4>{{ __('Brand Evolution') }}</h4>
                </div>
                <div class="row about-section-with-img">
                    <div class="col-xs-12 col-sm-7 col-md-6 history-block">
                        <p class="about-support-p">
                            {{ __('Union Group\'s first registered trademark combined a gear and a water valve to represent the union between industry and product.') }}
                        </p>
                        <p class="about-support-p">
                            {{ __('Over time, the brand evolved into Union Group, reflecting advanced water control technology, sustainability and quality leadership in the sanitary fittings industry.') }}
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-6 margin-bottom-30">
                        <div class="about-section-img-wrap">
                            <img src="{{ asset('user/images/logos.png') }}" alt="{{ __('Brand Evolution') }}"
                                class="img-responsive about-section-img">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Specialization -->
        <section class="about-intro padding-top-100 padding-bottom-80">
            <div class="container">
                <div class="heading text-center margin-bottom-50">
                    <h4>{{ __('Specialization') }}</h4>
                    <p class="about-intro-lead">
                        {{ __('We use high-purity brass, advanced casting, machining and plating technologies to ensure durability, clean water flow and elegant modern design, to achieve the highest quality levels at competitive pricing with modern contemporary design.') }}
                    </p>
                </div>
                <div class="row about-section-with-img">
                    <div class="col-xs-12 col-sm-6 col-md-6 margin-bottom-30">
                        <div class="about-section-img-wrap">
                            <img src="{{ asset('user/images/promise2.avif') }}" alt="{{ __('Our Specialization') }}"
                                class="img-responsive about-section-img">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <p class="about-support-p margin-bottom-20">
                            {{ __('Union Group specializes in the manufacturing of:') }}
                        </p>
                        <ul class="about-list about-list-bullet">
                            <li class="about-support-p">{{ __('Bathroom and kitchen mixers') }}</li>
                            <li class="about-support-p">{{ __('Premium brass sanitary fittings') }}</li>
                            <li class="about-support-p">{{ __('Water control and saving solutions') }}</li>
                            <li class="about-support-p">{{ __('Laboratory fittings') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- After-Sales & Warranty -->
        <section class="about-intro light-gray-bg padding-top-100 padding-bottom-80">
            <div class="container">
                <div class="heading text-center margin-bottom-50">
                    <h4>{{ __('After-Sales Service & Warranty') }}</h4>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 margin-bottom-30">
                        <article class="about-support-card">
                            <div class="about-support-icon"><i class="fa fa-wrench" aria-hidden="true"></i></div>
                            <h5 class="about-support-title">{{ __('After-Sales Service') }}</h5>
                            <p>{{ __('Union Group provides dedicated after-sales support through professional technical service teams. We support maintenance and product performance to ensure long-term customer satisfaction.') }}
                            </p>
                        </article>
                    </div>
                    <div class="col-xs-12 col-sm-6 margin-bottom-30">
                        <article class="about-support-card">
                            <div class="about-support-icon"><i class="fa fa-shield" aria-hidden="true"></i></div>
                            <h5 class="about-support-title">{{ __('Warranty') }}</h5>
                            <p>{{ __('All Union Group products are backed by an official manufacturer warranty, ensuring quality, durability and peace of mind for our customers.') }}
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        {{-- @if ($projects->count() > 0)
            <section class="padding-top-150 padding-bottom-100" id="projects">
                <div class="container">
                    <div class="heading text-center">
                        <h4>{{ __('Our Projects') }}</h4>
                        <span>{{ __('We have successfully delivered solutions for landmark projects across the region.') }}</span>
                    </div>

                    <ul class="row">
                        @foreach ($projects as $project)
                            <li class="col-xs-12 col-md-6 margin-bottom-30">
                                <article class="project-card">
                                    <div class="row">
                                        @if ($project->image)
                                            <div class="col-xs-12 col-sm-4">
                                                <img src="{{ $project->image_url }}" alt="{{ $project->name }}"
                                                    class="img-responsive">
                                            </div>
                                            <div class="col-xs-12 col-sm-8">
                                            @else
                                                <div class="col-xs-12 col-sm-12">
                                        @endif
                                        <h5>{{ $project->name }}</h5>
                                        <p class="location"><i class="fa fa-map-marker"></i> {{ $project->location }}</p>
                                        <p>{{ Str::limit($project->description, 200) }}</p>
                                        <ul class="project-meta">
                                            <li><strong>{{ __('Client') }}:</strong> {{ $project->client }}</li>
                                            @if ($project->completion_date)
                                                <li><strong>{{ __('Completed') }}:</strong>
                                                    {{ $project->completion_date->format('M Y') }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        @endif --}}

        <section class="blog-list blog-list-3 padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="heading text-center">
                    <h4>{{ __('Our Exhibitions') }}</h4>
                    <span>{{ __('We have participated in various exhibitions and events to showcase our products and services.') }}</span>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <article>
                            <!-- Gallery 1: multiple images, open in lightGallery -->
                            <div id="exhibition-gallery-1" class="exhibition-gallery">
                                <a href="{{ asset('user/images/about-img.jpg') }}" class="exhibition-gallery-item">
                                    <img class="img-responsive exhibition-gallery-main" src="{{ asset('user/images/about-img.jpg') }}" alt="{{ __('Exhibition') }} 1">
                                </a>
                                <a href="{{ asset('user/images/promise1.avif') }}" class="exhibition-gallery-item" style="display:none;"></a>
                                <a href="{{ asset('user/images/promise2.avif') }}" class="exhibition-gallery-item" style="display:none;"></a>
                                <a href="{{ asset('user/images/promise3.avif') }}" class="exhibition-gallery-item" style="display:none;"></a>
                            </div>
                            <div class="post-tittle left">
                                <a href="#." class="tittle">{{ __('Exhibition') }} — {{ __('Cairo') }}</a>
                                <span> <i class="primary-color fa fa-map-marker"></i> {{ __('Egypt') }}</span>
                                <span> <i class="primary-color fa fa-calendar"></i> April 27, 2016</span>
                            </div>
                            <div class="text-left">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam volutpat dui at
                                    lacus aliquet, a consequat enim aliquet. Integer molestie sit amet sem et
                                    faucibus. Nunc ornare pharetra dui, vitae auctor orci fringilla eget.</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article>
                            <!-- Gallery 2 -->
                            <div id="exhibition-gallery-2" class="exhibition-gallery">
                                <a href="{{ asset('user/images/promise2.avif') }}" class="exhibition-gallery-item">
                                    <img class="img-responsive exhibition-gallery-main" src="{{ asset('user/images/promise4.avif') }}" alt="{{ __('Exhibition') }} 2">
                                </a>
                                <a href="{{ asset('user/images/promise3.avif') }}" class="exhibition-gallery-item" style="display:none;"></a>
                                <a href="{{ asset('user/images/promise4.avif') }}" class="exhibition-gallery-item" style="display:none;"></a>
                            </div>
                            <div class="post-tittle left">
                                <a href="#." class="tittle">{{ __('Exhibition') }} — {{ __('Alexandria') }}</a>
                                <span> <i class="primary-color fa fa-map-marker"></i> {{ __('Egypt') }}</span>
                                <span> <i class="primary-color fa fa-calendar"></i> May 15, 2016</span>
                            </div>
                            <div class="text-left">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam volutpat dui at
                                    lacus aliquet, a consequat enim aliquet. Integer molestie sit amet sem et
                                    faucibus. Nunc ornare pharetra dui, vitae auctor orci fringilla eget.</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article>
                            <!-- Gallery 3 -->
                            <div id="exhibition-gallery-3" class="exhibition-gallery">
                                <a href="{{ asset('user/images/promise1.avif') }}" class="exhibition-gallery-item">
                                    <img class="img-responsive exhibition-gallery-main" src="{{ asset('user/images/promise1.avif') }}" alt="{{ __('Exhibition') }} 3">
                                </a>
                                <a href="{{ asset('user/images/about-img.jpg') }}" class="exhibition-gallery-item" style="display:none;"></a>
                                <a href="{{ asset('user/images/promise4.avif') }}" class="exhibition-gallery-item" style="display:none;"></a>
                            </div>
                            <div class="post-tittle left">
                                <a href="#." class="tittle">{{ __('Exhibition') }} — {{ __('Giza') }}</a>
                                <span> <i class="primary-color fa fa-map-marker"></i> {{ __('Egypt') }}</span>
                                <span> <i class="primary-color fa fa-calendar"></i> June 10, 2016</span>
                            </div>
                            <div class="text-left">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam volutpat dui at
                                    lacus aliquet, a consequat enim aliquet. Integer molestie sit amet sem et
                                    faucibus. Nunc ornare pharetra dui, vitae auctor orci fringilla eget.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>



        <!-- Why Choose Us -->
        <section class="our-team padding-top-80 padding-bottom-100">
            <div class="container">
                <div class="heading text-center">
                    <h4>{{ __('Why Choose Union Group') }}</h4>
                    <span>{{ __('Engineering excellence, certified quality, and dedicated support') }}</span>
                </div>
                <ul class="row">
                    <li class="col-xs-12 col-sm-4 text-center">
                        <article>
                            <div class="avatar about-why-icon">
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                            </div>
                            <div class="team-names">
                                <h6>{{ __('Engineering Excellence') }}</h6>
                                <p>{{ __('Over 70 years of expertise in sanitary fittings and water control solutions') }}
                                </p>
                            </div>
                        </article>
                    </li>
                    <li class="col-xs-12 col-sm-4 text-center">
                        <article>
                            <div class="avatar about-why-icon">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                            </div>
                            <div class="team-names">
                                <h6>{{ __('Certified Quality') }}</h6>
                                <p>{{ __('Reliable, certified and long-lasting products at competitive pricing') }}</p>
                            </div>
                        </article>
                    </li>
                    <li class="col-xs-12 col-sm-4 text-center">
                        <article>
                            <div class="avatar about-why-icon">
                                <i class="fa fa-headphones" aria-hidden="true"></i>
                            </div>
                            <div class="team-names">
                                <h6>{{ __('Dedicated Support') }}</h6>
                                <p>{{ __('Professional after-sales service and manufacturer warranty') }}</p>
                            </div>
                        </article>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Contact CTA -->
        <section class="small-about padding-top-150 padding-bottom-150">
            <div class="container">
                <div class="heading text-center">
                    <h4>{{ __('Get in Touch') }}</h4>
                    <p>{{ __('Have questions about our sanitary fittings or need technical support? Our team is ready to help.') }}
                    </p>
                </div>
                <div class="text-center">
                    <a href="{{ route('user.contact') }}" class="btn">{{ __('Contact Us') }}</a>
                </div>
            </div>
        </section>

    </div>
@endsection

@push('styles')
    <!-- lightGallery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery-bundle.min.css" />
    <style>
        /* Exhibition gallery – one main image, rest in popup */
        .exhibition-gallery {
            margin-bottom: 20px;
            cursor: pointer;
            overflow: hidden;
            border-radius: 6px;
        }
        .exhibition-gallery .exhibition-gallery-item:first-child {
            display: block !important;
            width: 100%;
            height: 350px;
            overflow: hidden;
        }
        .exhibition-gallery .exhibition-gallery-main {
            width: 100%;
            height: 350px;
            display: block;
            object-fit: cover;
            object-position: center;
            transition: opacity 0.3s ease;
        }
        .exhibition-gallery:hover .exhibition-gallery-main {
            opacity: 0.9;
        }

        .our-team .avatar {
            height: 110px !important;
            width: 110px !important;
        }

        /* Section images – same style as About Us */
        .about-section-img-wrap {
            overflow: hidden;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .about-section-img-wrap img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        /* About section typography – matches About Us */
        .about-intro-lead {
            font-size: 18px;
            line-height: 28px;
            color: #333333;
            margin-bottom: 20px;
            font-family: 'universnextproregular', serif;
        }

        .about-intro-text {
            font-size: 14px;
            line-height: 24px;
            color: #666666;
            font-family: 'universnextproregular', serif;
        }

        /* Vision & Mission cards – theme colors #2d3a4b, #666666 */
        .about-card {
            background: #fff;
            padding: 30px;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            min-height: 280px;
            transition: box-shadow 0.3s ease;
        }

        .about-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
        }

        /* Equal height for Vision & Mission cards */
        .about-cards-row {
            display: flex;
            flex-wrap: wrap;
        }

        .about-cards-row>[class*="col-"] {
            display: flex;
        }

        .about-cards-row .about-card {
            width: 100%;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .about-card-icon {
            width: 56px;
            height: 56px;
            line-height: 56px;
            border-radius: 50%;
            background: #2d3a4b;
            color: #fff;
            margin: 0 auto 15px;
            font-size: 24px;
        }

        .about-card-title {
            color: #2d3a4b;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .about-card-lead {
            color: #666666;
            margin-bottom: 15px;
            font-size: 14px;
            line-height: 22px;
            font-family: 'universnextproregular', serif;
        }

        .about-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .about-list li {
            position: relative;
            padding-left: 22px;
            margin-bottom: 8px;
            color: #666666;
            line-height: 22px;
            font-size: 14px;
        }

        .about-list-check li:before {
            content: "\f00c";
            font-family: FontAwesome;
            position: absolute;
            left: 0;
            color: #2d3a4b;
            font-size: 12px;
        }

        .about-list-bullet {
            list-style: none;
            padding: 0;
        }

        .about-list-bullet li {
            position: relative;
            padding-left: 18px;
            margin-bottom: 8px;
            color: #666666;
            font-size: 14px;
        }

        .about-list-bullet li:before {
            content: "●";
            position: absolute;
            left: 0;
            color: #2d3a4b;
            font-size: 8px;
            top: 6px;
        }

        /* After-Sales & Warranty – same card style as Vision/Mission (no image) */
        .about-support-card {
            background: #fff;
            padding: 30px;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            min-height: 220px;
            border-left: 4px solid #2d3a4b;
            transition: box-shadow 0.3s ease;
        }

        .about-support-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
        }

        .about-support-card .about-support-icon {
            width: 48px;
            height: 48px;
            line-height: 48px;
            text-align: center;
            border-radius: 4px;
            background: #2d3a4b;
            color: #fff;
            margin-bottom: 15px;
            font-size: 20px;
        }

        .about-support-title {
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 10px;
            color: #2d3a4b;
        }

        .about-support-p {
            color: #666666;
            font-size: 18px;
            line-height: 36px;
            margin: 0;
            font-family: 'universnextproregular', serif;
        }

        /* Why Choose – extends .our-team .avatar, theme #2d3a4b */
        .about-why-icon {
            background: #f0f5f9;
            padding: 0;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            line-height: 120px;
            text-align: center;
            margin: 0 auto;
            font-size: 40px;
            color: #2d3a4b;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .about-why-icon i {
            vertical-align: middle;
        }

        .our-team article:hover .about-why-icon {
            background: #2d3a4b;
            color: #fff;
        }

        /* Certificates & Projects – keep in sync with theme */
        .certificate-card {
            background: #fff;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .certificate-card:hover {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }

        .certificate-icon {
            margin-bottom: 20px;
            color: #c98b2b;
        }

        .certificate-info h6 {
            margin-bottom: 10px;
            color: #2d3a4b;
        }

        .certificate-info .issuer {
            color: #666666;
            font-style: italic;
        }

        .certificate-info .date {
            color: #999;
        }

        .project-card {
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .project-card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        .project-card h5 {
            margin-bottom: 10px;
            color: #2d3a4b;
        }

        .project-card .location {
            color: #666666;
            margin-bottom: 15px;
        }

        .project-meta {
            list-style: none;
            padding: 0;
            margin: 15px 0 0;
            font-size: 13px;
        }

        .project-meta li {
            display: inline-block;
            margin-right: 15px;
            color: #666666;
        }

        .btn-small {
            padding: 8px 15px;
            font-size: 12px;
        }
    </style>
@endpush

@push('scripts')
    <!-- lightGallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/zoom/lg-zoom.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof lightGallery !== 'undefined') {
                document.querySelectorAll('.exhibition-gallery').forEach(function(galleryEl) {
                    lightGallery(galleryEl, {
                        selector: '.exhibition-gallery-item',
                        thumbnail: true,
                        zoom: true,
                        download: false,
                        counter: true
                    });
                });
            }
        });
    </script>
@endpush

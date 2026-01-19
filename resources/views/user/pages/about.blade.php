@extends('user.layouts.app')

@section('content')

    <!--======= SUB BANNER =========-->
    <section class="sub-bnr" data-stellar-background-ratio="0.5">
        <div class="position-center-center">
            <div class="container">
                <h4>{{ __('About Union Group') }}</h4>
                <p>{{ __('Leading manufacturer and supplier of premium paints, coatings, and industrial solutions in the Middle East.') }}
                </p>
                <ol class="breadcrumb">
                    <li><a href="{{ route('user.index') }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('About') }}</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Content -->
    <div id="content">

        <!-- History -->
        <section class="history-block padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-10 center-block">
                        <div class="col-sm-9 center-block">
                            <h4>{{ __('Our Story') }}</h4>
                            <p>{{ __('Union Group has been a pioneer in the paints and coatings industry for over three decades. Starting as a small manufacturing unit, we have grown to become one of the most trusted names in the region, serving clients across the Middle East and beyond.') }}
                            </p>
                            <p>{{ __('Our commitment to quality, innovation, and customer satisfaction has driven us to continuously improve our products and services. We invest heavily in research and development to ensure our products meet the highest international standards while being environmentally responsible.') }}
                            </p>
                        </div>

                        <!-- IMG -->
                        <img class="img-responsive margin-top-80 margin-bottom-80"
                            src="{{ asset('user/images/about-img.jpg') }}" alt="{{ __('About Union Group') }}">

                        <div class="vision-text">
                            <div class="col-lg-5">
                                <h5 class="text-left">{{ __('Our Vision') }}</h5>
                                <h2>{{ __('To be the leading provider of innovative paint solutions in the region') }}</h2>
                            </div>
                            <div class="col-lg-7">
                                <p>{{ __('We strive to deliver products that not only meet but exceed our customers\' expectations. Our vision is to create lasting value through sustainable practices, cutting-edge technology, and unwavering commitment to quality.') }}
                                </p>
                                <p>{{ __('We believe in building strong relationships with our clients, partners, and communities. Our success is measured not just by our growth, but by the positive impact we make on the environment and society.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section class="cultur-block">
            <ul>
                <li><img src="{{ asset('user/images/cultur-img-1.jpg') }}" alt=""></li>
                <li><img src="{{ asset('user/images/cultur-img-2.jpg') }}" alt=""></li>
                <li><img src="{{ asset('user/images/cultur-img-3.jpg') }}" alt=""></li>
                <li><img src="{{ asset('user/images/cultur-img-4.jpg') }}" alt=""></li>
            </ul>
            <div class="position-center-center">
                <div class="container">
                    <div class="col-sm-6 center-block">
                        <h4>{{ __('Our Core Values') }}</h4>
                        <p>{{ __('Quality, Innovation, Integrity, Customer Focus, and Environmental Responsibility guide everything we do.') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Certificates Section -->
        @if ($certificates->count() > 0)
            <section class="our-team padding-top-150 padding-bottom-100" id="certificates">
                <div class="container">
                    <div class="heading text-center">
                        <h4>{{ __('Our Certifications') }}</h4>
                        <span>{{ __('We hold prestigious international certifications that validate our commitment to quality and excellence.') }}</span>
                    </div>

                    <ul class="row">
                        @foreach ($certificates as $certificate)
                            <li class="col-md-4 text-center animate fadeInUp" data-wow-delay="{{ $loop->index * 0.2 }}s">
                                <article class="certificate-card">
                                    <div class="certificate-icon">
                                        @if ($certificate->isPdf())
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                        @else
                                            <i class="fa fa-certificate fa-3x"></i>
                                        @endif
                                    </div>
                                    <div class="certificate-info">
                                        <h6>{{ $certificate->name }}</h6>
                                        <p class="issuer">{{ $certificate->issuer }}</p>
                                        @if ($certificate->issue_date)
                                            <p class="date">
                                                <small>{{ __('Issued') }}:
                                                    {{ $certificate->issue_date->format('M d, Y') }}</small>
                                                @if ($certificate->expiry_date)
                                                    <br><small>{{ __('Valid until') }}:
                                                        {{ $certificate->expiry_date->format('M d, Y') }}</small>
                                                @endif
                                            </p>
                                        @endif
                                        @if ($certificate->file)
                                            <a href="{{ $certificate->file_url }}" target="_blank"
                                                class="btn btn-small margin-top-10">
                                                {{ $certificate->isPdf() ? __('View PDF') : __('View Certificate') }}
                                            </a>
                                        @endif
                                    </div>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        @endif

        <!-- Projects Section -->
        @if ($projects->count() > 0)
            <section class="light-gray-bg padding-top-150 padding-bottom-100" id="projects">
                <div class="container">
                    <div class="heading text-center">
                        <h4>{{ __('Our Projects') }}</h4>
                        <span>{{ __('We have successfully delivered coating solutions for landmark projects across the region.') }}</span>
                    </div>

                    <ul class="row">
                        @foreach ($projects as $project)
                            <li class="col-md-6 margin-bottom-30">
                                <article class="project-card">
                                    <div class="row">
                                        @if ($project->image)
                                            <div class="col-sm-4">
                                                <img src="{{ $project->image_url }}" alt="{{ $project->name }}"
                                                    class="img-responsive">
                                            </div>
                                            <div class="col-sm-8">
                                            @else
                                                <div class="col-sm-12">
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
                </div>
                </article>
                </li>
        @endforeach
        </ul>
    </div>
    </section>
    @endif

    <!-- Why Choose Us -->
    <section class="our-team padding-top-150 padding-bottom-100">
        <div class="container">
            <div class="heading text-center">
                <h4>{{ __('Why Choose Union Group') }}</h4>
                <span>{{ __('We are committed to delivering excellence in every product and service') }}</span>
            </div>
            <ul class="row">
                <li class="col-md-4 text-center">
                    <article>
                        <div class="avatar"
                            style="background: #f5f5f5; padding: 30px; border-radius: 50%; width: 150px; height: 150px; margin: 0 auto;">
                            <i class="fa fa-check-circle fa-4x" style="color: #333; line-height: 90px;"></i>
                        </div>
                        <div class="team-names">
                            <h6>{{ __('Quality Assured') }}</h6>
                            <p>{{ __('ISO certified products meeting international standards') }}</p>
                        </div>
                    </article>
                </li>
                <li class="col-md-4 text-center">
                    <article>
                        <div class="avatar"
                            style="background: #f5f5f5; padding: 30px; border-radius: 50%; width: 150px; height: 150px; margin: 0 auto;">
                            <i class="fa fa-leaf fa-4x" style="color: #333; line-height: 90px;"></i>
                        </div>
                        <div class="team-names">
                            <h6>{{ __('Eco-Friendly') }}</h6>
                            <p>{{ __('Environmentally responsible products with low VOC formulas') }}</p>
                        </div>
                    </article>
                </li>
                <li class="col-md-4 text-center">
                    <article>
                        <div class="avatar"
                            style="background: #f5f5f5; padding: 30px; border-radius: 50%; width: 150px; height: 150px; margin: 0 auto;">
                            <i class="fa fa-headphones fa-4x" style="color: #333; line-height: 90px;"></i>
                        </div>
                        <div class="team-names">
                            <h6>{{ __('Expert Support') }}</h6>
                            <p>{{ __('Technical guidance and after-sales support') }}</p>
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
                <p>{{ __('Have questions about our products or need a custom solution? Our team is ready to help you find the perfect paint and coating solutions for your project.') }}
                </p>
            </div>
            <div class="text-center">
                <a href="{{ route('user.contact') }}" class="btn">{{ __('Contact Us') }}</a>
            </div>
            <ul class="social_icons margin-top-30">
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

@push('styles')
    <style>
        .certificate-card {
            background: #fff;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .certificate-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }

        .certificate-icon {
            margin-bottom: 20px;
            color: #f39c12;
        }

        .certificate-info h6 {
            margin-bottom: 10px;
        }

        .certificate-info .issuer {
            color: #666;
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
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        .project-card h5 {
            margin-bottom: 10px;
        }

        .project-card .location {
            color: #666;
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
            color: #666;
        }

        .btn-small {
            padding: 8px 15px;
            font-size: 12px;
        }
    </style>
@endpush

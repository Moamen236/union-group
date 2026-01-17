@extends('user.layouts.app')

@section('content')

    <!--======= SUB BANNER =========-->
    <section class="sub-bnr" data-stellar-background-ratio="0.5">
        <div class="position-center-center">
            <div class="container">
                <h4>{{ __('Contact Us') }}</h4>
                <p>{{ __('Get in touch with our team for inquiries, quotes, or technical support.') }}</p>
                <ol class="breadcrumb">
                    <li><a href="{{ route('user.index') }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Contact') }}</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Content -->
    <div id="content">

        <!--======= CONTACT =========-->
        <section class="contact padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="contact-form">
                    <h5>{{ __('Send Us a Message') }}</h5>
                    <div class="row">
                        <div class="col-md-8">

                            <!--======= Success Message =========-->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    <i class="fa fa-check-circle"></i> {{ session('success') }}
                                </div>
                            @endif

                            <!--======= Error Messages =========-->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul style="margin: 0; padding-left: 20px;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!--======= FORM =========-->
                            <form role="form" id="contact_form" class="contact-form" method="post"
                                action="{{ route('user.contact.submit') }}">
                                @csrf
                                <ul class="row">
                                    <li class="col-sm-6">
                                        <label>{{ __('Full Name') }} *
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" id="name" value="{{ old('name') }}" required>
                                        </label>
                                    </li>
                                    <li class="col-sm-6">
                                        <label>{{ __('Email') }} *
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" id="email" value="{{ old('email') }}" required>
                                        </label>
                                    </li>
                                    <li class="col-sm-6">
                                        <label>{{ __('Phone') }}
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" id="phone" value="{{ old('phone') }}">
                                        </label>
                                    </li>
                                    <li class="col-sm-6">
                                        <label>{{ __('Subject') }}
                                            <input type="text"
                                                class="form-control @error('subject') is-invalid @enderror" name="subject"
                                                id="subject" value="{{ old('subject') }}">
                                        </label>
                                    </li>
                                    <li class="col-sm-12">
                                        <label>{{ __('Message') }} *
                                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" rows="5"
                                                required>{{ old('message') }}</textarea>
                                        </label>
                                    </li>
                                    <li class="col-sm-12">
                                        <button type="submit" class="btn"
                                            id="btn_submit">{{ __('SEND MESSAGE') }}</button>
                                    </li>
                                </ul>
                            </form>
                        </div>

                        <!--======= ADDRESS INFO =========-->
                        <div class="col-md-4">
                            <div class="contact-info">
                                <h6>{{ __('Our Address') }}</h6>
                                <ul>
                                    <li>
                                        <i class="icon-map-pin"></i>
                                        {{ __('Industrial Area, P.O. Box 12345') }}<br>
                                        {{ __('Riyadh, Saudi Arabia') }}
                                    </li>
                                    <li>
                                        <i class="icon-call-end"></i>
                                        <a href="tel:+966112345678">+966 11 234 5678</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-whatsapp"></i>
                                        <a href="https://wa.me/966501234567" target="_blank">+966 50 123 4567</a>
                                    </li>
                                    <li>
                                        <i class="icon-envelope"></i>
                                        <a href="mailto:info@uniongroup.com">info@uniongroup.com</a>
                                    </li>
                                    <li>
                                        <p>{{ __('Working Hours') }}:<br>
                                            {{ __('Sunday - Thursday: 8:00 AM - 5:00 PM') }}<br>
                                            {{ __('Friday - Saturday: Closed') }}</p>
                                    </li>
                                </ul>

                                <h6 class="margin-top-30">{{ __('Follow Us') }}</h6>
                                <ul class="social_icons" style="text-align: left;">
                                    <li><a href="#."><i class="icon-social-facebook"></i></a></li>
                                    <li><a href="#."><i class="icon-social-twitter"></i></a></li>
                                    <li><a href="#."><i class="icon-social-instagram"></i></a></li>
                                    <li><a href="#."><i class="icon-social-linkedin"></i></a></li>
                                    <li><a href="#."><i class="icon-social-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--======= MAP =========-->
        <div id="map"></div>

        <!-- About -->
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

        <!-- Newsletter -->
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
        </section>
    </div>

@endsection

@push('styles')
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .contact-info ul li {
            margin-bottom: 15px;
        }

        .contact-info ul li a {
            color: inherit;
        }

        .contact-info ul li a:hover {
            color: #f39c12;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }
    </style>
@endpush

@push('scripts')
    <!-- Begin Map Script -->
    <script type='text/javascript' src='https://maps.google.com/maps/api/js?sensor=false'></script>
    <script type="text/javascript">
        /*==========  Map  ==========*/
        var map;

        function initialize_map() {
            if ($('#map').length) {
                // Riyadh, Saudi Arabia coordinates
                var myLatLng = new google.maps.LatLng(24.7136, 46.6753);
                var mapOptions = {
                    zoom: 14,
                    center: myLatLng,
                    scrollwheel: false,
                    panControl: false,
                    zoomControl: true,
                    scaleControl: false,
                    mapTypeControl: false,
                    streetViewControl: false
                };
                map = new google.maps.Map(document.getElementById('map'), mapOptions);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: 'Union Group',
                    icon: '{{ asset('user/images/map-locator.png') }}'
                });
            } else {
                return false;
            }
        }
        google.maps.event.addDomListener(window, 'load', initialize_map);
    </script>
@endpush

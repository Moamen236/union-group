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
                            <div class="contact-info bg-blue">
                                <h6>{{ __('Our Address') }}</h6>
                                <ul>
                                    <li>
                                        <i class="icon-pointer"></i>
                                            {{ __('Mohamed Badawy Khalil St., Industrial Area, Ghamra, Cairo, Egypt') }}
                                            <br><br> <b>{{ __('Showroom') }}</b><br>
                                            {{ __('Kamel Sedky St. - Al-Fagala - Cairo') }}
                                    </li>
                                    <li>
                                        <i class="icon-call-end"></i>
                                        <strong>{{ __('Customer Services') }}:</strong><br>
                                        <a href="tel:022331414">022331414</a> ,
                                        <a href="tel:022353598">022353598</a> ,
                                        <a href="tel:01016194660">01016194660</a>
                                    </li>
                                    <li>
                                        <i class="icon-call-end"></i>
                                        <strong>{{ __('Sales') }}:</strong><br>
                                        <a href="tel:01026578943">01026578943</a> ,
                                        <a href="tel:01026347675">01026347675</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-whatsapp"></i>
                                        <strong>{{ __('WhatsApp') }}:</strong><br>
                                        <a href="https://wa.me/201016194660" target="_blank">01016194660</a>
                                    </li>
                                    <li>
                                        <i class="icon-envelope"></i>
                                        <a href="mailto:info@uniongroup.com.eg">info@uniongroup.com.eg.eg</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About -->
        <section class="small-about padding-top-150 padding-bottom-150">
            <div class="container">
                <div class="heading text-center">
                    <h4>{{ __('About Union Group') }}</h4>
                    <p class="about-support-p">
                        {{ __('Union Group is one of Egypt\'s leading manufacturers of premium sanitary fittings. Established in 1950, we specialize in designing and producing high-quality bathroom mixers and water control solutions for homes, projects and large developments across Egypt and international markets.') }}
                    </p>
                    <p class="about-support-p">
                        {{ __('For more than 70 years, Union Group has combined engineering excellence, modern technology and competitive pricing to deliver reliable, certified and long-lasting sanitary products.') }}
                    </p>
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
            color: #fff
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

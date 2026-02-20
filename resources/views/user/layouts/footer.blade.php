@php
    $footerCategories = \App\Models\ProductCategory::active()->ordered()->take(6)->get();
@endphp

<footer>
    <div class="container">

        <!-- ABOUT Location -->
        <div class="col-md-3">
            <div class="about-footer">
                <img class="margin-bottom-30" src="{{ asset('user/images/logo.png') }}" alt="{{ __('Union Group') }}"
                    style="max-width: 100px;">
                <p><i class="icon-pointer"></i> {{ __('Factory and Headquarter') }}<br>
                    {{ __('Mohamed Badawy Khalil St., Industrial Area, Ghamra, Cairo, Egypt') }}</p>
                <p><i class="icon-pointer"></i> {{ __('Showroom') }}<br>
                    {{ __('Kamel Sedky St. - Al-Fagala - Cairo') }}
                </p>
                <ul class="link social-footer">
                    <li><a href="#."><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                    <li><a href="#."><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
                </ul>
            </div>
        </div>

        <!-- Product Categories -->
        <div class="col-md-3">
            <h6>{{ __('Product Categories') }}</h6>
            <ul class="link">
                @foreach ($footerCategories as $category)
                    <li><a href="{{ route('user.shop', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Quick Links -->
        <div class="col-md-3">
            <h6>{{ __('Quick Links') }}</h6>
            <ul class="link">
                <li><a href="{{ route('user.index') }}">{{ __('Home') }}</a></li>
                <li><a href="{{ route('user.shop') }}">{{ __('Products') }}</a></li>
                <li><a href="{{ route('user.about') }}">{{ __('About Us') }}</a></li>
                <li><a href="{{ route('user.projects') }}">{{ __('Our Projects') }}</a></li>
                <li><a href="{{ route('user.certificates') }}">{{ __('Certifications') }}</a></li>
                <li><a href="{{ route('user.contact') }}">{{ __('Contact Us') }}</a></li>
            </ul>
        </div>

        <!-- Contact & Phones -->
        <div class="col-md-3">
            <h6>{{ __('Contact Us') }}</h6>
            <p>
                <i class="icon-call-end" style="margin: 0 5px"></i>
                <strong>{{ __('Customer Services') }}:</strong>
                <a href="tel:022331414" style="color: inherit;">022331414</a>,
                <a href="tel:022353598" style="color: inherit;">022353598</a>,
                <a href="tel:01016194660" style="color: inherit;">01016194660</a>
            </p>
            <p>
                <i class="icon-call-end" style="margin: 0 5px"></i>
                <strong>{{ __('Sales') }}:</strong>
                <a href="tel:01026578943" style="color: inherit;">01026578943</a>,
                <a href="tel:01026347675" style="color: inherit;">01026347675</a>
            </p>
            <p>
                <i class="icon-call-end" style="margin: 0 5px"></i>
                <strong>{{ __('WhatsApp') }}:</strong>
                <a href="https://wa.me/201016194660" target="_blank" style="color: inherit;">01016194660</a>
            </p>
            <p>
                <i class="icon-envelope" style="margin: 0 5px"></i> {{ __('Email') }}: <a href="mailto:info@uniongroup.com.eg"
                    style="color: inherit;">info@uniongroup.com.eg</a>
            </p>
        </div>

        <!-- Rights -->
        <div class="rights">
            <p>© {{ date('Y') }} {{ __('Union Group. All rights reserved.') }}</p>
            <div class="scroll">
                <a href="#wrap" class="go-up"><i class="lnr lnr-arrow-up"></i></a>
            </div>
        </div>
    </div>
</footer>

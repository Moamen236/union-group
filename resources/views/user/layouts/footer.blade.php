@php
  $footerCategories = \App\Models\ProductCategory::active()->ordered()->take(6)->get();
@endphp

<footer>
    <div class="container">

      <!-- ABOUT Location -->
      <div class="col-md-3">
        <div class="about-footer">
          <img class="margin-bottom-30" src="{{ asset('user/images/logo.png') }}" alt="{{ __('Union Group') }}" style="max-width: 100px;">
          <p><i class="icon-pointer"></i> {{ __('Industrial Area, P.O. Box 12345') }}<br>
            {{ __('Riyadh, Saudi Arabia') }}</p>
          <p><i class="icon-call-end"></i> <a href="tel:+966112345678" style="color: inherit;">+966 11 234 5678</a></p>
          <p><i class="icon-envelope"></i> <a href="mailto:info@uniongroup.com" style="color: inherit;">info@uniongroup.com</a></p>
        </div>
      </div>

      <!-- Product Categories -->
      <div class="col-md-3">
        <h6>{{ __('Product Categories') }}</h6>
        <ul class="link">
          @foreach($footerCategories as $category)
          <li><a href="{{ route('user.shop', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
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

      <!-- Follow Us -->
      <div class="col-md-3">
        <h6>{{ __('Follow Us') }}</h6>
        <ul class="link social-footer">
          <li><a href="#."><i class="icon-social-facebook"></i> Facebook</a></li>
          <li><a href="#."><i class="icon-social-twitter"></i> Twitter</a></li>
          <li><a href="#."><i class="icon-social-instagram"></i> Instagram</a></li>
          <li><a href="#."><i class="icon-social-linkedin"></i> LinkedIn</a></li>
          <li><a href="#."><i class="icon-social-youtube"></i> YouTube</a></li>
        </ul>
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

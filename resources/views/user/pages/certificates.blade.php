@extends('user.layouts.app')

@section('content')

  <!--======= SUB BANNER =========-->
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <h4>{{ __('Our Certificates') }}</h4>
        <p>{{ __('International certifications that validate our commitment to quality and excellence.') }}</p>
        <ol class="breadcrumb">
          <li><a href="{{ route('user.index') }}">{{ __('Home') }}</a></li>
          <li class="active">{{ __('Certificates') }}</li>
        </ol>
      </div>
    </div>
  </section>

  <!-- Content -->
  <div id="content">

    <!-- Certificates Section -->
    <section class="padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="heading text-center">
          <h4>{{ __('Quality Certifications') }}</h4>
          <span>{{ __('We hold prestigious international certifications that guarantee the excellence of our products and processes.') }}</span>
        </div>

        @if($certificates->count() > 0)
        <div class="row certificates-grid">
          @foreach($certificates as $certificate)
          <div class="col-md-6 col-lg-4 margin-bottom-30">
            <article class="certificate-card animate fadeInUp" data-wow-delay="{{ ($loop->index % 3) * 0.1 }}s">
              <div class="certificate-header">
                <div class="certificate-icon">
                  @if($certificate->isPdf())
                  <i class="fa fa-file-pdf-o"></i>
                  @else
                  <i class="fa fa-certificate"></i>
                  @endif
                </div>
                @if($certificate->isExpired())
                <span class="status-badge expired">{{ __('Expired') }}</span>
                @else
                <span class="status-badge active">{{ __('Active') }}</span>
                @endif
              </div>

              <div class="certificate-body">
                <h5>{{ $certificate->name }}</h5>
                <p class="issuer">
                  <i class="fa fa-building-o"></i>
                  {{ $certificate->issuer }}
                </p>

                <div class="certificate-dates">
                  @if($certificate->issue_date)
                  <div class="date-item">
                    <span class="date-label">{{ __('Issue Date') }}</span>
                    <span class="date-value">{{ $certificate->issue_date->format('M d, Y') }}</span>
                  </div>
                  @endif
                  @if($certificate->expiry_date)
                  <div class="date-item">
                    <span class="date-label">{{ __('Expiry Date') }}</span>
                    <span class="date-value {{ $certificate->isExpired() ? 'text-danger' : '' }}">{{ $certificate->expiry_date->format('M d, Y') }}</span>
                  </div>
                  @endif
                </div>
              </div>

              <div class="certificate-footer">
                @if($certificate->file)
                <a href="{{ $certificate->file_url }}" target="_blank" class="btn btn-view">
                  <i class="fa fa-eye"></i>
                  {{ $certificate->isPdf() ? __('View PDF') : __('View Certificate') }}
                </a>
                <a href="{{ $certificate->file_url }}" download class="btn btn-download">
                  <i class="fa fa-download"></i>
                </a>
                @endif
              </div>
            </article>
          </div>
          @endforeach
        </div>

        <!-- Pagination -->
        @if($certificates->hasPages())
        <div class="text-center margin-top-50">
          {{ $certificates->links() }}
        </div>
        @endif

        @else
        <div class="text-center padding-top-50 padding-bottom-50">
          <h4>{{ __('No certificates found') }}</h4>
          <p>{{ __('Check back later for updates on our certifications.') }}</p>
        </div>
        @endif
      </div>
    </section>

    <!-- Trust Section -->
    <section class="light-gray-bg padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="heading text-center">
          <h4>{{ __('Why Our Certifications Matter') }}</h4>
          <span>{{ __('Our certifications demonstrate our unwavering commitment to quality, safety, and environmental responsibility.') }}</span>
        </div>

        <div class="row margin-top-50">
          <div class="col-md-4 text-center margin-bottom-30">
            <div class="trust-item">
              <div class="trust-icon">
                <i class="fa fa-shield fa-3x"></i>
              </div>
              <h6>{{ __('Quality Assurance') }}</h6>
              <p>{{ __('Our ISO certifications ensure consistent quality in every product we manufacture.') }}</p>
            </div>
          </div>
          <div class="col-md-4 text-center margin-bottom-30">
            <div class="trust-item">
              <div class="trust-icon">
                <i class="fa fa-leaf fa-3x"></i>
              </div>
              <h6>{{ __('Environmental Standards') }}</h6>
              <p>{{ __('We adhere to strict environmental regulations and sustainable manufacturing practices.') }}</p>
            </div>
          </div>
          <div class="col-md-4 text-center margin-bottom-30">
            <div class="trust-item">
              <div class="trust-icon">
                <i class="fa fa-users fa-3x"></i>
              </div>
              <h6>{{ __('Customer Trust') }}</h6>
              <p>{{ __('Our certifications give our customers confidence in the safety and reliability of our products.') }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="small-about padding-top-150 padding-bottom-150">
      <div class="container">
        <div class="heading text-center">
          <h4>{{ __('Need More Information?') }}</h4>
          <p>{{ __('Contact us for detailed information about our certifications or to request copies of specific certificates for your records.') }}</p>
        </div>
        <div class="text-center">
          <a href="{{ route('user.contact') }}" class="btn">{{ __('Contact Us') }}</a>
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
  .certificates-grid {
    display: flex;
    flex-wrap: wrap;
  }

  .certificate-card {
    background: #fff;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    border-radius: 8px;
    overflow: hidden;
  }

  .certificate-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
  }

  .certificate-header {
    background: linear-gradient(135deg, #333 0%, #555 100%);
    padding: 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .certificate-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .certificate-icon i {
    font-size: 24px;
    color: #f39c12;
  }

  .status-badge {
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .status-badge.active {
    background: #27ae60;
    color: #fff;
  }

  .status-badge.expired {
    background: #e74c3c;
    color: #fff;
  }

  .certificate-body {
    padding: 25px;
    flex-grow: 1;
  }

  .certificate-body h5 {
    margin-bottom: 12px;
    font-size: 18px;
    line-height: 1.4;
    color: #333;
  }

  .certificate-body .issuer {
    color: #666;
    font-size: 14px;
    margin-bottom: 20px;
  }

  .certificate-body .issuer i {
    margin-right: 8px;
    color: #999;
  }

  .certificate-dates {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    padding-top: 15px;
    border-top: 1px solid #eee;
  }

  .date-item {
    flex: 1;
    min-width: 120px;
  }

  .date-label {
    display: block;
    font-size: 11px;
    color: #999;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 4px;
  }

  .date-value {
    font-size: 14px;
    color: #333;
    font-weight: 500;
  }

  .date-value.text-danger {
    color: #e74c3c;
  }

  .certificate-footer {
    padding: 15px 25px 25px;
    display: flex;
    gap: 10px;
  }

  .btn-view {
    flex: 1;
    text-align: center;
    padding: 10px 15px;
    background: #333;
    color: #fff;
    border: none;
    transition: all 0.3s ease;
  }

  .btn-view:hover {
    background: #f39c12;
    color: #fff;
  }

  .btn-view i {
    margin-right: 5px;
  }

  .btn-download {
    padding: 10px 15px;
    background: #f5f5f5;
    color: #333;
    border: none;
    transition: all 0.3s ease;
  }

  .btn-download:hover {
    background: #333;
    color: #fff;
  }

  /* Trust Section */
  .trust-item {
    padding: 30px;
  }

  .trust-icon {
    width: 100px;
    height: 100px;
    background: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
  }

  .trust-icon i {
    color: #f39c12;
  }

  .trust-item h6 {
    margin-bottom: 10px;
  }

  .trust-item p {
    color: #666;
    font-size: 14px;
  }
</style>
@endpush

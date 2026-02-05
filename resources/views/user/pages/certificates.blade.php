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

                @if ($certificates->count() > 0)
                    <div class="row certificates-grid">
                        @foreach ($certificates as $certificate)
                            <div class="col-md-6 col-lg-4 margin-bottom-30">
                                <article class="certificate-card animate fadeInUp"
                                    data-wow-delay="{{ ($loop->index % 3) * 0.1 }}s">

                                    @if ($certificate->logo_url)
                                        <div class="certificate-logo">
                                            <img src="{{ $certificate->logo_url }}" alt="{{ $certificate->name }}">
                                        </div>
                                    @endif
                                    <div class="certificate-body">
                                        <h5>{{ $certificate->name }}</h5>
                                        {{-- <p class="issuer">
                                            <i class="fa fa-building-o"></i>
                                            {{ $certificate->issuer }}
                                        </p> --}}

                                        {{-- <div class="certificate-dates">
                                            @if ($certificate->issue_date)
                                                <div class="date-item">
                                                    <span class="date-label">{{ __('Issue Date') }}</span>
                                                    <span
                                                        class="date-value">{{ $certificate->issue_date->format('M d, Y') }}</span>
                                                </div>
                                            @endif
                                            @if ($certificate->expiry_date)
                                                <div class="date-item">
                                                    <span class="date-label">{{ __('Expiry Date') }}</span>
                                                    <span
                                                        class="date-value {{ $certificate->isExpired() ? 'text-danger' : '' }}">{{ $certificate->expiry_date->format('M d, Y') }}</span>
                                                </div>
                                            @endif
                                        </div> --}}
                                    </div>

                                    <div class="certificate-footer">
                                        @if ($certificate->file)
                                            <a href="#" class="btn btn-view view-certificate-btn"
                                                data-certificate-url="{{ $certificate->file_url }}"
                                                data-certificate-name="{{ $certificate->name }}"
                                                data-is-pdf="{{ $certificate->isPdf() ? 'true' : 'false' }}">
                                                <i class="fa fa-eye"></i>
                                                {{ __('View Certificate') }}
                                            </a>
                                        @endif
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if ($certificates->hasPages())
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
                            <p>{{ __('Our ISO certifications ensure consistent quality in every product we manufacture.') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center margin-bottom-30">
                        <div class="trust-item">
                            <div class="trust-icon">
                                <i class="fa fa-leaf fa-3x"></i>
                            </div>
                            <h6>{{ __('Environmental Standards') }}</h6>
                            <p>{{ __('We adhere to strict environmental regulations and sustainable manufacturing practices.') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center margin-bottom-30">
                        <div class="trust-item">
                            <div class="trust-icon">
                                <i class="fa fa-users fa-3x"></i>
                            </div>
                            <h6>{{ __('Customer Trust') }}</h6>
                            <p>{{ __('Our certifications give our customers confidence in the safety and reliability of our products.') }}
                            </p>
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
                    <p>{{ __('Contact us for detailed information about our certifications or to request copies of specific certificates for your records.') }}
                    </p>
                </div>
                <div class="text-center">
                    <a href="{{ route('user.contact') }}" class="btn">{{ __('Contact Us') }}</a>
                </div>
            </div>
        </section>
    </div>

    <!-- Certificate Modal -->
    <div class="modal fade" id="certificateModal" tabindex="-1" role="dialog" aria-labelledby="certificateModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="certificateModalLabel">{{ __('Certificate') }}</h4>
                </div>
                <div class="modal-body">
                    <div id="certificate-content">
                        <!-- Content will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
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

        .certificate-logo {
            padding: 20px 25px 0;
            text-align: center;
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .certificate-logo img {
            max-height: 200px;
            max-width: 120px;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        .certificate-body {
            padding: 25px;
            padding-bottom: 0;
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
            background: #0f2b4b;
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-view:hover {
            background: #1e8ab8;
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

        /* Certificate Modal */
        .modal-content {
            border-radius: 8px;
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background-color: #0f2b4b;
            color: #fff;
            border-radius: 8px 8px 0 0;
            padding: 20px 25px;
            border-bottom: none;
        }

        .modal-header .close {
            color: #fff;
            opacity: 0.8;
            font-size: 28px;
            font-weight: 300;
            text-shadow: none;
        }

        .modal-header .close:hover {
            opacity: 1;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #fff;
        }

        .modal-body {
            padding: 0;
            max-height: 70vh;
            overflow-y: auto;
        }

        #certificate-content {
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
            padding: 20px 0;
        }

        #certificate-content img {
            max-width: 100%;
            display: block;
            height: 600px;
            object-fit: contain;
        }

        #certificate-content iframe {
            width: 100%;
            min-height: 600px;
            border: none;
        }

        .certificate-loading {
            text-align: center;
            padding: 50px;
            color: #999;
        }

        .certificate-loading i {
            font-size: 48px;
            margin-bottom: 15px;
            display: block;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            // Handle certificate modal opening
            $(document).on('click', '.view-certificate-btn', function(e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();

                var $btn = $(this);
                var certificateUrl = $btn.data('certificate-url');
                var certificateName = $btn.data('certificate-name');
                var isPdf = $btn.data('is-pdf') === 'true' || $btn.data('is-pdf') === true;

                // Update modal title
                $('#certificateModalLabel').text(certificateName || '{{ __('Certificate') }}');

                // Update download link
                $('#certificate-download-link').attr('href', certificateUrl);

                // Show loading state
                $('#certificate-content').html(
                    '<div class="certificate-loading">' +
                    '<i class="fa fa-spinner fa-spin"></i>' +
                    '<p>{{ __('Loading certificate...') }}</p>' +
                    '</div>'
                );

                // Load content based on file type
                if (isPdf) {
                    // For PDFs, use iframe
                    $('#certificate-content').html(
                        '<iframe src="' + certificateUrl + '" frameborder="0"></iframe>'
                    );
                } else {
                    // For images, use img tag
                    var img = $('<img>').attr('src', certificateUrl).attr('alt', certificateName);
                    img.on('load', function() {
                        $('#certificate-content').html(img);
                    });
                    img.on('error', function() {
                        $('#certificate-content').html(
                            '<div class="certificate-loading">' +
                            '<i class="fa fa-exclamation-triangle"></i>' +
                            '<p>{{ __('Failed to load certificate. Please try downloading it instead.') }}</p>' +
                            '</div>'
                        );
                    });
                }

                // Show modal
                $('#certificateModal').modal('show');
            });

            // Prevent modal from closing when clicking inside modal content
            $('#certificateModal').on('click', function(e) {
                if ($(e.target).is('.modal')) {
                    // Allow backdrop click to close
                    return true;
                }
            });

            // Clean up when modal is closed
            $('#certificateModal').on('hidden.bs.modal', function() {
                $('#certificate-content').html('');
            });
        });
    </script>
@endpush

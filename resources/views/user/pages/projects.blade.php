@extends('user.layouts.app')

@section('content')

  <!--======= SUB BANNER =========-->
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <h4>{{ __('Our Projects') }}</h4>
        <p>{{ __('Discover our portfolio of successful projects across the region.') }}</p>
        <ol class="breadcrumb">
          <li><a href="{{ route('user.index') }}">{{ __('Home') }}</a></li>
          <li class="active">{{ __('Projects') }}</li>
        </ol>
      </div>
    </div>
  </section>

  <!-- Content -->
  <div id="content">

    <!-- Projects Section -->
    <section class="padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="heading text-center">
          <h4>{{ __('Our Portfolio') }}</h4>
          <span>{{ __('Union Group products are trusted in some of the most important national, residential, healthcare, educational and hospitality projects across Egypt.') }}</span>
        </div>

        @if($projects->count() > 0)
        <div class="row projects-grid">
          @foreach($projects as $project)
          <div class="col-md-6 col-lg-4 margin-bottom-30">
            <article class="project-card animate fadeInUp" data-wow-delay="{{ ($loop->index % 3) * 0.1 }}s">
              <div class="project-image">
                @if($project->image)
                <img src="{{ $project->image_url }}" alt="{{ $project->name }}" class="img-responsive">
                @else
                <img src="{{ asset('user/images/product-placeholder.jpg') }}" alt="{{ $project->name }}" class="img-responsive">
                @endif
                <div class="project-overlay">
                  <div class="overlay-content">
                    @if($project->completion_date)
                    <span class="project-date">{{ $project->completion_date->format('M Y') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="project-info">
                <h5>{{ $project->name }}</h5>
                @if($project->location)
                <p class="location"><i class="fa fa-map-marker"></i> {{ $project->location }}</p>
                @endif
                <p class="description">{{ Str::limit($project->description, 150) }}</p>
                <ul class="project-meta">
                  @if($project->client)
                  <li><i class="fa fa-building"></i> {{ $project->client }}</li>
                  @endif
                  @if($project->completion_date)
                  <li><i class="fa fa-calendar"></i> {{ $project->completion_date->format('Y') }}</li>
                  @endif
                </ul>
              </div>
            </article>
          </div>
          @endforeach
        </div>

        <!-- Pagination -->
        @if($projects->hasPages())
        <div class="text-center margin-top-50">
          {{ $projects->links() }}
        </div>
        @endif

        @else
        <div class="text-center padding-top-50 padding-bottom-50">
          <h4>{{ __('No projects found') }}</h4>
          <p>{{ __('Check back later for updates on our latest projects.') }}</p>
        </div>
        @endif
      </div>
    </section>

    <!-- CTA Section -->
    <section class="small-about padding-top-150 padding-bottom-150">
      <div class="container">
        <div class="heading text-center">
          <h4>{{ __('Have a Project in Mind?') }}</h4>
          <p>{{ __('Let us help you find the perfect paint and coating solutions for your next project. Our team of experts is ready to assist you.') }}</p>
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
  .projects-grid {
    display: flex;
    flex-wrap: wrap;
  }

  .project-card {
    background: #fff;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
    overflow: hidden;
  }

  .project-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
  }

  .project-image {
    position: relative;
    overflow: hidden;
    height: 220px;
  }

  .project-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  .project-card:hover .project-image img {
    transform: scale(1.1);
  }

  .project-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 50%, rgba(0,0,0,0.7) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .project-card:hover .project-overlay {
    opacity: 1;
  }

  .overlay-content {
    position: absolute;
    bottom: 15px;
    left: 15px;
  }

  .project-date {
    background: #f39c12;
    color: #fff;
    padding: 5px 12px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
  }

  .project-info {
    padding: 20px;
  }

  .project-info h5 {
    margin-bottom: 10px;
    font-size: 18px;
    line-height: 1.4;
  }

  .project-info .location {
    color: #666;
    font-size: 13px;
    margin-bottom: 10px;
  }

  .project-info .location i {
    color: #f39c12;
    margin-right: 5px;
  }

  .project-info .description {
    color: #777;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 15px;
  }

  .project-meta {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    border-top: 1px solid #eee;
    padding-top: 15px;
  }

  .project-meta li {
    color: #888;
    font-size: 13px;
  }

  .project-meta li i {
    margin-right: 5px;
    color: #333;
  }
</style>
@endpush

@extends('admin.layouts.app')

@section('content')
  <div class="grid grid-cols-12 gap-4 md:gap-6">
    <div class="col-span-12 space-y-6 xl:col-span-7">
      @include('admin.components.ecommerce.ecommerce-metrics')
      @include('admin.components.ecommerce.monthly-sale')
    </div>
    <div class="col-span-12 xl:col-span-5">
        @include('admin.components.ecommerce.monthly-target')
    </div>

    <div class="col-span-12">
      @include('admin.components.ecommerce.statistics-chart')
    </div>

    <div class="col-span-12 xl:col-span-5">
      @include('admin.components.ecommerce.customer-demographic')
    </div>

    <div class="col-span-12 xl:col-span-7">
      @include('admin.components.ecommerce.recent-orders')
    </div>
  </div>
@endsection

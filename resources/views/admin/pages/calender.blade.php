@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Calender'])
    @include('admin.components.calender-area')
@endsection

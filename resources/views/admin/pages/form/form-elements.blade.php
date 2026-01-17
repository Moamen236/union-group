@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Form Elements'])
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
        <div class="space-y-6">
            @include('admin.components.form.form-elements.default-inputs')
            @include('admin.components.form.form-elements.select-inputs')
            @include('admin.components.form.form-elements.text-area-inputs')
            @include('admin.components.form.form-elements.input-states')
        </div>
        <div class="space-y-6">
            @include('admin.components.form.form-elements.input-group')
            @include('admin.components.form.form-elements.file-input-example')
            @include('admin.components.form.form-elements.checkbox-component')
            @include('admin.components.form.form-elements.radio-buttons')
            @include('admin.components.form.form-elements.toggle-switch')
            @include('admin.components.form.form-elements.dropzone')
        </div>
    </div>
@endsection

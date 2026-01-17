@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Create Project'])
    @include('admin.components.common.alerts')

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Create New Project</h3>
        </div>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="space-y-6">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">English Content</h4>
                    @include('admin.components.form.input-group', ['name' => 'name_en', 'label' => 'Name (English)', 'required' => true, 'placeholder' => 'Enter project name'])
                    @include('admin.components.form.textarea-group', ['name' => 'description_en', 'label' => 'Description (English)', 'placeholder' => 'Enter project description', 'rows' => 4])
                    @include('admin.components.form.input-group', ['name' => 'location_en', 'label' => 'Location (English)', 'placeholder' => 'e.g., Dubai, UAE'])
                </div>

                <div class="space-y-6">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">Arabic Content</h4>
                    @include('admin.components.form.input-group', ['name' => 'name_ar', 'label' => 'Name (Arabic)', 'required' => true, 'placeholder' => 'أدخل اسم المشروع', 'dir' => 'rtl'])
                    @include('admin.components.form.textarea-group', ['name' => 'description_ar', 'label' => 'Description (Arabic)', 'placeholder' => 'أدخل وصف المشروع', 'rows' => 4, 'dir' => 'rtl'])
                    @include('admin.components.form.input-group', ['name' => 'location_ar', 'label' => 'Location (Arabic)', 'placeholder' => 'مثال: دبي، الإمارات', 'dir' => 'rtl'])
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div>@include('admin.components.form.image-upload', ['name' => 'image', 'label' => 'Project Image', 'help' => 'Recommended size: 800x600px. Max 2MB.'])</div>
                <div class="space-y-6">
                    @include('admin.components.form.input-group', ['name' => 'client', 'label' => 'Client', 'placeholder' => 'Client name'])
                    @include('admin.components.form.input-group', ['name' => 'completion_date', 'label' => 'Completion Date', 'type' => 'date'])
                    @include('admin.components.form.input-group', ['name' => 'order', 'label' => 'Display Order', 'type' => 'number', 'value' => 0])
                    @include('admin.components.form.toggle-switch', ['name' => 'status', 'label' => 'Active', 'checked' => true])
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">
                <a href="{{ route('admin.projects.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Cancel</a>
                <button type="submit" class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">Create Project</button>
            </div>
        </form>
    </div>
@endsection

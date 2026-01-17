@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Edit Project'])
    @include('admin.components.common.alerts')

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Project</h3>
        </div>

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="space-y-6">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">English Content</h4>
                    @include('admin.components.form.input-group', ['name' => 'name_en', 'label' => 'Name (English)', 'required' => true, 'value' => $project->name_en])
                    @include('admin.components.form.textarea-group', ['name' => 'description_en', 'label' => 'Description (English)', 'value' => $project->description_en, 'rows' => 4])
                    @include('admin.components.form.input-group', ['name' => 'location_en', 'label' => 'Location (English)', 'value' => $project->location_en])
                </div>

                <div class="space-y-6">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">Arabic Content</h4>
                    @include('admin.components.form.input-group', ['name' => 'name_ar', 'label' => 'Name (Arabic)', 'required' => true, 'value' => $project->name_ar, 'dir' => 'rtl'])
                    @include('admin.components.form.textarea-group', ['name' => 'description_ar', 'label' => 'Description (Arabic)', 'value' => $project->description_ar, 'rows' => 4, 'dir' => 'rtl'])
                    @include('admin.components.form.input-group', ['name' => 'location_ar', 'label' => 'Location (Arabic)', 'value' => $project->location_ar, 'dir' => 'rtl'])
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div>@include('admin.components.form.image-upload', ['name' => 'image', 'label' => 'Project Image', 'currentImage' => $project->imageUrl])</div>
                <div class="space-y-6">
                    @include('admin.components.form.input-group', ['name' => 'client', 'label' => 'Client', 'value' => $project->client])
                    @include('admin.components.form.input-group', ['name' => 'completion_date', 'label' => 'Completion Date', 'type' => 'date', 'value' => $project->completion_date?->format('Y-m-d')])
                    @include('admin.components.form.input-group', ['name' => 'order', 'label' => 'Display Order', 'type' => 'number', 'value' => $project->order])
                    @include('admin.components.form.toggle-switch', ['name' => 'status', 'label' => 'Active', 'checked' => $project->status])
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">
                <a href="{{ route('admin.projects.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Cancel</a>
                <button type="submit" class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">Update Project</button>
            </div>
        </form>
    </div>
@endsection

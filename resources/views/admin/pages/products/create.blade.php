@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Create Product'])
    @include('admin.components.common.alerts')

    <!-- Step Indicator -->
    <div class="mb-6">
        <div class="flex items-center justify-center">
            <div class="flex items-center">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-200 text-gray-500 dark:bg-gray-700 dark:text-gray-400 font-semibold">1</div>
                <span class="ml-2 text-sm font-medium text-black dark:text-white">Product Info</span>
            </div>
            <div class="mx-4 h-1 w-16 bg-gray-200 dark:bg-gray-700"></div>
            <div class="flex items-center">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-200 text-gray-500 dark:bg-gray-700 dark:text-gray-400 font-semibold">2</div>
                <span class="ml-2 text-sm font-medium text-black dark:text-white">Colors</span>
            </div>
            <div class="mx-4 h-1 w-16 bg-gray-200 dark:bg-gray-700"></div>
            <div class="flex items-center">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-200 text-gray-500 dark:bg-gray-700 dark:text-gray-400 font-semibold">3</div>
                <span class="ml-2 text-sm font-medium text-black dark:text-white">Images</span>
            </div>
        </div>
    </div>

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Step 1: Product Information</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Enter the basic product details in both languages.</p>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" class="p-6">
            @csrf

            <!-- Category Selection -->
            <div class="mb-6">
                @include('admin.components.form.select-group', [
                    'name' => 'category_id',
                    'label' => 'Category',
                    'required' => true,
                    'options' => $categories->pluck('name_en', 'id'),
                    'placeholder' => 'Select a category'
                ])
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <!-- English Fields -->
                <div class="space-y-6">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">English Content</h4>

                    @include('admin.components.form.input-group', [
                        'name' => 'name_en',
                        'label' => 'Name (English)',
                        'required' => true,
                        'placeholder' => 'Enter product name'
                    ])

                    @include('admin.components.form.textarea-group', [
                        'name' => 'description_en',
                        'label' => 'Description (English)',
                        'placeholder' => 'Enter product description',
                        'rows' => 4
                    ])

                    @include('admin.components.form.textarea-group', [
                        'name' => 'features_en',
                        'label' => 'Features (English)',
                        'placeholder' => 'Enter product features (one per line)',
                        'rows' => 4
                    ])
                </div>

                <!-- Arabic Fields -->
                <div class="space-y-6">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">Arabic Content</h4>

                    @include('admin.components.form.input-group', [
                        'name' => 'name_ar',
                        'label' => 'Name (Arabic)',
                        'required' => true,
                        'placeholder' => 'أدخل اسم المنتج',
                        'dir' => 'rtl'
                    ])

                    @include('admin.components.form.textarea-group', [
                        'name' => 'description_ar',
                        'label' => 'Description (Arabic)',
                        'placeholder' => 'أدخل وصف المنتج',
                        'rows' => 4,
                        'dir' => 'rtl'
                    ])

                    @include('admin.components.form.textarea-group', [
                        'name' => 'features_ar',
                        'label' => 'Features (Arabic)',
                        'placeholder' => 'أدخل مميزات المنتج (واحدة في كل سطر)',
                        'rows' => 4,
                        'dir' => 'rtl'
                    ])
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-3">
                @include('admin.components.form.input-group', [
                    'name' => 'code',
                    'label' => 'Product Code',
                    'placeholder' => 'e.g., SKU-001'
                ])

                @include('admin.components.form.input-group', [
                    'name' => 'slug',
                    'label' => 'Slug',
                    'placeholder' => 'auto-generated-from-name',
                    'help' => 'Leave empty to auto-generate'
                ])

                @include('admin.components.form.input-group', [
                    'name' => 'order',
                    'label' => 'Display Order',
                    'type' => 'number',
                    'value' => 0
                ])
            </div>

            <div class="mt-6 flex items-center gap-6">
                @include('admin.components.form.toggle-switch', [
                    'name' => 'status',
                    'label' => 'Active',
                    'checked' => true
                ])

                @include('admin.components.form.toggle-switch', [
                    'name' => 'is_favorite',
                    'label' => 'Featured Product',
                    'checked' => false
                ])
            </div>

            <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">
                <a href="{{ route('admin.products.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    Cancel
                </a>
                <button type="submit" class="inline-flex items-center rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                    Next: Add Colors
                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
@endsection

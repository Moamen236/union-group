@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Edit Product'])
    @include('admin.components.common.alerts')

    <!-- Quick Links for Colors and Images -->
    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <a href="{{ route('admin.products.colors', $product) }}" class="group flex items-center gap-4 rounded-xl border border-gray-200 bg-white p-4 transition hover:border-brand-500 hover:shadow-sm dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-purple-100 text-purple-600 transition group-hover:bg-purple-200 dark:bg-purple-900/50 dark:text-purple-400">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-900 dark:text-white">Manage Colors</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $product->colors()->count() }} colors</p>
            </div>
            <svg class="ml-auto h-5 w-5 text-gray-400 transition group-hover:text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
        </a>

        <a href="{{ route('admin.products.images', $product) }}" class="group flex items-center gap-4 rounded-xl border border-gray-200 bg-white p-4 transition hover:border-brand-500 hover:shadow-sm dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100 text-blue-600 transition group-hover:bg-blue-200 dark:bg-blue-900/50 dark:text-blue-400">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-900 dark:text-white">Manage Images</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $product->images()->count() }} images</p>
            </div>
            <svg class="ml-auto h-5 w-5 text-gray-400 transition group-hover:text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
        </a>

        <a href="{{ route('admin.products.show', $product) }}" class="group flex items-center gap-4 rounded-xl border border-gray-200 bg-white p-4 transition hover:border-brand-500 hover:shadow-sm dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-green-100 text-green-600 transition group-hover:bg-green-200 dark:bg-green-900/50 dark:text-green-400">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-900 dark:text-white">Preview Product</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">View full details</p>
            </div>
            <svg class="ml-auto h-5 w-5 text-gray-400 transition group-hover:text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
        </a>
    </div>

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Product Information</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Update the product basic details.</p>
        </div>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')

            <!-- Category Selection -->
            <div class="mb-6">
                @include('admin.components.form.select-group', [
                    'name' => 'category_id',
                    'label' => 'Category',
                    'required' => true,
                    'value' => $product->category_id,
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
                        'value' => $product->name_en,
                        'placeholder' => 'Enter product name'
                    ])

                    @include('admin.components.form.textarea-group', [
                        'name' => 'description_en',
                        'label' => 'Description (English)',
                        'value' => $product->description_en,
                        'placeholder' => 'Enter product description',
                        'rows' => 4
                    ])

                    @include('admin.components.form.textarea-group', [
                        'name' => 'features_en',
                        'label' => 'Features (English)',
                        'value' => $product->features_en,
                        'placeholder' => 'Enter product features',
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
                        'value' => $product->name_ar,
                        'placeholder' => 'أدخل اسم المنتج',
                        'dir' => 'rtl'
                    ])

                    @include('admin.components.form.textarea-group', [
                        'name' => 'description_ar',
                        'label' => 'Description (Arabic)',
                        'value' => $product->description_ar,
                        'placeholder' => 'أدخل وصف المنتج',
                        'rows' => 4,
                        'dir' => 'rtl'
                    ])

                    @include('admin.components.form.textarea-group', [
                        'name' => 'features_ar',
                        'label' => 'Features (Arabic)',
                        'value' => $product->features_ar,
                        'placeholder' => 'أدخل مميزات المنتج',
                        'rows' => 4,
                        'dir' => 'rtl'
                    ])
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-3">
                @include('admin.components.form.input-group', [
                    'name' => 'code',
                    'label' => 'Product Code',
                    'value' => $product->code,
                    'placeholder' => 'e.g., SKU-001'
                ])

                @include('admin.components.form.input-group', [
                    'name' => 'slug',
                    'label' => 'Slug',
                    'value' => $product->slug,
                    'placeholder' => 'auto-generated-from-name',
                    'help' => 'Leave empty to auto-generate'
                ])

                @include('admin.components.form.input-group', [
                    'name' => 'order',
                    'label' => 'Display Order',
                    'type' => 'number',
                    'value' => $product->order
                ])
            </div>

            <div class="mt-6 flex items-center gap-6">
                @include('admin.components.form.toggle-switch', [
                    'name' => 'status',
                    'label' => 'Active',
                    'checked' => $product->status
                ])

                @include('admin.components.form.toggle-switch', [
                    'name' => 'is_favorite',
                    'label' => 'Featured Product',
                    'checked' => $product->is_favorite
                ])
            </div>

            <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">
                <a href="{{ route('admin.products.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    Cancel
                </a>
                <button type="submit" class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                    Update Product
                </button>
            </div>
        </form>
    </div>
@endsection

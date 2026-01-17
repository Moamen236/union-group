@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Edit Image'])
    @include('admin.components.common.alerts')

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Product Image</h3>
        </div>

        <form action="{{ route('admin.product-images.update', $productImage) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="space-y-6">
                    @include('admin.components.form.select-group', [
                        'name' => 'product_id',
                        'label' => 'Product',
                        'required' => true,
                        'value' => $productImage->product_id,
                        'options' => $products->pluck('name_en', 'id')
                    ])

                    @include('admin.components.form.select-group', [
                        'name' => 'color_id',
                        'label' => 'Color (Optional)',
                        'value' => $productImage->color_id,
                        'options' => $colors->pluck('name_en', 'id'),
                        'placeholder' => 'No specific color'
                    ])

                    @include('admin.components.form.image-upload', [
                        'name' => 'image',
                        'label' => 'Product Image',
                        'currentImage' => $productImage->imageUrl,
                        'help' => 'Leave empty to keep current image'
                    ])
                </div>

                <div class="space-y-6">
                    @include('admin.components.form.input-group', [
                        'name' => 'alt_en',
                        'label' => 'Alt Text (English)',
                        'value' => $productImage->alt_en,
                        'placeholder' => 'Describe the image'
                    ])

                    @include('admin.components.form.input-group', [
                        'name' => 'alt_ar',
                        'label' => 'Alt Text (Arabic)',
                        'value' => $productImage->alt_ar,
                        'placeholder' => 'وصف الصورة',
                        'dir' => 'rtl'
                    ])

                    @include('admin.components.form.input-group', [
                        'name' => 'order',
                        'label' => 'Display Order',
                        'type' => 'number',
                        'value' => $productImage->order
                    ])

                    @include('admin.components.form.toggle-switch', [
                        'name' => 'is_main',
                        'label' => 'Set as Main Image',
                        'checked' => $productImage->is_main
                    ])
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">
                <a href="{{ route('admin.product-images.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Cancel</a>
                <button type="submit" class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">Update Image</button>
            </div>
        </form>
    </div>
@endsection

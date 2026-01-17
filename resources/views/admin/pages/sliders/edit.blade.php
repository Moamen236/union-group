@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Edit Slider'])
    @include('admin.components.common.alerts')

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Slider</h3>
        </div>

        <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <!-- English Fields -->
                <div class="space-y-6">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">English Content</h4>

                    @include('admin.components.form.input-group', [
                        'name' => 'title_en',
                        'label' => 'Title (English)',
                        'required' => true,
                        'value' => $slider->title_en,
                        'placeholder' => 'Enter slider title'
                    ])

                    @include('admin.components.form.input-group', [
                        'name' => 'subtitle_en',
                        'label' => 'Subtitle (English)',
                        'value' => $slider->subtitle_en,
                        'placeholder' => 'Enter slider subtitle'
                    ])

                    @include('admin.components.form.input-group', [
                        'name' => 'button_text_en',
                        'label' => 'Button Text (English)',
                        'value' => $slider->button_text_en,
                        'placeholder' => 'e.g., Learn More'
                    ])
                </div>

                <!-- Arabic Fields -->
                <div class="space-y-6">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">Arabic Content</h4>

                    @include('admin.components.form.input-group', [
                        'name' => 'title_ar',
                        'label' => 'Title (Arabic)',
                        'required' => true,
                        'value' => $slider->title_ar,
                        'placeholder' => 'أدخل عنوان السلايدر',
                        'dir' => 'rtl'
                    ])

                    @include('admin.components.form.input-group', [
                        'name' => 'subtitle_ar',
                        'label' => 'Subtitle (Arabic)',
                        'value' => $slider->subtitle_ar,
                        'placeholder' => 'أدخل العنوان الفرعي',
                        'dir' => 'rtl'
                    ])

                    @include('admin.components.form.input-group', [
                        'name' => 'button_text_ar',
                        'label' => 'Button Text (Arabic)',
                        'value' => $slider->button_text_ar,
                        'placeholder' => 'مثال: اقرأ المزيد',
                        'dir' => 'rtl'
                    ])
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
                <!-- Image Upload -->
                <div>
                    @include('admin.components.form.image-upload', [
                        'name' => 'image',
                        'label' => 'Slider Image',
                        'currentImage' => $slider->imageUrl,
                        'help' => 'Recommended size: 1920x600px. Max 2MB.'
                    ])
                </div>

                <!-- Other Fields -->
                <div class="space-y-6">
                    @include('admin.components.form.input-group', [
                        'name' => 'button_url',
                        'label' => 'Button URL',
                        'type' => 'url',
                        'value' => $slider->button_url,
                        'placeholder' => 'https://example.com'
                    ])

                    @include('admin.components.form.input-group', [
                        'name' => 'order',
                        'label' => 'Display Order',
                        'type' => 'number',
                        'value' => $slider->order,
                        'help' => 'Lower numbers appear first'
                    ])

                    @include('admin.components.form.toggle-switch', [
                        'name' => 'status',
                        'label' => 'Active',
                        'checked' => $slider->status
                    ])
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">
                <a href="{{ route('admin.sliders.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    Cancel
                </a>
                <button type="submit" class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                    Update Slider
                </button>
            </div>
        </form>
    </div>
@endsection

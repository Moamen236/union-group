@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Upload Image'])
    @include('admin.components.common.alerts')

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Upload Product Image</h3>
        </div>

        <form action="{{ route('admin.product-images.store') }}" method="POST" enctype="multipart/form-data" class="p-6" x-data="{ productId: '{{ $selectedProduct }}', colors: @json($colors) }">
            @csrf

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="space-y-6">
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Product <span class="text-red-500">*</span></label>
                        <select name="product_id" x-model="productId" @change="fetchColors()" required class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                            <option value="">Select a product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name_en }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Color (Optional)</label>
                        <select name="color_id" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                            <option value="">No specific color</option>
                            <template x-for="color in colors" :key="color.id">
                                <option :value="color.id" x-text="color.name_en"></option>
                            </template>
                        </select>
                    </div>

                    @include('admin.components.form.image-upload', [
                        'name' => 'image',
                        'label' => 'Product Image',
                        'required' => true,
                        'help' => 'Recommended: JPG, PNG, WebP. Max 2MB.'
                    ])
                </div>

                <div class="space-y-6">
                    @include('admin.components.form.input-group', [
                        'name' => 'alt_en',
                        'label' => 'Alt Text (English)',
                        'placeholder' => 'Describe the image for accessibility'
                    ])

                    @include('admin.components.form.input-group', [
                        'name' => 'alt_ar',
                        'label' => 'Alt Text (Arabic)',
                        'placeholder' => 'وصف الصورة',
                        'dir' => 'rtl'
                    ])

                    @include('admin.components.form.input-group', [
                        'name' => 'order',
                        'label' => 'Display Order',
                        'type' => 'number',
                        'value' => 0
                    ])

                    @include('admin.components.form.toggle-switch', [
                        'name' => 'is_main',
                        'label' => 'Set as Main Image',
                        'checked' => false
                    ])
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">
                <a href="{{ route('admin.product-images.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Cancel</a>
                <button type="submit" class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">Upload Image</button>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
<script>
function fetchColors() {
    const productId = document.querySelector('[name="product_id"]').value;
    if (productId) {
        fetch(`/admin/products/${productId}/colors`)
            .then(r => r.json())
            .then(d => { Alpine.$data(document.querySelector('[x-data]')).colors = d.colors; });
    }
}
</script>
@endpush

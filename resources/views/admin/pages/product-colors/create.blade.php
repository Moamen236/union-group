@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Create Color'])
    @include('admin.components.common.alerts')

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Create New Color</h3>
        </div>

        <form action="{{ route('admin.product-colors.store') }}" method="POST" class="p-6">
            @csrf

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="space-y-6">
                    @include('admin.components.form.select-group', [
                        'name' => 'product_id',
                        'label' => 'Product',
                        'required' => true,
                        'value' => $selectedProduct,
                        'options' => $products->pluck('name_en', 'id'),
                        'placeholder' => 'Select a product'
                    ])

                    @include('admin.components.form.input-group', [
                        'name' => 'name_en',
                        'label' => 'Color Name (English)',
                        'required' => true,
                        'placeholder' => 'e.g., Royal Blue'
                    ])

                    @include('admin.components.form.input-group', [
                        'name' => 'name_ar',
                        'label' => 'Color Name (Arabic)',
                        'required' => true,
                        'placeholder' => 'مثال: أزرق ملكي',
                        'dir' => 'rtl'
                    ])
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Color Code <span class="text-red-500">*</span>
                        </label>
                        <div class="flex items-center gap-4">
                            <input type="color" id="color_picker" value="#3B82F6" class="h-12 w-20 cursor-pointer rounded-lg border border-gray-300 p-1 dark:border-gray-600">
                            <input type="text" name="hex_code" id="hex_code" value="{{ old('hex_code', '#3B82F6') }}" required pattern="^#[A-Fa-f0-9]{6}$" placeholder="#000000" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm uppercase focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                        </div>
                        @error('hex_code')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                    </div>

                    @include('admin.components.form.input-group', [
                        'name' => 'order',
                        'label' => 'Display Order',
                        'type' => 'number',
                        'value' => 0
                    ])

                    @include('admin.components.form.toggle-switch', [
                        'name' => 'status',
                        'label' => 'Active',
                        'checked' => true
                    ])
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">
                <a href="{{ route('admin.product-colors.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Cancel</a>
                <button type="submit" class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">Create Color</button>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
<script>
    document.getElementById('color_picker').addEventListener('input', function(e) {
        document.getElementById('hex_code').value = e.target.value.toUpperCase();
    });
    document.getElementById('hex_code').addEventListener('input', function(e) {
        if(/^#[A-Fa-f0-9]{6}$/.test(e.target.value)) {
            document.getElementById('color_picker').value = e.target.value;
        }
    });
</script>
@endpush

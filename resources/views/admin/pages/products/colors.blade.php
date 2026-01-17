@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Product Colors'])
    @include('admin.components.common.alerts')

    <!-- Step Indicator -->
    <div class="mb-6">
        <div class="flex items-center justify-center">
            <div class="flex items-center">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-500 text-white font-semibold">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                </div>
                <span class="ml-2 text-sm font-medium text-green-600">Product Info</span>
            </div>
            <div class="mx-4 h-1 w-16 bg-green-500"></div>
            <div class="flex items-center">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-600 text-white font-semibold">2</div>
                <span class="ml-2 text-sm font-medium text-brand-600">Colors</span>
            </div>
            <div class="mx-4 h-1 w-16 bg-gray-200 dark:bg-gray-700"></div>
            <div class="flex items-center">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-200 text-gray-500 dark:bg-gray-700 dark:text-gray-400 font-semibold">3</div>
                <span class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">Images</span>
            </div>
        </div>
    </div>

    <!-- Product Summary -->
    <div class="mb-6 rounded-xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="flex items-center gap-4">
            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-brand-100 dark:bg-brand-900/50">
                <svg class="h-6 w-6 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
            </div>
            <div>
                <h4 class="text-sm font-medium text-gray-900 dark:text-white">{{ $product->name_en }}</h4>
                <p class="text-xs text-gray-500 dark:text-gray-400">Code: {{ $product->code ?? 'N/A' }} | Category: {{ $product->category->name_en ?? 'N/A' }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Add Color Form -->
        <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add New Color</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Add available colors for this product.</p>
            </div>

            <form action="{{ route('admin.products.colors.store', $product) }}" method="POST" class="p-6">
                @csrf

                <div class="space-y-4">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
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

                    <button type="submit" class="w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">
                        <svg class="mr-2 inline h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                        Add Color
                    </button>
                </div>
            </form>
        </div>

        <!-- Colors List -->
        <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Product Colors</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $product->colors->count() }} color(s) added</p>
            </div>

            <div class="p-6">
                @if($product->colors->count() > 0)
                    <div class="space-y-3">
                        @foreach($product->colors as $color)
                            <div class="flex items-center justify-between rounded-lg border border-gray-200 p-3 dark:border-gray-700">
                                <div class="flex items-center gap-3">
                                    <div class="h-10 w-10 rounded-lg border border-gray-200 dark:border-gray-600" style="background-color: {{ $color->hex_code }}"></div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $color->name_en }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400" dir="rtl">{{ $color->name_ar }}</p>
                                    </div>
                                    <span class="rounded-full bg-gray-100 px-2 py-1 text-xs text-gray-600 dark:bg-gray-700 dark:text-gray-400">{{ $color->hex_code }}</span>
                                </div>
                                <form action="{{ route('admin.products.colors.destroy', [$product, $color]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this color?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-lg p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/50">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-8 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">No colors added yet.</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Colors are optional. You can skip this step.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <div class="mt-6 flex items-center justify-between">
        <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
            Back: Edit Product
        </a>
        <a href="{{ route('admin.products.images', $product) }}" class="inline-flex items-center rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">
            Next: Add Images
            <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
        </a>
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

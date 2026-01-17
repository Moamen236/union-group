@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Product Details'])
    @include('admin.components.common.alerts')

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Product Images -->
        <div class="lg:col-span-1">
            <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Product Images</h3>
                </div>
                <div class="p-6" x-data="{ mainImage: '{{ $product->mainImageUrl ?? '' }}' }">
                    @if($product->images->count() > 0)
                        <!-- Main Image -->
                        <div class="mb-4 aspect-square overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-800">
                            <img :src="mainImage" alt="{{ $product->name_en }}" class="h-full w-full object-contain" x-show="mainImage">
                            <div x-show="!mainImage" class="flex h-full items-center justify-center">
                                <svg class="h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Thumbnails -->
                        <div class="grid grid-cols-4 gap-2">
                            @foreach($product->images as $image)
                                <button type="button" @click="mainImage = '{{ $image->imageUrl }}'"
                                        class="aspect-square overflow-hidden rounded-lg border-2 transition"
                                        :class="mainImage === '{{ $image->imageUrl }}' ? 'border-brand-500' : 'border-gray-200 dark:border-gray-700 hover:border-gray-300'">
                                    <img src="{{ $image->imageUrl }}" alt="{{ $image->alt_en ?? $product->name_en }}" class="h-full w-full object-cover">
                                </button>
                            @endforeach
                        </div>
                    @else
                        <div class="aspect-square overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-800">
                            <div class="flex h-full flex-col items-center justify-center">
                                <svg class="h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">No images</p>
                            </div>
                        </div>
                    @endif

                    <a href="{{ route('admin.products.images', $product) }}" class="mt-4 flex w-full items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                        Manage Images
                    </a>
                </div>
            </div>

            <!-- Colors -->
            <div class="mt-6 rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Available Colors</h3>
                </div>
                <div class="p-6">
                    @if($product->colors->count() > 0)
                        <div class="flex flex-wrap gap-3">
                            @foreach($product->colors as $color)
                                <div class="group relative">
                                    <div class="h-10 w-10 cursor-pointer rounded-full border-2 border-white shadow-md ring-2 ring-gray-200 transition hover:ring-brand-500 dark:border-gray-800 dark:ring-gray-700" style="background-color: {{ $color->hex_code }}" title="{{ $color->name_en }}"></div>
                                    <div class="absolute bottom-full left-1/2 mb-2 hidden -translate-x-1/2 whitespace-nowrap rounded bg-gray-900 px-2 py-1 text-xs text-white group-hover:block dark:bg-gray-700">
                                        {{ $color->name_en }} ({{ $color->hex_code }})
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-500 dark:text-gray-400">No colors defined.</p>
                    @endif

                    <a href="{{ route('admin.products.colors', $product) }}" class="mt-4 flex w-full items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                        Manage Colors
                    </a>
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="lg:col-span-2">
            <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Product Information</h3>
                    <div class="flex items-center gap-2">
                        @if($product->is_favorite)
                            <span class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-400">
                                <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                Featured
                            </span>
                        @endif
                        <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $product->status ? 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-400' }}">
                            {{ $product->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                <div class="p-6">
                    <!-- Basic Info -->
                    <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Category</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $product->category->name_en ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Product Code</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $product->code ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Slug</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $product->slug }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Display Order</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $product->order }}</dd>
                        </div>
                    </dl>

                    <hr class="my-6 border-gray-200 dark:border-gray-700">

                    <!-- English Content -->
                    <div class="mb-6">
                        <h4 class="mb-3 text-sm font-semibold text-gray-900 dark:text-white">English Content</h4>
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $product->name_en }}</dd>
                            </div>
                            @if($product->description_en)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{!! nl2br(e($product->description_en)) !!}</dd>
                                </div>
                            @endif
                            @if($product->features_en)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Features</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{!! nl2br(e($product->features_en)) !!}</dd>
                                </div>
                            @endif
                        </dl>
                    </div>

                    <hr class="my-6 border-gray-200 dark:border-gray-700">

                    <!-- Arabic Content -->
                    <div dir="rtl">
                        <h4 class="mb-3 text-sm font-semibold text-gray-900 dark:text-white">المحتوى العربي</h4>
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">الاسم</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $product->name_ar }}</dd>
                            </div>
                            @if($product->description_ar)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">الوصف</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{!! nl2br(e($product->description_ar)) !!}</dd>
                                </div>
                            @endif
                            @if($product->features_ar)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">المميزات</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{!! nl2br(e($product->features_ar)) !!}</dd>
                                </div>
                            @endif
                        </dl>
                    </div>

                    <hr class="my-6 border-gray-200 dark:border-gray-700">

                    <!-- Metadata -->
                    <dl class="grid grid-cols-1 gap-4 text-xs text-gray-500 dark:text-gray-400 sm:grid-cols-2">
                        <div>
                            <dt class="font-medium">Created At</dt>
                            <dd>{{ $product->created_at->format('M d, Y H:i') }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium">Last Updated</dt>
                            <dd>{{ $product->updated_at->format('M d, Y H:i') }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="flex items-center justify-end gap-3 border-t border-gray-200 px-6 py-4 dark:border-gray-700">
                    <a href="{{ route('admin.products.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                        Back to List
                    </a>
                    <a href="{{ route('admin.products.edit', $product) }}" class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">
                        Edit Product
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Product Images'])
    @include('admin.components.common.alerts')

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="flex flex-col gap-4 border-b border-gray-200 px-6 py-4 dark:border-gray-700 sm:flex-row sm:items-center sm:justify-between">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">All Product Images</h3>
            <a href="{{ route('admin.product-images.create', ['product_id' => request('product')]) }}" class="inline-flex items-center justify-center rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">
                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Upload Image
            </a>
        </div>

        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <form method="GET" action="{{ route('admin.product-images.index') }}" class="flex flex-col gap-4 sm:flex-row sm:items-center">
                <select name="product" class="flex-1 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                    <option value="">All Products</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ request('product') == $product->id ? 'selected' : '' }}>{{ $product->name_en }}</option>
                    @endforeach
                </select>
                <button type="submit" class="rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300">Filter</button>
            </form>
        </div>

        <div class="p-6">
            @if($images->count() > 0)
                @php
                    $groupedImages = $images->groupBy(fn($img) => $img->color_id ?? 0);
                @endphp
                <div class="space-y-8">
                    @foreach($groupedImages as $colorId => $colorImages)
                        @php
                            $color = $colorImages->first()->color;
                        @endphp
                        <div>
                            <div class="mb-4 flex items-center gap-3">
                                @if($color)
                                    @if($color->hex)
                                        <span class="h-5 w-5 rounded-full border border-gray-300 dark:border-gray-600" style="background-color: {{ $color->hex }}"></span>
                                    @endif
                                    <h4 class="text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $color->name_en }}</h4>
                                @else
                                    <h4 class="text-sm font-semibold text-gray-800 dark:text-gray-200">No Color</h4>
                                @endif
                                <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs text-gray-600 dark:bg-gray-700 dark:text-gray-400">{{ $colorImages->count() }} {{ Str::plural('image', $colorImages->count()) }}</span>
                            </div>
                            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
                                @foreach($colorImages as $image)
                                    <div class="group relative overflow-hidden rounded-lg border border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-800">
                                        <div class="aspect-square">
                                            <img src="{{ $image->imageUrl }}" alt="{{ $image->alt_en ?? $image->product->name_en }}" class="h-full w-full object-cover">
                                        </div>
                                        @if($image->is_main)
                                            <div class="absolute left-2 top-2">
                                                <span class="rounded-full bg-brand-600 px-2 py-1 text-xs font-medium text-white">Main</span>
                                            </div>
                                        @endif
                                        <div class="absolute inset-0 flex items-center justify-center gap-2 bg-black/50 opacity-0 transition-opacity group-hover:opacity-100">
                                            @if(!$image->is_main)
                                                <button type="button" onclick="setMain('{{ route('admin.product-images.set-main', $image) }}')" class="rounded-lg bg-white p-2 text-gray-700 hover:bg-gray-100" title="Set as Main">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
                                                </button>
                                            @endif
                                            <a href="{{ route('admin.product-images.edit', $image) }}" class="rounded-lg bg-white p-2 text-gray-700 hover:bg-gray-100" title="Edit">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                            </a>
                                            <button type="button" onclick="$dispatch('open-delete-modal', { action: '{{ route('admin.product-images.destroy', $image) }}' })" class="rounded-lg bg-red-600 p-2 text-white hover:bg-red-700" title="Delete">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </div>
                                        <div class="p-2">
                                            <p class="truncate text-xs text-gray-600 dark:text-gray-400">{{ $image->product->name_en ?? '-' }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="py-12 text-center text-sm text-gray-500 dark:text-gray-400">No images found.</p>
            @endif
        </div>
        @if($images->hasPages())<div class="border-t border-gray-200 px-6 py-4 dark:border-gray-700">{{ $images->links() }}</div>@endif
    </div>
    @include('admin.components.common.delete-modal')
@endsection
@push('scripts')
<script>function setMain(url) { fetch(url, { method: 'POST', headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' }}).then(r => r.json()).then(d => { if(d.success) window.location.reload(); }); }</script>
@endpush

@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Product Images'])
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
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-500 text-white font-semibold">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                </div>
                <span class="ml-2 text-sm font-medium text-green-600">Colors</span>
            </div>
            <div class="mx-4 h-1 w-16 bg-green-500"></div>
            <div class="flex items-center">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-600 text-white font-semibold">3</div>
                <span class="ml-2 text-sm font-medium text-brand-600">Images</span>
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
            <div class="flex-1">
                <h4 class="text-sm font-medium text-gray-900 dark:text-white">{{ $product->name_en }}</h4>
                <p class="text-xs text-gray-500 dark:text-gray-400">Code: {{ $product->code ?? 'N/A' }} | Colors: {{ $product->colors->count() }}</p>
            </div>
            @if($product->colors->count() > 0)
                <div class="flex -space-x-2">
                    @foreach($product->colors->take(5) as $color)
                        <div class="h-6 w-6 rounded-full border-2 border-white dark:border-gray-800" style="background-color: {{ $color->hex_code }}" title="{{ $color->name_en }}"></div>
                    @endforeach
                    @if($product->colors->count() > 5)
                        <div class="flex h-6 w-6 items-center justify-center rounded-full border-2 border-white bg-gray-200 text-xs text-gray-600 dark:border-gray-800 dark:bg-gray-700 dark:text-gray-400">+{{ $product->colors->count() - 5 }}</div>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Upload Form -->
        <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Upload Image</h3>
            </div>

            <form action="{{ route('admin.products.images.store', $product) }}" method="POST" enctype="multipart/form-data" class="p-6" x-data="{ imagePreview: null }">
                @csrf

                <div class="space-y-4">
                    <!-- Image Upload -->
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Image <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="mb-2 aspect-square w-full overflow-hidden rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-800">
                                <template x-if="imagePreview">
                                    <img :src="imagePreview" class="h-full w-full object-cover">
                                </template>
                                <template x-if="!imagePreview">
                                    <div class="flex h-full flex-col items-center justify-center">
                                        <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Click to upload</p>
                                    </div>
                                </template>
                            </div>
                            <input type="file" name="image" required accept="image/*"
                                   @change="const file = $event.target.files[0]; if(file) { const reader = new FileReader(); reader.onload = (e) => imagePreview = e.target.result; reader.readAsDataURL(file); }"
                                   class="absolute inset-0 cursor-pointer opacity-0">
                        </div>
                        @error('image')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <!-- Color Selection -->
                    @if($product->colors->count() > 0)
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Associate with Color</label>
                            <select name="color_id" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                                <option value="">No specific color</option>
                                @foreach($product->colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name_en }} ({{ $color->hex_code }})</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <!-- Alt Text -->
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Alt Text (EN)</label>
                            <input type="text" name="alt_en" placeholder="Describe image" class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                        </div>
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Alt Text (AR)</label>
                            <input type="text" name="alt_ar" placeholder="وصف الصورة" dir="rtl" class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                        </div>
                    </div>

                    <!-- Is Main -->
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="is_main" value="1" class="h-4 w-4 rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Set as main image</span>
                    </label>

                    <button type="submit" class="w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">
                        <svg class="mr-2 inline h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                        Upload Image
                    </button>
                </div>
            </form>
        </div>

        <!-- Images Gallery -->
        <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Product Images</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $product->images->count() }} image(s) uploaded</p>
            </div>

            <div class="p-6">
                @if($product->images->count() > 0)
                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4">
                        @foreach($product->images->sortByDesc('is_main') as $image)
                            <div class="group relative overflow-hidden rounded-lg border border-gray-200 dark:border-gray-700">
                                <div class="aspect-square">
                                    <img src="{{ $image->imageUrl }}" alt="{{ $image->alt_en ?? $product->name_en }}" class="h-full w-full object-cover">
                                </div>

                                @if($image->is_main)
                                    <div class="absolute left-2 top-2">
                                        <span class="rounded-full bg-brand-600 px-2 py-1 text-xs font-medium text-white">Main</span>
                                    </div>
                                @endif

                                @if($image->color)
                                    <div class="absolute right-2 top-2">
                                        <div class="h-5 w-5 rounded-full border-2 border-white shadow" style="background-color: {{ $image->color->hex_code }}" title="{{ $image->color->name_en }}"></div>
                                    </div>
                                @endif

                                <div class="absolute inset-0 flex items-center justify-center gap-2 bg-black/50 opacity-0 transition-opacity group-hover:opacity-100">
                                    @if(!$image->is_main)
                                        <button type="button" onclick="setMain('{{ route('admin.products.images.set-main', [$product, $image]) }}')" class="rounded-lg bg-white p-2 text-gray-700 hover:bg-gray-100" title="Set as Main">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
                                        </button>
                                    @endif
                                    <form action="{{ route('admin.products.images.destroy', [$product, $image]) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-lg bg-red-600 p-2 text-white hover:bg-red-700" title="Delete">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-12 text-center">
                        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">No images uploaded yet.</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Upload at least one image for your product.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <div class="mt-6 flex items-center justify-between">
        <a href="{{ route('admin.products.colors', $product) }}" class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
            Back: Colors
        </a>
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center rounded-lg bg-green-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-green-700">
            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
            Finish & View Products
        </a>
    </div>
@endsection

@push('scripts')
<script>
    function setMain(url) {
        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.reload();
            }
        });
    }
</script>
@endpush

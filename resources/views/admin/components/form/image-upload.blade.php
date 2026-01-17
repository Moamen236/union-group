@props([
    'name',
    'label',
    'currentImage' => null,
    'required' => false,
    'help' => 'Recommended: JPG, PNG, WebP. Max 2MB.',
])

<div x-data="{
    imagePreview: '{{ $currentImage }}',
    handleFileSelect(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                this.imagePreview = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
}">
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>

    <div class="mt-1 flex items-center gap-4">
        <!-- Preview -->
        <div class="relative h-24 w-24 flex-shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-100 dark:border-gray-700 dark:bg-gray-800">
            <template x-if="imagePreview">
                <img :src="imagePreview" alt="Preview" class="h-full w-full object-cover">
            </template>
            <template x-if="!imagePreview">
                <div class="flex h-full w-full items-center justify-center">
                    <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </template>
        </div>

        <!-- Upload Input -->
        <div class="flex-1">
            <input
                type="file"
                id="{{ $name }}"
                name="{{ $name }}"
                accept="image/*"
                {{ $required && !$currentImage ? 'required' : '' }}
                @change="handleFileSelect($event)"
                class="block w-full text-sm text-gray-500 file:mr-4 file:rounded-lg file:border-0 file:bg-brand-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-brand-700 hover:file:bg-brand-100 dark:text-gray-400 dark:file:bg-brand-900/50 dark:file:text-brand-400"
            >
            @if($help)
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ $help }}</p>
            @endif
        </div>
    </div>

    @error($name)
        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>

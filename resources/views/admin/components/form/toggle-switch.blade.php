@props([
    'name',
    'label',
    'checked' => false,
    'disabled' => false,
])

<div class="flex items-center">
    <label for="{{ $name }}" class="relative inline-flex cursor-pointer items-center">
        <input
            type="checkbox"
            id="{{ $name }}"
            name="{{ $name }}"
            value="1"
            {{ old($name, $checked) ? 'checked' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            class="peer sr-only"
        >
        <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-brand-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-300 dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-brand-800"></div>
        <span class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300">{{ $label }}</span>
    </label>
</div>

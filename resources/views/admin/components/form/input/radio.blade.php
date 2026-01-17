@php
    $id = $id ?? '';
    $name = $name ?? '';
    $value = $value ?? '';
    $checked = $checked ?? false;
    $label = $label ?? '';
    $disabled = $disabled ?? false;

    $labelClass = $disabled
        ? 'text-gray-300 dark:text-gray-600 cursor-not-allowed'
        : 'text-gray-700 dark:text-gray-400';

    $radioClass = $checked && !$disabled
        ? 'border-brand-500 bg-brand-500'
        : (!$checked && !$disabled
            ? 'bg-transparent border-gray-300 dark:border-gray-700'
            : 'bg-gray-100 dark:bg-gray-700 border-gray-200 dark:border-gray-700');

    $dotClass = $checked ? 'block' : 'hidden';
@endphp

<label for="{{ $id }}" class="relative flex cursor-pointer select-none items-center gap-3 text-sm font-medium {{ $labelClass }}">

    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="radio"
        value="{{ $value }}"
        {{ $checked ? 'checked' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        class="sr-only"
    />

    <span class="flex h-5 w-5 items-center justify-center rounded-full border-[1.25px] {{ $radioClass }}">
        <span class="h-2 w-2 rounded-full bg-white {{ $dotClass }}"></span>
    </span>

    {{ $label }}
</label>

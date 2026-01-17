@php
    $size = $size ?? 'md';
    $variant = $variant ?? 'primary';
    $startIcon = $startIcon ?? null;
    $endIcon = $endIcon ?? null;
    $className = $className ?? '';
    $disabled = $disabled ?? false;
    $text = $text ?? '';
    $type = $type ?? 'button';

    // Base classes
    $base = 'inline-flex items-center justify-center font-medium gap-2 rounded-lg transition';

    // Size map
    $sizeMap = [
        'sm' => 'px-4 py-3 text-sm',
        'md' => 'px-5 py-3.5 text-sm',
    ];
    $sizeClass = $sizeMap[$size] ?? $sizeMap['md'];

    // Variant map
    $variantMap = [
        'primary' => 'bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300',
        'outline' => 'bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03] dark:hover:text-gray-300',
    ];
    $variantClass = $variantMap[$variant] ?? $variantMap['primary'];

    // disabled classes
    $disabledClass = $disabled ? 'cursor-not-allowed opacity-50' : '';

    // final classes (merge user className too)
    $classes = trim("{$base} {$sizeClass} {$variantClass} {$className} {$disabledClass}");
@endphp

<button class="{{ $classes }}" type="{{ $type }}" @if($disabled) disabled @endif>
    @if($startIcon)
        <span class="flex items-center">{!! $startIcon !!}</span>
    @endif

    {{ $text }}

    @if($endIcon)
        <span class="flex items-center">{!! $endIcon !!}</span>
    @endif
</button>

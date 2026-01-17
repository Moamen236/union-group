@php
    $currentLocale = app()->getLocale();
    $currentUrl = url()->current();
@endphp

<div class="relative" x-data="{ open: false }">
    <button @click="open = !open" type="button" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
        @if($currentLocale === 'ar')
            <span>العربية</span>
        @else
            <span>English</span>
        @endif
        <svg class="h-4 w-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open"
         @click.away="open = false"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="absolute right-0 mt-2 w-32 rounded-lg border border-gray-200 bg-white shadow-lg dark:border-gray-700 dark:bg-gray-800 z-50">
        <a href="{{ $currentUrl }}?lang=en" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 {{ $currentLocale === 'en' ? 'bg-gray-50 dark:bg-gray-700' : '' }}">
            <span>🇬🇧</span>
            <span>English</span>
        </a>
        <a href="{{ $currentUrl }}?lang=ar" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 {{ $currentLocale === 'ar' ? 'bg-gray-50 dark:bg-gray-700' : '' }}">
            <span>🇸🇦</span>
            <span>العربية</span>
        </a>
    </div>
</div>

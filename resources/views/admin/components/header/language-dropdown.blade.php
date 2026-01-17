<!-- Language Dropdown -->
<div class="relative" x-data="{ langDropdownOpen: false }">
    <button @click="langDropdownOpen = !langDropdownOpen"
        class="relative flex items-center justify-center gap-2 text-gray-500 transition-colors bg-white border border-gray-200 rounded-full hover:text-dark-900 h-11 px-3 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
        @if(app()->getLocale() === 'ar')
            <span class="text-base">🇸🇦</span>
            <span class="hidden sm:inline text-sm font-medium">العربية</span>
        @else
            <span class="text-base">🇺🇸</span>
            <span class="hidden sm:inline text-sm font-medium">English</span>
        @endif
        <svg class="h-4 w-4 transition-transform" :class="{ 'rotate-180': langDropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Dropdown Menu -->
    <div x-show="langDropdownOpen" @click.outside="langDropdownOpen = false" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 mt-2 w-40 origin-top-right rounded-xl border border-gray-200 bg-white p-1 shadow-lg dark:border-gray-800 dark:bg-gray-900">

        <a href="{{ route('admin.set-locale', 'en') }}"
            class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition-colors {{ app()->getLocale() === 'en' ? 'bg-brand-50 text-brand-700 dark:bg-brand-900/50 dark:text-brand-400' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-800' }}">
            <span class="text-lg">🇺🇸</span>
            <span>English</span>
            @if(app()->getLocale() === 'en')
                <svg class="ml-auto h-4 w-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            @endif
        </a>

        <a href="{{ route('admin.set-locale', 'ar') }}"
            class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition-colors {{ app()->getLocale() === 'ar' ? 'bg-brand-50 text-brand-700 dark:bg-brand-900/50 dark:text-brand-400' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-800' }}">
            <span class="text-lg">🇸🇦</span>
            <span>العربية</span>
            @if(app()->getLocale() === 'ar')
                <svg class="ml-auto h-4 w-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            @endif
        </a>
    </div>
</div>

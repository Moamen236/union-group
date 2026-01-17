@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Badges'])

    @php
        $colors = ['primary', 'success', 'error', 'warning', 'info', 'light', 'dark'];

        $plusIcon = '<svg class="fill-current" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.25012 3C5.25012 2.58579 5.58591 2.25 6.00012 2.25C6.41433 2.25 6.75012 2.58579 6.75012 3V5.25012L9.00034 5.25012C9.41455 5.25012 9.75034 5.58591 9.75034 6.00012C9.75034 6.41433 9.41455 6.75012 9.00034 6.75012H6.75012V9.00034C6.75012 9.41455 6.41433 9.75034 6.00012 9.75034C5.58591 9.75034 5.25012 9.41455 5.25012 9.00034L5.25012 6.75012H3C2.58579 6.75012 2.25 6.41433 2.25 6.00012C2.25 5.58591 2.58579 5.25012 3 5.25012H5.25012V3Z" fill=""></path>
    </svg>';
    @endphp

    <div class="space-y-5 sm:space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">With Light Background</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="flex flex-wrap gap-4 sm:items-center sm:justify-center">
                    @foreach ($colors as $color)
                        @include('admin.components.ui.badge', [
                            'color' => $color,
                            'text' => $color
                        ])
                    @endforeach
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">With Solid Background</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="flex flex-wrap gap-4 sm:items-center sm:justify-center">
                    @foreach ($colors as $color)
                        @include('admin.components.ui.badge', [
                            'color' => $color,
                            'variant' => 'solid',
                            'text' => $color
                        ])
                    @endforeach
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Light Background with Left Icon</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="flex flex-wrap gap-4 sm:items-center sm:justify-center">
                    @foreach ($colors as $color)
                        @include('admin.components.ui.badge', [
                            'color' => $color,
                            'startIcon' => $plusIcon,
                            'text' => $color
                        ])
                    @endforeach
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Solid Background with Left Icon</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="flex flex-wrap gap-4 sm:items-center sm:justify-center">
                    @foreach ($colors as $color)
                        @include('admin.components.ui.badge', [
                            'color' => $color,
                            'variant' => 'solid',
                            'startIcon' => $plusIcon,
                            'text' => $color
                        ])
                    @endforeach
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Light Background with Right Icon</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="flex flex-wrap gap-4 sm:items-center sm:justify-center">
                    @foreach ($colors as $color)
                        @include('admin.components.ui.badge', [
                            'color' => $color,
                            'endIcon' => $plusIcon,
                            'text' => $color
                        ])
                    @endforeach
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Solid Background with Right Icon</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="flex flex-wrap gap-4 sm:items-center sm:justify-center">
                    @foreach ($colors as $color)
                        @include('admin.components.ui.badge', [
                            'color' => $color,
                            'variant' => 'solid',
                            'endIcon' => $plusIcon,
                            'text' => $color
                        ])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

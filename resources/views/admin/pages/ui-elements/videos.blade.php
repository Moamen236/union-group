@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Videos'])

    <div class="grid grid-cols-1 gap-5 sm:gap-6 xl:grid-cols-2">

        <div class="space-y-5 sm:space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-6 py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Video Ratio 16:9</h3>
                </div>
                <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                    @include('admin.components.ui.youtube-embed', ['videoId' => 'dQw4w9WgXcQ'])
                </div>
            </div>

            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-6 py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Video Ratio 4:3</h3>
                </div>
                <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                    @include('admin.components.ui.youtube-embed', ['videoId' => 'dQw4w9WgXcQ', 'aspectRatio' => '4:3'])
                </div>
            </div>
        </div>

        <div class="space-y-5 sm:space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-6 py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Video Ratio 21:9</h3>
                </div>
                <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                    @include('admin.components.ui.youtube-embed', ['videoId' => 'dQw4w9WgXcQ', 'aspectRatio' => '21:9'])
                </div>
            </div>
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-6 py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Video Ratio 1:1</h3>
                </div>
                <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                    @include('admin.components.ui.youtube-embed', ['videoId' => 'dQw4w9WgXcQ', 'aspectRatio' => '1:1'])
                </div>
            </div>
        </div>

    </div>
@endsection

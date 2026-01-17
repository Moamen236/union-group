@extends('admin.layouts.app')

@php
    $images = [
        [
            'src' => asset('images/grid-image/image-04.png'),
            'alt' => 'Grid image 1',
        ],
        [
            'src' => asset('images/grid-image/image-05.png'),
            'alt' => 'Grid image 2',
        ],
        [
            'src' => asset('images/grid-image/image-06.png'),
            'alt' => 'Grid image 3',
        ],
    ];
@endphp

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Images'])

    <div class="space-y-5 sm:space-y-6">

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Responsive Image</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="relative">
                    <div id="pane" class="overflow-hidden">
                        <img src="{{ asset('images/grid-image/image-01.png') }}" alt="Cover"
                            class="w-full border border-gray-200 rounded-xl dark:border-gray-800" />
                    </div>
                    <div id="ghostpane" class="absolute top-0 left-0 duration-300 ease-in-out"></div>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Image in 2 Grid</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div>
                        <img src="{{ asset('images/grid-image/image-02.png') }}" alt="grid"
                            class="w-full border border-gray-200 rounded-xl dark:border-gray-800" />
                    </div>

                    <div>
                        <img src="{{ asset('images/grid-image/image-03.png') }}" alt="grid"
                            class="w-full border border-gray-200 rounded-xl dark:border-gray-800" />
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Image in 3 Grid</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                    @foreach ($images as $image)
                        <div>
                            <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}"
                                class="w-full border border-gray-200 rounded-xl dark:border-gray-800" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection

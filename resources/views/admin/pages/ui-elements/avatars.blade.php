@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Avatars'])

    @php
        $avatarSrc = asset('images/user/user-01.jpg');
        $sizes = ['xsmall', 'small', 'medium', 'large', 'xlarge', 'xxlarge'];
    @endphp

    <div class="space-y-5 sm:space-y-6">
        {{-- Default Avatar --}}
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Default Avatar</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="flex flex-col items-center justify-center gap-5 sm:flex-row">
                    @foreach($sizes as $size)
                        @include('admin.components.ui.avatar', [
                            'src' => $avatarSrc,
                            'size' => $size
                        ])
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Avatar with Online Indicator --}}
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Avatar with Online Indicator</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="flex flex-col items-center justify-center gap-5 sm:flex-row">
                    @foreach($sizes as $size)
                        @include('admin.components.ui.avatar', [
                            'src' => $avatarSrc,
                            'size' => $size,
                            'status' => 'online'
                        ])
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Avatar with Offline Indicator --}}
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Avatar with Offline Indicator</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="flex flex-col items-center justify-center gap-5 sm:flex-row">
                    @foreach($sizes as $size)
                        @include('admin.components.ui.avatar', [
                            'src' => $avatarSrc,
                            'size' => $size,
                            'status' => 'offline'
                        ])
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Avatar with Busy Indicator --}}
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Avatar with Busy Indicator</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="flex flex-col items-center justify-center gap-5 sm:flex-row">
                    @foreach($sizes as $size)
                        @include('admin.components.ui.avatar', [
                            'src' => $avatarSrc,
                            'size' => $size,
                            'status' => 'busy'
                        ])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Alerts'])

    <div class="space-y-5 sm:space-y-6">
        {{-- Success Alert --}}
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Success Alert</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="space-y-4">
                    @include('admin.components.ui.alert', [
                        'variant' => 'success',
                        'title' => 'Success Message',
                        'message' => 'Be cautious when performing this action.',
                        'showLink' => true,
                        'linkHref' => '/',
                        'linkText' => 'Learn more'
                    ])

                    @include('admin.components.ui.alert', [
                        'variant' => 'success',
                        'title' => 'Success Message',
                        'message' => 'Be cautious when performing this action.',
                        'showLink' => false
                    ])
                </div>
            </div>
        </div>

        {{-- Warning Alert --}}
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Warning Alert</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="space-y-4">
                    @include('admin.components.ui.alert', [
                        'variant' => 'warning',
                        'title' => 'Warning Message',
                        'message' => 'Be cautious when performing this action.',
                        'showLink' => true,
                        'linkHref' => '/',
                        'linkText' => 'Learn more'
                    ])

                    @include('admin.components.ui.alert', [
                        'variant' => 'warning',
                        'title' => 'Warning Message',
                        'message' => 'Be cautious when performing this action.',
                        'showLink' => false
                    ])
                </div>
            </div>
        </div>

        {{-- Error Alert --}}
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Error Alert</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="space-y-4">
                    @include('admin.components.ui.alert', [
                        'variant' => 'error',
                        'title' => 'Error Message',
                        'message' => 'Be cautious when performing this action.',
                        'showLink' => true,
                        'linkHref' => '/',
                        'linkText' => 'Learn more'
                    ])

                    @include('admin.components.ui.alert', [
                        'variant' => 'error',
                        'title' => 'Error Message',
                        'message' => 'Be cautious when performing this action.',
                        'showLink' => false
                    ])
                </div>
            </div>
        </div>

        {{-- Info Alert --}}
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Info Alert</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="space-y-4">
                    @include('admin.components.ui.alert', [
                        'variant' => 'info',
                        'title' => 'Info Message',
                        'message' => 'Be cautious when performing this action.',
                        'showLink' => true,
                        'linkHref' => '/',
                        'linkText' => 'Learn more'
                    ])

                    @include('admin.components.ui.alert', [
                        'variant' => 'info',
                        'title' => 'Info Message',
                        'message' => 'Be cautious when performing this action.',
                        'showLink' => false
                    ])
                </div>
            </div>
        </div>

        {{-- Additional Examples --}}
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Alert Variations</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="space-y-4">
                    {{-- With Custom Content --}}
                    @include('admin.components.ui.alert', [
                        'variant' => 'success',
                        'title' => 'Custom Content Alert',
                        'content' => '<p class="text-sm text-gray-500 dark:text-gray-400">
                            This alert uses <strong class="text-gray-900 dark:text-white">custom content</strong>
                            instead of the message prop.
                        </p>
                        <ul class="mt-2 text-sm text-gray-500 dark:text-gray-400 list-disc list-inside">
                            <li>You can add any HTML content</li>
                            <li>Including lists and formatting</li>
                            <li>Perfect for complex messages</li>
                        </ul>'
                    ])

                    {{-- Minimal Alert --}}
                    @include('admin.components.ui.alert', [
                        'variant' => 'info',
                        'title' => 'Quick Info',
                        'message' => 'Sometimes you just need a simple message.'
                    ])

                    {{-- Alert with Long Message --}}
                    @include('admin.components.ui.alert', [
                        'variant' => 'warning',
                        'title' => 'Important Notice',
                        'message' => 'This is a longer message that provides more detailed information about the warning. You should read this carefully before proceeding with your action.',
                        'showLink' => true,
                        'linkHref' => '/docs',
                        'linkText' => 'View documentation'
                    ])
                </div>
            </div>
        </div>

        {{-- Real-World Examples --}}
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Real-World Examples</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="space-y-4">
                    {{-- Payment Success --}}
                    @include('admin.components.ui.alert', [
                        'variant' => 'success',
                        'title' => 'Payment Successful',
                        'content' => '<p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                            Your payment of <strong class="text-gray-900 dark:text-white">$99.00</strong> has been processed successfully.
                        </p>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            <p><strong>Order ID:</strong> #TAILADMIN-0014</p>
                            <p><strong>Transaction ID:</strong> TXN-1234567890</p>
                        </div>
                        <a href="/orders" class="inline-block mt-3 text-sm font-medium text-green-600 dark:text-green-400 underline hover:text-green-700">
                            View Order Details
                        </a>'
                    ])

                    {{-- Account Warning --}}
                    @include('admin.components.ui.alert', [
                        'variant' => 'warning',
                        'title' => 'Your trial is ending soon',
                        'message' => 'Your 14-day trial will expire in 3 days. Upgrade now to continue using all features.',
                        'showLink' => true,
                        'linkHref' => '/billing',
                        'linkText' => 'Upgrade now'
                    ])

                    {{-- Validation Error --}}
                    @include('admin.components.ui.alert', [
                        'variant' => 'error',
                        'title' => 'Form Validation Failed',
                        'content' => '<ul class="text-sm text-gray-500 dark:text-gray-400 list-disc list-inside space-y-1">
                            <li>Email field is required</li>
                            <li>Password must be at least 8 characters</li>
                            <li>Please accept the terms and conditions</li>
                        </ul>'
                    ])

                    {{-- System Info --}}
                    @include('admin.components.ui.alert', [
                        'variant' => 'info',
                        'title' => 'Scheduled Maintenance',
                        'message' => 'Our system will undergo maintenance on November 15, 2025 from 2:00 AM to 4:00 AM EST. Some features may be unavailable during this time.',
                        'showLink' => true,
                        'linkHref' => '/status',
                        'linkText' => 'Check status page'
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection

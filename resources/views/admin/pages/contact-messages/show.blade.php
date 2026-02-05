@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'View Message'])
    @include('admin.components.common.alerts')

    <div class="grid gap-6">
        <!-- Message Details Card -->
        <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex flex-col gap-4 border-b border-gray-200 px-6 py-4 dark:border-gray-700 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center gap-3">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Message Details</h3>
                    <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $contactMessage->is_read ? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300' : 'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-400' }}">
                        {{ $contactMessage->is_read ? 'Read' : 'Unread' }}
                    </span>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.contact-messages.index') }}" class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                        Back to List
                    </a>
                    <button type="button" onclick="$dispatch('open-delete-modal', { action: '{{ route('admin.contact-messages.destroy', $contactMessage) }}' })" class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-red-700">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        Delete
                    </button>
                </div>
            </div>

            <div class="p-6">
                <div class="grid gap-6 md:grid-cols-2">
                    <!-- Sender Info -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-medium uppercase text-gray-500 dark:text-gray-400">Sender Information</h4>

                        <div class="rounded-lg border border-gray-200 p-4 dark:border-gray-700">
                            <div class="flex items-center gap-4">
                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-brand-100 text-brand-600 dark:bg-brand-900/50 dark:text-brand-400">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $contactMessage->name }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $contactMessage->created_at->format('M d, Y \a\t H:i') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center gap-3 rounded-lg border border-gray-200 p-3 dark:border-gray-700">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Email</p>
                                    <a href="mailto:{{ $contactMessage->email }}" class="font-medium text-brand-600 hover:text-brand-700 dark:text-brand-400 dark:hover:text-brand-300">{{ $contactMessage->email }}</a>
                                </div>
                            </div>

                            @if($contactMessage->phone)
                                <div class="flex items-center gap-3 rounded-lg border border-gray-200 p-3 dark:border-gray-700">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                    <div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Phone</p>
                                        <a href="tel:{{ $contactMessage->phone }}" class="font-medium text-brand-600 hover:text-brand-700 dark:text-brand-400 dark:hover:text-brand-300">{{ $contactMessage->phone }}</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-medium uppercase text-gray-500 dark:text-gray-400">Message Content</h4>

                        <div class="rounded-lg border border-gray-200 p-4 dark:border-gray-700">
                            <p class="mb-2 text-xs text-gray-500 dark:text-gray-400">Subject</p>
                            <p class="font-semibold text-gray-900 dark:text-white">{{ $contactMessage->subject }}</p>
                        </div>

                        <div class="rounded-lg border border-gray-200 p-4 dark:border-gray-700">
                            <p class="mb-2 text-xs text-gray-500 dark:text-gray-400">Message</p>
                            <div class="prose prose-sm max-w-none text-gray-700 dark:prose-invert dark:text-gray-300">
                                {!! nl2br(e($contactMessage->message)) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Reply -->
                <div class="mt-6 rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800/50">
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Quick Actions</h4>
                    <div class="flex flex-wrap gap-2">
                        <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ $contactMessage->subject }}" class="inline-flex items-center rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-700">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            Reply via Email
                        </a>
                        @if($contactMessage->phone)
                            <a href="tel:{{ $contactMessage->phone }}" class="inline-flex items-center rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-700">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                Call
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

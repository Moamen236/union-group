@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Contact Messages'])
    @include('admin.components.common.alerts')

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="flex flex-col gap-4 border-b border-gray-200 px-6 py-4 dark:border-gray-700 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-3">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">All Messages</h3>
                @if($unreadCount > 0)
                    <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900/50 dark:text-red-400">
                        {{ $unreadCount }} unread
                    </span>
                @endif
            </div>
            @if($unreadCount > 0)
                <form action="{{ route('admin.contact-messages.mark-all-read') }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        Mark All as Read
                    </button>
                </form>
            @endif
        </div>

        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <form method="GET" action="{{ route('admin.contact-messages.index') }}" class="flex flex-col gap-4 sm:flex-row sm:items-center">
                <div class="flex-1">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search messages..." class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                </div>
                <select name="status" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                    <option value="">All Messages</option>
                    <option value="unread" {{ request('status') === 'unread' ? 'selected' : '' }}>Unread</option>
                    <option value="read" {{ request('status') === 'read' ? 'selected' : '' }}>Read</option>
                </select>
                <button type="submit" class="rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300">Filter</button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-800/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Subject</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Date</th>
                        <th class="px-6 py-3 text-right text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($messages as $message)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 {{ !$message->is_read ? 'bg-blue-50/50 dark:bg-blue-900/10' : '' }}">
                            <td class="whitespace-nowrap px-6 py-4">
                                <button type="button" onclick="toggleRead('{{ route('admin.contact-messages.toggle-read', $message) }}')" class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $message->is_read ? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300' : 'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-400' }}">
                                    @if(!$message->is_read)
                                        <span class="mr-1.5 h-2 w-2 rounded-full bg-blue-500"></span>
                                    @endif
                                    {{ $message->is_read ? 'Read' : 'Unread' }}
                                </button>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm {{ !$message->is_read ? 'font-semibold text-gray-900 dark:text-white' : 'text-gray-900 dark:text-white' }}">{{ $message->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                <a href="mailto:{{ $message->email }}" class="hover:text-brand-600 dark:hover:text-brand-400">{{ $message->email }}</a>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                @if($message->phone)
                                    <a href="tel:{{ $message->phone }}" class="hover:text-brand-600 dark:hover:text-brand-400">{{ $message->phone }}</a>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm {{ !$message->is_read ? 'font-medium text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-400' }}">{{ Str::limit($message->subject, 30) }}</td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $message->created_at->format('M d, Y H:i') }}</td>
                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.contact-messages.show', $message) }}" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700" title="View">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                    </a>
                                    <button type="button" onclick="$dispatch('open-delete-modal', { action: '{{ route('admin.contact-messages.destroy', $message) }}' })" class="rounded-lg p-2 text-red-500 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/50">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="px-6 py-12 text-center text-sm text-gray-500 dark:text-gray-400">No messages found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($messages->hasPages())<div class="border-t border-gray-200 px-6 py-4 dark:border-gray-700">{{ $messages->links() }}</div>@endif
    </div>
    @include('admin.components.common.delete-modal')
@endsection
@push('scripts')
<script>function toggleRead(url) { fetch(url, { method: 'POST', headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' }}).then(r => r.json()).then(d => { if(d.success) window.location.reload(); }); }</script>
@endpush

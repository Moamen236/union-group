@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Product Colors'])
    @include('admin.components.common.alerts')

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="flex flex-col gap-4 border-b border-gray-200 px-6 py-4 dark:border-gray-700 sm:flex-row sm:items-center sm:justify-between">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">All Product Colors</h3>
            <a href="{{ route('admin.product-colors.create') }}" class="inline-flex items-center justify-center rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">
                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Color
            </a>
        </div>

        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <form method="GET" action="{{ route('admin.product-colors.index') }}" class="flex flex-col gap-4 sm:flex-row sm:items-center">
                <div class="flex-1">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search colors..." class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                </div>
                <select name="product" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                    <option value="">All Products</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ request('product') == $product->id ? 'selected' : '' }}>{{ $product->name_en }}</option>
                    @endforeach
                </select>
                <button type="submit" class="rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300">Filter</button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-800/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Color</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Name (EN)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Name (AR)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($colors as $color)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="h-8 w-8 rounded-full border border-gray-200 dark:border-gray-700" style="background-color: {{ $color->hex_code }}"></div>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $color->hex_code }}</span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $color->product->name_en ?? '-' }}</td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $color->name_en }}</td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900 dark:text-white" dir="rtl">{{ $color->name_ar }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <button type="button" onclick="toggleStatus('{{ route('admin.product-colors.toggle-status', $color) }}')"
                                    class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $color->status ? 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-400' }}">
                                    {{ $color->status ? 'Active' : 'Inactive' }}
                                </button>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.product-colors.edit', $color) }}" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                    </a>
                                    <button type="button" onclick="$dispatch('open-delete-modal', { action: '{{ route('admin.product-colors.destroy', $color) }}' })" class="rounded-lg p-2 text-red-500 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/50">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-6 py-12 text-center text-sm text-gray-500 dark:text-gray-400">No colors found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($colors->hasPages())<div class="border-t border-gray-200 px-6 py-4 dark:border-gray-700">{{ $colors->links() }}</div>@endif
    </div>
@endsection
@push('scripts')
<script>function toggleStatus(url) { fetch(url, { method: 'POST', headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' }}).then(r => r.json()).then(d => { if(d.success) window.location.reload(); }); }</script>
@endpush

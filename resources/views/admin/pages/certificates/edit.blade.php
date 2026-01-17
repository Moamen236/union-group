@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Edit Certificate'])
    @include('admin.components.common.alerts')

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Certificate</h3>
        </div>

        <form action="{{ route('admin.certificates.update', $certificate) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="space-y-6">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">English Content</h4>
                    @include('admin.components.form.input-group', ['name' => 'name_en', 'label' => 'Name (English)', 'required' => true, 'value' => $certificate->name_en])
                    @include('admin.components.form.input-group', ['name' => 'issuer_en', 'label' => 'Issuer (English)', 'value' => $certificate->issuer_en])
                </div>

                <div class="space-y-6">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">Arabic Content</h4>
                    @include('admin.components.form.input-group', ['name' => 'name_ar', 'label' => 'Name (Arabic)', 'required' => true, 'value' => $certificate->name_ar, 'dir' => 'rtl'])
                    @include('admin.components.form.input-group', ['name' => 'issuer_ar', 'label' => 'Issuer (Arabic)', 'value' => $certificate->issuer_ar, 'dir' => 'rtl'])
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="space-y-6">
                    @include('admin.components.form.select-group', ['name' => 'type', 'label' => 'Type', 'required' => true, 'value' => $certificate->type, 'options' => ['pdf' => 'PDF', 'image' => 'Image']])

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Certificate File</label>
                        <div class="mb-2 flex items-center gap-4">
                            @if($certificate->isPdf())
                                <a href="{{ $certificate->fileUrl }}" target="_blank" class="inline-flex items-center gap-2 text-sm text-brand-600 hover:underline">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                                    View current PDF
                                </a>
                            @else
                                <img src="{{ $certificate->fileUrl }}" alt="{{ $certificate->name_en }}" class="h-16 w-16 rounded-lg object-cover">
                            @endif
                        </div>
                        <input type="file" name="file" accept=".pdf,.jpg,.jpeg,.png,.gif,.webp" class="block w-full text-sm text-gray-500 file:mr-4 file:rounded-lg file:border-0 file:bg-brand-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-brand-700 hover:file:bg-brand-100 dark:text-gray-400 dark:file:bg-brand-900/50 dark:file:text-brand-400">
                        <p class="mt-1 text-xs text-gray-500">Leave empty to keep current file.</p>
                    </div>
                </div>

                <div class="space-y-6">
                    @include('admin.components.form.input-group', ['name' => 'issue_date', 'label' => 'Issue Date', 'type' => 'date', 'value' => $certificate->issue_date?->format('Y-m-d')])
                    @include('admin.components.form.input-group', ['name' => 'expiry_date', 'label' => 'Expiry Date', 'type' => 'date', 'value' => $certificate->expiry_date?->format('Y-m-d')])
                    @include('admin.components.form.input-group', ['name' => 'order', 'label' => 'Display Order', 'type' => 'number', 'value' => $certificate->order])
                    @include('admin.components.form.toggle-switch', ['name' => 'status', 'label' => 'Active', 'checked' => $certificate->status])
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">
                <a href="{{ route('admin.certificates.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Cancel</a>
                <button type="submit" class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">Update Certificate</button>
            </div>
        </form>
    </div>
@endsection

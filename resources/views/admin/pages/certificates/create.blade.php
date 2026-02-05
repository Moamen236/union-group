@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Create Certificate'])
    @include('admin.components.common.alerts')

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Create New Certificate</h3>
        </div>

        <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="space-y-6">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">English Content</h4>
                    @include('admin.components.form.input-group', ['name' => 'name_en', 'label' => 'Name (English)', 'required' => true, 'placeholder' => 'Enter certificate name'])
                    @include('admin.components.form.input-group', ['name' => 'issuer_en', 'label' => 'Issuer (English)', 'placeholder' => 'e.g., ISO Organization'])
                </div>

                <div class="space-y-6">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">Arabic Content</h4>
                    @include('admin.components.form.input-group', ['name' => 'name_ar', 'label' => 'Name (Arabic)', 'required' => true, 'placeholder' => 'أدخل اسم الشهادة', 'dir' => 'rtl'])
                    @include('admin.components.form.input-group', ['name' => 'issuer_ar', 'label' => 'Issuer (Arabic)', 'placeholder' => 'مثال: منظمة الأيزو', 'dir' => 'rtl'])
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="space-y-6">
                    @include('admin.components.form.select-group', ['name' => 'type', 'label' => 'Type', 'required' => true, 'options' => ['pdf' => 'PDF', 'image' => 'Image']])

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Certificate File <span class="text-red-500">*</span></label>
                        <input type="file" name="file" required accept=".pdf,.jpg,.jpeg,.png,.gif,.webp" class="block w-full text-sm text-gray-500 file:mr-4 file:rounded-lg file:border-0 file:bg-brand-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-brand-700 hover:file:bg-brand-100 dark:text-gray-400 dark:file:bg-brand-900/50 dark:file:text-brand-400">
                        <p class="mt-1 text-xs text-gray-500">PDF or Image (JPG, PNG, WebP). Max 5MB.</p>
                        @error('file')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Logo</label>
                        <input type="file" name="logo" accept=".jpg,.jpeg,.png,.gif,.webp" class="block w-full text-sm text-gray-500 file:mr-4 file:rounded-lg file:border-0 file:bg-brand-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-brand-700 hover:file:bg-brand-100 dark:text-gray-400 dark:file:bg-brand-900/50 dark:file:text-brand-400">
                        <p class="mt-1 text-xs text-gray-500">Optional. Image only (JPG, PNG, WebP). Max 2MB. Shown on frontend certificate cards.</p>
                        @error('logo')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="space-y-6">
                    @include('admin.components.form.input-group', ['name' => 'issue_date', 'label' => 'Issue Date', 'type' => 'date'])
                    @include('admin.components.form.input-group', ['name' => 'expiry_date', 'label' => 'Expiry Date', 'type' => 'date'])
                    @include('admin.components.form.input-group', ['name' => 'order', 'label' => 'Display Order', 'type' => 'number', 'value' => 0])
                    @include('admin.components.form.toggle-switch', ['name' => 'status', 'label' => 'Active', 'checked' => true])
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">
                <a href="{{ route('admin.certificates.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Cancel</a>
                <button type="submit" class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">Create Certificate</button>
            </div>
        </form>
    </div>
@endsection

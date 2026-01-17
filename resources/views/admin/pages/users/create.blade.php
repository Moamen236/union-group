@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Create User'])
    @include('admin.components.common.alerts')

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Create New User</h3>
        </div>

        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="space-y-6">
                    @include('admin.components.form.input-group', ['name' => 'name', 'label' => 'Full Name', 'required' => true, 'placeholder' => 'Enter full name'])
                    @include('admin.components.form.input-group', ['name' => 'email', 'label' => 'Email Address', 'type' => 'email', 'required' => true, 'placeholder' => 'user@example.com'])
                    @include('admin.components.form.input-group', ['name' => 'password', 'label' => 'Password', 'type' => 'password', 'required' => true, 'placeholder' => 'Enter password'])
                    @include('admin.components.form.input-group', ['name' => 'password_confirmation', 'label' => 'Confirm Password', 'type' => 'password', 'required' => true, 'placeholder' => 'Confirm password'])
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Role <span class="text-red-500">*</span></label>
                        <div class="space-y-2">
                            @foreach($roles as $role)
                                <label class="flex items-center">
                                    <input type="checkbox" name="roles[]" value="{{ $role->name }}" class="h-4 w-4 rounded border-gray-300 text-brand-600 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-800">
                                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ ucfirst(str_replace('_', ' ', $role->name)) }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('roles')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                    </div>

                    @include('admin.components.form.image-upload', ['name' => 'avatar', 'label' => 'Avatar', 'help' => 'Recommended: 200x200px. Max 1MB.'])

                    @include('admin.components.form.toggle-switch', ['name' => 'is_active', 'label' => 'Active', 'checked' => true])
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">
                <a href="{{ route('admin.users.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Cancel</a>
                <button type="submit" class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">Create User</button>
            </div>
        </form>
    </div>
@endsection

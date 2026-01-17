@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Edit User'])
    @include('admin.components.common.alerts')

    <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit User</h3>
        </div>

        <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="space-y-6">
                    @include('admin.components.form.input-group', ['name' => 'name', 'label' => 'Full Name', 'required' => true, 'value' => $user->name])
                    @include('admin.components.form.input-group', ['name' => 'email', 'label' => 'Email Address', 'type' => 'email', 'required' => true, 'value' => $user->email])
                    @include('admin.components.form.input-group', ['name' => 'password', 'label' => 'New Password', 'type' => 'password', 'placeholder' => 'Leave blank to keep current', 'help' => 'Leave empty to keep current password'])
                    @include('admin.components.form.input-group', ['name' => 'password_confirmation', 'label' => 'Confirm New Password', 'type' => 'password', 'placeholder' => 'Confirm new password'])
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Role <span class="text-red-500">*</span></label>
                        <div class="space-y-2">
                            @foreach($roles as $role)
                                <label class="flex items-center">
                                    <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-brand-600 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-800">
                                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ ucfirst(str_replace('_', ' ', $role->name)) }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('roles')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                    </div>

                    @include('admin.components.form.image-upload', ['name' => 'avatar', 'label' => 'Avatar', 'currentImage' => $user->avatarUrl, 'help' => 'Recommended: 200x200px. Max 1MB.'])

                    @include('admin.components.form.toggle-switch', ['name' => 'is_active', 'label' => 'Active', 'checked' => $user->is_active])
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">
                <a href="{{ route('admin.users.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Cancel</a>
                <button type="submit" class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700">Update User</button>
            </div>
        </form>
    </div>
@endsection

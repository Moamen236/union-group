# Union Group Admin Dashboard - Setup Guide

## Overview

This is a production-ready Laravel admin dashboard with:
- Full CRUD for all modules
- Bilingual support (English/Arabic) using two database columns
- Role-based access control using Spatie Laravel Permission
- Modern UI with Tailwind CSS and Alpine.js

## Requirements

- PHP 8.2+
- MySQL 8.0+
- Node.js 18+
- Composer

## Installation Steps

### 1. Install Spatie Laravel Permission

```bash
composer require spatie/laravel-permission
```

### 2. Run Migrations

```bash
php artisan migrate
```

### 3. Create Storage Link

```bash
php artisan storage:link
```

### 4. Run Database Seeders

```bash
php artisan db:seed
```

This will create:
- Super Admin user (email: admin@admin.com, password: password)
- Roles: super_admin, admin, editor
- All permissions

### 5. Clear Cache

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

## Default Login Credentials

- **Email:** admin@admin.com
- **Password:** password
- **URL:** /admin/login

## Database Structure

### Tables Created

| Table | Description |
|-------|-------------|
| `users` | System users with roles |
| `sliders` | Homepage sliders |
| `product_categories` | Product categories |
| `products` | Main products |
| `product_colors` | Product color variants |
| `product_images` | Product images with color association |
| `projects` | Company projects/portfolio |
| `certificates` | Company certificates (PDF/Image) |
| `roles` | Spatie roles |
| `permissions` | Spatie permissions |

### Translation Pattern

All translatable fields use two columns:
- `field_en` - English content
- `field_ar` - Arabic content

Example:
```php
$product->name_en // "Premium Widget"
$product->name_ar // "أداة متميزة"
```

## Roles & Permissions

### Roles

| Role | Description |
|------|-------------|
| `super_admin` | Full access to everything |
| `admin` | Full access except user management |
| `editor` | Limited CRUD permissions |

### Permissions

- `manage sliders`
- `manage product categories`
- `manage products`
- `manage product colors`
- `manage product images`
- `manage projects`
- `manage certificates`
- `manage users`
- `view dashboard`

## Admin Routes

All admin routes are prefixed with `/admin`:

| Route | Description |
|-------|-------------|
| `/admin` | Dashboard |
| `/admin/sliders` | Manage sliders |
| `/admin/product-categories` | Manage categories |
| `/admin/products` | Manage products |
| `/admin/product-colors` | Manage product colors |
| `/admin/product-images` | Manage product images |
| `/admin/projects` | Manage projects |
| `/admin/certificates` | Manage certificates |
| `/admin/users` | Manage users |

## Frontend Usage

### Language Switching

Add language parameter to any URL:
```
/shop?lang=ar  // Arabic
/shop?lang=en  // English
```

Or use the language switcher component:
```blade
<x-language-switcher />
```

### Displaying Bilingual Content

```blade
{{-- Using locale helper --}}
{{ app()->getLocale() == 'ar' ? $product->name_ar : $product->name_en }}

{{-- Using model accessor --}}
{{ $product->name }}  {{-- Automatically returns correct language --}}
```

### Loading Active Content

```php
// Get active sliders
$sliders = Slider::active()->ordered()->get();

// Get active products with images
$products = Product::active()
    ->with(['category', 'images'])
    ->ordered()
    ->get();

// Get featured products
$featured = Product::active()->favorite()->get();
```

## File Uploads

Files are stored in the `storage/app/public` directory:

| Type | Path |
|------|------|
| Sliders | `sliders/` |
| Categories | `product-categories/` |
| Products | `product-images/` |
| Projects | `projects/` |
| Certificates | `certificates/` |
| Avatars | `avatars/` |

## Customization

### Adding New Permissions

1. Add to `RolePermissionSeeder.php`:
```php
$permissions = [
    // ... existing
    'new permission',
];
```

2. Re-run seeder:
```bash
php artisan db:seed --class=RolePermissionSeeder
```

### Adding New Roles

```php
$newRole = Role::create(['name' => 'new_role']);
$newRole->syncPermissions(['permission1', 'permission2']);
```

## Middleware

| Middleware | Description |
|------------|-------------|
| `auth` | Requires authentication |
| `check.active` | Checks if user account is active |
| `permission:name` | Requires specific permission |
| `role:name` | Requires specific role |
| `locale` | Sets application locale |

## API Endpoints

All toggle/order update endpoints return JSON:

```json
{
    "success": true,
    "status": true,
    "message": "Status updated successfully."
}
```

## Security Features

- CSRF protection on all forms
- Password hashing using Laravel's Hash facade
- Role/Permission middleware on all admin routes
- Active user check middleware
- File upload validation (type, size)
- Input sanitization via Form Requests

## Troubleshooting

### Permission Cache Issues

```bash
php artisan permission:cache-reset
```

### Storage Link Issues

```bash
rm public/storage
php artisan storage:link
```

### Class Not Found

```bash
composer dump-autoload
```

## Support

For issues or questions, please check the Laravel documentation or Spatie Permission package documentation.

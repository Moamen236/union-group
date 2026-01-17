# Union Group - Industrial Paints & Coatings Platform

**Union Group** is a comprehensive, production-ready web platform for a paint and coating manufacturing company. Built with **Laravel 12**, it features a bilingual (English/Arabic) customer-facing website and a robust admin dashboard for managing products, projects, certificates, and content.

---

## Table of Contents

- [Business Flow](#business-flow)
  - [Project Overview](#project-overview)
  - [Key Business Processes](#key-business-processes)
  - [User Journeys](#user-journeys)
  - [Roles & Permissions](#roles--permissions)
- [Technical Documentation](#technical-documentation)
  - [System Architecture](#system-architecture)
  - [Technology Stack](#technology-stack)
  - [Database Schema](#database-schema)
  - [Module Overview](#module-overview)
  - [Data Flow](#data-flow)
- [Setup & Installation](#setup--installation)
  - [Requirements](#requirements)
  - [Installation Steps](#installation-steps)
  - [Docker Deployment](#docker-deployment)
- [Development Guide](#development-guide)
  - [Project Structure](#project-structure)
  - [Code Conventions](#code-conventions)
  - [Adding New Features](#adding-new-features)
  - [Testing](#testing)
- [Maintenance & Operations](#maintenance--operations)
  - [Troubleshooting](#troubleshooting)
  - [Security Features](#security-features)

---

## Business Flow

### Project Overview

Union Group is a digital platform designed for a leading manufacturer and supplier of premium paints, coatings, and industrial solutions in the Middle East. The platform serves two primary purposes:

1. **Public Website**: A professional, bilingual (English/Arabic) showcase for:
   - Product catalog display
   - Company portfolio and projects
   - Quality certifications and credentials
   - Customer contact and inquiries

2. **Admin Dashboard**: A comprehensive content management system for:
   - Product and category management
   - Project portfolio management
   - Certificate management
   - Homepage slider management
   - User and access control

### Key Business Processes

#### 1. Product Catalog Management
- **Categories**: Organize products into logical groups (e.g., Interior Paints, Industrial Coatings, Waterproofing)
- **Products**: Each product has bilingual names, descriptions, features, product codes, and multiple images
- **Color Variants**: Products can have multiple color options with hex codes
- **Featured Products**: Mark products as favorites to highlight them on the homepage

#### 2. Company Portfolio Showcase
- **Projects**: Display completed projects with client information, location, and completion dates
- **Certificates**: Showcase quality certifications (ISO, etc.) to build trust and credibility

#### 3. Content Management
- **Sliders**: Manage homepage hero banners with bilingual content and call-to-action buttons
- **About Section**: Company information displayed on the public site
- **Contact Form**: Customer inquiries submitted through the website

#### 4. User Administration
- Manage admin users with different permission levels
- Activate/deactivate user accounts
- Assign roles and permissions

### User Journeys

#### Public Website Visitors

```
Homepage → Browse Categories → View Products → Product Details → Contact Form
    │
    ├── View Projects → See Company Portfolio
    │
    ├── View Certificates → Verify Quality Standards
    │
    └── About/Contact → Learn About Company
```

**Key User Flows:**
1. **Product Discovery**: Visitors land on homepage → see featured products and categories → browse shop → filter by category → view product details with images and colors
2. **Trust Building**: View company projects → check certifications → gain confidence in quality
3. **Inquiry**: Fill contact form with product/project interest

#### Admin Users

```
Login → Dashboard (Stats Overview)
    │
    ├── Manage Sliders → Create/Edit/Toggle Homepage Banners
    │
    ├── Manage Products → Step 1: Basic Info → Step 2: Add Colors → Step 3: Upload Images
    │
    ├── Manage Categories → Organize Product Structure
    │
    ├── Manage Projects → Portfolio Management
    │
    ├── Manage Certificates → Quality Credentials
    │
    └── Manage Users → Team Administration (Super Admin only)
```

### Roles & Permissions

The platform uses Spatie Laravel Permission for role-based access control:

| Role | Description | Permissions |
|------|-------------|-------------|
| **Super Admin** | Full system access | All permissions including user management |
| **Admin** | Content management | All except user management |
| **Editor** | Limited content access | Sliders, products, product images, projects, dashboard |

#### Permission Matrix

| Permission | Super Admin | Admin | Editor |
|------------|:-----------:|:-----:|:------:|
| `view dashboard` | ✓ | ✓ | ✓ |
| `manage sliders` | ✓ | ✓ | ✓ |
| `manage products` | ✓ | ✓ | ✓ |
| `manage product images` | ✓ | ✓ | ✓ |
| `manage projects` | ✓ | ✓ | ✓ |
| `manage product categories` | ✓ | ✓ | ✗ |
| `manage product colors` | ✓ | ✓ | ✗ |
| `manage certificates` | ✓ | ✓ | ✗ |
| `manage users` | ✓ | ✗ | ✗ |

---

## Technical Documentation

### System Architecture

```
┌─────────────────────────────────────────────────────────────────────┐
│                           CLIENT LAYER                               │
├──────────────────────────────┬──────────────────────────────────────┤
│      Public Website          │         Admin Dashboard              │
│   (Blade + Bootstrap 3)      │    (Blade + Tailwind + Alpine.js)   │
└──────────────────────────────┴──────────────────────────────────────┘
                                    │
                                    ▼
┌─────────────────────────────────────────────────────────────────────┐
│                        APPLICATION LAYER                             │
├─────────────────────────────────────────────────────────────────────┤
│  Routes (web.php, admin.php)                                        │
│      │                                                               │
│      ▼                                                               │
│  Middleware (Auth, CheckUserActive, SetLocale, Permission)          │
│      │                                                               │
│      ▼                                                               │
│  Controllers (Frontend/UserController, Admin/*Controller)           │
│      │                                                               │
│      ▼                                                               │
│  Models (LocalizableModel, Product, Project, Certificate, etc.)     │
│      │                                                               │
│      ▼                                                               │
│  Helpers (LocalizableModel - Bilingual Support)                     │
└─────────────────────────────────────────────────────────────────────┘
                                    │
                                    ▼
┌─────────────────────────────────────────────────────────────────────┐
│                          DATA LAYER                                  │
├─────────────────────────────────────────────────────────────────────┤
│  MySQL/SQLite Database                                              │
│  File Storage (storage/app/public)                                  │
└─────────────────────────────────────────────────────────────────────┘
```

### Technology Stack

#### Backend
| Technology | Version | Purpose |
|------------|---------|---------|
| PHP | 8.2+ | Server-side language |
| Laravel | 12.x | MVC Framework |
| Spatie Permission | 6.x | Role-based access control |
| Eloquent ORM | - | Database abstraction |

#### Frontend (Public Site)
| Technology | Purpose |
|------------|---------|
| Bootstrap 3 | CSS Framework |
| jQuery | DOM manipulation |
| Revolution Slider | Homepage slider |
| Owl Carousel | Product carousels |

#### Frontend (Admin Dashboard)
| Technology | Version | Purpose |
|------------|---------|---------|
| Tailwind CSS | 4.x | Utility-first CSS |
| Alpine.js | 3.x | Lightweight reactivity |
| ApexCharts | 5.x | Dashboard charts |
| Flatpickr | - | Date pickers |

#### Build Tools
| Tool | Purpose |
|------|---------|
| Vite | Asset bundling & HMR |
| npm | Package management |
| Composer | PHP dependency management |

#### Infrastructure
| Component | Technology |
|-----------|------------|
| Web Server | Nginx |
| PHP Runtime | PHP-FPM |
| Container | Docker (Alpine) |
| Process Manager | Supervisor |

### Database Schema

#### Entity Relationship Overview

```
┌─────────────────┐       ┌──────────────────┐       ┌─────────────────┐
│     Users       │       │    Products      │       │   Projects      │
├─────────────────┤       ├──────────────────┤       ├─────────────────┤
│ id              │       │ id               │       │ id              │
│ name            │       │ category_id (FK) │       │ name_en/ar      │
│ email           │       │ name_en/ar       │       │ description     │
│ password        │       │ code             │       │ image           │
│ is_active       │       │ slug             │       │ location_en/ar  │
│ avatar          │       │ description      │       │ client          │
│ roles (pivot)   │       │ features         │       │ completion_date │
└─────────────────┘       │ is_favorite      │       │ order, status   │
                          │ order, status    │       └─────────────────┘
                          └───────┬──────────┘
                                  │
          ┌───────────────────────┼───────────────────────┐
          │                       │                       │
          ▼                       ▼                       ▼
┌─────────────────┐    ┌─────────────────┐    ┌─────────────────────┐
│ ProductCategory │    │ ProductColors   │    │   ProductImages     │
├─────────────────┤    ├─────────────────┤    ├─────────────────────┤
│ id              │    │ id              │    │ id                  │
│ name_en/ar      │    │ product_id (FK) │    │ product_id (FK)     │
│ slug            │    │ name_en/ar      │    │ color_id (FK, null) │
│ image           │    │ hex_code        │    │ image               │
│ description     │    │ order, status   │    │ alt_en/ar           │
│ order, status   │    └─────────────────┘    │ is_main             │
└─────────────────┘                           │ order               │
                                              └─────────────────────┘

┌─────────────────┐    ┌─────────────────┐
│   Sliders       │    │  Certificates   │
├─────────────────┤    ├─────────────────┤
│ id              │    │ id              │
│ title_en/ar     │    │ name_en/ar      │
│ subtitle_en/ar  │    │ file            │
│ image           │    │ type (pdf/image)│
│ button_text     │    │ issuer_en/ar    │
│ button_url      │    │ issue_date      │
│ order, status   │    │ expiry_date     │
└─────────────────┘    │ order, status   │
                       └─────────────────┘
```

#### Bilingual Content Pattern

All translatable content uses dual columns:
```php
// Database columns
name_en VARCHAR(255)
name_ar VARCHAR(255)

// Model accessor (automatic locale detection)
$product->name  // Returns name_en or name_ar based on app locale
```

### Module Overview

#### Frontend Modules (`App\Http\Controllers\Frontend`)

| Module | Controller | Description |
|--------|------------|-------------|
| Homepage | `UserController@index` | Featured products, categories, projects, certificates |
| Shop | `UserController@shop` | Product listing with category filtering and sorting |
| Product Detail | `UserController@productDetail` | Single product with images, colors, related products |
| Projects | `UserController@projects` | Portfolio listing with pagination |
| Certificates | `UserController@certificates` | Quality certifications display |
| About | `UserController@about` | Company information |
| Contact | `UserController@contact` | Contact form with validation |

#### Admin Modules (`App\Http\Controllers\Admin`)

| Module | Routes | Description |
|--------|--------|-------------|
| Dashboard | `/admin` | Statistics overview |
| Sliders | `/admin/sliders` | Homepage banner management |
| Categories | `/admin/product-categories` | Product category CRUD |
| Products | `/admin/products` | Multi-step product management (Info → Colors → Images) |
| Colors | `/admin/product-colors` | Standalone color management |
| Images | `/admin/product-images` | Standalone image management |
| Projects | `/admin/projects` | Portfolio CRUD |
| Certificates | `/admin/certificates` | Certificate CRUD |
| Users | `/admin/users` | User management (Super Admin only) |

### Data Flow

#### Product Creation Flow
```
1. Admin creates product (basic info)
   └── POST /admin/products
       └── Store name, description, category, code
           └── Redirect to Step 2

2. Admin adds colors (optional)
   └── GET/POST /admin/products/{id}/colors
       └── Add color name + hex code
           └── Stay on page or proceed to Step 3

3. Admin uploads images
   └── GET/POST /admin/products/{id}/images
       └── Upload images, optionally link to colors
       └── First image auto-set as main
```

#### Public Product Display Flow
```
1. User visits shop
   └── GET /shop?category=interior-paints&sort=newest

2. Controller fetches products
   └── Product::with(['category', 'images'])
       ->active()
       ->whereCategory($category)
       ->paginate(12)

3. View renders with locale-aware content
   └── {{ $product->name }}  // Auto-selects en/ar
   └── {{ $product->mainImage() }}
```

---

## Setup & Installation

### Requirements

| Requirement | Minimum Version |
|-------------|-----------------|
| PHP | 8.2+ |
| Composer | Latest |
| Node.js | 18+ |
| npm | 8+ |
| Database | MySQL 8.0+ / SQLite |

### Installation Steps

#### 1. Clone the Repository
```bash
git clone <repository-url> union-group
cd union-group
```

#### 2. Install PHP Dependencies
```bash
composer install
```

#### 3. Install Node.js Dependencies
```bash
npm install
```

#### 4. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

#### 5. Configure Database

Edit `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=union_group
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

#### 6. Run Migrations & Seeders
```bash
php artisan migrate
php artisan db:seed
```

This creates:
- Super Admin user (`admin@admin.com` / `password`)
- Roles: super_admin, admin, editor
- Sample categories and products

#### 7. Create Storage Link
```bash
php artisan storage:link
```

#### 8. Start Development Server
```bash
# All-in-one (recommended)
composer run dev

# Or manually in separate terminals:
php artisan serve          # Laravel server
npm run dev                # Vite dev server
```

**Access Points:**
- Public Website: http://localhost:8000
- Admin Dashboard: http://localhost:8000/admin

### Docker Deployment

#### Build and Run
```bash
# Build image
docker build -t union-group -f docker/dockerfile .

# Run container
docker run -d -p 80:80 \
  -e DB_HOST=your-db-host \
  -e DB_DATABASE=union_group \
  -e DB_USERNAME=user \
  -e DB_PASSWORD=pass \
  union-group
```

#### Production Build
```bash
# Build frontend assets
npm run build

# Optimize Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache
composer install --optimize-autoloader --no-dev
```

---

## Development Guide

### Project Structure

```
union-group/
├── app/
│   ├── Helpers/
│   │   ├── LocalizableModel.php    # Bilingual model support
│   │   └── MenuHelper.php          # Navigation helpers
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/              # Admin dashboard controllers
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── ProductController.php
│   │   │   │   ├── ProjectController.php
│   │   │   │   └── ...
│   │   │   ├── Frontend/
│   │   │   │   └── UserController.php  # Public site controller
│   │   │   └── Auth/
│   │   │       └── LoginController.php
│   │   ├── Middleware/
│   │   │   ├── CheckUserActive.php # User status verification
│   │   │   └── SetLocale.php       # Language switching
│   │   └── Requests/               # Form request validation
│   ├── Models/
│   │   ├── Product.php
│   │   ├── ProductCategory.php
│   │   ├── Project.php
│   │   ├── Certificate.php
│   │   ├── Slider.php
│   │   └── User.php
│   └── Providers/
├── config/
│   ├── permission.php              # Spatie Permission config
│   └── ...
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── AdminUserSeeder.php
│       ├── RolePermissionSeeder.php
│       ├── ProductCategorySeeder.php
│       └── ...
├── docker/
│   ├── dockerfile
│   ├── nginx/default.conf
│   └── supervisord.conf
├── public/
│   ├── user/                       # Public site assets
│   │   ├── css/
│   │   ├── js/
│   │   └── images/
│   └── build/                      # Compiled admin assets
├── resources/
│   ├── views/
│   │   ├── admin/
│   │   │   ├── components/         # Blade components
│   │   │   ├── layouts/
│   │   │   └── pages/
│   │   └── user/
│   │       ├── layouts/
│   │       └── pages/
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php                     # Public routes
│   └── admin.php                   # Admin routes
└── storage/
    └── app/public/                 # Uploaded files
```

### Code Conventions

#### Models - Bilingual Support
```php
// Extend LocalizableModel for auto-translation
class Product extends LocalizableModel
{
    protected $localizable = ['name', 'description', 'features'];

    // Scopes for common queries
    public function scopeActive($query) { ... }
    public function scopeOrdered($query) { ... }
    public function scopeFavorite($query) { ... }
}
```

#### Controllers - Admin CRUD Pattern
```php
class ProductController extends Controller
{
    public function index(Request $request)  // List with filters
    public function create()                  // Step 1 form
    public function store(ProductRequest $request)  // Store
    public function colors(Product $product)  // Step 2
    public function images(Product $product)  // Step 3
    public function edit(Product $product)    // Edit form
    public function update(ProductRequest $request, Product $product)
    public function destroy(Product $product)
    public function toggleStatus(Product $product)  // AJAX toggle
}
```

#### Routes - Permission Protected
```php
Route::middleware(['permission:manage products'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::post('products/{product}/toggle-status', [ProductController::class, 'toggleStatus']);
});
```

### Adding New Features

#### Adding a New Model (e.g., "News")

1. **Create Migration**
```bash
php artisan make:migration create_news_table
```

2. **Create Model**
```php
// app/Models/News.php
class News extends LocalizableModel
{
    protected $fillable = ['title_en', 'title_ar', 'content_en', 'content_ar', ...];
    protected $localizable = ['title', 'content'];
}
```

3. **Create Controller**
```bash
php artisan make:controller Admin/NewsController --resource
```

4. **Add Permission**
```php
// database/seeders/RolePermissionSeeder.php
$permissions = [..., 'manage news'];
```

5. **Add Routes**
```php
// routes/admin.php
Route::middleware(['permission:manage news'])->group(function () {
    Route::resource('news', NewsController::class)->names('admin.news');
});
```

6. **Create Views** in `resources/views/admin/pages/news/`

### Testing

```bash
# Run all tests
composer run test
# or
php artisan test

# Run with coverage
php artisan test --coverage

# Run specific tests
php artisan test --filter=ProductTest
```

---

## Maintenance & Operations

### Common Commands

```bash
# Clear all caches
php artisan optimize:clear

# Rebuild caches
php artisan optimize

# Reset permission cache
php artisan permission:cache-reset

# Rebuild storage link
rm public/storage
php artisan storage:link

# Fresh database with seeds
php artisan migrate:fresh --seed

# List all routes
php artisan route:list
```

### Troubleshooting

| Issue | Solution |
|-------|----------|
| "Class not found" errors | `composer dump-autoload` |
| Permission cache issues | `php artisan permission:cache-reset` |
| Storage/upload issues | `php artisan storage:link` + check permissions |
| 404 on admin routes | `php artisan route:clear` |
| Login loop | Clear browser cookies, check `is_active` status |

### Security Features

| Feature | Implementation |
|---------|---------------|
| CSRF Protection | Laravel built-in on all forms |
| Password Hashing | bcrypt via Laravel Hash facade |
| Role-Based Access | Spatie Permission middleware |
| Account Status | `CheckUserActive` middleware |
| File Upload Validation | Type + size limits in Form Requests |
| Input Sanitization | Laravel Form Request validation |

### File Upload Locations

| Content Type | Storage Path |
|--------------|--------------|
| Sliders | `storage/app/public/sliders/` |
| Categories | `storage/app/public/product-categories/` |
| Product Images | `storage/app/public/product-images/` |
| Projects | `storage/app/public/projects/` |
| Certificates | `storage/app/public/certificates/` |
| User Avatars | `storage/app/public/avatars/` |

---

## API Endpoints

### Admin AJAX Endpoints

All toggle endpoints return JSON:

```http
POST /admin/products/{id}/toggle-status
POST /admin/products/{id}/toggle-favorite
POST /admin/sliders/{id}/toggle-status
POST /admin/product-categories/{id}/toggle-status
POST /admin/projects/{id}/toggle-status
POST /admin/certificates/{id}/toggle-status
```

Response:
```json
{
    "success": true,
    "status": true,
    "message": "Status updated successfully."
}
```

---

## Default Credentials

| Role | Email | Password | URL |
|------|-------|----------|-----|
| Super Admin | admin@admin.com | password | /admin/login |

**Important:** Change default credentials in production!

---

## License

This project uses the TailAdmin Laravel template. Refer to [TailAdmin License](https://tailadmin.com/license) for licensing information.

---

## Support

For issues or questions:
- Check [Laravel Documentation](https://laravel.com/docs)
- Check [Spatie Permission Documentation](https://spatie.be/docs/laravel-permission)
- Review the `ADMIN_DASHBOARD_SETUP.md` for quick admin setup reference

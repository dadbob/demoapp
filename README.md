# 📘 Laravel Blade Demo App
*A compact demonstration of Laravel Blade features: components, slots, directives, stacks, layouts, modals & AJAX.*

---

## 🚀 Overview

This application is a **self-contained demo project** created to showcase the main features of **Laravel Blade** and how they are used to build clean, reusable, maintainable UI layers.

It includes examples of:

- Blade layouts & sections
- Blade components (props, slots, attribute bags)
- Custom Blade directives
- Blade stacks (`@push` / `@stack`)
- Loop metadata (`$loop->first / last / iteration`)
- Bootstrap-powered UI components
- AJAX modal loading
- Reusable partials
- Simple authentication scaffolding (login/register/logout)

The app is intentionally lightweight, focusing on **developer productivity and readable architecture**.

---

## 📂 Features Demonstrated

### 1. **Blade Layout System**

Located in `resources/views/layouts/app.blade.php`

Shows how a base layout defines:

- Global navbar
- Content wrapper
- Page titles
- Script stacks
- Reusable Bootstrap styling

The layout is extended via:

```blade
@extends('layouts.app')
```

---

### 2. **Reusable Blade Components**

Located in: `resources/views/components/*`

Included components:

| Component | Purpose |
|----------|---------|
| `x-card` | Reusable Bootstrap card |
| `x-button` | Button or link with variants |
| `x-avatar` | Initial-based avatar |
| `x-badge` | User/Admin status pill |
| `x-alert` | Status alert boxes |
| `x-modal` | Bootstrap modal with stacked JS |
| `x-table` | Dynamic table with headers |
| `user-row` | Partial row template for the users table |

Concepts demonstrated:

- Props
- Slots
- Named slots (`<x-slot name="footer">`)
- Attribute bags (`$attributes->merge()`)

---

### 3. **Custom Blade Directives**

Defined in `app/Providers/AppServiceProvider.php`

Example:

```php
Blade::if('admin', fn() => auth()->check() && auth()->user()->is_admin);
```

Usage:

```blade
@admin
    Only admins see this.
@endadmin
```

---

### 4. **AJAX-Loaded User Modals**

The Users page demonstrates dynamic modal loading:

- Clicking a user row fetches details from `/demo/users/{id}`
- Modal content is populated dynamically
- Reuses the `<x-modal>` component
- JavaScript is structured in a clean, readable module

---

### 5. **Pages in This Demo**

| Route | Description |
|-------|-------------|
| `/demo` | Dashboard showing all Blade feature examples |
| `/demo/users` | Users table + avatar & badge components + AJAX modal details |
| `/demo/modals` | Modal component demo + script stacks (`@push` / `@stack`) |
| `/login`, `/register` | Auth scaffolding |
| `/` | Redirects to `/demo` |

---

## 🛠 Installation

```bash
git clone <repository-url>
cd demoapp
composer install
```

### Environment setup

```bash
cp .env.example .env
php artisan key:generate
```

---

## 🗄 Database Configuration (SQLite - For Simple Demo Only)

```bash
mkdir -p database
touch database/database.sqlite
```

Edit `.env`:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

Add debug bar:
```bash
composer require barryvdh/laravel-debugbar --dev
```

Run migrations:

```bash
php artisan migrate
```

---

## ▶️ Running the Application

```bash
php artisan serve
```

Visit:

```
http://127.0.0.1:8000/demo
```

---

## 📁 Project Structure

```
app/
└── Providers/
    └── AppServiceProvider.php     # Custom Blade directives

routes/
└── web.php                        # Demo routes

resources/
└── views/
    ├── layouts/                   # Base layout
    ├── components/                # Blade UI components
    ├── demo/
    │   ├── dashboard.blade.php
    │   ├── users.blade.php
    │   ├── modals.blade.php
    │   └── partials/
    │       └── user-row.blade.php
    └── auth/
        ├── login.blade.php
        └── register.blade.php
```

---

## 🧪 Fake Data (Simple Demo Only)

The Users page uses **mocked user data** generated directly in the controller to keep the demo simple, fast, and database-agnostic.

---

## 🎯 Purpose of This Demo

- Teaching Blade fundamentals
- Onboarding new Laravel developers
- Demonstrating clean UI component architecture
- Showing reusable Blade components in a real layout
- Providing copy/paste templates for production apps

---

## 📄 License

This demo is for **training and development reference**.

Feel free to adapt it for your own Laravel teaching materials.

---

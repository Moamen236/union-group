# How to Run Union Group

## ⚠️ Fix: "Failed to open vendor/autoload.php"

That error means **PHP dependencies are not installed**. Run this first and wait until it finishes (can take several minutes):

```powershell
cd d:\union-group
composer install --ignore-platform-reqs
```

Wait until you see **"Generating autoload files"** and the list of installed packages. Then run the steps below.

---

## Quick start (after dependencies are installed)

1. **Ensure Composer finished**  
   If you just ran setup, wait until `composer install --ignore-platform-reqs` finishes (you should see "Generating autoload files" and a list of installed packages).

2. **Generate app key**
   ```powershell
   cd d:\union-group
   php artisan key:generate
   ```

3. **Run migrations and seed**
   ```powershell
   php artisan migrate
   php artisan db:seed
   ```
   This creates the Super Admin user: **admin@admin.com** / **password**

4. **Create storage link**
   ```powershell
   php artisan storage:link
   ```

5. **Start the dev server**
   ```powershell
   composer run dev
   ```
   This starts Laravel, Vite, queue worker, and logs in one terminal.

   **Or** run in two separate terminals:
   - Terminal 1: `php artisan serve`
   - Terminal 2: `npm run dev`

6. **Open in browser**
   - **Public site:** http://localhost:8000  
   - **Admin dashboard:** http://localhost:8000/admin (login: admin@admin.com / password)

---

## First-time setup (if not done yet)

- **PHP dependencies:**  
  `composer install --ignore-platform-reqs`  
  (Use `--ignore-platform-reqs` if you have PHP 8.2; the lock file targets 8.3.)

- **Node dependencies:**  
  `npm install`

- **Environment:**  
  `.env` is already created with SQLite and `APP_URL=http://localhost:8000`.  
  To use MySQL instead, edit `.env` and set `DB_CONNECTION=mysql`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, then create the database and run migrations.

---

## Troubleshooting

| Issue | Fix |
|-------|-----|
| "No application encryption key" | Run `php artisan key:generate` |
| Database errors | Ensure `database/database.sqlite` exists (created for you), or configure MySQL in `.env` and run `php artisan migrate` |
| 404 on admin assets | Run `npm run dev` (Vite) in a separate terminal, or use `composer run dev` |
| PHP version error on `composer install` | Use `composer install --ignore-platform-reqs` (PHP 8.2 works for running the app; tests may need 8.3) |

# Project Setup Steps

Follow these steps to set up the Laravel project:

## 1. Clone the repository

```sh
git clone <repository-url>
cd sembark-task
```

## 2. Install PHP dependencies

```sh
composer install
```

## 3. Install Node.js dependencies

```sh
npm install
```

## 4. Configure environment variables

Edit the `.env` file and set your database credentials and other environment variables as needed.

## 5. Run database migrations

```sh
php artisan migrate
```

## 6. Seed the database

```sh
php artisan db:seed
```

## 7. Build frontend assets

```sh
npm run dev
```
or for production:
```sh
npm run build
```

## 8. Start the development server
php artisan serve

## 9. Credentials for Super Admin
Please look for the database/seeders/UserSeeder.php file
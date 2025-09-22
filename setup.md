# Project Setup Steps

Follow these steps to set up the Laravel project:

## 1. Clone the repository

```sh
git clone [<repository-url>](https://github.com/ashujangid/sembark-task.git)
cd sembark-task
```

## 2. Install PHP dependencies

```sh
composer install
```

## 3. Generate the Laravel App Key

```sh
php artisan key:generate
```

## 4. Install Node.js dependencies

```sh
npm install
```

## 5. Configure environment variables

Edit the `.env` file and set your database credentials and other environment variables as needed.

## 6. Run database migrations

```sh
php artisan migrate
```

## 7. Seed the database

```sh
php artisan db:seed
```

## 8. Build frontend assets

```sh
npm run dev
```
or for production:
```sh
npm run build
```

## 9. Start the development server
php artisan serve

## 10. Credentials for Super Admin

Please look for the database/seeders/UserSeeder.php file

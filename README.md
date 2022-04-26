# Laravel + ReactJs

## Fetch Repository

`
git clone https://github.com/PawelGrunwaldCodema/laravel-reactjs-app-test.git
`

## Installation

### 1. Files

Copy .env.example and paste as .env file.

### 2. Run Laravel Sail
Starting:
`
./vendor/bin/sail up
`

Closing:
`
./vendor/bin/sail stop
`
or
`
docker-compose down
`

### 3. Generating Laravel Key
`
php artisan key:generate
`

### 4. Running migrations

1. Change parameter in .env from <b> "DB_HOST=mysql" </b> to <b> "DB_HOST=0.0.0.0" </b>
2. Run: `php artisan migrate`
3. Change parameter in .env from <b> "DB_HOST=0.0.0.0" </b> to <b> "DB_HOST=mysql" </b>

### 5. Seeding data
`
php artisan db:seed
`

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation
### Requirements
* PHP 8
* Composer
* Node
* MySQL

### Installing dependencies
```shell
composer install
npm install
```

### Database and mailer configurations (Important)
.env
```text
# MySQL config
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nextgen
DB_USERNAME=DB_USER
DB_PASSWORD=DB_PASSWORD

# MAILER DSN config NB: Change with your configuration
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

### Running migrations and seeder (Important)
```shell
php artisan migrate --seed
```

### Run dev server
```shell
php artisan serve
```

### Testing application
Go to localhost:8000 and enjoy the app!

### Admin default credentials
email : admin@admin.com
password : admin123

NB : You need to change these credentials after login

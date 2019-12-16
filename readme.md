# Quizawa

## Prerequisite
- PHP 7.2
- MySQL 8
- Composer
- Nodejs

## Installation guide
1. Clone this repository
2. Run `composer install`
3. Copy and rename `.env.example` to `.env` and add your database informations
4. Generate your private key `php artisan key:generate`
5. Create your Database
6. Go to your project folder `cd` command and run `php artisan migrate:refresh --seed`

## Swagger
Will document the API

### Edit API doc
1. The documentation is managed in the controllers

### Update swagger vue
1. `php artisan l5-swagger:generate`

### Show swagger
Swagger is our default view

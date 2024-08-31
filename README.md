
## Setup Instructions
Follow these steps to set up the Laravel project on your local machine.

## Getting Started

1. Clone the repository locally and switch to the development branch:

```bash
  git clone https://github.com/chamaxx9zp/job-portal.git
    or
  gh repo clone chamaxx9zp/job-portal
```

2. Install Composer Dependencies:

```bash
  composer install
```

3. Set Up Environment File:

- Copy the .env.example file to create your .env file:

```bash
    DB_CONNECTION=sqlite
    # DB_HOST=127.0.0.1
    # DB_PORT=3306
    # DB_DATABASE=laravel
    # DB_USERNAME=root
    # DB_PASSWORD=

    STRIPE_SECRET_KEY=tobemodified
```
Update the .env file with your specific environment configurations, such as database credentials and Stripe API keys for the payment gateway.

- Go to Stripe Dashboard and create a new Stripe account by filling in the required information.

- After creating your account, log in to the Stripe Dashboard.

- Navigate to the API Keys section under the Developers tab.

- Retrieve your Secret Key by clicking on "Reveal live key."

- Copy this key and paste it into your .env file as the value for STRIPE_SECRET_KEY:

4. Generate Application Key:

```bash
    php artisan key:generate
```
5. Set Up Database:

This project uses an SQLite database, which is a file-based database, requiring minimal setup. Set up the database tables by running:

```bash
    php artisan migrate
```

6. Install Node.js Dependencies:

```bash
    npm install
```

7. Run the Development Server:
```bash
    php artisan serve
```
The project should now be running at http://localhost:8000. 


## Prerequisites

Before setup locally, you need to have the following installed:

- Node.js v18.18.2 and npm: 9.8.1 You can download these from the official [Node.js website](https://nodejs.org/).
- Composer version 2.7.1
- PHP version 8.2.22 



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

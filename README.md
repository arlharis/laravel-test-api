<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel-Test-API
> This is the sample Laravel API apps with integrating Sanctum Authentication for User

## Table of Contents
* [General info](#general-information)
* [Technologies Used](#technologies-used)
* [Setup](#setup)
* [Usage](#usage)
<!-- * [Room for Improvement](#room-for-improvement) -->
* [Acknowledgements](#acknowledgements)
* [Contact](#contact)
* [Code of Conduct](#code-of-conduct)
* [License](#license)

## General Information
- This apps is created to show how is Laravel API with Sanctum Authentication works
- The API should contain:
  - An endpoint that takes a key (string) and value (JSON string) and store them
  - An endpoint that takes a key and returns the corresponding latest value of that key
  - An endpoint that takes a key and a timestamp and returns whatever the value of the key was at the given timestamp
  - An endpoint that will display all the key values pairs
- Currently only have 2 current Models to test:
  - User
  - Item
- Have two separated routes to show how sanctum authentication works
  - Public Route
  - Private Route

## Technologies Used
- Laravel 8.83.26
- PHP 7.4.19
- MySQL 14.14

## Setup
#### Installation
1. Run `cp .env.example .env` command to copy example into real `.env` file, then edit it with DB credentials and other settings you preferred.
2. Run `composer install` command.
3. Run `php artisan key:generate` command.

#### Running the server locally
1. Run `php artisan serve`

## Usage
This application does not have UI as it is developed to demo about API. You need to use any API test platform, for my case I am using [_Postman_](https://www.postman.com/)

Please initialize the headers like below to get the JSON format of output:
Key     | Value
------  | ------
Accept  | application/json

#### To Access Public Routes
[POST] - localhost:8000/register - Register User (To get the token)
[POST] - localhost:8000/login - Login to existing User (Get the token)
[GET]  - localhost:8000/items - Retrieve all Items
[GET]  - localhost:8000/items/{id} - Show single Item

#### To Access Private Routes
[POST]    - localhost:8000/items - Create new Item
[PUT]     - localhost:8000/items/{id} - Update existing Item
[DELETE]  - localhost:8000/items/{id} - Delete existing Item
[POST]    - localhost:8000/logout - Logout (Terminate session)

_Notes: To access the private routes, you need to get the token (copy the token after you successfully login or registered_

- Go to `Authorization` section of the Postman.
- Select `Bearer Token`.
- Paste the `token`.

<!-- ## Room of Improvement -->

## Acknowledgement
- [Traversy Media](https://www.youtube.com/@TraversyMedia)
- [Laravel Docs](https://laravel.com/docs/8.x/sanctum#main-content)

## Contact
Created by [Lukman Imran](https://github.com/arlharis)
Feel free to contact me:
[LinkedIn](https://www.linkedin.com/in/arlharis/)

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

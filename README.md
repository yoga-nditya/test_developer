To run this project, follow the instructions below:

1. Clone this repository
```sh
https://github.com/yoga-nditya/test_developer
```
2. create environment file
```sh
cp .env.example .env
```
3. Install locally using Composer
```sh
composer install
```
4. Generate app key using command
```sh
php artisan key:generate
```
5.set .env DB_DATABASE = 'NAME'

6. Create database and seeder data using command
```sh
php artisan migrate --seed
```
7. Run the project
```sh
php artisan serve
```

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

Hasil :
API Get Komisi ![ss test kerja 1](https://github.com/user-attachments/assets/461b43aa-1032-487d-a3db-3eb3126c3325)

API Post Cicilan : 
![ss test kerja 2](https://github.com/user-attachments/assets/edaa69d0-b02d-4068-9f38-20e5af3a67f4)

API Get Cicilan : ![ss test kerja 3](https://github.com/user-attachments/assets/6fe63b43-51a2-4b2e-b0eb-e564657eed7e)

API Post Pembayaran : ![ss test kerja 4](https://github.com/user-attachments/assets/7df54af0-0bfb-4b13-b7f1-19144e345f2f)

API Get Pembayaran : ![ss test kerja 5](https://github.com/user-attachments/assets/e09bc3f6-ca29-4a54-90f7-46e22acb2d04)




<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistem Manajemen HR
Sistem Manajemen HR 
Adalah aplikasi web yang dibuat dengan framework Laravel 8, SMHR memiliki User default sebagai berikut :
1. Admin 
2. Payroll
3. Staff Manager
4. Pelamar
5. Pensiun
### Framework
1. Laravel (version 8)

## Persiapan
01. Buat SQL Database bernama "smhr"


## Instalasi

01. `composer update`
02. `cp .env.example .env`
03. `php artisan key:generate`
04. `php artisan migrate --seed`
05. `php artisan serve`



## Akun Demo default 
email             | password
------------------|---------
admin@mail.com    | 12345
payroll@mail.com  | 12345
staff@mail.com    | 12345 
karyawan@mail.com | 12345
pensiun@mail.com  | 12345


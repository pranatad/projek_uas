<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tutorial

1. Download/clone file ini
2. Setelah download, ekstrak lalu pindah ke folder httdocs, ubah nama yang awalnya 'projek_uas-master' menjadi 'projek_uas'
3. Buat database baru bernama 'projek_uas' kemudian import file sql yang ada di folder projek_uas
3. Buka projek_uas di vscode kemudian jalankan perintah berikut :
        a. cp .env.example .env 
        Kemudian ubah db_database menjadi 'projek_uas' Dan tambahkan kode 'FILESYSTEM_DRIVER=public' pada akhir baris 
        b. composer install 
        c. php artisan key:generate
        d. php artisan storage:link
4. Terakhir yaitu jalankan php artisan serve

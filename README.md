<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Projek UAS - Sistem Inventory - Pencatatan Barang Gudang
TEAM 3
## 1. Abdullah Syahroni Kurniawan
## 2. Arya Admaja
## 3. Muhammad Hamamiy Zadah
## 4. Pranata Dito Fitriyansyah
## 5. Welson Mario

# Tutorial

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

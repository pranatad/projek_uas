# Sistem Inventory - Pencatatan Barang Gudang

# Tutorial

1. Download/clone file ini
2. Setelah download, ekstrak lalu pindah ke folder httdocs, ubah nama yang awalnya 'projek_uas-master' menjadi 'projek_uas'
3. Buat database baru bernama 'projek_uas' kemudian import file sql yang ada di folder projek_uas
3. Buka projek_uas di vscode kemudian jalankan perintah berikut pada terminal :
        
        a. cp .env.example .env -> untuk membuat file .env
        Kemudian pada file .env ubah db_database menjadi 'projek_uas' Dan tambahkan kode 'FILESYSTEM_DRIVER=public' pada akhir baris 
        b. jalankan perintah 'composer install' 
        c. jalankan perintah 'php artisan key:generate'
        d. jalankan perintah 'php artisan storage:link'
        
4. Terakhir yaitu jalankan php artisan serve

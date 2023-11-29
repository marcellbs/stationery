# Repository Tes Junior Programmer
Teknologi yang digunakan :
- Laravel 8
- Bootstrap 5
- Admin Template [NiceAdmin](https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/)
- MySQL

## Instalasi dan Clone Repository
1. Buka terminal dan Clone repository ini :
   - ``` git clone https://github.com/marcellbs/stationery.git```
    
2. Install Dependency
   - `composer install`
     
3. Copy file `.env.example`
   - `cp env.example .env`
     
4. Generate key menggunakan perintah :
   -`php artisan key:generate`
4. Buka XAMPP dan aktifkan Apache dan MySQL
6. Buka di browser `https://localhost/phpmyadmin`
7. Impor file `stationery.sql` ke dalam phpmyadmin
8. setelah selesai buka 2 terminal, ini digunakan untuk menjalankan terminal untuk sisi backend dan sisi frontend
   - Terminal 1
     -    Ketikkan perintah Local Development Server :
     -    `php artisan serve`
   - Terminal 2
     -    Ketikkan perintah :
     -    `php artisan serve --port=8001`
9. Untuk mengakses halaman web buka di browser dengan mengetikkan :
    - `http://localhost:8001/produk`
10. Sedangkan sisi backend menggunakan
    -  `http://localhost:8000/api/produk`
    

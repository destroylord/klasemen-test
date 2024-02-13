# Klasemen Sepak Bola

Selamat datang di repositori [Klasemen Sepak Bola]!.

## Memulai

Ikuti instruksi ini untuk menjalankan proyek di mesin lokal Anda untuk tujuan pengembangan dan pengujian.

### Prasyarat

Sebelum Anda memulai, pastikan Anda telah menginstal hal berikut di sistem Anda:

- PHP (>= 8.1)
- Composer
- Node.js
- NPM atau Yarn
- MySQL atau server database lain yang Anda pilih

### Instalasi

1. Klon repositori ke mesin lokal Anda:

   ```bash
   git clone https://github.com/destroylord/klasemen-test
   
2. Masuk ke direktori proyek
    ```bash
    cd project-name
3. Instal dependensi PHP menggunakan Composer:
    ```bash
    composer install
4. Instal dependensi JavaScript menggunakan NPM atau Yarn
    ```bash
    npm install
    # atau
    yarn install
5. Salin file .env.example menjadi .env:
    ```bash
    cp .env.example .env
6. Buat kunci aplikasi
    ```bash
    php artisan key:generate
7. Perbarui file .env dengan kredensial database Anda dan konfigurasi lainnya yang diperlukan. 

8. Jalankan migrasi database
    ```bash
    php artisan migrate
9. Jalankan aplikasi
    ```bash
    php artisan serve
10. Buka aplikasi pada browser: http://localhost:8000

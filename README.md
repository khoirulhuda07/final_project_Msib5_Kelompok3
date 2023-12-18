<p align="center"><a href="https://github.com/khoirulhuda07/final_project_Msib5_Kelompok3" target="_blank"><img src="https://thumbs2.imgbox.com/87/94/k8efiwky_t.png" width="400" alt="TrackMyShipment Logo"></a></p>

<p align="center">
<a href="https://laravel.com/docs/10.x/testing"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://github.com/khoirulhuda07/final_project_Msib5_Kelompok3/archive/refs/heads/master.zip"><img src="https://img.shields.io/badge/download-5-green" alt="Total Downloads"></a>
<img src="https://img.shields.io/badge/packagist-v1.0.1-blue" alt="Latest Stable Version">
<img src="https://img.shields.io/badge/license-MIT-green" alt="License">
</p>

# About Logistik
TrackMyShipment adalah aplikasi pengiriman yang menawarkan berbagai keunggulan, termasuk pengiriman yang efisien, pengiriman yang cepat, dan tarif pengiriman yang mudah. Aplikasi ini adalah pilihan yang tepat untuk Anda yang ingin mengirim barang dengan mudah, cepat, dan efisien.

## Requirements
<a href="https://laravel.com/docs/10.x/releases"><img src="https://img.shields.io/badge/laravel-v10-blue" alt="version laravel"></a>
<a href="https://www.php.net/releases/8.2/en.php"><img src="https://img.shields.io/badge/PHP-v8.2.4-blue" alt="version php"></a>
<a href="https://nodejs.org/en/blog/release/v10.1.0"><img src="https://img.shields.io/badge/NPM-v10.1.0-green" alt="version php"></a>

## Instalasi
- download zip <a href="https://github.com/khoirulhuda07/final_project_Msib5_Kelompok3/archive/refs/heads/master.zip">Klik disini</a> 
- atau clone di terminal :
    ```bash
    git clone https://github.com/khoirulhuda07/final_project_Msib5_Kelompok3.git
    ```

## Setup
- buka direktori project di terminal anda.
- ketikan command di terminal :
  ```bash
  copy .env.example .env
  ```
  untuk Linuk, ketikan command :
  ```bash
  cp .env.example .env
  ```
- instal package-package di laravel, ketikan command :
  ```bash
  composer install
  ```
- menginstal npm UI di website, ketikan command :
  ```bash
  npm install
  ```
- Generate app key, ketikan command :
  ```bash
  php artisan key:generate
  ```
### Command Public Package (Wajib)
- menjalankan storage di website, ketikan command :
  ```bash
  php artisan storage:link
  ```
- public pdf di website, ketikan command :
  ```bash
  php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
  ```
- public excel di website, ketikan command :
  ```bash
  php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config
  ```
### Command Run Website
- menjalanlan Laravel di website, ketikan command :
  ```bash
  php artisan serve
  ```
- menjalanlan UI Laravel di website, ketikan command :
  ```bash
  npm run dev
  ```
### Command Database
- buatlah nama database baru. Lalu sesuaikan nama database, username, dan password database di file `.env`, ketikan command :
  ```bash
  php artisan migrate
  ```
- memasukkan data table ke database, ketikan command :
  ```bash
  php artisan db:seed
  ```
- menjalankan laravel di website, ketikan command :
  ```bash
  php artisan serve
  ```

## Akun Login
akun user : email = huda@gmail.com, pw = 12345678

akun admin : email = michail@gmail.com, pw = 12345678

akun kurir : email = achbar@gmail.com, pw = 12345678

## Fitur
### Front End
- Home (Halaman home, about, ulasan, partner, team, contact, map) 
- Lacak pengiriman
- Cek ongkos Kirim
- Login & Register

### User
- Halaman Dashboard
- Form Pengiriman & metode pembayaran
- Transaksi Pengiriman
- Lacak Pengiriman
- Top Up Saldo & Laporan Transaksi

### Admin
- Halaman Dashboard
- Data table (Nama Layanan, Jadwal Kurir, Pengiriman Paket)
- Eksport laporan pengiriman
- Import & eksport excel document

### Kurir
- Konfirmasi paket - Telah diambil oleh pengirim, Proses Pengiriman, Telah Sampai ke penerima

## Author
Final Projek MSIB5 - Group 2 (Kelompok 3)

- **[Khoirul Huda](https://github.com/khoirulhuda07)**
- **[Michail](https://github.com/michailtjhang)**
- **[Devia Fitri N](https://github.com/deviafnopiani)**
- **[Angelina Yulfaningtyas](https://github.com/angelin00)**
- **[Achbar Wahyudhi](https://github.com/achbar2001)**

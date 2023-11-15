<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![MIT License][license-shield]][license-url]
</p>

# About Logistik
Logistik adalah aplikasi pengiriman yang menawarkan berbagai keunggulan, termasuk pengiriman yang efisien, pengiriman yang cepat, dan tarif pengiriman yang mudah. Aplikasi ini adalah pilihan yang tepat untuk Anda yang ingin mengirim barang dengan mudah, cepat, dan efisien.

## Requirements

* [![Laravel][Laravel.com]][Laravel-url]
* PHP version : 8.1 - 8.2

## Instalasi
- download zip <a href="https://github.com/khoirulhuda07/final_project_Msib5_Kelompok3/archive/refs/heads/master.zip">Klik</a> 
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
- Generate app key, ketikan command :
  ```bash
  php artisan key:generate
  ```
- menjalankan storage di website, ketikan command :
  ```bash
  php artisan storage:link
  ```
- menjalankan sweetalert untuk publish the package assets, ketikkan command :
  ```bash
  php artisan sweetalert:publish
  ```
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

- username : admin
- password : admin

- username : user 
- password : user

## Fitur
### Front End
- Home (Halaman home) 

### user

### admin
- Halaman Dashboard

## Author
Final Projek MSIB5 - Group 2 (Kelompok 3)

- **[Khoirul Huda](https://github.com/khoirulhuda07)**
- **[Michail](https://github.com/michailtjhang)**
- **[Devia Fitri N](https://github.com/deviafnopiani)**
- **[Angelina Yulfaningtyas](https://github.com/angelin00)**
- **[Achbar Wahyudhi](https://github.com/achbar2001)**

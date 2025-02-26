
# Petunjuk

Pelan tapi pasti.


## Dowload dan Install

	=> Xampp 8.2.12 / PHP 8.2.12 (MYSQL)
	=> Composer v2.8.5
	=> GIT 2.48.1
	=> Node.js v22.14.0


## Cek di terminal CMD

	Php -v
	Composer --version
	Git --version
	Node -v
	Npm -v




## Install
Tentukan lokasi install (contoh di local disk D) dan buka terminal CMD.
```bash
  git clone https://github.com/Azlan-saja/peminatan_2025.git
```

```bash
  cd peminatan_2025
```
```bash
  composer install
```
```bash
  code .
```
* Cari file .env.example
* Ubah nama file tersebut menjadi .env


```bash
  php artisan key:generate
```
* sebelum "php artisan migrate" pastikan,
1. Field table users (database) sudah disesuaikan, atau abaikan jika ikut default.
    * lokasi setting table users di database/migrations/0001_01_01_000000_create_users_table.php
2. Buka XAMPP dan START MySQL (Apache tidak perlu di Start).
```bash
  php artisan migrate
```
```bash
  php artisan serve
```

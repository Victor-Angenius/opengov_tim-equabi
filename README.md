# OpenGov - Civic Tech Website

## Deskripsi

Website ini merupakan platform berbasis web untuk mendukung transparansi dan pelayanan publik berbasis teknologi (Civic Tech).

## Teknologi

* PHP / Laravel
* MySQL
* Bootstrap

## Cara Menjalankan Project

1. Clone repository:

   ```bash
   git clone https://github.com/Victor-Angenius/opengov_tim-equabi.git
   ```

2. Masuk ke folder:

   ```bash
   cd opengov_tim-equabi
   ```

3. Install dependency:

   ```bash
   composer install
   ```

4. Copy file environment:

   ```bash
   cp .env.example .env
   ```

5. Atur database di file `.env`:

   ```
   DB_DATABASE=nama_database
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Import database:

   * Buka phpMyAdmin
   * Import file: `database/db_opengov.sql`

7. Jalankan server:

   ```bash
   php artisan serve
   ```

## Catatan

Pastikan sudah menginstall:

* PHP
* Composer
* MySQL / Laragon

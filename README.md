# FlipPlay — Laravel REST API

FlipPlay adalah project REST API berbasis Laravel 12 yang digunakan untuk mengelola data media berupa film dan series serta koleksi media milik pengguna.

Project ini dibuat sebagai implementasi materi Laravel, meliputi Migration, Eloquent ORM, CRUD API, Form Request Validation, API Resource, dan relasi Many-to-Many.

## Teknologi yang Digunakan

- PHP
- Laravel 12
- MySQL
- Eloquent ORM
- Postman
- Git dan GitHub

## Fitur Utama

1. Menampilkan seluruh data media.
2. Mencari media berdasarkan judul.
3. Menampilkan detail media.
4. Menambahkan data media.
5. Memperbarui data media.
6. Menghapus data media.
7. Menambahkan media ke koleksi pengguna.
8. Menampilkan koleksi media pengguna.
9. Menghapus media dari koleksi pengguna.
10. Validasi input menggunakan Form Request.

## Struktur Database

Project ini menggunakan dua entitas utama:

- **Media**: menyimpan informasi media seperti judul, jenis, deskripsi, dan tahun rilis.
- **User**: menyimpan informasi pengguna.

Relasi antara User dan Media menggunakan Many-to-Many (`belongsToMany`) dengan tabel pivot `media_user`.

## Instalasi dan Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/alizaaca27-source/flipplay-api.git
cd flipplay-api
```

### 2. Install Dependency

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`, kemudian sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=flipplay_api
DB_USERNAME=root
DB_PASSWORD=
```

Buat database dengan nama `flipplay_api` melalui phpMyAdmin atau MySQL.

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Jalankan Migration

```bash
php artisan migrate
```

### 6. Isi Data Demo

```bash
php artisan db:seed --class=FlipPlayDemoSeeder
```

### 7. Jalankan Server

```bash
php artisan serve
```

Server secara default dapat diakses melalui:

`http://127.0.0.1:8000`

## API Endpoints

Base URL:

`http://127.0.0.1:8000/api`

| Method | Endpoint | Fungsi |
|---|---|---|
| GET | `/media` | Menampilkan seluruh media |
| GET | `/media?search=judul` | Mencari media berdasarkan judul |
| GET | `/media/{media}` | Menampilkan detail media |
| POST | `/media` | Menambahkan media |
| PUT | `/media/{media}` | Memperbarui media |
| PATCH | `/media/{media}` | Memperbarui media |
| DELETE | `/media/{media}` | Menghapus media |
| POST | `/users/{user}/collection/{media}` | Menambahkan media ke koleksi |
| GET | `/users/{user}/collection` | Menampilkan koleksi pengguna |
| DELETE | `/users/{user}/collection/{media}` | Menghapus media dari koleksi |

## Contoh Request

### Menambahkan Media

Method: `POST`

Endpoint: `/api/media`

```json
{
    "title": "Your Name",
    "type": "movie",
    "description": "An animated fantasy film.",
    "release_year": 2016
}
```

### Memperbarui Media

Method: `PATCH`

Endpoint: `/api/media/1`

```json
{
    "description": "Updated description for Interstellar."
}
```

### Menambahkan Media ke Koleksi

Method: `POST`

Endpoint: `/api/users/1/collection/1`

### Menghapus Media dari Koleksi

Method: `DELETE`

Endpoint: `/api/users/1/collection/1`

## Validasi dan Error Handling

Project ini menggunakan Form Request Validation untuk memvalidasi data yang diterima API.

Beberapa HTTP status code yang digunakan:

| Status Code | Keterangan |
|---|---|
| 200 | Request berhasil |
| 201 | Data berhasil dibuat |
| 204 | Data berhasil dihapus |
| 404 | Data tidak ditemukan |
| 409 | Data duplikat dalam koleksi |
| 422 | Validasi input gagal |

## Pengujian API

Pengujian endpoint dilakukan menggunakan Postman, meliputi:

- Pengambilan data media.
- Pencarian dan detail media.
- Penambahan, pembaruan, dan penghapusan media.
- Pengelolaan koleksi pengguna.
- Pengujian data duplikat dengan respons 409.
- Pengujian validasi input dengan respons 422.

## Repository

GitHub: https://github.com/alizaaca27-source/flipplay-api

---

**FlipPlay — Laravel REST API Project**

# Dokumentasi iProc Landing App

## Informasi Dokumen

| Field | Nilai |
| --- | --- |
| Nama Aplikasi | iProc Landing App |
| Penulis | [GYM] |
| Versi Dokumen | v0.1 |

## Riwayat Versi Dokumen

| Versi | Tanggal | Penulis | Perubahan |
| --- | --- | --- | --- |
| v0.1 | 24/04/2026 | [GYM] | Draft awal dokumen |

## Daftar Isi

- [1. Ringkasan Aplikasi](#1-ringkasan-aplikasi)
- [2. Ruang Lingkup Fungsional](#2-ruang-lingkup-fungsional)
- [3. Tech Stack](#3-tech-stack)
- [4. Arsitektur Aplikasi](#4-arsitektur-aplikasi)
- [5. Struktur Folder Penting](#5-struktur-folder-penting)
- [6. Routing dan Endpoint](#6-routing-dan-endpoint)
- [7. Konfigurasi Environment](#7-konfigurasi-environment)
- [8. Setup Lokal](#8-setup-lokal)
- [9. Build dan Deployment](#9-build-dan-deployment)
- [10. Logging, Monitoring, dan Operasional](#10-logging-monitoring-dan-operasional)

## 1. Ringkasan Aplikasi

iProc Landing App adalah aplikasi web public yang digunakan sebagai website pemasaran untuk ekosistem iProc. Aplikasi ini menyediakan homepage utama, halaman produk iProc Cloud, halaman produk iProc 2Go, halaman kebijakan privasi, serta endpoint formulir lead yang terintegrasi dengan Trello untuk kebutuhan follow-up tim internal.

Secara pendekatan teknis, aplikasi ini menggunakan pola server-rendered web application. Konten halaman dirender melalui Blade template di sisi server, kemudian diperkaya oleh asset frontend berbasis Tailwind CSS, JavaScript ringan, serta asset statis yang berada di folder `public`.

### Fungsi utama aplikasi

- Menyediakan homepage perusahaan dan landing page produk.
- Mendukung tampilan bilingual untuk bahasa Inggris dan Bahasa Indonesia.
- Mengumpulkan lead dari halaman iProc Cloud melalui form.
- Mengirim lead tersebut ke Trello sebagai card baru beserta custom field terkait.
- Mencatat aktivitas form ke log harian untuk kebutuhan audit dan troubleshooting.

## 2. Ruang Lingkup Fungsional

| Area | Deskripsi |
| --- | --- |
| Homepage | Menampilkan profil singkat, fitur utama, kapabilitas, client, industri, dan call to action. |
| iProc Cloud | Menampilkan problem statement, solusi, fitur, pricing comparison, compliance, dan lead form. |
| iProc 2Go | Menampilkan informasi produk mobile, benefit, dan call to action. |
| Privacy Policy | Menyediakan halaman kebijakan privasi untuk iProc 2Go. |
| Lead Endpoint | Menerima submission form dan meneruskannya ke Trello. |
| Localization | Mengelola konten bahasa Inggris dan Indonesia berbasis route dan file translation. |

## 3. Tech Stack

| Layer | Teknologi | Keterangan |
| --- | --- | --- |
| Backend | PHP 8.3.x dan Laravel 13 | Menangani routing, rendering view, middleware, logging, dan integrasi eksternal. |
| Templating | Blade | Dipakai untuk layout utama, page entry, dan partial per section. |
| Frontend Build | Vite 8 | Digunakan untuk build asset CSS dan JavaScript modern. |
| Styling | Tailwind CSS 4 | Menjadi fondasi styling utama pada asset yang dibangun lewat Vite. |
| Frontend Utility | jQuery, Flowbite, AOS, Tiny Slider | Dipakai untuk interaksi UI tertentu pada halaman public. |
| HTTP Client | Laravel HTTP Client | Dipakai untuk komunikasi ke Trello API. |
| Database | SQLite | Menjadi database default project saat ini. |
| Logging | Laravel Logging | Menggunakan channel default dan channel harian khusus untuk form. |
| Integrasi Eksternal | Trello API | Digunakan untuk pembuatan card lead dan sinkronisasi custom field. |

## 4. Arsitektur Aplikasi

Aplikasi ini menggunakan arsitektur monolith ringan berbasis Laravel. Seluruh komponen inti berada dalam satu codebase yang mencakup routing, view rendering, localization, dan integrasi lead form.

### Komponen arsitektur

| Komponen | Peran |
| --- | --- |
| Routes | Mendefinisikan endpoint public, halaman bilingual, redirect URL lama, dan endpoint API form. |
| Middleware | Mengatur locale berdasarkan URL dan menerapkan translation ke konten HTML. |
| Blade Views | Merender halaman public dengan struktur layout dan partial yang modular. |
| Translation Files | Menyimpan copywriting bahasa Inggris dan Indonesia di folder `lang/en` dan `lang/id`. |
| TrelloLeadController | Mengelola proses submission form, validasi, logging, dan sinkronisasi ke Trello. |
| Logging Layer | Mencatat aktivitas form ke log harian agar mudah ditelusuri bila terjadi kegagalan. |

### Alur request secara umum

- User membuka halaman public dari browser.
- Request masuk ke Laravel route layer.
- Middleware `SetLocale` menentukan locale dari segmen URL.
- Middleware `ApplyTranslations` menerapkan text translation ke elemen HTML bertanda khusus.
- Laravel merender Blade page dan partial yang sesuai.
- Browser memuat asset hasil Vite dan asset statis dari folder `public/lib`.

### Alur khusus lead form

- User mengirim form dari halaman iProc Cloud.
- Endpoint `/api/trello_card.php` menerima request.
- Controller memeriksa method request dan honeypot anti-spam.
- Payload dinormalisasi dan divalidasi.
- Data submission dicatat ke log backup.
- Controller membuat card baru di Trello.
- Custom field Trello disinkronkan berdasarkan mapping internal.
- Response JSON sukses atau gagal dikembalikan ke frontend.

## 5. Struktur Folder Penting

```text
app/
  Http/
    Controllers/
    Middleware/
bootstrap/
config/
database/
docs/
lang/
public/
  build/
  lib/
resources/
  css/
  js/
  views/
routes/
storage/
tests/
```

### Penjelasan folder inti

| Path | Keterangan |
| --- | --- |
| `routes/web.php` | Berisi seluruh route public dan endpoint lead form. |
| `app/Http/Controllers` | Berisi controller, termasuk `TrelloLeadController`. |
| `app/Http/Middleware` | Berisi middleware locale dan translasi HTML. |
| `resources/views/pages` | Entry point halaman utama. |
| `resources/views/partials` | Komponen section untuk homepage, iProc Cloud, dan iProc 2Go. |
| `lang/en` dan `lang/id` | File translation untuk dua bahasa. |
| `public/lib` | Asset statis legacy seperti image, CSS minified, dan JavaScript helper. |
| `public/build` | Output build dari Vite untuk production. |

## 6. Routing dan Endpoint

| URL | Jenis | Fungsi |
| --- | --- | --- |
| `/` | GET | Homepage utama. |
| `/iproc-cloud` | GET | Landing page iProc Cloud. |
| `/iproc-cloud/form-success` | GET | Halaman sukses setelah submit form. |
| `/iproc-2go` | GET | Landing page iProc 2Go. |
| `/iproc-2go/privacy-policy` | GET | Halaman kebijakan privasi. |
| `/id/...` | GET | Versi Bahasa Indonesia untuk halaman public. |
| `/api/trello_card.php` | POST dan OPTIONS | Endpoint integrasi lead form ke Trello. |
| `/up` | GET | Health check bawaan Laravel. |

## 7. Konfigurasi Environment

Environment variable penting yang perlu tersedia adalah sebagai berikut.

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com
APP_KEY=

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync

LOG_CHANNEL=stderr
LOG_LEVEL=info

TRELLO_LEAD_KEY=
TRELLO_LEAD_TOKEN=
TRELLO_LEAD_LIST=
```

### Keterangan variabel penting

- `APP_KEY` wajib dihasilkan melalui `php artisan key:generate`.
- `TRELLO_LEAD_KEY`, `TRELLO_LEAD_TOKEN`, dan `TRELLO_LEAD_LIST` wajib diisi agar form lead dapat berfungsi.
- `QUEUE_CONNECTION` saat ini menggunakan mode `sync`, sehingga queue worker tidak wajib untuk fungsi inti aplikasi.

## 8. Setup Lokal

1. Pastikan runtime lokal menggunakan PHP 8.3.x.

Contoh pada MAMP:

```bash
/Applications/MAMP/bin/php/php8.3.14/bin/php -v
```

2. Install dependency backend dengan Composer.

```bash
/Applications/MAMP/bin/php/php8.3.14/bin/php /Applications/MAMP/bin/php/composer install
```

3. Salin environment file lalu generate application key.

```bash
cp .env.example .env
php artisan key:generate
```

4. Jalankan migration.

```bash
php artisan migrate
```

5. Install dependency frontend.

```bash
npm install
```

6. Jalankan mode development.

```bash
composer run dev
```

Command tersebut akan menjalankan Laravel server, queue listener, log tailing, dan Vite dev server secara bersamaan.

## 9. Build dan Deployment

### Build production

Sebelum build, pastikan binary `php` yang aktif pada server/deployment runner sudah mengarah ke PHP 8.3.x yang sama dengan runtime aplikasi.

```bash
php -v
composer check-platform-reqs
```

```bash
composer install --no-dev --optimize-autoloader
npm ci
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Langkah deployment yang direkomendasikan

- Clone repository ke server deployment.
- Siapkan file `.env` production.
- Pastikan CLI `php` dan PHP-FPM/web server sama-sama menggunakan PHP 8.3.x.
- Install dependency Composer tanpa dev package.
- Install dependency Node dan build asset Vite.
- Jalankan migration dengan opsi `--force`.
- Pastikan document root web server mengarah ke folder `public`.
- Berikan permission tulis ke folder `storage` dan `bootstrap/cache`.
- Aktifkan cache konfigurasi Laravel.

### Command ringkas deployment

```bash
git pull origin <branch>
composer install --no-dev --optimize-autoloader
npm ci
npm run build
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Konfigurasi server

Untuk production, konfigurasi yang direkomendasikan adalah Linux server dengan Nginx atau Apache dan PHP-FPM. Document root wajib diarahkan ke folder `public` dari project Laravel, dan runtime PHP-FPM perlu disetel ke PHP 8.3.x agar konsisten dengan dependency yang dikunci oleh Composer.

## 10. Logging, Monitoring, dan Operasional

Selain channel log default Laravel, aplikasi ini memiliki channel harian khusus untuk submission form iProc Cloud. File log akan tersimpan dalam pola nama berikut:

```text
storage/logs/iproc-cloud-forms-YYYY-MM-DD.log
```

### Informasi yang tercatat dalam log form

- Timestamp dan metadata request.
- Payload hasil normalisasi.
- Status sukses atau gagal pengiriman ke Trello.
- Validation error.
- Warning saat sinkronisasi custom field.
- Exception message bila terjadi kegagalan.

### Verifikasi pasca deployment

- Pastikan homepage dapat diakses dengan normal.
- Pastikan halaman `/iproc-cloud` dan `/iproc-2go` tampil benar.
- Pastikan route bilingual dengan prefix `/id` berfungsi.
- Pastikan asset dari `public/build` termuat.
- Pastikan health check `/up` memberikan respons sehat.
- Uji submission form dan verifikasi card Trello berhasil dibuat.
- Periksa log harian form bila terjadi kegagalan.

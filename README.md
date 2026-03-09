# Portal Magang Sragen (POMAS)

**Portal Magang Sragen (POMAS)** adalah aplikasi web untuk mengelola **pendaftaran dan pengajuan magang** di lingkungan **Pemerintah Kabupaten Sragen**.

Aplikasi ini ditujukan bagi **pelajar dan mahasiswa** sebagai pemohon magang, serta **admin OPD** untuk melakukan verifikasi, persetujuan, dan pengelolaan dokumen magang secara terpusat dan digital.

---

## ✨ Fitur

### Pemohon (Pelajar / Mahasiswa)
- Registrasi & Login (dilengkapi **Google reCAPTCHA**)
- Lupa Password & Reset Password via Email
- Manajemen Profil
- Pengajuan Usulan Magang (maks. 1 aktif)
- Upload & Download Dokumen
- Monitoring Status: Diproses, Disetujui, Ditolak, Selesai

### Admin
- Admin Panel menggunakan **Filament v4**
- Manajemen OPD
- Verifikasi & Persetujuan Pengajuan
- Upload Dokumen Balasan
- Manajemen konten landing page:
  - **FAQ** (admin-editable)
  - **Alur Pendaftaran** (admin-editable)
  - **Persyaratan Pendaftaran** (admin-editable)

### Landing Page
- Informasi alur pendaftaran (stepper)
- Persyaratan pendaftaran
- FAQ (Frequently Asked Questions)
- Lokasi kantor

---

## 🧱 Teknologi

| Komponen | Teknologi |
|---|---|
| Backend | Laravel 12 (PHP ≥ 8.2) |
| Frontend | Blade Template |
| Styling | CSS (custom) |
| Database | MySQL |
| Admin Panel | Filament v4 |
| Captcha | Google reCAPTCHA v2 (anhskohbo/no-captcha) |
| Environment | Laragon (disarankan untuk lokal) |

---

## ⚙️ Instalasi & Setup Lokal

### 1. Clone Repository

```bash
git clone https://github.com/SesarWP/pendaftaran-app.git
cd pendaftaran-app
```

### 2. Install Dependency

```bash
composer install
```

### 3. Setup Environment

```bash
cp .env.example .env
```

Atur konfigurasi database di `.env`:

```env
DB_DATABASE=pendaftaran-app
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate App Key

```bash
php artisan key:generate
```

### 5. Migrasi & Seed Database

```bash
php artisan migrate --seed
```

### 6. Storage Link (WAJIB untuk upload file)

```bash
php artisan storage:link
```

### 7. Jalankan Aplikasi

```bash
php artisan serve
```

Akses aplikasi di: `http://127.0.0.1:8000`

---

## 🚀 Deploy ke Hosting

### Konfigurasi `.env` Production

```env
APP_NAME=POMAS
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com

DB_HOST=host_hosting
DB_DATABASE=nama_database
DB_USERNAME=username_hosting
DB_PASSWORD=password_hosting

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=email@anda.com
MAIL_PASSWORD=app_password

NOCAPTCHA_SITEKEY=site-key-dari-google
NOCAPTCHA_SECRET=secret-key-dari-google
```

### Perintah di Server

```bash
php artisan migrate --seed
php artisan storage:link
php artisan optimize
```

### Persyaratan Hosting
- PHP ≥ 8.2
- MySQL
- Document root mengarah ke folder `/public`

---

## �📄 Aturan Pengajuan Magang

* Pemohon **hanya boleh punya 1 pengajuan aktif**
* Pemohon **boleh mengajukan ulang** jika status terakhir:
  * `DITOLAK`
  * `SELESAI`
* Jika status `DIPROSES` / `DISETUJUI` → Form terkunci

---

## 📎 Dokumen Pengajuan

### Dokumen Wajib Pemohon
* Surat Pengantar (PDF)
* Transkrip / Rapor (PDF / JPG / PNG)

### Dokumen Opsional
* CV (PDF)
* Proposal (PDF)

### Dokumen Admin
* Surat Jawaban Izin
* Surat Keterangan Selesai

---

## 👩‍💻 Developer

Dikembangkan oleh:
- **Rizky Amalia Nugrahaeni**
- **Syifa Nur Aini**

Dilanjutkan oleh:
- **Aisyah Salsa Billa Atiin Vira**
- **Sesar Wiratmaja Prakosa**
- **Andhika Yusuf Alwi Fauzan**

---

## 📜 Lisensi

Project ini dikembangkan untuk kebutuhan internal Pemerintah Kabupaten Sragen.

# Portal Magang Sragen (POMAS)

Sistem **Pendaftaran & Pengajuan Magang Pemerintah Kabupaten Sragen** berbasis web.

Aplikasi ini dibangun menggunakan **Laravel 12** dengan pemisahan yang jelas antara **Pemohon** (frontend publik) dan **Admin** (Filament).

---

## ✨ Fitur Utama

### Pemohon (SMK / Mahasiswa)

* Registrasi & Login Pemohon
* Manajemen Profil Pemohon
* Pengajuan Usulan Magang (1 aktif, terkunci sesuai status)
* Upload & Download Dokumen Magang
* Tracking Status Pengajuan (Diproses / Disetujui / Ditolak / Selesai)

### Admin

* Admin Panel menggunakan **Filament v4**
* Manajemen OPD
* Verifikasi & Persetujuan Usulan Magang
* Upload Dokumen Balasan

---

## 🧱 Teknologi

* **Backend**: Laravel 12 (PHP 8.3)
* **Frontend**: Blade (tanpa Tailwind, tanpa Vite)
* **Styling**: CSS (`public/css/pemohon.css`)
* **Database**: MySQL
* **Admin Panel**: Filament v4
* **Environment**: Laragon (recommended)

---

## ⚙️ Cara Setup Project

### 1️⃣ Clone Repository

```bash
git clone https://github.com/username/portal-magang-sragen.git
cd portal-magang-sragen
```

---

### 2️⃣ Install Dependency

```bash
composer install
```

---

### 3️⃣ Setup Environment

Copy file `.env.example` menjadi `.env`

```bash
cp .env.example .env
```

Atur konfigurasi database di `.env`:

```
DB_DATABASE=portal_magang
DB_USERNAME=root
DB_PASSWORD=
```

---

### 4️⃣ Generate App Key

```bash
php artisan key:generate
```

---

### 5️⃣ Migrasi Database

```bash
php artisan migrate
```

Jika ada seeder:

```bash
php artisan db:seed
```

---

### 6️⃣ Storage Link (WAJIB untuk upload file)

```bash
php artisan storage:link
```

---

### 7️⃣ Jalankan Aplikasi

```bash
php artisan serve
```

Akses aplikasi di:

```
http://127.0.0.1:8000
```

---

## 📄 Aturan Pengajuan Magang

* Pemohon **hanya boleh punya 1 pengajuan aktif**
* Pemohon **boleh mengajukan ulang** jika status terakhir:

  * `DITOLAK`
  * `SELESAI`
* Jika status:

  * `DIPROSES` / `DISETUJUI`
    → Form terkunci

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

Semua file disimpan di:

```
storage/app/public/applications/
```
---

## 👩‍💻 Developer

Dikembangkan oleh:
**Rizky Amalia Nugrahaeni**
**Syifa Nur Aini**

---

## 📜 Lisensi

Project ini dikembangkan untuk kebutuhan internal Pemerintah Kabupaten Sragen.

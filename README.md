# 🕌 PC IMM Sukoharjo — Website Resmi

Website organisasi **Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah (PC IMM) Sukoharjo** berbasis Laravel 10+.

---

## 🚀 Fitur

- **Role-Based Access Control** (Super Admin, Admin Bidang, Publik)
- **Manajemen Konten** — Berita, Kegiatan, Program Kerja per Bidang
- **Upload Media** — Foto dan video untuk setiap konten
- **Halaman Publik** — Tampilan modern untuk pengunjung
- **Filter & Pagination** — Konten mudah dicari dan dinavigasi
- **Dashboard Admin** — Statistik dan aksi cepat

---

## ⚙️ Persyaratan Sistem

- PHP >= 8.1
- Composer
- MySQL >= 5.7 / MariaDB >= 10.3
- Node.js (opsional, untuk asset build)
- Apache/Nginx dengan mod_rewrite aktif

---

## 📦 Instalasi

### 1. Clone / Extract Project
```bash
unzip pc-imm-sukoharjo.zip -d pc-imm-sukoharjo
cd pc-imm-sukoharjo
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` sesuai konfigurasi database Anda:
```env
APP_NAME="PC IMM Sukoharjo"
APP_URL=http://localhost/pc-imm-sukoharjo/public

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pc_imm_sukoharjo
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Buat Database
Buat database MySQL dengan nama `pc_imm_sukoharjo` (atau sesuaikan dengan `.env`):
```sql
CREATE DATABASE pc_imm_sukoharjo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 5. Jalankan Migration & Seeder
```bash
php artisan migrate --seed
```

### 6. Link Storage
```bash
php artisan storage:link
```

### 7. Jalankan Server (Development)
```bash
php artisan serve
```

Buka di browser: `http://localhost:8000`

---

## 🔑 Akun Bawaan (Seeder)

| Role | Email | Password |
|------|-------|----------|
| Super Admin | superadmin@pcimm-sukoharjo.org | password |
| Admin BOK | admin.bok@pcimm-sukoharjo.org | password |
| Admin RPKKS | admin.rpkks@pcimm-sukoharjo.org | password |
| Admin TKK | admin.tkk@pcimm-sukoharjo.org | password |
| Admin SPM | admin.spm@pcimm-sukoharjo.org | password |
| Admin HPKP | admin.hpkp@pcimm-sukoharjo.org | password |
| Admin Medkom | admin.medkom@pcimm-sukoharjo.org | password |

> ⚠️ **Ganti semua password setelah instalasi di lingkungan produksi!**

---

## 📁 Struktur Bidang

| Bidang | Singkatan | Warna |
|--------|-----------|-------|
| Bidang Organisasi & Kader | BOK | Biru |
| Riset, Pengembangan Keilmuan & Kajian Sosial | RPKKS | Ungu |
| Tabligh, Kajian Keagamaan & Kemuhammadiyahan | TKK | Hijau |
| Sosial, Pemberdayaan Masyarakat | SPM | Oranye |
| Hikmah, Politik & Kebijakan Publik | HPKP | Merah |
| Media & Komunikasi | Medkom | Cyan |

---

## 🗂️ Struktur URL

| URL | Keterangan |
|-----|------------|
| `/` | Halaman utama publik |
| `/konten` | Daftar semua konten |
| `/konten/{slug}` | Detail konten |
| `/bidang` | Daftar bidang |
| `/bidang/{bidang}` | Detail bidang |
| `/login` | Halaman login |
| `/super-admin/dashboard` | Dashboard Super Admin |
| `/admin/dashboard` | Dashboard Admin Bidang |

---

## 🔧 Konfigurasi Nginx (Opsional)

```nginx
server {
    listen 80;
    server_name pcimm-sukoharjo.org;
    root /var/www/pc-imm-sukoharjo/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

---

## 📞 Kontak

**PC IMM Sukoharjo**
- Website: [pcimm-sukoharjo.org](https://pcimm-sukoharjo.org)
- Email: info@pcimm-sukoharjo.org

---

*Dibangun dengan ❤️ menggunakan Laravel 10+*

# PUB Web (legacy)

Website **lama** PUB (Pemberdayaan Umat Berkelanjutan, Universitas Nasional PASIM Bandung), live di <https://pubpasim.org>. Dibuat oleh kakak tingkat dengan Laravel, lalu dinaikkan versinya dan dibungkus Docker. Website baru ada di repo `pub-web` (<https://new.pubpasim.org>); repo ini diperlakukan sebagai referensi dan sumber migrasi, jadi ubah seperlunya saja (perbaikan keamanan atau bug kritis).

> Catatan: `origin/main` lebih baru dari banyak checkout lokal (Laravel 13, PHP 8.5, `Dockerfile`, tes). Jalankan `git pull` sebelum bekerja.

## Isi

Situs publik (profil PUB, pembina, jadwal PPMB/TPA/survei/wawancara, struktur organisasi, dokumentasi, infaq bulanan, formulir online) dan area admin (login) untuk mengelola data:

- mahasiswa dan alumni (profil, pendidikan, pengalaman, aktivitas, dokumen), angkatan, jurusan, sekolah, daerah;
- seleksi: jadwal, hasil seleksi, peserta wawancara akhir, syarat dan ketentuan;
- organisasi PUB dan PPMB, pelatihan, periode, status sosial dan status PUB;
- infaq, dokumentasi, akun pengguna.

Nama tabel dan kolom memakai bahasa Indonesia (`tb_mahasiswa`, `tb_angkatan`, dst.).

## Stack

- PHP 8.4+ (image produksi `php:8.5-fpm`), Laravel 13, Blade
- Vite 8 + Tailwind CSS 3 untuk aset
- Database: PostgreSQL (`pubpasim_old`, dimigrasi dari MariaDB); sesi dan antrean memakai driver `database`
- Pest 4 untuk tes
- Produksi: nginx + php-fpm + 12 queue worker di bawah supervisor, dalam satu container (`Dockerfile`, konfigurasi di `docker/`)

## Menjalankan lokal

```bash
composer install
cp .env.example .env      # isi DB_* dan APP_KEY
php artisan key:generate
npm ci && npm run dev     # atau npm run build
php artisan serve
```

Catatan: tiga migrasi lama rusak jika dijalankan dari nol, dan `route:list` gagal karena ada controller yang hilang. Skema berasal dari dump produksi; jangan "memperbaikinya" tanpa memeriksa database produksi dulu.

## Tes

Tes ada di `tests/Feature/` (`AccessControlTest`, `AlumniScopeTest`). Jalankan dengan PHP 8.5 setelah `cp .env.example .env`:

```bash
./vendor/bin/pest
```

## Akses dan keamanan

- `RequireLogin` melindungi seluruh grup `web` dan gagal tertutup. Halaman publik baru **wajib** ditambahkan ke `PUBLIC_PATHS` di `app/Http/Middleware/RequireLogin.php`.
- `RestrictAlumni`: akun level `alumni` hanya boleh memakai rute `alumni_adminController` dan hanya untuk datanya sendiri. Rute alumni baru **wajib** didaftarkan di `RULES`.
- Aksi yang mengubah data harus lewat POST/PUT/DELETE dengan CSRF (hapus memakai komponen `<x-delete-button>`). Jangan membuat rute GET yang mengubah state.
- Masih terbuka: password di `tb_user` masih plaintext (rencana: perlebar kolom lalu rehash saat login), dan `db_pub.sql` di repo memuat data akun. Jangan menambah kredensial ke repo.

## Deploy

Push ke `main` otomatis di-deploy oleh Dokploy (build type **Dockerfile**, bukan Nixpacks) di VPS yang sama dengan website baru. Untuk menaikkan versi PHP atau nginx, ubah `ARG PHP_VERSION` / `NGINX_VERSION` di `Dockerfile` lalu push.

- Health check container: `/up`.
- Container menolak start jika `APP_KEY` kosong.
- Bind mount persisten: `/root/old-public/file` dan `/root/old-public/imgs` ke `/app/public/file` dan `/app/public/imgs`. Folder lain di `public/` (mis. `data_file`) tidak persisten.
- `nixpacks.toml` hanya sisa konfigurasi lama.

Jangan menjalankan perintah ke database produksi tanpa izin dan backup.

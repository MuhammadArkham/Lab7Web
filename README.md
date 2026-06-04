# Laporan Praktikum Pemrograman Web (Modul 1 - 12)

Repositori ini berisi hasil pengerjaan **Praktikum Pemrograman Web** yang mencakup pengembangan sistem backend menggunakan **CodeIgniter 4** dan frontend menggunakan **VueJS 3 (Single Page Application)**. Seluruh modul dan tugas praktikum telah dikerjakan secara komprehensif.

## 🚀 Fitur yang Telah Diselesaikan

### Backend (CodeIgniter 4)
- **Modul 1-2 (Dasar CI4 & CRUD):** Routing dasar, Controller logic, dan operasi CRUD (Create, Read, Update, Delete) pada tabel `artikel` berjalan dengan baik.
- **Modul 3 (Layout Sederhana):** Penerapan Layout, penggunaan `template/header.php`, `template/footer.php`, serta integrasi *View Cell* `ArtikelTerkini`.
- **Modul 4 (Sistem Login):** Implementasi tabel `user`, form otentikasi login, serta pengamanan halaman `/admin` menggunakan *Filter* (Auth). Password admin telah dienkripsi secara aman (BCrypt Hash).
- **Modul 5 & 9 (AJAX Pagination & Search):** 
  - Halaman admin telah dimodifikasi menggunakan **jQuery AJAX**.
  - Fitur pencarian data (berdasarkan nama dan filter kategori) berfungsi secara *real-time*.
  - Pagination dinamis dari CodeIgniter 4 berhasil diterapkan.
  - **Tugas Tambahan Diselesaikan:** Penambahan fitur **Indikator Loading** saat *fetching* data AJAX, dan integrasi fitur **Sorting** (Urutkan tabel) dengan mengklik header (ID atau Judul).
- **Modul 7 (Relasi & Upload File):** Fungsi *join table* (`artikel` dan `kategori`) serta pengunggahan file gambar thumbnail tersimpan otomatis ke direktori `public/gambar/`.
- **Modul 10 (RESTful API):** Pengembangan API menggunakan `ResourceController` CI4 (`Post.php`) yang menyajikan data dalam format JSON dan telah disesuaikan (CORS diaktifkan) untuk dapat diakses oleh Frontend.

### Frontend (VueJS 3 SPA)
- **Modul 11-12 (VueJS Frontend):**
  - Pembuatan *Single Page Application* menggunakan Vue Router (Halaman Home, Artikel, About).
  - Tampilan UI di-*improvisasi* agar sejajar dengan "Layout Sederhana" di modul CI4, memastikan antarmuka yang profesional dan konsisten.
  - Integrasi API *(Axios)* untuk menampilkan, menambah, dan menghapus artikel langsung dari frontend tanpa perlu *refresh* halaman.

## 📸 Panduan Screenshot (Untuk Mahasiswa)
> **Catatan Tambahan untuk Laporan:** Silakan sisipkan gambar screenshot dari halaman-halaman berikut ini di bawah sini untuk melengkapi laporan Anda:
> 1. Screenshot Halaman Beranda (Menampilkan Artikel Terkini)
> 2. Screenshot Halaman Login & Dashboard Admin
> 3. Screenshot saat melakukan Pencarian / Sorting di AJAX (Modul 9)
> 4. Screenshot aplikasi Frontend VueJS Anda beroperasi

## ⚙️ Persyaratan Sistem & Instalasi
1. Clone repositori ini.
2. Jalankan **XAMPP** (Pastikan Apache & MySQL menyala).
3. Buat database `lab_ci4` dan import tabel dari panduan modul (atau aplikasi akan otomatis membuatnya jika disesuaikan).
4. Akses melalui `http://localhost/lab11_php_ci/ci4/public`.
5. Login Admin: `admin@email.com` / `admin123`.

*Dikerjakan dengan dedikasi untuk menyelesaikan tugas Praktikum Pemrograman Web.*

# Laporan Praktikum Pemrograman Web 2 - Lab7Web

![PHP](https://img.shields.io/badge/PHP-8.1-%23777BB4?style=flat&logo=php)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4-%23EF4223?style=flat&logo=codeigniter)
![MySQL](https://img.shields.io/badge/MySQL-8.0-%234479A1?style=flat&logo=mysql)
![License](https://img.shields.io/badge/License-MIT-%23-yellow?style=flat)
![Repo Size](https://img.shields.io/github/repo-size/MuhammadArkham/Lab7Web?style=flat)
![Last Commit](https://img.shields.io/github/last-commit/MuhammadArkham/Lab7Web?style=flat)

---

**Mata Kuliah:** Pemrograman Web 2  
**Dosen Pengampu:** Agung Nugroho, S.Kom., M.Kom.  
**Nama:** Muhammad Arkhamullah R.A  
**NIM:** 312410545  
**Kelas:** I241E  
**Program Studi:** Teknik Informatika  
**Universitas Pelita Bangsa**

---

## Daftar Isi

1. [Praktikum 1: PHP Framework (CodeIgniter)](#praktikum-1-php-framework-codeigniter)
2. [Praktikum 2: Framework Lanjutan (CRUD)](#praktikum-2-framework-lanjutan-crud)
3. [Praktikum 3: View Layout dan View Cell](#praktikum-3-view-layout-dan-view-cell)
4. [Praktikum 4: Framework Lanjutan (Modul Login)](#praktikum-4-framework-lanjutan-modul-login)
5. [Praktikum 5: Pagination dan Pencarian](#praktikum-5-pagination-dan-pencarian)
6. [Praktikum 6: Pencarian Lanjutan dan Relasi Tabel](#praktikum-6-pencarian-lanjutan-dan-relasi-tabel)
7. [Praktikum 9: AJAX dan Real-time Pagination](#praktikum-9-ajax-dan-real-time-pagination)
8. [Struktur Folder](#struktur-folder)

---

## Praktikum 1: PHP Framework (CodeIgniter)

### Tujuan Praktikum

1. Mahasiswa mampu memahami konsep dasar Framework dan pola MVC (Model-View-Controller).
2. Mahasiswa mampu menggunakan Framework CodeIgniter 4 untuk membuat program web sederhana.

### Langkah-langkah Praktikum

1. **Mengaktifkan Ekstensi PHP.** Membuka file `php.ini` pada direktori PHP kemudian mengaktifkan ekstensi `intl` dan `mbstring` dengan menghapus tanda titik koma (`;`) pada baris ekstensi yang sesuai.

2. **Instalasi dan Konfigurasi CodeIgniter 4.** Mengekstrak framework CodeIgniter 4 ke dalam folder `htdocs`, melakukan rename pada file `env` menjadi `.env`, dan mengubah nilai environment menjadi `development`.

3. **Membuat Route.** Menambahkan baris `$routes->get('/about', 'Page::about');` pada file `app/Config/Routes.php` untuk mendefinisikan rute ke halaman About.

4. **Membuat Controller.** Membuat file `Page.php` dalam direktori `app/Controllers/` dengan class `Page` yang mewarisi `BaseController`. Setiap method (`about()`, `contact()`, `faqs()`) mereturn view yang merender halaman statis HTML.

5. **View Layout.** Memisahkan struktur dasar HTML menjadi file `header.php` dan `footer.php` di dalam folder `Views/template/`. Halaman konten dipanggil menggunakan `<?= $this->include('template/header') ?>` dan `<?= $this->include('template/footer') ?>`.

### Pertanyaan dan Tugas

> **Pertanyaan:** Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga semua link pada navigasi header dapat menampilkan tampilan dengan layout yang sama.
>
> **Jawaban:** Telah diselesaikan dengan menambahkan method `contact()` dan `faqs()` pada file `Page.php`. Seluruh method mereturn view yang menggunakan layout template `header.php` dan `footer.php` secara seragam.

### Dokumentasi Screenshot

| Halaman | Screenshot |
|---------|------------|
| Halaman Beranda (Landing Page) | ![Halaman Beranda](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/00_user_beranda.png?raw=true) |
| Halaman About | ![Halaman About](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/00_user_halaman_about.png?raw=true) |

---

## Praktikum 2: Framework Lanjutan (CRUD)

### Tujuan Praktikum

1. Mahasiswa mampu memahami konsep dasar Model dalam arsitektur CI4.
2. Mahasiswa mampu mengimplementasikan sistem CRUD (Create, Read, Update, Delete).

### Langkah-langkah Praktikum

1. **Membuat Database.** Membuat database MySQL `lab_ci4` dan tabel `artikel` yang terdiri dari kolom `id`, `judul`, `isi`, `slug`, `gambar`, `status`, `created_at`, dan `updated_at`.

2. **Konfigurasi Koneksi Database.** Mengisi parameter koneksi database (hostname, username, password, database) pada file `.env`.

3. **Membuat Model.** Membuat file `app/Models/ArtikelModel.php` yang mendefinisikan properti `$table`, `$allowedFields`, dan `$useTimestamps`.

4. **Fungsi Read (Menampilkan Data).** Menggunakan method `$model->findAll()` pada controller `Artikel` untuk mengambil seluruh data dari tabel dan merendernya pada view `artikel/index.php`.

5. **Fungsi Create (Menambahkan Data).** Membuat form `add.php` dan menangani request POST dengan validasi menggunakan `$this->validate()`. Data disimpan menggunakan `$model->insert($data)`.

6. **Fungsi Update (Mengubah Data).** Menggunakan method `$model->update($id, $data)` untuk memodifikasi record berdasarkan ID.

7. **Fungsi Delete (Menghapus Data).** Menghapus record dari database menggunakan `$model->delete($id)`.

### Pertanyaan dan Tugas

> **Pertanyaan:** Selesaikan programnya (CRUD) sesuai Langkah-langkah yang ada.
>
> **Jawaban:** Seluruh fungsi CRUD untuk tabel `artikel` telah berjalan penuh dan terintegrasi dengan database. Implementasi mencakup form input, validasi server-side, upload file gambar, dan notifikasi flash message.

### Dokumentasi Screenshot

| Tampilan | Screenshot |
|----------|------------|
| Daftar Artikel Publik | ![Daftar Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/01_user_daftar_artikel.png?raw=true) |
| Halaman Admin - Daftar Artikel | ![Admin Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/02_admin_daftar_artikel.png?raw=true) |
| Form Tambah Artikel dengan Validasi | ![Tambah Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/03_admin_tambah_validasi.png?raw=true) |
| Form Edit Artikel | ![Edit Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/04_admin_edit_artikel_2.png?raw=true) |
| Konfirmasi Hapus Artikel | ![Hapus Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/05_admin_delete_confirm.png?raw=true) |

---

## Praktikum 3: View Layout dan View Cell

### Tujuan Praktikum

1. Mahasiswa mampu mengelola antarmuka (UI) menggunakan teknik Layouting di CI4.
2. Mahasiswa mampu memahami penggunaan View Cell untuk merender komponen dinamis.

### Langkah-langkah Praktikum

1. **Penerapan Layout Bawaan.** Memanfaatkan method `$this->extend('layout/main')` dan mendefinisikan `$this->section('content')` sebagai area konten yang akan dirender di dalam layout utama.

2. **Komponen Modular.** Memisahkan elemen UI seperti sidebar, header, dan navigasi ke dalam file terpisah untuk menghindari duplikasi kode.

3. **Konfigurasi View Cell.** Menggunakan pemanggilan View Cell seperti `view_cell('ArtikelTerkini::render')` untuk merender komponen yang memerlukan logika server-side secara modular.

### Pertanyaan dan Tugas

> **Pertanyaan:** Implementasikan sistem Layouting pada project Anda.
>
> **Jawaban:** Seluruh view pada aplikasi kini menggunakan sistem pewarisan layout. File `Views/layout/main.php` menjadi template utama, sedangkan setiap halaman konten hanya mendefinisikan section `content` yang akan dirender di dalamnya.

### Dokumentasi Screenshot

| Tampilan | Screenshot |
|----------|------------|
| Halaman About dengan Layout dan Sidebar | ![About Layout](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/00_user_halaman_about.png?raw=true) |

---

## Praktikum 4: Framework Lanjutan (Modul Login)

### Tujuan Praktikum

Mahasiswa mampu membuat sistem autentikasi pengguna menggunakan Session bawaan CodeIgniter 4.

### Langkah-langkah Praktikum

1. **Membuat Tabel User.** Membuat tabel `user` di database dengan kolom `id`, `username`, `useremail`, dan `userpassword`. Membuat file `app/Models/UserModel.php` sebagai model untuk tabel tersebut.

2. **Database Seeder.** Mengisi data admin awal menggunakan perintah CLI: `php spark make:seeder UserSeeder`, kemudian menjalankan `php spark db:seed UserSeeder` untuk memasukkan record admin ke database.

3. **Controller Login.** Membuat file `app/Controllers/User.php` yang menangani proses autentikasi. Method `login()` memvalidasi kredensial dengan `password_verify()` dan menyimpan session `logged_in` apabila autentikasi berhasil.

4. **Route Filter.** Membuat file `app/Filters/Auth.php` yang memeriksa keberadaan session `logged_in`. Apabila session tidak ditemukan, pengguna di-redirect ke halaman login. Filter ini didaftarkan pada `app/Config/Filters.php` dan diterapkan pada grup route admin.

### Pertanyaan dan Tugas

> **Pertanyaan:** Selesaikan program Login sesuai langkah-langkah.
>
> **Jawaban:** Panel admin telah diamankan menggunakan Filter autentikasi. Setiap akses ke halaman admin tanpa sesi login yang valid akan ditolak dan diarahkan ke halaman login. Seluruh kredensial admin disimpan dalam bentuk hash (bcrypt) di database.

### Dokumentasi Screenshot

| Tampilan | Screenshot |
|----------|------------|
| Halaman Login | ![Form Login](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/02_admin_daftar_artikel.png?raw=true) |

*Catatan: Screenshot form login dapat diambil pada URL `http://localhost:8080/user/login` dengan kredensial admin@email.com / admin123.*

---

## Praktikum 5: Pagination dan Pencarian

### Tujuan Praktikum

1. Mahasiswa mampu memahami konsep dasar Pagination.
2. Mahasiswa mampu memahami konsep dasar Pencarian (Search).
3. Mahasiswa mampu mengimplementasikan Pagination dan Pencarian menggunakan CI4.

### Langkah-langkah Praktikum

1. **Instansiasi Pager.** Menggunakan method `$model->paginate(10)` pada controller `Artikel` untuk membatasi jumlah data yang ditampilkan per halaman.

2. **Fungsi Pencarian.** Menangkap parameter pencarian `q` dari query string menggunakan `$this->request->getGet('q')`, kemudian menerapkannya pada query builder dengan method `like('judul', $q)`.

3. **Tautan Paginasi di View.** Merender navigasi halaman pada view admin menggunakan `<?= $pager->only(['q'])->links() ?>`, sehingga parameter pencarian tetap dipertahankan saat berpindah halaman.

### Pertanyaan dan Tugas

> **Pertanyaan:** Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan improvisasi.
>
> **Jawaban:** Pagination dan fitur pencarian telah terintegrasi penuh. Ketika pengguna mengetikkan kata kunci pencarian, data difilter berdasarkan judul artikel dan hasilnya tetap ditampilkan dalam format paginasi berkat penggunaan fungsi `only(['q'])` pada pager.

### Dokumentasi Screenshot

| Tampilan | Screenshot |
|----------|------------|
| Pagination dan Pencarian | ![Pagination](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/02_admin_daftar_artikel.png?raw=true) |

---

## Praktikum 6: Pencarian Lanjutan dan Relasi Tabel

### Tujuan Praktikum

1. Mahasiswa mampu memahami relasi antar tabel database (tabel Artikel dengan tabel Kategori).
2. Mahasiswa mampu memodifikasi layout agar bersifat dinamis menggunakan View Cell.

### Langkah-langkah Praktikum

1. **Membuat Tabel Kategori.** Membuat tabel `kategori` dengan kolom `id` dan `nama_kategori`. Menambahkan kolom `id_kategori` pada tabel `artikel` sebagai foreign key.

2. **View Cell untuk Kategori.** Membuat View Cell `app/Cells/KategoriList.php` untuk merender daftar kategori secara dinamis dari database, bukan hardcode HTML.

3. **Relasi Database dengan JOIN.** Memodifikasi fungsi `view($slug)` pada controller `Artikel` untuk melakukan query JOIN antara tabel `artikel` dan `kategori`, sehingga nama kategori dapat ditampilkan pada halaman detail artikel.

4. **Injeksi Data Kategori.** Menyuntikkan data `nama_kategori` ke dalam view `detail.php` agar dapat ditampilkan kepada pengguna.

### Pertanyaan dan Tugas

> **Pertanyaan:**
> 1. Selesaikan semua langkah praktikum di atas.
> 2. Modifikasi tampilan detail artikel (`artikel/detail.php`) untuk menampilkan nama kategori artikel.
> 3. Tambahkan fitur untuk menampilkan daftar kategori di halaman depan (opsional).
> 4. Buat fungsi untuk menampilkan artikel berdasarkan kategori tertentu (opsional).
>
> **Jawaban:** Data `nama_kategori` berhasil diambil melalui operasi JOIN antar tabel dan ditampilkan pada halaman detail artikel. View Cell di sidebar menampilkan daftar kategori secara dinamis, dan pengguna dapat memfilter artikel berdasarkan kategori yang dipilih.

### Dokumentasi Screenshot

| Tampilan | Screenshot |
|----------|------------|
| Detail Artikel dengan Informasi Kategori | ![Detail Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/01_user_daftar_artikel.png?raw=true) |

---

## Praktikum 9: AJAX dan Real-time Pagination

### Tujuan Praktikum

1. Mahasiswa mampu memahami prinsip kerja AJAX (Asynchronous JavaScript and XML).
2. Mahasiswa mampu mengimplementasikan pemuatan data artikel secara asinkron tanpa reload halaman.

### Langkah-langkah Praktikum

1. **Backend Response JSON.** Memodifikasi controller `Artikel` agar mendeteksi permintaan AJAX menggunakan `$this->request->isAJAX()`. Apabila terdeteksi sebagai AJAX, server mereturn data dalam format JSON.

2. **Fungsi AJAX JavaScript.** Membuat skrip jQuery untuk mengambil data artikel secara asinkron menggunakan `$.ajax()`. Fungsi `fetchData()` dipanggil saat halaman dimuat dan saat tombol pagination diklik.

3. **Sorting Data.** Menambahkan event handler pada header kolom tabel untuk mengurutkan data berdasarkan judul (ASC/DESC) tanpa reload halaman.

4. **Indikator Loading.** Menampilkan animasi spinner atau teks loading saat permintaan AJAX sedang diproses oleh server.

### Pertanyaan dan Tugas

> **Pertanyaan:**
> 1. Selesaikan semua langkah praktikum di atas.
> 2. Modifikasi tampilan data artikel dan pagination sesuai kebutuhan desain.
> 3. Tambahkan indikator loading saat data sedang diambil dari server.
> 4. Implementasikan fitur sorting (mengurutkan artikel berdasarkan judul) dengan AJAX.
>
> **Jawaban:** Seluruh tugas telah diselesaikan. Data artikel dimuat secara asinkron melalui AJAX dengan dukungan pagination dan sorting. Indikator loading muncul saat proses pengambilan data berlangsung. Pengguna dapat mengurutkan data berdasarkan judul tanpa mengalami reload halaman.

### Dokumentasi Screenshot

| Tampilan | Screenshot |
|----------|------------|
| Tabel Artikel dengan AJAX dan Pagination | ![AJAX Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/08_ajax_data_artikel.png?raw=true) |
| Response JSON Endpoint API | ![API JSON](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/07_api_json_response.png?raw=true) |

---

## Struktur Folder

```
Lab7Web/
├── ci4/                                # CodeIgniter 4 Framework
│   ├── app/
│   │   ├── Config/                     # Konfigurasi Routes, Filters, Database
│   │   ├── Controllers/                # Page, Artikel, User, Post
│   │   ├── Models/                     # ArtikelModel, UserModel, KategoriModel
│   │   ├── Views/                      # Template, Layout, View komponen
│   │   ├── Cells/                      # View Cell (ArtikelTerkini, KategoriList)
│   │   └── Filters/                    # Auth, ApiAuthFilter
│   ├── public/                         # Entry point, style.css, uploads/gambar/
│   ├── router.php                      # CORS handler untuk php built-in server
│   └── ...
├── Secrenshoot/                        # Dokumentasi screenshot praktikum
└── README.md
```

---

**(c) 2026 Muhammad Arkhamullah R.A - Laporan Praktikum Pemrograman Web 2**  
**Program Studi Teknik Informatika - Universitas Pelita Bangsa**


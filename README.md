# 📚 Laporan Praktikum Pemrograman Web — Lab7Web

![PHP](https://img.shields.io/badge/PHP-8.1-%23777BB4?style=flat&logo=php)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4-%23EF4223?style=flat&logo=codeigniter)
![MySQL](https://img.shields.io/badge/MySQL-8.0-%234479A1?style=flat&logo=mysql)
![License](https://img.shields.io/badge/License-MIT-%23-yellow?style=flat)
![Repo Size](https://img.shields.io/github/repo-size/MuhammadArkham/Lab7Web?style=flat)
![Last Commit](https://img.shields.io/github/last-commit/MuhammadArkham/Lab7Web?style=flat)

---

**Mata Kuliah:** Pemrograman Web 2  
**Nama:** Muhammad Arkhamullah R.A  
**NIM:** 312410545  
**Kelas:** I241E  

---

Repositori ini memuat pengerjaan **Modul 1–6 dan Modul 9** Praktikum Pemrograman Web menggunakan **Framework CodeIgniter 4 (CI4)**. Seluruh modul mencakup konsep dasar PHP Framework hingga implementasi AJAX dan Real-time Pagination.

---

## 📖 Daftar Isi

1. [Praktikum 1: PHP Framework (CodeIgniter)](#-praktikum-1-php-framework-codeigniter)
2. [Praktikum 2: Framework Lanjutan (CRUD)](#-praktikum-2-framework-lanjutan-crud)
3. [Praktikum 3: View Layout dan View Cell](#-praktikum-3-view-layout-dan-view-cell)
4. [Praktikum 4: Framework Lanjutan (Modul Login & Register)](#-praktikum-4-framework-lanjutan-modul-login--register)
5. [Praktikum 5: Pagination dan Pencarian](#-praktikum-5-pagination-dan-pencarian)
6. [Praktikum 6: Pencarian Lanjutan dan Relasi Tabel](#-praktikum-6-pencarian-lanjutan-dan-relasi-tabel)
7. [Praktikum 9: AJAX & Real-time Pagination](#-praktikum-9-ajax--real-time-pagination)

---

## 📖 Praktikum 1: PHP Framework (CodeIgniter)

### 🎯 Tujuan Praktikum

1. Memahami konsep dasar Framework dan pola MVC (Model-View-Controller).
2. Mampu menggunakan Framework CodeIgniter 4 untuk membuat program web sederhana.

### 🛠️ Penjelasan dan Langkah-langkah Praktikum

Pada modul ini dilakukan instalasi CI4 dan pembuatan _Routes_ dan _Controller_ pertama.

1. **Mengaktifkan Ekstensi PHP**: Membuka `php.ini` lalu mengaktifkan `intl` dan `mbstring`.
2. **Instalasi dan Konfigurasi**: Mengekstrak CI4, me-_rename_ `.env`, dan mengubah _environment_ menjadi `development`.
3. **Membuat Route**: Menambahkan `$routes->get('/about', 'Page::about');` di `Routes.php`.
4. **Membuat Controller Page**: Membangun _class_ `Page` yang mewarisi `BaseController` untuk merender tampilan statis HTML seperti `about`, `contact`, dan `faqs`.
5. **View Layout**: Memisahkan struktur dasar HTML menjadi `header.php` dan `footer.php` agar dapat dipanggil menggunakan `<?= $this->include('template/header'); ?>`.

### ❓ Pertanyaan dan Tugas

> **Pertanyaan:** Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga semua _link_ pada navigasi _header_ dapat menampilkan tampilan dengan layout yang sama.
>
> **Jawaban & Implementasi:** Telah diselesaikan. Method `contact()`, `faqs()`, dan `artikel()` ditambahkan ke `Page.php`. Setiap method mereturn _view_ yang membungkus (_include_) layout dinamis `header.php` dan `footer.php` secara seragam.

### 📸 Screenshot Hasil Kerja

| Halaman | Tampilan |
|---------|----------|
| **Halaman About** | ![Halaman About](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20074752.png?raw=true) |
| **Halaman Kontak** | ![Halaman Kontak](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20074838.png?raw=true) |
| **Halaman FAQ** | ![Halaman FAQ](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20074904.png?raw=true) |

---

## 📖 Praktikum 2: Framework Lanjutan (CRUD)

### 🎯 Tujuan Praktikum

1. Memahami konsep dasar Model di CI4.
2. Memahami konsep dasar Sistem CRUD (Create, Read, Update, Delete).

### 🛠️ Penjelasan dan Langkah-langkah Praktikum

Fokus utama adalah manajemen basis data (Database) dari antarmuka Web.

1. **Membuat Database**: Membuat database MySQL `lab_ci4` dan tabel `artikel` yang berisi `id`, `judul`, `isi`, `gambar`, dsb.
2. **Konfigurasi Koneksi**: Mengisi _database credentials_ pada file `.env`.
3. **Membuat Model**: Membuat file `ArtikelModel.php` yang mendefinisikan tabel dan kolom-kolom yang diizinkan untuk diubah (`allowedFields`).
4. **Fungsi Read (Tampil Data)**: Menggunakan method `$model->findAll()` pada `Artikel` _controller_ untuk merender data pada `artikel/index.php`.
5. **Fungsi Create (Tambah Data)**: Membuat form `add.php` dan menangani _POST request_ dengan validasi `$this->validate()` sebelum disisipkan menggunakan `$model->insert()`.
6. **Fungsi Update (Ubah Data)**: Menggunakan `$model->update()` berdasarkan identitas ID.
7. **Fungsi Delete (Hapus Data)**: Memicu pemusnahan _record_ menggunakan `$model->delete($id)`.

### ❓ Pertanyaan dan Tugas

> **Pertanyaan:** Selesaikan programnya (CRUD) sesuai Langkah-langkah yang ada.
>
> **Jawaban & Implementasi:** Fungsi Create, Read, Update, dan Delete untuk tabel `artikel` sudah berjalan penuh dan terintegrasi dengan baik ke database.

### 📸 Screenshot Hasil Kerja

| Tampilan | Screenshot |
|----------|------------|
| **Daftar Artikel** | ![Daftar Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20075543.png?raw=true) |
| **Halaman Admin** | ![Admin](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20080019.png?raw=true) |
| **Form Tambah Artikel** | ![Form Tambah](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20080151.png?raw=true) |
| **Form Edit Artikel** | ![Form Edit](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20080219.png?raw=true) |

---

## 📖 Praktikum 3: View Layout dan View Cell

### 🎯 Tujuan Praktikum

1. Mampu mengelola antarmuka (UI) menggunakan teknik _Layouting_ di CI4.
2. Memahami penggunaan _View Cell_ untuk merender komponen kecil dinamis.

### 🛠️ Penjelasan dan Langkah-langkah Praktikum

1. **Penerapan Layout Bawaan**: Memanfaatkan `$this->extend('layout/main')` dan `$this->section('content')` sebagai pembungkus komponen.
2. **Komponen Modular**: Mengisolasi _sidebar_, _header_, dan navigasi agar efisien tidak perlu ditulis berulang kali.
3. **Konfigurasi View Cell**: Menggunakan pemanggilan _cell_ untuk hal seperti _Recent Posts_ atau elemen lain yang memerlukan _logic_ khusus dari server.

### ❓ Pertanyaan dan Tugas

> **Pertanyaan:** Implementasikan sistem _Layouting_ pada project Anda.
>
> **Jawaban & Implementasi:** Seluruh _view_ pada CRUD Artikel kini tidak lagi memuat struktur dasar HTML karena telah dirender menggunakan sistem pewarisan `extend` ke file _main layout_.

### 📸 Screenshot Hasil Kerja

| Tampilan | Screenshot |
|----------|------------|
| **Halaman About dengan Sidebar** | ![About + Sidebar](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20080933.png?raw=true) |

---

## 📖 Praktikum 4: Framework Lanjutan (Modul Login & Register)

### 🎯 Tujuan Praktikum

Membuat sistem Autentikasi Pengguna menggunakan _Session_ bawaan CodeIgniter.

### 🛠️ Penjelasan dan Langkah-langkah Praktikum

Sistem CRUD Admin hanya boleh diakses oleh Administrator yang memiliki identitas yang sah.

1. **Tabel User**: Membuat tabel `user` beserta _Model_-nya (`UserModel.php`).
2. **Database Seeder**: Mengisi _dummy_ admin menggunakan perintah CLI `php spark make:seeder UserSeeder`.
3. **Controller Login**: Membuat `User.php` dengan fungsi autentikasi email dan verifikasi _Hash_ Password `password_verify()`. Jika sukses, session `logged_in` diset `true`.
4. **Membangun Route Filter**: Mengamankan _endpoint_ admin dengan _Middleware/Filters_. Dibuat file `app/Filters/Auth.php` yang me-_redirect_ pengguna ke `/login` bila _Session_ belum terset.

### ❓ Pertanyaan dan Tugas

> **Pertanyaan:** Selesaikan program Login sesuai langkah-langkah.
>
> **Jawaban & Implementasi:** Panel Admin berhasil diamankan dengan _Filter_. Jika _User_ mencoba mengakses kelola artikel sebelum melakukan _Sign-In_, sistem akan menolaknya dan melempar (_redirect_) ke form Login.

### 📸 Screenshot Hasil Kerja

| Tampilan | Screenshot |
|----------|------------|
| **Form Login** | ![Form Login](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20091948.png?raw=true) |
| **Dashboard Admin (setelah login)** | ![Admin Dashboard](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20092322.png?raw=true) |

---

## 📖 Praktikum 5: Pagination dan Pencarian

### 🎯 Tujuan Praktikum

1. Memahami konsep dasar _Pagination_.
2. Memahami konsep dasar Pencarian.
3. Membuat _Paging_ dan Pencarian menggunakan Framework CodeIgniter 4.

### 🛠️ Penjelasan dan Langkah-langkah Praktikum

Menghindari perenderan data masif sekaligus ke layar (yang dapat membuat web menjadi lambat).

1. **Instansiasi Pager**: Menggunakan _library_ `$model->paginate(10)` pada _Controller_ `Artikel.php`.
2. **Fungsi Pencarian**: Menangkap _input_ pencarian `q` via _GET Request_, kemudian dihubungkan dengan _Query Builder_ `like('judul', $q)`.
3. **Tautan Paging View**: Merender struktur UI halaman berikutnya di view admin menggunakan `<?= $pager->only(['q'])->links(); ?>`.

### ❓ Pertanyaan dan Tugas

> **Pertanyaan:** Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan improvisasi.
>
> **Jawaban & Implementasi:** _Pagination_ CI4 dan filter pencarian terintegrasi penuh. Ketika pengguna mengetikkan kata pencarian, data hasil pencarian juga secara dinamis dipecah menjadi beberapa halaman berkat penggunaan fungsi `only(['q'])`.

### 📸 Screenshot Hasil Kerja

| Tampilan | Screenshot |
|----------|------------|
| **Pagination & Pencarian** | ![Pagination](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-09%20104557.png?raw=true) |

---

## 📖 Praktikum 6: Pencarian Lanjutan dan Relasi Tabel

### 🎯 Tujuan Praktikum

1. Memahami Relasi antar tabel database (Tabel Artikel dengan Kategori).
2. Memodifikasi Layout agar sangat dinamis menggunakan _View Cell_.

### 🛠️ Penjelasan dan Langkah-langkah Praktikum

1. **Modifikasi Daftar Kategori pada Sidebar**: Membuat _View Cell_ `app/Cells/KategoriList.php` untuk merender nama-nama kategori secara dinamis dari tabel (bukan _hardcode_ HTML).
2. **Relasi Database (JOIN)**: Memodifikasi fungsi `view($slug)` pada _controller_ agar melakukan _Query Builder_ `JOIN` ke tabel kategori dan mengambil nilai asli `nama_kategori`.
3. **Injeksi Data**: Menyuntikkan _string_ `nama_kategori` ini agar dapat dibaca di halaman _Front-End_ `detail.php`.

### ❓ Pertanyaan dan Tugas

> **Pertanyaan:**
> 1. Selesaikan semua langkah praktikum di atas.
> 2. Modifikasi tampilan detail artikel (`artikel/detail.php`) untuk menampilkan nama kategori artikel.
> 3. Tambahkan fitur untuk menampilkan daftar kategori di halaman depan (opsional).
> 4. Buat fungsi untuk menampilkan artikel berdasarkan kategori tertentu (opsional).
>
> **Jawaban & Implementasi:** Data `nama_kategori` sukses diambil melalui relasi `JOIN` dari dalam _model_ dan disuntikkan ke tampilan detail. _View Cell_ di _sidebar_ juga telah berhasil memanggil fungsionalitas kategori secara dinamis.

### 📸 Screenshot Hasil Kerja

| Tampilan | Screenshot |
|----------|------------|
| **Detail Artikel dengan Kategori** | ![Detail Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20075543.png?raw=true) |

---

## 📖 Praktikum 9: AJAX & Real-time Pagination

### 🎯 Tujuan Praktikum

1. Memahami prinsip asinkronus (Asynchronous Javascript and XML).
2. Memindahkan perenderan tabel dan _sorting_ pada halaman _Admin_ agar tidak terjadi _page-reload_ / _refresh_.

### 🛠️ Penjelasan dan Langkah-langkah Praktikum

Meningkatkan _User Experience_ secara dramatis dengan membuat Web beroperasi seperti aplikasi nyata.

1. **Backend Response**: Memodifikasi _Controller_ `Artikel.php` agar mendeteksi permintaan AJAX menggunakan `$this->request->isAJAX()`. Jika terpenuhi, server membalikkan respon berupa _JSON_ string.
2. **AJAX Javascript**: Pembuatan script utama asinkron dengan **jQuery AJAX** (`fetchData()`) di _view_ utama admin.
3. **Fungsi Sorting & Loading**: Memasukkan logika _click handler_ untuk menata kolom `Judul` (ASC/DESC), dan menyalakan _Spinner/Loading_ saat jQuery melakukan pengambilan data jarak jauh.

### ❓ Pertanyaan dan Tugas

> **Pertanyaan:**
> 1. Selesaikan semua langkah praktikum di atas.
> 2. Modifikasi tampilan data artikel dan pagination sesuai kebutuhan desain.
> 3. Tambahkan indikator _loading_ saat data sedang diambil dari server.
> 4. Implementasikan fitur _sorting_ (mengurutkan artikel berdasarkan judul, dll.) dengan AJAX.
>
> **Jawaban & Implementasi:** Seluruh tugas berjalan dengan lancar. Animasi _Loading Spinner_ terlihat transparan sesaat `$.ajax` berproses. Fitur pengurutan (_Sorting_) berfungsi mengubah susunan UI secara asinkron tanpa _hard-reload_ pada _browser_.

### 📸 Screenshot Hasil Kerja

| Tampilan | Screenshot |
|----------|------------|
| **AJAX Pagination & Sorting** | ![AJAX](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-09%20104557.png?raw=true) |

---

## 📁 Struktur Folder

```
Lab7Web/
├── ci4/                                # CodeIgniter 4 Framework
│   ├── app/
│   │   ├── Config/                     # Konfigurasi Routes, Filters, Database
│   │   ├── Controllers/                # Page, Artikel, User
│   │   ├── Models/                     # ArtikelModel, UserModel
│   │   ├── Views/                      # Template, Layout, View komponen
│   │   ├── Cells/                      # View Cell (ArtikelTerkini, KategoriList)
│   │   └── Filters/                    # AuthFilter
│   ├── public/                         # Entry point, style.css, uploads/
│   └── ...
├── Secrenshoot/                        # Dokumentasi screenshot praktikum
└── README.md
```

---

© 2026 Muhammad Arkhamullah R.A — Laporan Praktikum Pemrograman Web

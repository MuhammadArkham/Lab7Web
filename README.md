# 📚 Laporan Praktikum Pemrograman Web (Lab7Web)

Repositori ini memuat pengerjaan **Modul 1, 2, 3, 4, 5, 6, dan 9** menggunakan Framework CodeIgniter 4 (CI4).

---

# 📖 Praktikum 1: PHP Framework (CodeIgniter)

### 🎯 Tujuan Praktikum
1. Memahami konsep dasar Framework dan pola MVC (Model-View-Controller).
2. Mampu menggunakan Framework CodeIgniter 4 untuk membuat program web sederhana.

### 🛠️ Penjelasan dan Langkah-langkah Praktikum
Pada modul ini, kita melakukan instalasi CI4 dan membuat _Routes_ dan _Controller_ pertama.
1. **Mengaktifkan Ekstensi PHP**: Membuka `php.ini` lalu mengaktifkan `intl` dan `mbstring`.
2. **Instalasi dan Konfigurasi**: Mengekstrak CI4, me-_rename_ `.env`, dan mengubah environment menjadi `development`.
3. **Membuat Route**: Menambahkan `$routes->get('/about', 'Page::about');` di `Routes.php`.
4. **Membuat Controller Page**: Membangun class `Page` yang mewarisi `BaseController` untuk merender tampilan statis HTML seperti `about`, `contact`, dan `faqs`.
5. **View Layout**: Memisahkan struktur dasar HTML menjadi `header.php` dan `footer.php` agar dapat dipanggil menggunakan `<?= $this->include('template/header'); ?>`.


### 💡 Pertanyaan dan Tugas
> **Pertanyaan:**  
> Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga semua link pada navigasi header dapat menampilkan tampilan dengan layout yang sama.
> 
> **Jawaban & Implementasi:**  
> Telah diselesaikan. Method `contact()`, `faqs()`, dan `artikel()` ditambahkan ke `Page.php`. Setiap method mereturn view yang membungkus (include) layout dinamis `header.php` dan `footer.php` secara seragam.

### 📸 Screenshot Hasil Kerja
> **Silakan ganti tag `#` di bawah ini dengan URL gambar Anda**
> ![Hasil Praktikum](#)

---

# 📖 Praktikum 2: Framework Lanjutan (CRUD)

### 🎯 Tujuan Praktikum
1. Memahami konsep dasar Model di CI4.
2. Memahami konsep dasar Sistem CRUD (Create, Read, Update, Delete).

### 🛠️ Penjelasan dan Langkah-langkah Praktikum
Fokus utama adalah manajemen basis data (Database) dari antarmuka Web.
1. **Membuat Database**: Membuat database MySQL `lab_ci4` dan tabel `artikel` yang berisi `id`, `judul`, `isi`, `gambar`, dsb.
2. **Konfigurasi Koneksi**: Mengisi *database credentials* pada file `.env`.
3. **Membuat Model**: Membuat file `ArtikelModel.php` yang mendefinisikan tabel dan kolom-kolom yang diizinkan untuk diubah (`allowedFields`).
4. **Fungsi Read (Tampil Data)**: Menggunakan method `$model->findAll()` pada `Artikel` controller untuk merender data pada `artikel/index.php`.
5. **Fungsi Create (Tambah Data)**: Membuat form `add.php` dan menangani _POST request_ dengan validasi `$this->validate()` sebelum disisipkan menggunakan `$model->insert()`.
6. **Fungsi Update (Ubah Data)**: Menggunakan `$model->update()` berdasarkan identitas ID.
7. **Fungsi Delete (Hapus Data)**: Memicu pemusnahan _record_ menggunakan `$model->delete($id)`.


### 💡 Pertanyaan dan Tugas
> **Pertanyaan:**  
> Selesaikan programnya (CRUD) sesuai Langkah-langkah yang ada.
> 
> **Jawaban & Implementasi:**  
> Fungsi Create, Read, Update, dan Delete untuk tabel `artikel` sudah berjalan penuh dan terintegrasi dengan baik ke database.

### 📸 Screenshot Hasil Kerja
> **Silakan ganti tag `#` di bawah ini dengan URL gambar Anda**
> ![Hasil Praktikum](#)

---

# 📖 Praktikum 3: View Layout dan View Cell

### 🎯 Tujuan Praktikum
1. Mampu mengelola antarmuka (UI) menggunakan teknik `Layouting` di CI4.
2. Memahami penggunaan `View Cell` untuk merender komponen kecil dinamis.

### 🛠️ Penjelasan dan Langkah-langkah Praktikum
1. **Penerapan Layout Bawaan**: Memanfaatkan `$this->extend('layout/main')` dan `$this->section('content')` sebagai pembungkus komponen.
2. **Komponen Modular**: Mengisolasi *sidebar*, *header*, dan navigasi agar efisien tidak perlu ditulis berulang kali.
3. **Konfigurasi View Cell**: Menggunakan pemanggilan cell untuk hal seperti _Recent Posts_ atau elemen lain yang memerlukan _logic_ khusus dari server.


### 💡 Pertanyaan dan Tugas
> **Pertanyaan:**  
> Implementasikan sistem Layouting pada project Anda.
> 
> **Jawaban & Implementasi:**  
> Seluruh *view* pada CRUD Artikel kini tidak lagi memuat struktur dasar HTML karena telah dirender menggunakan sistem pewarisan `extend` ke file *main layout*.

### 📸 Screenshot Hasil Kerja
> **Silakan ganti tag `#` di bawah ini dengan URL gambar Anda**
> ![Hasil Praktikum](#)

---

# 📖 Praktikum 4: Framework Lanjutan (Modul Login & Register)

### 🎯 Tujuan Praktikum
Membuat sistem Autentikasi Pengguna menggunakan Session bawaan CodeIgniter.

### 🛠️ Penjelasan dan Langkah-langkah Praktikum
Sistem CRUD Admin hanya boleh diakses oleh Administrator yang memiliki identitas yang sah.
1. **Tabel User**: Membuat tabel `user` beserta *Model*-nya (`UserModel.php`).
2. **Database Seeder**: Mengisi *dummy* admin menggunakan perintah CLI `php spark make:seeder UserSeeder`.
3. **Controller Login**: Membuat `User.php` dengan fungsi autentikasi email dan verifikasi Hash Password `password_verify()`. Jika sukses, session `logged_in` diset `true`.
4. **Membangun Route Filter**: Mengamankan *endpoint* admin dengan _Middleware/Filters_. Dibuat file `app/Filters/Auth.php` yang me-redirect pengguna ke `/login` bila Session belum terset.


### 💡 Pertanyaan dan Tugas
> **Pertanyaan:**  
> Selesaikan program Login sesuai langkah-langkah.
> 
> **Jawaban & Implementasi:**  
> Panel Admin berhasil diamankan dengan Filter. Jika _User_ mencoba mengakses kelola artikel sebelum melakukan Sign-In, sistem akan menolaknya dan me-lempar (*redirect*) ke form Login.

### 📸 Screenshot Hasil Kerja
> **Silakan ganti tag `#` di bawah ini dengan URL gambar Anda**
> ![Hasil Praktikum](#)

---

# 📖 Praktikum 5: Pagination dan Pencarian

### 🎯 Tujuan Praktikum
1. Memahami konsep dasar Pagination.
2. Memahami konsep dasar Pencarian.
3. Membuat Paging dan Pencarian menggunakan Framework CodeIgniter 4.

### 🛠️ Penjelasan dan Langkah-langkah Praktikum
Menghindari perenderan data masif sekaligus ke layar (yang dapat membuat web menjadi lambat).
1. **Instansiasi Pager**: Menggunakan library `$model->paginate(10)` pada file Controller `Artikel.php`.
2. **Fungsi Pencarian**: Menangkap Input pencarian `q` via GET Request, kemudian dihubungkan dengan Query Builder `like('judul', $q)`.
3. **Tautan Paging View**: Merender struktur UI halaman berikutnya di view admin menggunakan `<?= $pager->only(['q'])->links(); ?>`.


### 💡 Pertanyaan dan Tugas
> **Pertanyaan:**  
> Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan improvisasi.
> 
> **Jawaban & Implementasi:**  
> Pagination CI4 dan filter pencarian terintegrasi penuh. Ketika pengguna mengetikkan kata pencarian, data hasil pencarian juga secara dinamis dipecah menjadi beberapa halaman berkat penggunaan fungsi `only(['q'])`.

### 📸 Screenshot Hasil Kerja
> **Silakan ganti tag `#` di bawah ini dengan URL gambar Anda**
> ![Hasil Praktikum](#)

---

# 📖 Praktikum 6: Pencarian Lanjutan dan Relasi Tabel

### 🎯 Tujuan Praktikum
1. Memahami Relasi antar tabel database (Tabel Artikel dengan Kategori).
2. Memodifikasi Layout agar sangat dinamis menggunakan `View Cell`.

### 🛠️ Penjelasan dan Langkah-langkah Praktikum
1. **Modifikasi Daftar Kategori pada Sidebar**: Membuat file View Cell `app/Cells/KategoriList.php` untuk merender nama-nama kategori secara dinamis dari tabel (bukan _hardcode_ HTML).
2. **Relasi Database (JOIN)**: Memodifikasi fungsi `view($slug)` pada controller agar melakukan Query Builder `JOIN` ke tabel kategori dan mengambil nilai asli `nama_kategori`.
3. **Injeksi Data**: Menyuntikkan _string_ `nama_kategori` ini agar dapat dibaca di halaman Front-End `detail.php`.


### 💡 Pertanyaan dan Tugas
> **Pertanyaan:**  
> 1. Selesaikan semua langkah praktikum di atas.
> 2. Modifikasi tampilan detail artikel (artikel/detail.php) untuk menampilkan nama kategori artikel.
> 3. Tambahkan fitur untuk menampilkan daftar kategori di halaman depan (opsional).
> 4. Buat fungsi untuk menampilkan artikel berdasarkan kategori tertentu (opsional).
> 
> **Jawaban & Implementasi:**  
> Data `nama_kategori` sukses diambil melalui relasi `JOIN` dari dalam model dan disuntikkan ke tampilan detail. `View Cell` di sidebar juga telah berhasil memanggil fungsionalitas kategori secara dinamis.

### 📸 Screenshot Hasil Kerja
> **Silakan ganti tag `#` di bawah ini dengan URL gambar Anda**
> ![Hasil Praktikum](#)

---

# 📖 Praktikum 9: Menguasai AJAX & Real-time Pagination

### 🎯 Tujuan Praktikum
1. Memahami prinsip asinkronus (Asynchronous Javascript and XML).
2. Memindahkan perenderan tabel dan sorting pada halaman *Admin* agar tidak terjadi _page-reload_ / _refresh_.

### 🛠️ Penjelasan dan Langkah-langkah Praktikum
Meningkatkan *User Experience* secara dramatis dengan membuat Web beroperasi seperti aplikasi nyata.
1. **Backend Response**: Memodifikasi Controller `Artikel.php` agar mendeteksi permintaan AJAX menggunakan `$this->request->isAJAX()`. Jika terpenuhi, server membalikkan respon berupa `JSON` string.
2. **AJAX Javascript**: Pembuatan script utama asinkron dengan **jQuery AJAX** (`fetchData()`) di view utama admin.
3. **Fungsi Sorting & Loading**: Memasukkan logika _click handler_ untuk menata kolom `Judul` (ASC/DESC), dan menyalakan _Spinner/Loading_ saat jQuery melakukan pengambilan data jarak jauh.


### 💡 Pertanyaan dan Tugas
> **Pertanyaan:**  
> 1. Selesaikan semua langkah praktikum di atas.
> 2. Modifikasi tampilan data artikel dan pagination sesuai kebutuhan desain.
> 3. Tambahkan indikator loading saat data sedang diambil dari server.
> 4. Implementasikan fitur sorting (mengurutkan artikel berdasarkan judul, dll.) dengan AJAX.
> 
> **Jawaban & Implementasi:**  
> Seluruh tugas berjalan dengan lancar. Animasi _Loading Spinner_ terlihat transparan sesaat `$.ajax` berproses. Fitur pengurutan (*Sorting*) berfungsi mengubah susunan UI secara asinkron tanpa *hard-reload* pada *browser*.

### 📸 Screenshot Hasil Kerja
> **Silakan ganti tag `#` di bawah ini dengan URL gambar Anda**
> ![Hasil Praktikum](#)

---


# Praktikum 1: PHP Framework (CodeIgniter)

## Penjelasan Praktikum
Pada modul ini, kita belajar mengenai konsep dasar Framework CodeIgniter 4 dan pola MVC (Model-View-Controller). Pembuatan `Controller Page` dilakukan untuk merender tampilan (View) Statis (Home, About, Contact) yang dibungkus dengan layout dasar yang sama (`header.php` dan `footer.php`).

## Langkah-langkah Utama
- Mengaktifkan ekstensi PHP (`intl`, `mbstring`).
- Instalasi CI4 melalui composer/zip.
- Membuat Route dasar (`/about`, `/contact`).
- Membuat `Page` Controller dan menyatukan layout header & footer.

## Pertanyaan dan Tugas
> **Pertanyaan:** Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga semua link pada navigasi header dapat menampilkan tampilan dengan layout yang sama.
> **Jawaban:** Tugas ini telah diselesaikan. File `Page.php` telah berisi *method* untuk halaman lain (seperti artikel), dan semua file _view_ sudah menggunakan `<?= $this->include('template/header'); ?>` dan `footer` secara seragam.

### Screenshot Hasil Kerja
> **Ambil gambar screenshot jalannya program di web browser dan taruh di sini**
> ![Screenshot](#)


---

# Praktikum 2 & 3: Framework Lanjutan (CRUD, Login & Register)

## Penjelasan Praktikum
Modul ini mencakup implementasi sistem *Create, Read, Update, Delete* (CRUD) pada tabel `artikel`, serta sistem Otentikasi sederhana menggunakan sistem `Session` di CI4.

## Langkah-langkah Utama
- Membuat struktur database (Tabel `artikel` dan `user`).
- Pembuatan Model `ArtikelModel` dan `UserModel`.
- Penambahan filter `Auth.php` pada router agar panel admin tidak dapat diakses tanpa sesi login.

## Pertanyaan dan Tugas
> **Pertanyaan:** Selesaikan programnya sesuai Langkah-langkah yang ada.
> **Jawaban:** Program dasar CRUD artikel dan halaman autentikasi admin telah berhasil dibuat dan terintegrasi dengan database MySQL.

### Screenshot Hasil Kerja
> **Ambil gambar screenshot jalannya program di web browser dan taruh di sini**
> ![Screenshot](#)


---

# Praktikum 5: Pagination dan Pencarian

## Penjelasan Praktikum
Membuat fitur `Pagination` untuk membatasi tampilan data per halaman agar tabel tidak terlalu panjang, serta form pencarian yang terintegrasi dengan filter SQL (`LIKE`).

## Langkah-langkah Utama
- Menggunakan `$model->paginate(10)`.
- Mengambil parameter query `q` menggunakan `$this->request->getVar('q')`.
- Merender link pagination di View menggunakan `<?= $pager->only(['q'])->links(); ?>`.

## Pertanyaan dan Tugas
> **Pertanyaan:** Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan improvisasi.
> **Jawaban:** Telah diselesaikan. Pagination CI4 dan filter pencarian telah diimplementasikan pada halaman admin sehingga data ditampilkan per halaman tanpa memberatkan server.

### Screenshot Hasil Kerja
> **Ambil gambar screenshot jalannya program di web browser dan taruh di sini**
> ![Screenshot](#)


---

# Praktikum 6: Relasi Tabel dan Query Builder

## Penjelasan Praktikum
Mempelajari penggabungan dua tabel berbeda (`artikel` dan `kategori`) dan menggunakan fitur **View Cell** untuk merender modul dinamis di sidebar.

## Langkah-langkah Utama
- Membuat file `View Cell` di `app/Cells/KategoriList.php`.
- Menggunakan Query Builder `$this->db->table('kategori')` untuk mengambil data kategori.
- Melakukan operasi SQL `JOIN` pada Model Artikel.

## Pertanyaan dan Tugas
> **Pertanyaan:** 1. Selesaikan semua langkah praktikum di atas. 2. Modifikasi tampilan detail artikel (artikel/detail.php) untuk menampilkan nama kategori artikel. 3. Tambahkan fitur untuk menampilkan daftar kategori di halaman depan (opsional). 4. Buat fungsi untuk menampilkan artikel berdasarkan kategori tertentu (opsional).
> **Jawaban:** 1 & 2 telah diimplementasikan. Data `nama_kategori` diambil melalui relasi `JOIN` dari dalam model dan berhasil disuntikkan ke dalam file `artikel/detail.php`. Untuk daftar kategori halaman depan, telah dibuat `View Cell` di sidebar yang memanggil `KategoriList`.

### Screenshot Hasil Kerja
> **Ambil gambar screenshot jalannya program di web browser dan taruh di sini**
> ![Screenshot](#)


---

# Praktikum 7: Upload File Gambar

## Penjelasan Praktikum
Membahas modifikasi sistem CRUD agar mendukung _upload_ media (gambar) dari _client_ ke _server_.

## Langkah-langkah Utama
- Menambahkan parameter `enctype="multipart/form-data"` pada form html.
- Validasi _Mime Type_ dan ukuran gambar.
- Memindahkan file dari memori sementara ke dalam direktori `/public/gambar/`.

## Pertanyaan dan Tugas
> **Pertanyaan:** Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan improvisasi.
> **Jawaban:** Integrasi penambahan dan pengubahan artikel kini sukses memproses file gambar tanpa _error_. Nama file gambar juga sukses tersimpan sebagai string unik pada kolom database.

### Screenshot Hasil Kerja
> **Ambil gambar screenshot jalannya program di web browser dan taruh di sini**
> ![Screenshot](#)


---

# Praktikum 8 & 9: AJAX & Real-time Pagination

## Penjelasan Praktikum
Meningkatkan *User Experience* (UX) pada halaman kelola admin dengan menggunakan `jQuery AJAX` agar tabel dapat diperbarui secara asinkron tanpa terjadinya proses *refresh*/*reload* halaman sama sekali.

## Langkah-langkah Utama
- Memodifikasi Controller agar memeriksa `$this->request->isAJAX()`.
- Menyiapkan logika `JSON` _response_ jika _request_ dari AJAX.
- Membuat _script_ Javascript `fetchData()` dengan jQuery.

## Pertanyaan dan Tugas
> **Pertanyaan:** 1. Selesaikan semua langkah praktikum di atas. 2. Modifikasi tampilan data artikel dan pagination sesuai kebutuhan desain. 3. Tambahkan indikator loading saat data sedang diambil dari server. 4. Implementasikan fitur sorting (mengurutkan artikel berdasarkan judul, dll.) dengan AJAX.
> **Jawaban:** Seluruh tugas ini diselesaikan bersamaan di kode JavaScript. Animasi _Loading Spinner_ telah disisipkan saat $.ajax dipanggil. Fitur pengurutan (*Sorting*) per-kolom berjalan baik memodifikasi UI dari tabel dengan AJAX dan tidak memuat ulang halaman secara keseluruhan.

### Screenshot Hasil Kerja
> **Ambil gambar screenshot jalannya program di web browser dan taruh di sini**
> ![Screenshot](#)


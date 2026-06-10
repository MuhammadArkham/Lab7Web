# Praktikum 1: PHP Framework (CodeIgniter)

## Tujuan
1. Memahami konsep dasar Framework.
2. Memahami konsep dasar MVC.
3. Membuat program sederhana menggunakan Framework CodeIgniter 4.

---

## Langkah-langkah Praktikum

### 1. Persiapan - Mengaktifkan Ekstensi PHP
Sebelum menggunakan CodeIgniter, aktifkan ekstensi PHP berikut di `php.ini`:
- `extension=intl`
- `extension=mbstring`
- `extension=mysqli`

### 2. Instalasi CodeIgniter 4
- Download CodeIgniter dari https://codeigniter.com/download
- Ekstrak ke `htdocs/lab11_php_ci/`
- Rename folder menjadi `ci4`
- Jalankan dengan perintah:
```
cd C:\xampp\htdocs\lab11_php_ci\ci4
php spark serve
```
- Buka browser: http://localhost:8080

### 3. Mengaktifkan Mode Debugging
- Rename file `env` menjadi `.env`
- Ubah nilai `CI_ENVIRONMENT` menjadi `development`

### 4. Membuat Route Baru
Tambahkan route di `app/Config/Routes.php`:
```php
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
```

### 5. Membuat Controller Page
Buat file `app/Controllers/Page.php`:
```php
<?php
namespace App\Controllers;

class Page extends BaseController
{
    public function about()
    {
        return view('about', [
            'title' => 'Halaman About',
            'content' => 'Ini adalah halaman about.'
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'title' => 'Halaman Kontak',
            'content' => 'Ini adalah halaman kontak.'
        ]);
    }

    public function faqs()
    {
        return view('faqs', [
            'title' => 'Halaman FAQ',
            'content' => 'Ini adalah halaman FAQ.'
        ]);
    }
}
```

### 6. Membuat Layout dengan CSS
- Buat file `public/style.css`
- Buat folder `app/Views/template/`
- Buat `header.php` dan `footer.php` sebagai template layout

### 7. Membuat View About
Buat file `app/Views/about.php`:
```php
<?= $this->include('template/header'); ?>
<h1><?= $title; ?></h1>
<hr>
<p><?= $content; ?></p>
<?= $this->include('template/footer'); ?>
```

---

## Hasil Praktikum

### Tampilan Halaman About
![Halaman About](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20074752.png?raw=true)

### Tampilan Halaman Kontak
![Halaman Kontak](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20074838.png?raw=true)

---

## Kesimpulan
CodeIgniter 4 menggunakan konsep MVC yang memisahkan:
- **Model** ΓÇö pengelolaan data
- **View** ΓÇö tampilan halaman
- **Controller** ΓÇö lBerikut README untuk **Praktikum 2**:

```
```
# Praktikum 2: Framework Lanjutan (CRUD)

## Tujuan
1. Memahami konsep dasar Model.
2. Memahami konsep dasar CRUD.
3. Membuat program sederhana menggunakan Framework CodeIgniter 4.

---

# Praktikum Lanjutan (Modul 6 - 9)

## Praktikum 6: Relasi Tabel, Query Builder & Upload File Gambar (Modul 6 & 7)
### Tujuan
1. Memahami konsep relasi antar tabel database di CodeIgniter 4.
2. Memodifikasi Layout agar lebih dinamis menggunakan View Cell.
3. Memahami cara mengolah form input bertipe `file` (Upload Gambar).

### Langkah-langkah Praktikum
- **Modifikasi Kategori Sidebar:** Menggunakan `View Cell` (`app/Cells/KategoriList.php`) untuk merender daftar kategori secara dinamis dari database tanpa *hardcode*.
- **Relasi Database (JOIN):** Menyesuaikan fungsi pada controller `Artikel` agar melakukan `JOIN` tabel kategori dan menampilkan atribut `nama_kategori` secara eksplisit pada file `detail.php`.
- **Upload File:** Menambahkan input `enctype="multipart/form-data"` pada form tambah/ubah artikel. Memodifikasi proses _backend_ agar memindahkan file gambar yang diunggah secara aman ke direktori `public/gambar/`.

### Screenshot Hasil Kerja Praktikum 6 & 7
> **Ambil gambar screenshot jalannya program di web browser dan taruh di sini**
> ![Screenshot](#)

---

## Praktikum 8 & 9: AJAX & Real-time Pagination
### Tujuan
1. Memahami prinsip asinkronus menggunakan jQuery AJAX.
2. Memindahkan perenderan tabel dan sorting pada halaman *Admin* agar tidak terjadi _page-reload_ / _refresh_.

### Langkah-langkah Praktikum
- Pembuatan fungsi `fetchData` dengan **jQuery AJAX** di file `admin_index.php`.
- Memodifikasi Controller `Artikel.php` agar mendeteksi permintaan AJAX (`$this->request->isAJAX()`) dan merespons dengan JSON data artikel.
- Menambahkan **Indikator Loading** visual (*spinner*) saat proses permintaan data AJAX sedang berlangsung.
- Menambahkan fitur **Sorting** (Pengurutan berdasarkan kolom) tanpa _reload_ halaman.

### Screenshot Hasil Kerja Praktikum 8 & 9
> **Ambil gambar screenshot jalannya program di web browser dan taruh di sini**
> ![Screenshot](#)

---

## Jawaban Pertanyaan dan Tugas (Modul 1-6 & 9)

**Modul 1: Controller Page**
> *Pertanyaan:* Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga semua link pada navigasi header dapat menampilkan tampilan dengan layout yang sama.
**Jawaban:** Telah diselesaikan. Controller `Page.php` dimodifikasi dengan penambahan *method* `about()`, `contact()`, dll., dan mereturn *view* yang menyertakan layout `header.php` dan `footer.php`.

**Modul 6: Kategori Artikel**
> *Pertanyaan:* Modifikasi tampilan detail artikel (artikel/detail.php) untuk menampilkan nama kategori artikel.
**Jawaban:** Modifikasi telah diimplementasikan pada `artikel/detail.php`. Data `nama_kategori` diambil melalui relasi JOIN di dalam model, dan disuntikkan ke tampilan detail.

**Modul 9: Pagination & AJAX**
> *Pertanyaan:* Tambahkan indikator loading saat data sedang diambil dari server dan Implementasikan fitur sorting (mengurutkan artikel berdasarkan judul, dll.) dengan AJAX.
**Jawaban:** Library *Pagination* CI4 telah digabung dengan kode Javascript/AJAX (`$.ajax`) untuk memicu *Sorting* tanpa perlu me-*refresh* halaman. Selama proses ini, animasi *Loading Spinner* di layar (Loading Indicator) ditampilkan.


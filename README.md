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
![Halaman About](screenshots/about.png)

### Tampilan Halaman Kontak
![Halaman Kontak](screenshots/contact.png)

---

## Kesimpulan
CodeIgniter 4 menggunakan konsep MVC yang memisahkan:
- **Model** — pengelolaan data
- **View** — tampilan halaman
- **Controller** — logika yang menghubungkan Model dan View

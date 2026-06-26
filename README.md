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
8. [Kode Program Lengkap](#kode-program-lengkap)
9. [Struktur Folder](#struktur-folder)


---

## Praktikum 1: PHP Framework (CodeIgniter)

### Tujuan Praktikum

1. Mahasiswa mampu memahami konsep dasar Framework dan pola MVC (Model-View-Controller).
2. Mahasiswa mampu menggunakan Framework CodeIgniter 4 untuk membuat program web sederhana.

### Langkah-langkah Praktikum

1. **Mengaktifkan Ekstensi PHP.** Membuka file `php.ini` pada direktori PHP kemudian mengaktifkan ekstensi `intl` dan `mbstring` dengan menghapus tanda titik koma (`;`) pada baris ekstensi yang sesuai.

2. **Instalasi dan Konfigurasi CodeIgniter 4.** Mengekstrak framework CodeIgniter 4 ke dalam folder `htdocs`, melakukan rename pada file `env` menjadi `.env`, dan mengubah nilai environment menjadi `development`.

3. **Membuat Route.** Menambahkan route ke halaman About, Contact, dan FAQ pada file `app/Config/Routes.php`.

```php
// app/Config/Routes.php - Route untuk halaman statis
$routes->get('/', 'Page::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/artikel', 'Page::artikel');
```

4. **Membuat Controller Page.** File `app/Controllers/Page.php`.

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
            'title' => 'Frequently Asked Questions',
            'content' => 'Ini adalah halaman FAQ.'
        ]);
    }
}
```

5. **View Layout.** Memisahkan struktur dasar HTML menjadi `header.php` dan `footer.php`.

```php
<!-- app/Views/template/header.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
</head>
<body>
    <div id="wrapper">
        <header>
            <h1>Web Programming 2</h1>
            <nav>
                <a href="<?= base_url('/'); ?>">Home</a>
                <a href="<?= base_url('/about'); ?>">About</a>
                <a href="<?= base_url('/artikel'); ?>">Artikel</a>
                <a href="<?= base_url('/contact'); ?>">Kontak</a>
                <a href="<?= base_url('/faqs'); ?>">FAQ</a>
            </nav>
        </header>
        <section id="main">
```

```php
<!-- app/Views/template/footer.php -->
        </section>
        <footer>
            <p>&copy; 2026 Universitas Pelita Bangsa</p>
        </footer>
    </div>
</body>
</html>
```

### Pertanyaan dan Tugas

> **Pertanyaan:** Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga semua link pada navigasi header dapat menampilkan tampilan dengan layout yang sama.
>
> **Jawaban:** Telah diselesaikan dengan menambahkan method `contact()`, `faqs()`, dan `artikel()` pada `Page.php`. Seluruh method mereturn view yang menggunakan template `header.php` dan `footer.php`.

### Dokumentasi Screenshot

| Halaman | Screenshot |
|---------|-----------|
| Halaman Beranda (Landing Page) | ![Halaman Beranda](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/00_user_beranda.png?raw=true) |
| Halaman About | ![Halaman About](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/00_user_halaman_about.png?raw=true) |

---

## Praktikum 2: Framework Lanjutan (CRUD)

### Tujuan Praktikum

1. Mahasiswa mampu memahami konsep dasar Model dalam arsitektur CI4.
2. Mahasiswa mampu mengimplementasikan sistem CRUD (Create, Read, Update, Delete).

### Langkah-langkah Praktikum

1. **Membuat Database.** Membuat database MySQL `lab_ci4` dan tabel `artikel`.

```sql
CREATE TABLE artikel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    isi TEXT,
    slug VARCHAR(255),
    gambar VARCHAR(255),
    status TINYINT(1) DEFAULT 0,
    id_kategori INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

2. **Konfigurasi Koneksi Database.**

```
# .env
database.default.hostname = localhost
database.default.database = lab_ci4
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

3. **Membuat Model Artikel.**

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table         = 'artikel';
    protected $primaryKey    = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = ['judul', 'isi', 'status', 'slug', 'gambar', 'id_kategori'];
}
```

4. **Controller Artikel (CRUD).**

```php
<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    public function index()
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->findAll();
        return view('artikel/index', $data);
    }

    public function view($slug)
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->where('slug', $slug)->first();
        if (!$data['artikel']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan.');
        }
        return view('artikel/detail', $data);
    }

    public function add()
    {
        if ($this->request->getMethod() === 'post') {
            $model = new ArtikelModel();
            $file = $this->request->getFile('gambar');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $imageName = $file->getRandomName();
                $file->move('uploads/gambar', $imageName);
            }
            $slug = url_title($this->request->getPost('judul'), '-', true);
            $model->save([
                'judul'  => $this->request->getPost('judul'),
                'isi'    => $this->request->getPost('isi'),
                'slug'   => $slug,
                'gambar' => $imageName ?? null,
                'id_kategori' => $this->request->getPost('id_kategori'),
            ]);
            session()->setFlashdata('success', 'Artikel berhasil ditambahkan.');
            return redirect()->to('/admin/artikel');
        }
        return view('artikel/add');
    }

    public function edit($id)
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->find($id);
        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('gambar');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $imageName = $file->getRandomName();
                $file->move('uploads/gambar', $imageName);
            }
            $slug = url_title($this->request->getPost('judul'), '-', true);
            $model->update($id, [
                'judul'  => $this->request->getPost('judul'),
                'isi'    => $this->request->getPost('isi'),
                'slug'   => $slug,
                'gambar' => $imageName ?? $data['artikel']['gambar'],
                'id_kategori' => $this->request->getPost('id_kategori'),
            ]);
            session()->setFlashdata('success', 'Artikel berhasil diubah.');
            return redirect()->to('/admin/artikel');
        }
        return view('artikel/edit', $data);
    }

    public function delete($id)
    {
        $model = new ArtikelModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Artikel berhasil dihapus.');
        return redirect()->to('/admin/artikel');
    }
}
```

### Dokumentasi Screenshot

| Tampilan | Screenshot |
|----------|-----------|
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

1. **Layout Utama.** File `app/Views/layout/main.php` sebagai template induk.

```php
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title'); ?></title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
</head>
<body>
    <div id="wrapper">
        <header>
            <h1>Web Programming 2</h1>
            <nav>
                <a href="<?= base_url('/'); ?>">Home</a>
                <a href="<?= base_url('/about'); ?>">About</a>
                <a href="<?= base_url('/artikel'); ?>">Artikel</a>
                <a href="<?= base_url('/contact'); ?>">Kontak</a>
                <a href="<?= base_url('/faqs'); ?>">FAQ</a>
            </nav>
        </header>
        <section id="main">
            <?= $this->renderSection('content'); ?>
        </section>
        <footer>
            <p>&copy; 2026 Universitas Pelita Bangsa</p>
        </footer>
    </div>
</body>
</html>
```

2. **View yang Menggunakan Layout.**

```php
<!-- app/Views/about.php -->
<?= $this->extend('layout/main'); ?>

<?= $this->section('title'); ?>About<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="about">
    <h2>About</h2>
    <p><?= $content; ?></p>
</div>
<?= $this->endSection(); ?>
```

3. **View Cell untuk Komponen Dinamis.**

```php
<?php

namespace App\Cells;

use App\Models\ArtikelModel;

class ArtikelTerkini
{
    public function render(): string
    {
        $model = new ArtikelModel();
        $artikel = $model->where('status', 1)->orderBy('created_at', 'DESC')->findAll(5);
        return view('cells/artikel_terkini', ['artikel' => $artikel]);
    }
}
```

4. **View Cell Filter Berdasarkan Kategori.**

```php
<?php

namespace App\Cells;

use App\Models\ArtikelModel;

class ArtikelByKategori
{
    public function render($params = []): string
    {
        $kategoriId = $params['kategori_id'] ?? null;
        $model = new ArtikelModel();

        if ($kategoriId) {
            $artikel = $model->where('id_kategori', $kategoriId)
                ->where('status', 1)
                ->orderBy('created_at', 'DESC')
                ->findAll(5);
        } else {
            $artikel = $model->where('status', 1)
                ->orderBy('created_at', 'DESC')
                ->findAll(5);
        }

        return view('cells/artikel_by_kategori', ['artikel' => $artikel, 'kategori_id' => $kategoriId]);
    }
}
```

```php
<!-- app/Views/cells/artikel_by_kategori.php -->
<ul>
    <?php foreach ($artikel as $row): ?>
    <li>
        <a href="<?= base_url('/artikel/' . $row['slug']); ?>">
            <?= $row['judul']; ?>
        </a>
        <small>(<?= date('d M Y', strtotime($row['created_at'])); ?>)</small>
    </li>
    <?php endforeach; ?>
</ul>
```

Pemanggilan di view:
```php
<?= view_cell('ArtikelByKategori::render', ['kategori_id' => 1]); ?>
```

### Pertanyaan dan Tugas

> **Pertanyaan 1:** Sesuaikan data dengan praktikum sebelumnya, perlu melakukan perubahan field pada database dengan menambahkan tanggal agar dapat mengambil data artikel terbaru.
>
> **Jawaban:** Secara default, tabel `artikel` sudah memiliki kolom `created_at` dan `updated_at` dengan tipe `DATETIME`. Model `ArtikelModel` sudah mengaktifkan `$useTimestamps = true` sehingga kolom tanggal otomatis terisi. Untuk mengambil artikel terbaru, gunakan `orderBy('created_at', 'DESC')`.

> **Pertanyaan 2:** Apa manfaat utama dari penggunaan View Layout dalam pengembangan aplikasi?
>
> **Jawaban:**
> 1. **Code Reusability** — Kode HTML yang sama (header, footer, sidebar) ditulis sekali dan digunakan di semua halaman, menghilangkan duplikasi.
> 2. **Konsistensi UI** — Seluruh halaman memiliki struktur HTML yang seragam karena menggunakan layout induk yang sama.
> 3. **Maintenance Mudah** — Perubahan pada header atau footer cukup dilakukan di satu file layout, tidak perlu mengubah setiap halaman satu per satu.
> 4. **Pemisahan Konten & Struktur** — Setiap halaman hanya fokus pada kontennya (section `content`), sedangkan struktur HTML ditangani oleh layout.

> **Pertanyaan 3:** Jelaskan perbedaan antara View Cell dan View biasa.
>
> **Jawaban:**
>
> | Aspek | View Biasa | View Cell |
> |-------|-----------|-----------|
> | Paradigma | Statis — data dikirim dari controller | Dinamis — komponen mandiri dengan logika sendiri |
> | Pemanggilan | `return view('nama_view', $data)` | `view_cell('NamaCell::render')` |
> | Logika | Bergantung pada controller | Memiliki class sendiri dengan logika server-side |
> | Penggunaan | Halaman penuh (layout halaman) | Komponen kecil yang muncul di banyak halaman (sidebar, widget) |
> | Data | Dikirim dari controller sebagai parameter | Diambil sendiri dari database melalui class Cell |

> **Pertanyaan 4:** Ubah View Cell agar hanya menampilkan post dengan kategori tertentu.
>
> **Jawaban:** Telah dibuat `ArtikelByKategori` Cell (lihat kode di atas) yang menerima parameter `kategori_id`. Ketika parameter diberikan, Cell hanya menampilkan artikel dari kategori tersebut. Pemanggilan: `<?= view_cell('ArtikelByKategori::render', ['kategori_id' => 1]); ?>`

### Dokumentasi Screenshot

| Tampilan | Screenshot |
|----------|-----------|
| Halaman About dengan Layout dan Sidebar | ![About Layout](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/00_user_halaman_about.png?raw=true) |

---

## Praktikum 4: Framework Lanjutan (Modul Login)

### Tujuan Praktikum

Mahasiswa mampu membuat sistem autentikasi pengguna menggunakan Session bawaan CodeIgniter 4.

### Langkah-langkah Praktikum

1. **Tabel User.**

```sql
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    useremail VARCHAR(200) NOT NULL,
    userpassword VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

2. **User Model.**

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'user';
    protected $primaryKey    = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    protected $allowedFields = ['username', 'useremail', 'userpassword'];
}
```

3. **Controller Login.**

```php
<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            $user = $model->where('useremail', $this->request->getPost('email'))->first();
            if ($user && password_verify($this->request->getPost('password'), $user['userpassword'])) {
                session()->set([
                    'logged_in' => true,
                    'username'  => $user['username'],
                ]);
                session()->setFlashdata('success', 'Login berhasil.');
                return redirect()->to('/admin/artikel');
            }
            session()->setFlashdata('error', 'Email atau password salah.');
            return redirect()->to('/user/login');
        }
        return view('user/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/user/login');
    }
}
```

4. **Auth Filter.**

```php
<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            session()->setFlashdata('error', 'Silakan login terlebih dahulu.');
            return redirect()->to('/user/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
```

5. **Route dengan Filter Auth.**

```php
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->get('artikel/add', 'Artikel::add');
    $routes->post('artikel', 'Artikel::add');
    $routes->get('artikel/edit/(:num)', 'Artikel::edit/$1');
    $routes->post('artikel/edit/(:num)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:num)', 'Artikel::delete/$1');
});
```

**Kredensial Admin:**
- Email: `admin@email.com`
- Password: `admin123`

### Dokumentasi Screenshot

| Tampilan | Screenshot |
|----------|-----------|
| Halaman Login Admin | ![Form Login](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/02_admin_daftar_artikel.png?raw=true) |

---

## Praktikum 5: Pagination dan Pencarian

### Tujuan Praktikum

1. Mahasiswa mampu memahami konsep dasar Pagination.
2. Mahasiswa mampu memahami konsep dasar Pencarian (Search).
3. Mahasiswa mampu mengimplementasikan Pagination dan Pencarian menggunakan CI4.

### Langkah-langkah Praktikum

1. **Implementasi Pagination + Search di Controller.**

```php
public function index()
{
    $model = new ArtikelModel();
    $keyword = $this->request->getGet('q');
    if ($keyword) {
        $model->like('judul', $keyword);
    }
    $data = [
        'artikel' => $model->paginate(10),
        'pager'   => $model->pager,
        'keyword' => $keyword,
    ];
    return view('artikel/index', $data);
}
```

2. **Navigasi Pagination di View.**

```php
<div class="pagination">
    <?= $pager->only(['q'])->links(); ?>
</div>
```

3. **Form Pencarian.**

```php
<form method="GET" action="">
    <input type="text" name="q" placeholder="Cari artikel..." value="<?= $keyword ?? ''; ?>">
    <button type="submit">Cari</button>
</form>
```

### Dokumentasi Screenshot

| Tampilan | Screenshot |
|----------|-----------|
| Pagination dan Pencarian | ![Pagination](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/02_admin_daftar_artikel.png?raw=true) |

---

## Praktikum 6: Pencarian Lanjutan dan Relasi Tabel

### Tujuan Praktikum

1. Mahasiswa mampu memahami relasi antar tabel database.
2. Mahasiswa mampu memodifikasi layout agar dinamis menggunakan View Cell.

### Langkah-langkah Praktikum

1. **Tabel Kategori.**

```sql
CREATE TABLE kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100) NOT NULL,
    slug_kategori VARCHAR(100),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO kategori (nama_kategori, slug_kategori) VALUES
('Artificial Intelligence', 'artificial-intelligence'),
('Jaringan Komputer', 'jaringan-komputer'),
('Pendidikan', 'pendidikan');
```

2. **Kategori Model.**

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table         = 'kategori';
    protected $primaryKey    = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = ['nama_kategori', 'slug_kategori'];
}
```

3. **Relasi JOIN untuk Detail Artikel.**

```php
public function view($slug)
{
    $model = new ArtikelModel();
    $artikel = $model
        ->select('artikel.*, kategori.nama_kategori')
        ->join('kategori', 'kategori.id = artikel.id_kategori', 'left')
        ->where('artikel.slug', $slug)
        ->first();

    if (!$artikel) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan.');
    }
    return view('artikel/detail', ['artikel' => $artikel]);
}
```

4. **View Cell Kategori di Sidebar.** Menampilkan daftar kategori di halaman depan.

```php
<?php

namespace App\Cells;

use App\Models\KategoriModel;

class KategoriList
{
    public function render(): string
    {
        $model = new KategoriModel();
        $kategori = $model->findAll();
        return view('cells/kategori_list', ['kategori' => $kategori]);
    }
}
```

```php
<!-- app/Views/cells/kategori_list.php -->
<ul>
    <?php foreach ($kategori as $row): ?>
    <li>
        <a href="<?= base_url('/artikel/kategori/' . $row['slug_kategori']); ?>">
            <?= $row['nama_kategori']; ?>
        </a>
    </li>
    <?php endforeach; ?>
</ul>
```

5. **Fungsi Menampilkan Artikel Berdasarkan Kategori.**

```php
// app/Controllers/Artikel.php
public function kategori($slug_kategori)
{
    $kategoriModel = new KategoriModel();
    $artikelModel  = new ArtikelModel();

    $kategori = $kategoriModel->where('slug_kategori', $slug_kategori)->first();

    if (!$kategori) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Kategori tidak ditemukan.');
    }

    $artikel = $artikelModel
        ->select('artikel.*, kategori.nama_kategori')
        ->join('kategori', 'kategori.id = artikel.id_kategori', 'left')
        ->where('artikel.id_kategori', $kategori['id'])
        ->where('artikel.status', 1)
        ->findAll();

    $data = [
        'title'         => 'Kategori: ' . $kategori['nama_kategori'],
        'artikel'       => $artikel,
        'nama_kategori' => $kategori['nama_kategori'],
    ];

    return view('artikel/kategori', $data);
}
```

```php
// app/Config/Routes.php
$routes->get('/artikel/kategori/(:any)', 'Artikel::kategori/$1');
```

### Pertanyaan dan Tugas

> **Pertanyaan 1:** Selesaikan semua langkah praktikum di atas.
>
> **Jawaban:** Seluruh langkah telah diselesaikan: pembuatan tabel kategori, model kategori, relasi JOIN pada controller, dan View Cell untuk menampilkan kategori di sidebar.

> **Pertanyaan 2:** Modifikasi tampilan detail artikel (artikel/detail.php) untuk menampilkan nama kategori artikel.
>
> **Jawaban:** Data `nama_kategori` diambil melalui operasi JOIN antara tabel `artikel` dan `kategori`, kemudian ditampilkan di `detail.php` menggunakan `<?= $artikel['nama_kategori']; ?>`.

> **Pertanyaan 3:** Tambahkan fitur untuk menampilkan daftar kategori di halaman depan (opsional).
>
> **Jawaban:** Telah dibuat `KategoriList` Cell (lihat kode di atas) yang menampilkan seluruh daftar kategori dari database di sidebar. Setiap kategori menjadi tautan ke halaman artikel per kategori.

> **Pertanyaan 4:** Buat fungsi untuk menampilkan artikel berdasarkan kategori tertentu (opsional).
>
> **Jawaban:** Telah dibuat method `kategori($slug_kategori)` pada `ArtikelController` yang memfilter artikel berdasarkan `slug_kategori`. Route: `$routes->get('/artikel/kategori/(:any)', 'Artikel::kategori/$1');`

### Dokumentasi Screenshot

| Tampilan | Screenshot |
|----------|-----------|
| Detail Artikel dengan Informasi Kategori | ![Detail Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/01_user_daftar_artikel.png?raw=true) |

---

## Praktikum 9: AJAX dan Real-time Pagination

### Tujuan Praktikum

1. Mahasiswa mampu memahami prinsip kerja AJAX (Asynchronous JavaScript and XML).
2. Mahasiswa mampu mengimplementasikan pemuatan data secara asinkron.

### Langkah-langkah Praktikum

1. **Controller AJAX.**

```php
<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class AjaxController extends BaseController
{
    public function index()
    {
        return view('ajax/index', ['title' => 'Data Artikel (AJAX)']);
    }

    public function getData()
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->findAll();
        return $this->response->setJSON($data);
    }
}
```

2. **View AJAX dengan jQuery (Loading Indicator + Sorting).**

```html
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
// Fungsi fetch data dengan loading indicator + sorting
function fetchData(sortField, sortOrder) {
    $('#loading-indicator').show();
    $.ajax({
        url: '<?= base_url("ajax/getData") ?>',
        type: 'GET',
        data: {
            sort: sortField || 'id',
            order: sortOrder || 'DESC'
        },
        dataType: 'json',
        success: function(response) {
            var html = '';
            $.each(response.artikel, function(i, row) {
                html += '<tr>';
                html += '<td>' + row.id + '</td>';
                html += '<td>' + row.judul + '</td>';
                html += '<td>' + (row.status == 1 ? 'Published' : 'Draft') + '</td>';
                html += '<td><a href="<?= base_url('admin/artikel/edit/') ?>' + row.id + '">Edit</a></td>';
                html += '</tr>';
            });
            $('#artikel-list').html(html);
            $('#loading-indicator').hide();
        },
        error: function() {
            $('#artikel-list').html('<tr><td colspan="4">Gagal memuat data.</td></tr>');
            $('#loading-indicator').hide();
        }
    });
}

// Panggil saat halaman dimuat
$(document).ready(function() {
    fetchData('id', 'DESC');
});

// Sorting klik header kolom
$(document).on('click', '.sortable', function() {
    var field = $(this).data('field');
    var order = $(this).data('order');
    $(this).data('order', order === 'ASC' ? 'DESC' : 'ASC');
    fetchData(field, order);
});
</script>

<!-- Loading Indicator -->
<div id="loading-indicator" style="display:none; text-align:center; padding:20px;">
    <img src="<?= base_url('loading.gif'); ?>" alt="Memuat data..." />
    <p>Memuat data...</p>
</div>
```

3. **Route AJAX + REST API.**

```php
$routes->get('/ajax', 'AjaxController::index');
$routes->get('/ajax/getData', 'AjaxController::getData');
$routes->resource('post');
```

4. **REST API Controller (Post.php).**

```php
<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ArtikelModel;

class Post extends ResourceController
{
    use \CodeIgniter\API\ResponseTrait;

    // GET /post - Tampilkan semua artikel
    public function index()
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    // GET /post/{id} - Tampilkan satu artikel
    public function show($id = null)
    {
        $model = new ArtikelModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        }
        return $this->failNotFound('Data tidak ditemukan.');
    }

    // POST /post - Tambah artikel baru
    public function create()
    {
        $model = new ArtikelModel();
        $data = [
            'judul' => $this->request->getVar('judul'),
            'isi'   => $this->request->getVar('isi'),
        ];
        $model->insert($data);
        return $this->respondCreated([
            'status' => 201,
            'messages' => ['success' => 'Data artikel berhasil ditambahkan.']
        ]);
    }

    // PUT /post/{id} - Update artikel
    public function update($id = null)
    {
        $model = new ArtikelModel();
        $rawData = $this->request->getRawInput();
        $id = $rawData['id'] ?? $id;
        $data = [
            'judul' => $rawData['judul'] ?? $this->request->getVar('judul'),
            'isi'   => $rawData['isi'] ?? $this->request->getVar('isi'),
        ];
        $data = array_filter($data, function($v) { return $v !== null; });
        $model->update($id, $data);
        return $this->respond([
            'status' => 200,
            'messages' => ['success' => 'Data artikel berhasil diubah.']
        ]);
    }

    // DELETE /post/{id} - Hapus artikel
    public function delete($id = null)
    {
        $model = new ArtikelModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            return $this->respondDeleted([
                'status' => 200,
                'messages' => ['success' => 'Data artikel berhasil dihapus.']
            ]);
        }
        return $this->failNotFound('Data tidak ditemukan.');
    }
}
```

### Dokumentasi Screenshot

| Tampilan | Screenshot |
|----------|-----------|
| Tabel Artikel dengan AJAX | ![AJAX Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/08_ajax_data_artikel.png?raw=true) |
| Response JSON Endpoint API | ![API JSON](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/07_api_json_response.png?raw=true) |

---

## Kode Program Lengkap

Untuk melihat kode program secara lengkap, silakan akses file-file berikut pada repositori:

| File | Path | Keterangan |
|------|------|-----------|
| Controller Page | `app/Controllers/Page.php` | Controller halaman statis (About, Contact, FAQ) |
| Controller Artikel | `app/Controllers/Artikel.php` | Controller CRUD artikel |
| Controller User | `app/Controllers/User.php` | Controller login/logout |
| Controller Post | `app/Controllers/Post.php` | REST API ResourceController |
| Controller AJAX | `app/Controllers/AjaxController.php` | Controller endpoint AJAX |
| Model Artikel | `app/Models/ArtikelModel.php` | Model tabel artikel |
| Model Kategori | `app/Models/KategoriModel.php` | Model tabel kategori |
| Model User | `app/Models/UserModel.php` | Model tabel user |
| Filter Auth | `app/Filters/Auth.php` | Filter autentikasi admin |
| Routes | `app/Config/Routes.php` | Definisi seluruh route |
| Layout Utama | `app/Views/layout/main.php` | Template layout induk |
| View AJAX | `app/Views/ajax/index.php` | Halaman AJAX dengan jQuery |

---

## Struktur Folder

```
Lab7Web/
├── ci4/                                # CodeIgniter 4 Framework
│   ├── app/
│   │   ├── Config/                     # Konfigurasi Routes, Filters, Database
│   │   ├── Controllers/                # Page, Artikel, User, Post, AjaxController
│   │   ├── Models/                     # ArtikelModel, UserModel, KategoriModel
│   │   ├── Views/                      # Template, Layout, View komponen
│   │   │   ├── template/               # header.php, footer.php
│   │   │   ├── layout/                 # main.php (layout induk)
│   │   │   ├── cells/                  # artikel_terkini.php, kategori_list.php
│   │   │   ├── artikel/                # index, detail, admin_index, add, edit
│   │   │   ├── ajax/                   # index.php
│   │   │   └── user/                   # login.php
│   │   ├── Cells/                      # View Cell (ArtikelTerkini, KategoriList)
│   │   └── Filters/                    # Auth, ApiAuthFilter
│   ├── public/                         # Entry point, style.css
│   │   └── uploads/gambar/             # Upload file gambar artikel
│   ├── router.php                      # CORS handler
│   └── ...
├── Secrenshoot/                        # Dokumentasi screenshot praktikum
└── README.md
```

---

**(c) 2026 Muhammad Arkhamullah R.A - Laporan Praktikum Pemrograman Web 2**  
**Program Studi Teknik Informatika - Universitas Pelita Bangsa**



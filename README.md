# 📖 Praktikum 1: PHP Framework (CodeIgniter)

### 🎯 Tujuan Praktikum
1. Memahami konsep dasar Framework.
2. Memahami konsep dasar MVC.
3. Membuat program sederhana menggunakan Framework CodeIgniter 4.

---

### 🛠️ Langkah-langkah Praktikum

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

### 🏆 Hasil Praktikum

### Tampilan Halaman About
![Halaman About](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20074752.png?raw=true)

### Tampilan Halaman Kontak
![Halaman Kontak](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20074838.png?raw=true)

---

### 📝 Kesimpulan
CodeIgniter 4 menggunakan konsep MVC yang memisahkan:
- **Model** ΓÇö pengelolaan data
- **View** ΓÇö tampilan halaman
- **Controller** ΓÇö lBerikut README untuk **Praktikum 2**:

```
```

### 💡 Pertanyaan dan Tugas
> **Pertanyaan:**  
> Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga semua link pada navigasi header dapat menampilkan tampilan dengan layout yang sama.
> 
> **Jawaban & Implementasi:**  
> Tugas ini telah diselesaikan dengan memodifikasi `Page.php` untuk memuat fungsi `contact()`, `artikel()`, dll., di mana masing-masing me-return *view* yang membungkus (include) layout dinamis `header.php` dan `footer.php`.

### 📸 Screenshot Hasil Kerja
> **Silakan ganti tag `#` di bawah ini dengan URL gambar Anda**
> ![Hasil Praktikum](#)

---
# 📖 Praktikum 2: Framework Lanjutan (CRUD)

### 🎯 Tujuan Praktikum
1. Memahami konsep dasar Model.
2. Memahami konsep dasar CRUD.
3. Membuat program sederhana menggunakan Framework CodeIgniter 4.

---

### 🛠️ Langkah-langkah Praktikum

### 1. Membuat Database
Buka MySQL CLI dan jalankan perintah berikut:
```sql
CREATE DATABASE lab_ci4;
USE lab_ci4;
CREATE TABLE artikel (
    id INT(11) auto_increment,
    judul VARCHAR(200) NOT NULL,
    isi TEXT,
    gambar VARCHAR(200),
    status TINYINT(1) DEFAULT 0,
    slug VARCHAR(200),
    PRIMARY KEY(id)
);
```

### 2. Konfigurasi Database di .env
```
database.default.hostname = localhost
database.default.database = lab_ci4
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
```

### 3. Membuat Model
Buat file `app/Models/ArtikelModel.php`:
```php
<?php
namespace App\Models;
use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul', 'isi', 'status', 'slug', 'gambar'];
}
```

### 4. Membuat Controller Artikel
Buat file `app/Controllers/Artikel.php` berisi method:
- `index()` ΓÇö menampilkan daftar artikel
- `view($slug)` ΓÇö menampilkan detail artikel
- `admin_index()` ΓÇö halaman admin
- `add()` ΓÇö tambah artikel
- `edit($id)` ΓÇö ubah artikel
- `delete($id)` ΓÇö hapus artikel

### 5. Membuat View Artikel
Buat folder `app/Views/artikel/` berisi:
- `index.php` ΓÇö daftar artikel
- `detail.php` ΓÇö detail artikel
- `admin_index.php` ΓÇö tabel admin
- `form_add.php` ΓÇö form tambah
- `form_edit.php` ΓÇö form edit

### 6. Menambah Data Awal
```sql
INSERT INTO artikel (judul, isi, slug) VALUES
('Artikel pertama', 'Lorem Ipsum adalah contoh teks...', 'artikel-pertama'),
('Artikel kedua', 'Tidak seperti anggapan banyak orang...', 'artikel-kedua');
```

---

### 🏆 Hasil Praktikum

### Tampilan Daftar Artikel
![Daftar Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20075543.png?raw=true)

### Tampilan Detail Artikel
![Detail Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20075543.png?raw=true)

### Tampilan Admin
![Admin](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20080019.png?raw=true)

### Tampilan Form Tambah Artikel
![Form Tambah](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20080151.png?raw=true)

### Tampilan Form Edit Artikel
![Form Edit](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20080219.png?raw=true)

---

### 📝 Kesimpulan
Pada praktikum ini telah berhasil membuat aplikasi CRUD sederhana menggunakan CodeIgniter 4 dengan fitur:
- Menampilkan daftar artikel
- Menampilkan detail artikel
- Menambah artikel baru
- Mengubah artikel
- Menghapus artikel
---

---

# 📖 Praktikum 3: View Layout dan View Cell

### 🎯 Tujuan Praktikum
1. Memahami konsep View Layout di CodeIgniter 4.
2. Menggunakan View Layout untuk membuat template tampilan.
3. Memahami dan mengimplementasikan View Cell dalam CodeIgniter 4.
4. Menggunakan View Cell untuk memanggil komponen UI secara modular.

---

### 🛠️ Langkah-langkah Praktikum

### 1. Membuat Layout Utama
Buat folder `layout` di dalam `app/Views/`, kemudian buat file `main.php`:
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'My Website' ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css');?>">
</head>
<body>
...
<?= $this->renderSection('content') ?>
...
</body>
</html>
```

### 2. Membuat Class View Cell
Buat folder `Cells` di dalam `app/`, kemudian buat file `ArtikelTerkini.php`:
```php
<?php
namespace App\Cells;

use App\Models\ArtikelModel;

class ArtikelTerkini
{
    public function index()
    {
        $model = new ArtikelModel();
        $artikel = $model->orderBy('created_at', 'DESC')->limit(5)->findAll();
        return view('components/artikel_terkini', ['artikel' => $artikel]);
    }
}
```

### 3. Membuat View Component
Buat folder `components` di dalam `app/Views/`, kemudian buat file `artikel_terkini.php`:
```php
<div class="widget-box">
<h3 class="title">Artikel Terkini</h3>
<ul>
<?php foreach ($artikel as $row): ?>
<li><a href="<?= base_url('/artikel/' . $row['slug']) ?>"><?= $row['judul'] ?></a></li>
<?php endforeach; ?>
</ul>
</div>
```

### 4. Modifikasi View
Ubah semua view agar menggunakan layout baru dengan cara:
```php
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

// konten halaman di sini

<?= $this->endSection() ?>
```

### 5. Menambah Field created_at
Tambahkan kolom `created_at` pada tabel artikel:
```sql
ALTER TABLE artikel ADD COLUMN created_at DATETIME DEFAULT CURRENT_TIMESTAMP;
```

---

### 🏆 Hasil Praktikum

### Tampilan Halaman Artikel dengan Layout Baru
![Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20075543.png?raw=true)

### Tampilan Halaman About dengan Sidebar Artikel Terkini
![About](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20080933.png?raw=true)

---

## Jawaban Pertanyaan

### 1. Apa manfaat utama dari penggunaan View Layout?
View Layout memudahkan pengelolaan tampilan secara terpusat. Dengan satu file layout utama, semua halaman dapat menggunakan struktur HTML yang sama tanpa perlu menulis ulang kode header, footer, dan sidebar di setiap halaman.

### 2. Jelaskan perbedaan antara View Cell dan View biasa!
| Fitur | View Cell | View Biasa |
|-------|-----------|------------|
| Punya class sendiri | Ya | Tidak |
| Bisa akses Model mandiri | Ya | Tidak (harus lewat Controller) |
| Bisa terima parameter | Ya | Terbatas |
| Cocok untuk | Widget dinamis | Halaman statis |

### 3. Ubah View Cell agar hanya menampilkan post dengan kategori tertentu
Tambahkan parameter kategori pada method `index()`:
```php
public function index($kategori = null)
{
    $model = new ArtikelModel();
    if ($kategori) {
        $artikel = $model->where('kategori', $kategori)
                        ->orderBy('created_at', 'DESC')
                        ->limit(5)->findAll();
    } else {
        $artikel = $model->orderBy('created_at', 'DESC')
                        ->limit(5)->findAll();
    }
    return view('components/artikel_terkini', ['artikel' => $artikel]);
}
```

---
#
### 📸 Screenshot Hasil Kerja
> **Silakan ganti tag `#` di bawah ini dengan URL gambar Anda**
> ![Hasil Praktikum](#)

---
# 📖 Praktikum 4: Framework Lanjutan (Modul Login)

#### 🎯 Tujuan Praktikum
- Memahami konsep Auth dan Filter
- Memahami konsep dasar Login System
- Membuat modul login menggunakan Framework CodeIgniter 4

#### 🛠️ Langkah-langkah Praktikum

#### 1. Membuat Tabel User
```sql
CREATE TABLE user (
    id INT(11) auto_increment,
    username VARCHAR(200) NOT NULL,
    useremail VARCHAR(200),
    userpassword VARCHAR(200),
    PRIMARY KEY(id)
);
```

#### 2. Membuat Model User
Buat `app/Models/UserModel.php`:
```php
<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'useremail', 'userpassword'];
}
```

#### 3. Membuat Controller User
Buat `app/Controllers/User.php` dengan method `login()` dan `logout()`.

#### 4. Membuat View Login
Buat `app/Views/user/login.php` berisi form Sign In dengan field email dan password.

#### 5. Membuat Database Seeder
```
php spark make:seeder UserSeeder
php spark db:seed UserSeeder
```
Data login:
- Email: `admin@email.com`
- Password: `admin123`

#### 6. Membuat Auth Filter
Buat `app/Filters/Auth.php`:
```php
<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/user/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
```

#### 7. Konfigurasi Filters.php
Tambahkan alias `auth` pada `app/Config/Filters.php`:
```php
'auth' => Auth::class,
```

#### 8. Update Routes.php
```php
$routes->get('/user/login', 'User::login');
$routes->post('/user/login', 'User::login');
$routes->get('/user/logout', 'User::logout');

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});
```

### Hasil
- Halaman admin hanya bisa diakses setelah login
- Jika belum login, otomatis redirect ke halaman login
- Logout menghapus session dan redirect ke halaman login

### Screenshot

#### Tampilan Form Login
![Login Form](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20091948.png?raw=true)

#### Tampilan Redirect ke Login (sebelum login)
![Redirect Login](img/redirect_login.png)

#### Tampilan Admin Artikel (setelah login)
![Admin Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20092322.png?raw=true)

#### Tampilan Tambah Artikel
![Tambah Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20080151.png?raw=true)

#### Tampilan Edit Artikel
![Edit Artikel](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-02%20080219.png?raw=true)

---

# 📖 Praktikum 5: Pagination dan Pencarian

### 🎯 Tujuan Praktikum
1. Memahami konsep dasar Pagination.
2. Memahami konsep dasar Pencarian.
3. Membuat Paging dan Pencarian menggunakan Framework CodeIgniter 4.

### 🛠️ Langkah-langkah Praktikum

### 1. Membuat Pagination

Modifikasi method `admin_index()` di `app/Controllers/Artikel.php`:
```php
public function admin_index() 
{
    $title = 'Daftar Artikel';
    $q = $this->request->getVar('q') ?? '';
    $model = new ArtikelModel();
    $data = [
        'title'   => $title,
        'q'       => $q,
        'artikel' => $model->like('judul', $q)->paginate(10),
        'pager'   => $model->pager,
    ];
    return view('artikel/admin_index', $data);
}
```

### 2. Menambahkan Link Pagination di View
Tambahkan kode berikut di `app/Views/artikel/admin_index.php` 
setelah tag `</table>`:
```php
<?= $pager->only(['q'])->links(); ?>
```

### 3. Membuat Form Pencarian
Tambahkan form pencarian di `app/Views/artikel/admin_index.php` 
sebelum tabel:
```php
<form method="get" class="form-search">
    <input type="text" name="q" value="<?= $q; ?>" 
        placeholder="Cari data">
    <input type="submit" value="Cari" class="btn btn-primary">
</form>
```

---

### 🏆 Hasil Praktikum

### Tampilan Admin dengan Pagination dan Pencarian
![Admin Pagination](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-09%20104557.png?raw=true)

### Hasil Pencarian Data
![Hasil Pencarian](https://github.com/MuhammadArkham/Lab7Web/blob/main/Secrenshoot/Screenshot%202026-04-09%20104557.png?raw=true)

---

### 📝 Kesimpulan
Pagination berfungsi untuk membatasi tampilan data per halaman 
sehingga halaman tidak terlalu panjang. Fitur pencarian memungkinkan 
admin untuk memfilter data artikel berdasarkan kata kunci tertentu. 
Kedua fitur ini bekerja bersama sehingga hasil pencarian juga 
mendukung pagination.

---
View Layan View Cell adalah dua fitur CI4 yang bekerja beriringan untuk membuat UI yang modular dan efisien. View Layout mengatur kerangka besar halaman, sedangkan View Cell mengatur komponen kecil yang dinamis seperti sidebar artikel terkini.


---


---


Bagian ini melengkapi dokumentasi sebelumnya (Modul 1-5) dengan hasil pengerjaan Modul 6 hingga 12 secara terperinci.

#

### 💡 Pertanyaan dan Tugas
> **Pertanyaan:**  
> Selesaikan programnya sesuai Langkah -langkah yang ada. Anda boleh melakukan improvisasi.
> 
> **Jawaban & Implementasi:**  
> Pagination CI4 dan filter pencarian telah diimplementasikan penuh pada halaman admin sehingga data dirender per halaman tanpa memberatkan server.

### 📸 Screenshot Hasil Kerja
> **Silakan ganti tag `#` di bawah ini dengan URL gambar Anda**
> ![Hasil Praktikum](#)

---
# 📖 Praktikum 6: Pencarian dan Fitur Lanjutan

#### 🎯 Tujuan Praktikum
1. Memahami konsep filter data (pencarian) dan pagination lebih dalam.
2. Memodifikasi Layout agar lebih dinamis.
3. Mengaplikasikan **View Cell** tambahan untuk Kategori.

#### 🛠️ Langkah-langkah Praktikum
1. **Modifikasi Daftar Kategori pada Sidebar**
   Membuat file View Cell `app/Cells/KategoriList.php` untuk merender nama-nama kategori secara dinamis dari database tanpa hardcode. Menyesuaikan pemanggilan di `layout/main.php` menggunakan `view_cell()`.
2. **Menampilkan Kategori di Detail Artikel**
   Memodifikasi fungsi `view($slug)` pada controller `Artikel` agar melakukan `JOIN` tabel kategori dan menampilkan atribut `nama_kategori` secara eksplisit pada file `detail.php`.

#### 🏆 Hasil Praktikum
- Detail artikel berhasil merender informasi kategori (Bukan hanya ID, tapi string nama).
- Widget Header di-sidebar berhasil diganti dengan modul daftar kategori yang reaktif.

---

#

### 💡 Pertanyaan dan Tugas
> **Pertanyaan:**  
> 1. Selesaikan semua langkah praktikum di atas.
> 2. Modifikasi tampilan detail artikel (artikel/detail.php) untuk menampilkan nama kategori artikel.
> 
> **Jawaban & Implementasi:**  
> Data `nama_kategori` diambil melalui relasi `JOIN` dari dalam model dan berhasil disuntikkan ke dalam file `artikel/detail.php`. `View Cell` di sidebar juga telah memanggil `KategoriList`.

### 📸 Screenshot Hasil Kerja
> **Silakan ganti tag `#` di bawah ini dengan URL gambar Anda**
> ![Hasil Praktikum](#)

---
# 📖 Praktikum 7: Relasi Tabel & Upload File

#### 🎯 Tujuan Praktikum
1. Memahami pembuatan skema relasi Foreign Key (Tabel Artikel ke Kategori).
2. Memahami cara mengolah objek *File* pada server menggunakan PHP.

#### 🛠️ Langkah-langkah Praktikum
1. Menambahkan form input bertipe `file` (`enctype="multipart/form-data"`) pada `form_add.php` dan `form_edit.php`.
2. Modifikasi model `ArtikelModel` agar membaca direktori `public/gambar/`. File gambar diunggah secara aman dan namanya disimpan sebagai _string_ ke kolom `gambar` di database.
3. Melakukan *JOIN* relasi dengan tabel `kategori` untuk memastikan artikel terstruktur dengan kategori yang benar.

### Screenshot 
> *Silakan masukkan screenshot form upload gambar dan tabel admin di sini*
![Upload Form](#)

---

#

### 💡 Pertanyaan dan Tugas
> **Pertanyaan:**  
> Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan improvisasi.
> 
> **Jawaban & Implementasi:**  
> Integrasi penambahan dan pengubahan artikel kini sukses memproses upload file gambar. Nama file gambar juga sukses tersimpan sebagai string unik pada kolom database.


---

# 📖 Praktikum 8 & 9: Menguasai AJAX & Real-time Pagination

#### 🎯 Tujuan Praktikum
1. Memahami prinsip asinkronus (Asynchronous Javascript and XML).
2. Memindahkan perenderan tabel halaman *Admin* agar tidak terjadi _page-reload_ / _refresh_.

#### 🛠️ Langkah-langkah Praktikum
1. Pembuatan fungsi `fetchData` dengan **jQuery AJAX** di file `admin_index.php`.
2. Modifikasi Controller `admin_index` pada `Artikel.php` agar memeriksa fungsi `$this->request->isAJAX()`. Jika bernilai `true`, maka Controller mengembalikan format JSON berisi kumpulan array artikel dan struktur `pager`.
3. Memperbaiki komponen UI dengan standar *Bootstrap 4* mengikuti desain aslinya (`<div class="row">`, `form-inline`, `pagination`).

**Tugas Praktikum Diselesaikan:**
- ⏳ **Indikator Loading:** Menambahkan indikator visual (teks berkedip/opacity tabel dikurangi) saat request data berlangsung.
- 🔽 **Sorting Header Tabel:** Menambahkan fungsi pengurutan berdasarkan `id` atau `judul` secara asinkron dengan *click handler* pada Javascript.

### Screenshot
> *Silakan masukkan screenshot tabel admin dengan indikator sorting & AJAX di sini*
![AJAX Table](#)

---

#

### 💡 Pertanyaan dan Tugas
> **Pertanyaan:**  
> 1. Tambahkan indikator loading saat data sedang diambil dari server.
> 2. Implementasikan fitur sorting dengan AJAX.
> 
> **Jawaban & Implementasi:**  
> Animasi _Loading Spinner_ telah disisipkan saat $.ajax dipanggil. Fitur pengurutan (*Sorting*) berjalan baik memodifikasi UI secara asinkron.


---

# 📖 Praktikum 10: Pembuatan REST API Backend

#### 🎯 Tujuan Praktikum
1. Memisahkan logika backend dari tampilan _View_ CodeIgniter.
2. Membangun fondasi untuk menghubungkan klien frontend terpisah (seperti VueJS).

#### 🛠️ Langkah-langkah Praktikum
1. Membuat controller `Post.php` (extend `ResourceController`) pada direktori `app/Controllers`.
2. Implementasi method `index`, `create`, `update`, dan `delete` yang merespon secara eksklusif menggunakan output **JSON**.
3. Menyisipkan fungsi filter **CORS** (`app/Config/Filters.php`) untuk mencegah pemblokiran dari domain _localhost_ yang berbeda.

---

#
### 📸 Screenshot Hasil Kerja
> **Silakan ganti tag `#` di bawah ini dengan URL gambar Anda**
> ![Hasil Praktikum](#)

---
# 📖 Praktikum 11 & 12: SPA (Single Page Application) VueJS 3

#### 🎯 Tujuan Praktikum
1. Membuat aplikasi Front-end modern terpisah.
2. Memanfaatkan **Vue Router** dan **Axios**.

#### 🛠️ Langkah-langkah Praktikum
1. Proyek Node dinitialisasi di subfolder/repo terpisah. Modul _Vue Router_ dikonfigurasi melalui `app.js` menggunakan Webpack.
2. Pembuatan komponen `Home.js` (Halaman Utama dengan artikel terkini), `About.js` (Profil), dan `ArtikelList.js` (Halaman Dashboard/CRUD).
3. Melakukan _styling improvisasi_ dengan meniru desain `style.css` bawaan CI4 pada komponen Vue, agar antarmuka frontend terlihat harmonis dan rapi.
4. CRUD melalui *Axios* berhasil diimplementasikan dengan sempurna tanpa me-refresh browser.

### Screenshot
> *Silakan masukkan screenshot Frontend VueJS SPA Anda saat memuat, menambah, dan menghapus artikel di sini*
![VueJS Frontend](#)

---
*Laporan komprehensif dikerjakan sepenuhnya berdasarkan arahan Dosen Pengampu & Modul.*


---

#

---

# 📖 Praktikum 13 & 14: SPA Security, API Token Authentication & Interceptors

#### 🎯 Tujuan Praktikum
1. Mengamankan Single Page Application (SPA) VueJS menggunakan **Navigation Guards**.
2. Mengamankan REST API CodeIgniter 4 menggunakan **Token-Based Authentication** dan **Filters**.
3. Menangani otorisasi di klien secara otomatis menggunakan **Axios Interceptors**.

#### 🛠️ Langkah-langkah Praktikum Implementasi
1. **Pembuatan Endpoint Login (Backend CI4):**
   Membuat `Api/Auth.php` yang menerima request POST kredensial. Jika cocok dengan tabel database, sistem merespon dengan JSON berisi *Token Rahasia* (Base64 Encode).
   
2. **Pembuatan Filter API (Backend CI4):**
   Membuat `Filters/ApiAuthFilter.php` yang bertugas mencegat (intercept) setiap HTTP Request. Filter ini mengekstrak string `Authorization: Bearer <token>` dari header. Jika token valid, eksekusi dilanjutkan; jika tidak, API menolak dengan status HTTP 401 Unauthorized. Filter ini diterapkan pada rute `/post` untuk method POST, PUT, dan DELETE.

3. **Komponen Login (Frontend VueJS):**
   Membuat UI `Login.js` untuk mengambil input kredensial admin dan mengirimkan *Axios HTTP Post* ke backend. Jika sukses, status `isLoggedIn` dan `userToken` akan disimpan ke dalam `localStorage` browser.

4. **Navigation Guards (Vue Router):**
   Fungsi `router.beforeEach` memverifikasi setiap perpindahan URL internal. Jika rute memiliki konfigurasi `meta: { requiresAuth: true }` (misalnya pada halaman `/artikel` dan `/about`), sistem memeriksa `localStorage`. Jika sesi belum ada, klien otomatis dibelokkan secara paksa ke halaman `/login`.

5. **Axios Interceptors (Frontend VueJS):**
   Fungsi pencegat Axios `axios.interceptors.request.use` memastikan bahwa setiap kali frontend menarik/merubah data dari backend, *userToken* akan otomatis disuntikkan ke dalam HTTP Header secara sembunyi-sembunyi.
   Sementara itu, `axios.interceptors.response.use` memantau semua balasan backend. Jika server membalas dengan status *401 Unauthorized*, artinya sesi kedaluwarsa dan pengguna akan langsung di-logout paksa.

### Skenario Pengujian yang Telah Dilakukan
- **Skenario A (Terkunci):** Menghapus _Local Storage_ dan menekan menu **Kelola Artikel**. Aplikasi memunculkan peringatan alert penolakan dan melempar halaman ke Form Login.
- **Skenario B (Terkunci API Tanpa Token):** Mencoba melakukan request _POST/PUT_ melalui API Tools (seperti Postman) tanpa _Bearer Token_. Server menolak akses dengan respons 401.
- **Skenario C (Login Sukses):** Memasukkan akun valid, sistem mengembalikan status 200, dan menu *Logout* muncul secara dinamis di Navbar.
- **Skenario D (Aksi dengan Interceptor):** Menambahkan/Menghapus artikel di dashboard Vue; proses sukses karena Axios telah menyuntikkan token dari _Local Storage_ ke _Header_ secara transparan di balik layar.

### Screenshot Hasil Praktikum
> **Tampilan Form Login**
> ![Form Login](#)

> **Tampilan Penolakan Rute (Belum Login / Guarded)**
> ![Penolakan Rute](#)

> **Tampilan Header Network dengan Bearer Token (Axios Interceptors)**
> ![Token Tersuntik](#)

> **Tampilan Penolakan 401 Unauthorized via Postman**
> ![Error 401](#)

---
*Laporan ini merupakan penyelesaian akhir penugasan modul keamanan SPA dan REST API (Modul 13-14).*



### Jawaban Pertanyaan dan Tugas - Modul 13

**Analisis Alur Kerja `router.beforeEach` dan Axios HTTP Post:**
- **`router.beforeEach`**: Berfungsi sebagai pos satpam di sisi antarmuka (Client-Side). Sebelum halaman (seperti `/artikel` atau `/about`) dimuat secara penuh oleh browser, fungsi ini mencegat navigasi tersebut untuk memeriksa apakah terdapat jejak sesi login (kunci `isLoggedIn`) di dalam _Local Storage_. Jika kunci ini tidak ada, pengguna otomatis ditolak dan diarahkan paksa ke halaman `/login`.
- **Axios HTTP Post**: Berfungsi sebagai kurir pengantar pesan. Saat di halaman login, fungsi ini akan mengemas data _username_ dan _password_, lalu mengirimkannya ke backend CI4. Axios kemudian akan menunggu respons dari server; jika berhasil (status 200), Axios akan mengambil _Token Rahasia_ yang dikembalikan server untuk disimpan ke dalam memori browser.

---

### Jawaban Pertanyaan dan Tugas - Modul 14

**Kesimpulan Perbedaan Navigation Guards (Vue) vs Filters (CI4):**
Perbedaan mendasarnya terletak pada letak pertahanannya:
- **Vue Router Navigation Guards (Sisi Klien):** Pengamanan ini hanya berfokus pada **UI/Tampilan (Visual)**. Ini mencegah orang asing melihat halaman Dasbor Admin di browser. Namun, ini tidak bisa mencegah seorang _Hacker_ yang mahir dari mengakses atau memanipulasi _database_ secara langsung menggunakan aplikasi pengujian API seperti _Postman_ atau _cURL_ (tanpa melewati browser).
- **CodeIgniter Filters (Sisi Server):** Ini adalah **Benteng Pertahanan Utama (Data)**. Sekalipun seseorang berhasil memanipulasi _browser_ untuk bisa membuka halaman Vue, ketika ia mencoba memanipulasi data melalui API Endpoint, permintaan tersebut akan langsung menembus ke server CI4. Di titik inilah `ApiAuthFilter` akan membanting pintu dan memblokir request tersebut dengan pesan *Error 401 Unauthorized* jika tidak disertai dengan _Token_ otentikasi yang sah.

Kombinasi antara _Navigation Guards_ (menyembunyikan tampilan) dan _CI4 Filters_ (melindungi data) menghasilkan sistem aplikasi SPA yang kokoh secara menyeluruh (_End-to-End Security_).
### 📸 Screenshot Hasil Kerja
> **Silakan ganti tag `#` di bawah ini dengan URL gambar Anda**
> ![Hasil Praktikum](#)

---

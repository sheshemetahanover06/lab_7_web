# Praktikum Pemrograman Web 2 – CodeIgniter 4 (CRUD Artikel)

## NAMA: SHE SHE METAHANOVER 
## NIM: 312410432 
## KELAS: I241C

## Deskripsi

Praktikum ini bertujuan untuk mempelajari penggunaan framework **CodeIgniter 4** dengan konsep **MVC (Model, View, Controller)** serta membuat aplikasi sederhana untuk menampilkan dan mengelola data artikel menggunakan **CRUD (Create, Read, Update, Delete)**.

---

# 1. Persiapan

Sebelum memulai praktikum, pastikan beberapa software berikut sudah terinstal:

* XAMPP (Apache dan MySQL aktif)
* Visual Studio Code
* CodeIgniter 4
* Web Browser (Chrome / Edge)

---

# 2. Membuat Database

Database yang digunakan bernama **lab_ci4**.

### Query Membuat Database

```sql
CREATE DATABASE lab_ci4;
```

### Query Membuat Tabel

```sql
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

### Menambahkan Data Artikel

```sql
INSERT INTO artikel (judul, isi, slug) VALUES
('Artikel pertama', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf.', 'artikel-pertama'),
('Artikel kedua', 'Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks acak.', 'artikel-kedua');
```

---

# 3. Konfigurasi Database

Konfigurasi database dilakukan pada file **.env**.

```env
database.default.hostname = localhost
database.default.database = lab_ci4
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

---

# 4. Membuat Model

File model dibuat pada folder:

```
app/Models/ArtikelModel.php
```

Kode model:

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul','isi','status','slug','gambar'];
}
```

---

# 5. Membuat Controller

Controller dibuat pada folder:

```
app/Controllers/Artikel.php
```

Controller berfungsi untuk mengatur proses pengambilan data dari model dan menampilkannya ke view.

Controller memiliki beberapa method:

* index() → menampilkan daftar artikel
* view() → menampilkan detail artikel
* admin_index() → menampilkan halaman admin

---

# 6. Membuat View

View digunakan untuk menampilkan data yang diambil dari controller.

### Halaman Daftar Artikel

```
app/Views/artikel/index.php
```

Halaman ini menampilkan daftar artikel yang tersedia di database.

---

### Halaman Detail Artikel

```
app/Views/artikel/detail.php
```

Halaman ini menampilkan isi lengkap artikel ketika judul artikel diklik.

---

# 7. Routing

Routing digunakan untuk mengatur URL aplikasi.

File yang digunakan:

```
app/Config/Routes.php
```

Contoh routing:

```php
$routes->get('/', 'Home::index');
$routes->get('artikel', 'Artikel::index');
$routes->get('artikel/(:any)', 'Artikel::view/$1');
$routes->get('admin/artikel', 'Artikel::admin_index');
```

---

# 8. Membuat Menu Admin

Menu admin digunakan untuk mengelola data artikel (CRUD).

Halaman admin dibuat pada:

```
app/Views/artikel/admin_index.php
```

Halaman ini menampilkan:

* ID Artikel
* Judul Artikel
* Status Artikel
* Tombol Ubah
* Tombol Hapus

---

# 9. Menjalankan Aplikasi

Untuk menjalankan aplikasi CodeIgniter gunakan perintah:

```
php spark serve
```

Kemudian buka browser dan akses:

```
http://localhost:8080
```

Untuk halaman artikel:

```
http://localhost:8080/artikel
```

Untuk halaman admin:

```
http://localhost:8080/admin/artikel
```

---

# Kesimpulan

Dari praktikum ini dapat dipelajari bahwa framework **CodeIgniter 4** mempermudah pengembangan aplikasi web dengan menerapkan konsep **MVC**. Dengan menggunakan model, view, dan controller, struktur program menjadi lebih rapi, mudah dipahami, dan mudah dikembangkan.

Praktikum ini juga memperkenalkan proses pembuatan **CRUD sederhana** untuk mengelola data artikel dalam sebuah aplikasi web.

# Screenshot
1. Halaman Artikel 
Halaman artikel adalah halaman yang menampilkan daftar semua artikel yang ada di database.


2. Halaman Detail Artikel 
Halaman detali artikel digunakan untuk menampilkan isi artikel secara lengkap.


3. Halaman Admin 
Halaman admin adalah halaman yang digunakan untuk mengelola data artikel.


4. Hapus Artikel 
Fitur hapus artikel digunakan untuk menghapus data artikel dari database.


5. Edit Artikel 
Fitur edit artikel digunakan untuk mengubah atau memperbarui data artikel yang sudah ada.


6. Tambah Artikel 
Fitur tambah artikel digunakan untuk menambahkan artikel ke dalam database.


---

# Laporan Praktikum Pemrograman Web 2

## Praktikum 3: View Layout dan View Cell (CodeIgniter 4)

##  Tujuan Praktikum

1. Memahami konsep View Layout di CodeIgniter 4
2. Menggunakan View Layout untuk template tampilan
3. Memahami dan mengimplementasikan View Cell
4. Menggunakan View Cell untuk komponen UI modular

---

##  Langkah-Langkah Praktikum

### 1. Membuat Layout Utama

Membuat folder `layout` di dalam `app/Views/`, kemudian membuat file `main.php`.

Fungsi:

* Sebagai template utama (header, navbar, footer)
* Menggunakan `renderSection('content')` untuk isi halaman

Screenshot:


---

### 2. Modifikasi View Home

Mengubah file `home.php` agar menggunakan layout:

```php
<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h1><?= $title; ?></h1>
<p><?= $content; ?></p>
<?= $this->endSection() ?>
```

Screenshot:


---

### 3. Membuat View Cell

Membuat folder `Cells` dan file `ArtikelTerkini.php`.

Fungsi:

* Menampilkan artikel terbaru di sidebar
* Mengambil data dari database

```php
$model->orderBy('created_at', 'DESC')->limit(5)->findAll();
```

Screenshot:


---

### 4. Membuat View untuk View Cell

Membuat folder `components` dan file `artikel_terkini.php`.

Fungsi:

* Menampilkan daftar artikel dalam bentuk list

Screenshot:


---

### 5. Menambahkan Field Tanggal pada Database

Menambahkan field `created_at` untuk menampilkan artikel terbaru.

```sql
ALTER TABLE artikel 
ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP;
```

Screenshot:


---

### 6. Menampilkan Data Dinamis

Artikel ditampilkan berdasarkan tanggal terbaru menggunakan:

```php
orderBy('created_at', 'DESC')
```

##  Kesimpulan

Pada praktikum ini, mahasiswa berhasil:

* Menggunakan View Layout untuk template
* Menggunakan View Cell untuk sidebar
* Menampilkan data artikel dari database
* Mengurutkan artikel berdasarkan tanggal terbaru

# Pemrograman Web 2

## Praktikum 4: Modul Login CodeIgniter 4

---

## Tujuan

1. Memahami konsep login pada framework CodeIgniter 4
2. Mampu membuat sistem autentikasi sederhana
3. Mengimplementasikan session dan filter pada aplikasi

---

##  Struktur Database

### Tabel: `user`


---

##  Fitur yang Dibuat

### 1.  Login User

* User login menggunakan email dan password
* Password menggunakan `password_hash()` dan `password_verify()`

---

### 2.  Session

Digunakan untuk menyimpan status login user:

```php
$session->set([
    'user_id'    => $login['id'],
    'user_name'  => $login['username'],
    'user_email' => $login['useremail'],
    'logged_in'  => true,
]);
```

---

### 3.  Auth Filter

Digunakan untuk membatasi akses halaman admin

```php
if (!session()->get('logged_in')) {
    return redirect()->to('/user/login');
}
```

---

### 4.  Routing

Menggunakan route manual:

```php
$routes->get('/user', 'User::index');
$routes->match(['get','post'], '/user/login', 'User::login');

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
});
```

---

### 5.  Seeder

Digunakan untuk membuat data user otomatis

```php
$model->insert([
    'username' => 'admin',
    'useremail' => 'admin@email.com',
    'userpassword' => password_hash('admin123', PASSWORD_DEFAULT),
]);
```

---

##  Konfigurasi Penting (.env)

```ini
app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = lab_ci4
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi

session.driver = 'CodeIgniter\Session\Handlers\FileHandler'
session.savePath = writable/session
```

---

## ▶ Cara Menjalankan Project

1. Jalankan XAMPP (Apache & MySQL)
2. Masuk ke folder project:

```bash
cd C:\xampp_new\htdocs\lab7_php_ci\ci4
```

3. Jalankan server:

```bash
php spark serve
```

4. Buka di browser:

```
http://localhost:8080/user/login
```

---

##  Akun Login

* Email: `admin@email.com`
* Password: `admin123`

---

##  Hasil Akhir

* User dapat login ✔
* Session tersimpan ✔
* Halaman admin terlindungi ✔
* Redirect berjalan dengan baik ✔

---


## 🚀 Kesimpulan

Praktikum ini berhasil mengimplementasikan sistem login sederhana menggunakan CodeIgniter 4 dengan fitur session dan filter sebagai pengaman halaman admin.






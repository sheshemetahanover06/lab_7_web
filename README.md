# Pemrograman Web 2
## Praktikum 4: Modul Login CodeIgniter 4

## Nama: She She Metahanover 
## Nim: 312410432 
## Kelas: I241C
---

## Tujuan

1. Memahami konsep login pada framework CodeIgniter 4
2. Mampu membuat sistem autentikasi sederhana
3. Mengimplementasikan session dan filter pada aplikasi

---

##  Struktur Database
### Tabel: `user`
<img width="1178" height="158" alt="Cuplikan layar 2026-04-03 130435" src="https://github.com/user-attachments/assets/9c27fc86-77a2-43a2-bef4-26e1d1288983" />

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

![WhatsApp Image 2026-04-03 at 12 41 50](https://github.com/user-attachments/assets/5dcd7c1e-a0ea-4821-a3ad-f28b952d20fd)

---


##  Kesimpulan
Praktikum ini berhasil mengimplementasikan sistem login sederhana menggunakan CodeIgniter 4 dengan fitur session dan filter sebagai pengaman halaman admin.

# **Panduan Pull Request Pertama pada Aplikasi Web Laravel**

Dokumen ini berisi langkah-langkah untuk melakukan pull request pertama kali pada repository aplikasi web Laravel.

## **Langkah-langkah Setup**

### **1. Clone Repository ke Lokal**
**Jalankan perintah berikut untuk meng-clone repository ke komputer lokal:**
```sh
git clone https://github.com/Juethro/itfin-experts.git
```

### **2. Masuk ke Direktori Repository**
**Navigasikan ke direktori repository Laravel yang telah di-clone:**
```sh
cd itfin-experts
```

### **3. Install Dependensi dengan Composer**
**Jalankan perintah berikut untuk menginstal dependensi yang diperlukan oleh Laravel:**
```sh
composer install
```

### **4. Generate Application Key**
**Laravel memerlukan application key yang dapat dihasilkan dengan perintah:**
```sh
php artisan key:generate
```

### **5. Konfigurasi Database**
**Buka file** `.env` **dan sesuaikan konfigurasi database, seperti contoh berikut:**
```
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database
```

### **6. Jalankan Migrasi dan Seed Database**
**Untuk menjalankan migrasi database, gunakan perintah berikut:**
```sh
php artisan migrate --seed
```

### **7. Jalankan Aplikasi**
**Terakhir, jalankan aplikasi Laravel dengan perintah berikut:**
```sh
php artisan serve
```
**Aplikasi akan berjalan pada** `http://127.0.0.1:8000/customers`. **Buka URL tersebut di browser untuk memastikan aplikasi berjalan dengan baik.**

---

**Jika mengalami kendala, silakan periksa log error atau baca dokumentasi Laravel untuk solusi lebih lanjut.**
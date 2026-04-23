# 🚗 GoTrans System

Prototype sistem transportasi online berbasis Laravel.

---

## 🚀 Cara Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/USERNAME/GoTrans-System.git
cd GoTrans-System
```

### 2. Install Dependency

```bash
composer install
```

### 3. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Atur Database (.env)

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=DBGoTrans
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Migration & Seeder

```bash
php artisan migrate:fresh --seed
```

### 6. Jalankan Server

```bash
php artisan serve
```

Akses:
http://127.0.0.1:8000

---

## 🔑 Akun Default

* Admin: [admin@gmail.com](mailto:admin@gmail.com) / 123456
* Driver: [driver@gmail.com](mailto:driver@gmail.com) / 123456
* User: [user@gmail.com](mailto:user@gmail.com) / 123456

---
🧑‍💻 Author

Riah Ulina Hutasoit

---
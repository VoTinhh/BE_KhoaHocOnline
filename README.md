# HỆ THỐNG QUẢN LÝ KHOÁ HỌC TRỰC TUYẾN - Backend

API backend toàn diện để quản lý khoá học trực tuyến, xây dựng bằng Laravel 11 với khả năng xử lý tạo khoá học, quản lý, phân quyền người dùng và quản lý tài chính.

## 📋 Mục Lục
- [Tính Năng](#tính-năng)
- [Yêu Cầu Hệ Thống](#yêu-cầu-hệ-thống)
- [Cài Đặt](#cài-đặt)
- [Cấu Hình](#cấu-hình)
- [Thiết Lập Cơ Sở Dữ Liệu](#thiết-lập-cơ-sở-dữ-liệu)
- [Tài Liệu API](#tài-liệu-api)
- [Cấu Trúc Dự Án](#cấu-trúc-dự-án)
- [Models & Cơ Sở Dữ Liệu](#models--cơ-sở-dữ-liệu)
- [Xác Thực](#xác-thực)
- [Kiểm Thử](#kiểm-thử)
- [Đóng Góp](#đóng-góp)
- [Giấy Phép](#giấy-phép)

## ✨ Tính Năng

### Quản Lý Khoá Học
- Tạo, xem, cập nhật và xoá khoá học
- Hỗ trợ nhiều danh mục khoá học
- Thông tin khoá học chi tiết bao gồm mô tả, giá cả và thời lượng
- Quản lý bài học con và nội dung khoá học
- Theo dõi bài kiểm tra với module `TracNghiem`

### Quản Lý Người Dùng
- Xác thực và phân quyền người dùng
- Kiểm soát truy cập dựa trên vai trò (RBAC) với quyền tùy chỉnh
- Quản lý hồ sơ khách hàng (KhachHang)
- Quản lý tài khoản nhân viên (NhanVien)
- Hệ thống phân quyền phân cấp (PhanQuyen, ChiTietPhanQuyen)

### Quản Lý Tài Chính
- Theo dõi số dư tài khoản (TaiChinh)
- Quản lý giao dịch
- Báo cáo và phân tích tài chính

### Quản Lý Nội Dung
- Hệ thống đăng bài viết/bài báo (BaiViet)
- Quản lý danh mục (ChuyenMuc)
- Quản lý bài học (BaiHoc)
- Hỗ trợ nhiều loại nội dung khác nhau

### Tính Năng Bổ Sung
- Thông báo email sử dụng Laravel Mail
- Xác thực khóa API qua Laravel Sanctum
- Tài liệu Swagger/OpenAPI
- Ghi nhật ký và xử lý lỗi toàn diện

## 🔧 Yêu Cầu Hệ Thống

- **PHP**: >= 8.2
- **Laravel**: 11.x
- **Cơ Sở Dữ Liệu**: MySQL/MariaDB hoặc tương đương
- **Composer**: Phiên bản mới nhất
- **Node.js**: 18+ (cho tài nguyên frontend)

### Các Mở Rộng PHP Cần Thiết
- OpenSSL
- PDO
- Mbstring
- Tokenizer
- XML
- JSON
- Curl

## 📦 Cài Đặt

### 1. Sao Chép Kho Lưu Trữ
```bash
cd c:\xampp\htdocs\1401
git clone <repository-url> BE_20
cd BE_20
```

### 2. Cài Đặt Các Phụ Thuộc PHP
```bash
composer install
```

### 3. Cài Đặt Các Phụ Thuộc Node (nếu cần)
```bash
npm install
```

### 4. Tạo Khóa Ứng Dụng
```bash
php artisan key:generate
```

### 5. Tạo Tệp Môi Trường
```bash
copy .env.example .env
```

## ⚙️ Cấu Hình

### Cập Nhật Tệp .env
Cấu hình các biến sau trong `.env`:

```env
APP_NAME=ONLINE_COURSE_MANAGEMENT_SYSTEM
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=be_course_db
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=noreply@coursemanagement.com
```

### Tệp Cấu Hình
Các tệp cấu hình chính nằm trong `config/`:
- `app.php` - Cấu hình ứng dụng
- `database.php` - Kết nối cơ sở dữ liệu
- `auth.php` - Cài đặt xác thực
- `mail.php` - Cấu hình email
- `sanctum.php` - Xác thực token API
- `l5-swagger.php` - Cài đặt Swagger/OpenAPI

## 🗄️ Thiết Lập Cơ Sở Dữ Liệu

### 1. Tạo Cơ Sở Dữ Liệu
```bash
mysql -u root -p
CREATE DATABASE be_course_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

### 2. Chạy Migration
```bash
php artisan migrate
```

### 3. Tạo Dữ Liệu Mẫu (Tùy Chọn)
```bash
php artisan db:seed
```

### 4. Tạo Tài Liệu Swagger
```bash
php artisan l5-swagger:generate
```

## 📚 Tài Liệu API

### Swagger/OpenAPI
Truy cập tài liệu API tại: `http://localhost:8000/api/documentation`

### Các Endpoint API Chính
Các tuyến API được định nghĩa trong `routes/api.php` bao gồm các endpoint cho:
- Xác thực người dùng
- Quản lý khoá học
- Quản lý bài học
- Theo dõi bài kiểm tra/đánh giá
- Quản lý danh mục
- Quản lý bài viết
- Quản lý quyền hạn
- Theo dõi tài chính

## 📁 Cấu Trúc Dự Án

```
BE_20/
├── app/
│   ├── Http/
│   │   ├── Controllers/       # API controllers
│   │   ├── Middleware/        # HTTP middleware
│   │   ├── Requests/          # Kiểm tra form request
│   │   └── Kernel.php         # Cấu hình HTTP kernel
│   ├── Mail/                  # Các lớp Mailable
│   ├── Models/                # Các model Eloquent
│   └── Providers/             # Service providers
├── config/                    # Tệp cấu hình
├── database/
│   ├── migrations/            # Database migrations
│   ├── seeders/              # Database seeders
│   └── factories/            # Model factories để kiểm thử
├── routes/
│   ├── api.php               # Tuyến API
│   ├── web.php               # Tuyến web
│   └── console.php           # Lệnh console
├── storage/                   # Lưu trữ ứng dụng
│   ├── logs/                 # Nhật ký ứng dụng
│   └── api-docs/             # Tài liệu Swagger
├── tests/                     # Kiểm thử PHPUnit
├── public/                    # Tài nguyên công khai
└── resources/                 # Tài nguyên frontend (views, CSS, JS)
```

## 🗂️ Models & Cơ Sở Dữ Liệu

### Models Chính

| Model | Bảng | Mô Tả |
|-------|------|-------|
| `User` | users | Xác thực người dùng và dữ liệu người dùng cơ bản |
| `KhachHang` | khach_hangs | Hồ sơ khách hàng/học viên |
| `NhanVien` | nhan_viens | Hồ sơ nhân viên/quản lý |
| `LoaiKhoaHoc` | loai_khoa_hocs | Danh mục/loại khoá học |
| `ChiTietKhoaHoc` | chi_tiet_khoa_hocs | Thông tin khoá học chi tiết |
| `BaiHoc` | bai_hocs | Bài học trong khoá học |
| `BaiViet` | bai_viets | Bài viết/bài báo trên blog |
| `ChuyenMuc` | chuyen_mucs | Danh mục bài viết |
| `TracNghiem` | trac_nghiems | Bài kiểm tra/đánh giá |
| `PhanQuyen` | phan_quyens | Vai trò/nhóm quyền hạn |
| `ChiTietPhanQuyen` | chi_tiet_phan_quyens | Quyền hạn riêng lẻ |
| `ChucNang` | chuc_nangs | Định nghĩa chức năng/tính năng |
| `TaiChinh` | tai_chinhs | Bản ghi tài chính/theo dõi số dư |

### Mối Quan Hệ Cơ Sở Dữ Liệu
- One-to-Many: User → KhachHang, NhanVien
- Many-to-Many: PhanQuyen ↔ ChucNang (qua ChiTietPhanQuyen)
- One-to-Many: LoaiKhoaHoc → ChiTietKhoaHoc
- One-to-Many: ChiTietKhoaHoc → BaiHoc
- One-to-Many: ChuyenMuc → BaiViet

## 🔐 Xác Thực

### Xác Thực Dựa Trên Token Sanctum
Ứng dụng sử dụng Laravel Sanctum để xác thực API:

```php
// Trong ứng dụng frontend/API client của bạn
$token = 'your-sanctum-token';
Header: 'Authorization: Bearer ' . $token
```

### Lấy Token
```bash
POST /api/login
{
    "email": "user@example.com",
    "password": "password"
}
```

### Sử Dụng Token
Đưa token vào tất cả các yêu cầu API tiếp theo:
```
Authorization: Bearer YOUR_TOKEN_HERE
```

## 🧪 Kiểm Thử

### Chạy Tất Cả Kiểm Thử
```bash
php artisan test
```

### Chạy Kiểm Thử Tính Năng
```bash
php artisan test --filter Feature
```

### Chạy Kiểm Thử Đơn Vị
```bash
php artisan test --filter Unit
```

### Tạo Báo Cáo Bao Phủ Kiểm Thử
```bash
php artisan test --coverage
```

Các tệp kiểm thử nằm trong thư mục `tests/` và được tổ chức như:
- `tests/Feature/` - Kiểm thử tính năng/tích hợp
- `tests/Unit/` - Kiểm thử đơn vị

## 🚀 Chạy Ứng Dụng

### Server Phát Triển
```bash
php artisan serve
```
Truy cập ứng dụng tại: `http://localhost:8000`

### Xử Lý Hàng Đợi (nếu cần)
```bash
php artisan queue:work
```

### Quản Lý Bộ Nhớ Đệm
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
```

## 📧 Cấu Hình Email

Ứng dụng sử dụng Laravel Mail để gửi thông báo. Cấu hình cài đặt SMTP trong `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@coursemanagement.com
MAIL_FROM_NAME="Quản Lý Khoá Học Trực Tuyến"
```

Các mẫu email và lớp mailable nằm trong `app/Mail/`.

## 🔧 Các Lệnh Artisan Hữu Ích

```bash
# Migrations
php artisan migrate              # Chạy tất cả migrations đang chờ
php artisan migrate:rollback    # Hoàn tác batch migration cuối cùng
php artisan migrate:refresh     # Hoàn tác tất cả và chạy lại migrations

# Cơ Sở Dữ Liệu
php artisan db:seed             # Chạy database seeders
php artisan tinker              # Shell tương tác

# Bộ Nhớ Đệm & Cấu Hình
php artisan cache:clear         # Xóa bộ nhớ đệm ứng dụng
php artisan config:cache        # Bộ nhớ đệm tệp cấu hình
php artisan route:cache         # Tuyến bộ nhớ đệm

# Phát Triển
php artisan make:model ModelName         # Tạo model mới
php artisan make:controller ControllerName  # Tạo controller
php artisan make:migration migration_name   # Tạo migration
php artisan make:request RequestName        # Tạo form request
```

## 📝 Tệp Môi Trường

- `.env.example` - Ví dụ cấu hình môi trường
- `.env` - Cấu hình môi trường cục bộ của bạn (không commit vào git)

## 🤝 Đóng Góp

1. Tạo nhánh tính năng: `git checkout -b feature/your-feature`
2. Commit thay đổi: `git commit -am 'Thêm tính năng mới'`
3. Đẩy đến nhánh: `git push origin feature/your-feature`
4. Gửi pull request

## 📄 Giấy Phép

Dự án này được cấp phép theo Giấy Phép MIT. Xem tệp LICENSE để biết chi tiết.

---

**Xây dựng bằng ❤️ sử dụng Laravel 11**

Cập nhật lần cuối: 25 Tháng 12, 2025

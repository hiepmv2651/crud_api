# CRUD API

Xây dựng chức năng thêm xóa sửa sử dụng API

## Cách chạy project

Clone the project

```bash
git clone https://github.com/hiepmv2651/crud_api.git
```

Update composer

```bash
composer update
```

Install npm and run build

```bash
npm install
npm run build
```

Đổi tên file .env.example thành .env

```bash
.env
```

Tạo APP_KEY

```bash
php artisan key:generate
```

Tạo cơ sở dữ liệu

```bash
php artisan migrate
```

Tạo dữ liệu giả

```bash
php artisan db:seed
```

Chạy server

```bash
php artisan serve
```

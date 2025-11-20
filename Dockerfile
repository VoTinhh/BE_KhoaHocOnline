# Sử dụng một image PHP làm nền (Ví dụ: PHP 8.2-fpm)
FROM php:8.2-fpm

# Cài đặt các extension PHP cần thiết cho Laravel (MySQL, Zip, GD, v.v.)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    libcurl4-gnutls-dev \
    libpng-dev \
    libjpeg-dev \
    && rm -rf /var/lib/apt/lists/*

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cài đặt các extension PHP
RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Thiết lập thư mục làm việc trong container
WORKDIR /var/www/html

# Sao chép mã nguồn Laravel vào container
COPY . .

# Cài đặt các dependency của Laravel
RUN composer install --no-dev --optimize-autoloader

# Tạo key mới và cấp quyền cho storage
RUN php artisan key:generate
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage

# Mở cổng cho FPM (Web Server như Nginx sẽ kết nối với cổng này)
EXPOSE 9000

# Lệnh khởi chạy PHP-FPM
CMD ["php-fpm"]

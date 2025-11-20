# Sử dụng base image mới đã bao gồm cả PHP-FPM và Nginx
FROM alpine/php:8.2-fpm-nginx

# Thiết lập thư mục làm việc trong container
WORKDIR /var/www/html

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Sao chép mã nguồn Laravel vào container
COPY . .

# Cài đặt các dependency của Laravel
RUN composer install --no-dev --optimize-autoloader

# Thêm lệnh tối ưu hóa cấu hình
RUN php artisan config:cache
RUN php artisan view:cache

# Cấp quyền cho storage (Giữ nguyên)
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage

# COPY file cấu hình Nginx vào vị trí chính xác
# LƯU Ý: File nginx.conf phải được bạn tạo ở thư mục gốc!
COPY nginx.conf /etc/nginx/http.d/default.conf

# Lệnh khởi chạy cuối cùng (Sử dụng Supervisord để chạy cả Nginx và PHP-FPM)
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]

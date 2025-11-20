# Sử dụng base image webdevops/php-nginx:8.2, có sẵn PHP-FPM và Nginx
FROM webdevops/php-nginx:8.2

# Thiết lập thư mục làm việc trong container
WORKDIR /app

# Sao chép mã nguồn Laravel vào container
COPY . .

# Cài đặt các dependency của Laravel
RUN composer install --no-dev --optimize-autoloader

# THÊM LỆNH XÓA CACHE CẤU HÌNH VÀO ĐÂY!
RUN php artisan config:clear
RUN php artisan route:clear

# Thêm lệnh tối ưu hóa cấu hình
RUN php artisan config:cache
RUN php artisan route:cache

# CHẠY MIGRATION LẦN ĐẦU
RUN php artisan migrate --force

# Cấp quyền cho storage
RUN chown -R www-data:www-data /app/storage
RUN chmod -R 775 /app/storage

# COPY file cấu hình Nginx vào vị trí chính xác
COPY nginx.conf /etc/nginx/sites-enabled/default.conf

# Lệnh cuối cùng (Image webdevops sẽ tự chạy Nginx và PHP-FPM)

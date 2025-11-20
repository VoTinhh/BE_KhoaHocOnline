# Sử dụng base image webdevops/php-nginx:8.2, có sẵn PHP-FPM và Nginx
FROM webdevops/php-nginx:8.2

# Thiết lập thư mục làm việc trong container
WORKDIR /app

# Sao chép mã nguồn Laravel vào container
COPY . .

# Cài đặt các dependency của Laravel
RUN composer install --no-dev --optimize-autoloader

# Thêm lệnh tối ưu hóa cấu hình
RUN php artisan config:cache
RUN php artisan view:cache

# CHẠY MIGRATION LẦN ĐẦU (Vì Render Free Tier không có Shell)
# --force để buộc chạy trong môi trường Production
RUN php artisan migrate --force

# Cấp quyền cho storage
RUN chown -R www-data:www-data /app/storage
RUN chmod -R 775 /app/storage

# COPY file cấu hình Nginx vào vị trí chính xác
COPY nginx.conf /etc/nginx/sites-enabled/default.conf

# Lệnh cuối cùng (Image webdevops sẽ tự chạy Nginx và PHP-FPM)

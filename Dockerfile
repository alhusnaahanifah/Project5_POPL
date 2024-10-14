# Menggunakan image PHP resmi dengan Apache
FROM php:8.2-apache

# Menginstal ekstensi yang diperlukan
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git && \
    docker-php-ext-install zip mysqli pdo_mysql

# Menambahkan ServerName ke konfigurasi Apache untuk mengatasi peringatan
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Menetapkan direktori kerja di dalam container
WORKDIR /var/www/html

# Menyalin semua file dari project Laravel ke dalam container
COPY . /var/www/html

# Menginstal Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Menyalin file .env.example jika file .env tidak ada
RUN cp .env.example .env

# Menginstal dependencies menggunakan Composer
RUN composer install --no-scripts --no-dev --prefer-dist --optimize-autoloader

# Menjalankan migrasi database dan generate key
RUN php artisan key:generate
RUN php artisan migrate --force

# Mengatur hak akses folder jika diperlukan
RUN chown -R www-data:www-data /var/www/html

# Membuka port 80 untuk akses HTTP
EXPOSE 80

# Menjalankan Apache server di dalam container
CMD ["apache2-foreground"]

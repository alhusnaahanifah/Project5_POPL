# Menggunakan image PHP resmi dengan Apache
FROM php:8.2-apache

# Menginstal ekstensi yang diperlukan
RUN apt-get update && apt-get install -y \
    libzip-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql zip

# Menambahkan ServerName ke konfigurasi Apache untuk mengatasi peringatan
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Menetapkan direktori kerja di dalam container
WORKDIR /var/www/html

# Menyalin file composer.json dan composer.lock terlebih dahulu
COPY composer.json composer.lock ./

# Menginstal Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Instal dependensi Composer
RUN composer install --no-interaction --prefer-dist

# Menyalin semua file proyek ke dalam container
COPY . .

# Mengatur hak akses folder
RUN chown -R www-data:www-data /var/www/html

# Membuka port 80 untuk akses HTTP
EXPOSE 80

# Menjalankan Apache server di dalam container
CMD ["apache2-foreground"]

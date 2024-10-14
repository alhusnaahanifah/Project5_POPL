# Menggunakan image PHP resmi dengan Apache
FROM php:8.2-apache

# Menginstal ekstensi mysqli
RUN docker-php-ext-install mysqli

# Menambahkan ServerName ke konfigurasi Apache untuk mengatasi peringatan
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Menetapkan direktori kerja di dalam container
WORKDIR /var/www/html

# Menyalin seluruh project Laravel ke dalam container
COPY . /var/www/html

# Mengatur hak akses folder jika diperlukan
RUN chown -R www-data:www-data /var/www/html

# Menginstal dependensi Composer
RUN apt-get update && apt-get install -y curl
RUN curl -f https://packagist.org/ > /dev/null || (echo "No internet connection" && exit 1)

# Menginstal Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Mengatur hak akses
RUN chmod -R 777 /var/www/html

# Cek versi PHP dan Composer untuk debugging
RUN php -v
RUN composer --version

# Menghapus cache Composer (jika ada)
RUN composer clear-cache

# Menjalankan instalasi dependensi
RUN composer install --no-dev --no-scripts --optimize-autoloader -vvv

# Membuka port 80 untuk akses HTTP
EXPOSE 80

# Menjalankan Apache server di dalam container
CMD ["apache2-foreground"]

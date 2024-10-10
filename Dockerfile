# Gunakan image dasar resmi PHP dengan FPM dan beberapa ekstensi yang diperlukan untuk Laravel
FROM php:8.2-fpm

# Install dependensi sistem
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    npm \
    && docker-php-ext-install pdo mbstring exif pcntl bcmath gd zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory di dalam container
WORKDIR /var/www

# Copy semua file dari host ke container
COPY . .

# Install dependensi Laravel
RUN composer install --prefer-dist --no-scripts --no-dev --optimize-autoloader

# Install dependensi npm
RUN npm install && npm run build

# Set permission untuk storage dan bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Salin .env.example jika .env tidak ada
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Generate key aplikasi Laravel
RUN php artisan key:generate

# Expose port 8000 (untuk menjalankan server Laravel)
EXPOSE 8000

# Jalankan built-in Laravel server di port 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

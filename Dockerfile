# Gunakan image dasar resmi PHP dengan FPM dan beberapa ekstensi yang diperlukan untuk Laravel
FROM php:8.0-apache

# Copy semua file dari host ke container
COPY . /var/www/html/

# Set working directory di dalam container
WORKDIR /var/www/html

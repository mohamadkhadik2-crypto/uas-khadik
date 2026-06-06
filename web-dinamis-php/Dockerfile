# Menggunakan base image PHP versi 8.2 yang sudah terintegrasi Apache
FROM php:8.2-apache

# Install ekstensi mysqli dan pdo agar PHP bisa ngobrol dengan MariaDB
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy semua file dari folder lokal ke folder default web server di dalam container
COPY . /var/www/html/

# Expose port 80 (default Apache)
EXPOSE 80

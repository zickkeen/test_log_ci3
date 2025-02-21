FROM php:7.4-apache

# Install ekstensi yang dibutuhkan CI3
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install zip pdo pdo_mysql

# Copy file proyek CI3 ke dalam container
COPY . /var/www/html

# Set permission
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80 untuk web server Apache
EXPOSE 80

# Konfigurasi environment (opsional)
# Contoh: Set database credentials
ENV DB_HOST=your_db_host
ENV DB_USER=your_db_user
ENV DB_PASSWORD=your_db_password
ENV DB_NAME=your_db_name

# Jika menggunakan .htaccess, aktifkan mod_rewrite
RUN a2enmod rewrite

# Restart Apache
RUN service apache2 restart
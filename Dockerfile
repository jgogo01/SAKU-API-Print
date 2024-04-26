# Use an official PHP runtime as a parent image
FROM php:8.1-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Install PHP extensions and other dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install -j$(nproc) pdo pdo_pgsql gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable mod_rewrite and Apache modules
RUN a2enmod rewrite

# Copy your PHP application code into the container
COPY . .

# Run Composer install
RUN composer install --no-plugins --no-scripts --no-progress --no-interaction

# Disable error reporting
RUN { \
        echo 'display_errors = Off'; \
        echo 'log_errors = On'; \
        echo 'error_log = /var/log/php/error.log'; \
    } > /usr/local/etc/php/php.ini \
    && mkdir -p /var/log/php \
    && chown -R www-data:www-data /var/log/php

# Expose the port Apache listens on
EXPOSE 80

# Start Apache when the container runs
CMD ["apache2-foreground"]
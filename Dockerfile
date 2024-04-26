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

# Set environment variables
CMD ["echo S3_ENDPOINT=${S3_ENDPOINT} >> .env"]
CMD ["echo S3_KEY=${S3_KEY} >> .env"]
CMD ["echo S3_SECRET=${S3_SECRET} >> .env"]
CMD ["echo S3_ESIGN_BUCKET=${S3_ESIGN_BUCKET} >> .env"]
CMD ["echo REDIRECT_URL=${REDIRECT_URL} >> .env"]
CMD ["echo DB_HOST=${DB_HOST} >> .env"]
CMD ["echo DB_PORT=${DB_PORT} >> .env"]
CMD ["echo DB_NAME=${DB_NAME} >> .env"]
CMD ["echo DB_USER=${DB_USER} >> .env"]
CMD ["echo DB_PASS=${DB_PASS} >> .env"]

# Start Apache when the container runs
CMD ["apache2-foreground"]
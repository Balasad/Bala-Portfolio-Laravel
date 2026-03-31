FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-install zip intl exif

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions (important for Laravel)
RUN chmod -R 775 storage bootstrap/cache

# Expose port (informational only)
EXPOSE 8080

# Start Laravel using Railway PORT
CMD php -S 0.0.0.0:${PORT} -t public
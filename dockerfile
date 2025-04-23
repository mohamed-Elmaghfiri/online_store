# Use the official PHP image with Apache
FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Enable apache mod_rewrite (required for Laravel)
RUN a2enmod rewrite

# Set working directory inside the container
WORKDIR /var/www/html

# Copy the Laravel project files into the container
COPY . /var/www/html

# Install Composer (PHP package manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies via Composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Set the proper permissions for Laravel's storage and cache directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copy the example .env file to .env if it doesn't exist
RUN cp .env.example .env

# Generate the Laravel application key
RUN php artisan key:generate

# Expose port 80 to access the app
EXPOSE 80

# Set the entrypoint for the container to run Apache
CMD ["apache2-foreground"]

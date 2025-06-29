FROM php:8.2-apache

# Enable Apache mod_rewrite (needed for Laravel routes)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install Composer (global)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set recommended permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose Apache port
EXPOSE 80

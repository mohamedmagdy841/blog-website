# Use the official PHP image with Apache
FROM php:8.2-apache


# Install necessary extensions and tools for Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    software-properties-common \
    npm

RUN npm install npm@latest -g && \
    npm install n -g && \
    n lts
# Set working directory
WORKDIR /var/www/html
# Install PHP extensions required by Laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache mod_rewrite for Laravel routing
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files into the container
COPY . /var/www/html

# Update Apache configuration
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf && \
    echo "<Directory /var/www/html>\n\
            Options Indexes FollowSymLinks\n\
            AllowOverride All\n\
            Require all granted\n\
          </Directory>" >> /etc/apache2/sites-available/000-default.conf

# Set the correct permissions and ownership for storage and bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache


# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Expose port 80 to access the application
EXPOSE 80

CMD ["apache2-foreground"]

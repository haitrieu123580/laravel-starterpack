FROM php:8.2-fpm
# Get argument defined in docker-compose file
ARG user
ARG uid

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*


# RUN apt-get update && apt-get install -y \
# libfreetype-dev \
# libjpeg62-turbo-dev \
# libpng-dev \
# && docker-php-ext-configure gd --with-freetype --with-jpeg \
# && docker-php-ext-install -j$(nproc) gd

# Set working directory
WORKDIR /var/www
ADD . /var/www
RUN chown -R www-data:www-data /var/www
# Make the storage and bootstrap/cache directories
RUN mkdir -p storage bootstrap/cache

# Set proper permissions for Laravel storage and log directories
RUN chown -R 775 storage bootstrap/cache

RUN chown -R www-data:www-data /var/www/storage

RUN docker-php-ext-install pdo pdo_mysql

# Switch to non-root user
USER $user
FROM php:8.3-fpm

ARG HOST_UID=1000
ENV USER=www-data

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmemcached-dev \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    openssh-server \
    zip \
    unzip \
    sqlite3

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions zip, mbstring, exif, bcmath, intl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install zip mbstring exif pcntl bcmath -j$(nproc) gd intl

# Install Redis and enable it
RUN pecl install redis  && docker-php-ext-enable redis

# Install the php memcached extension
RUN pecl install memcached && docker-php-ext-enable memcached

# Install the PHP pdo_pgsql extention
RUN docker-php-ext-install pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD php.ini $PHP_INI_DIR/conf.d/

# Set working directory
WORKDIR /app

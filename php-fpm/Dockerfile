# Custom PHP-FPM
# Author patcharp@live.com
FROM php:7.3-fpm-alpine3.9

# Web files
RUN mkdir -p /var/www/web

# Custom PHP configuration
ADD custom.ini /usr/local/etc/php/conf.d/custom.ini

# Install lib
RUN apk add --update --no-cache \
    libzip-dev \
    curl-dev \
    libxml2-dev \
    libpng-dev libjpeg-turbo-dev libxpm-dev freetype-dev libwebp-dev \
    $PHPIZE_DEPS \
    php7-openssl


# Add PHP Lib
RUN docker-php-ext-install \
    mysqli \
    curl \
    dom \
    gd \
    json \
    mbstring \
    pdo_mysql \
    tokenizer \
    zip \
    && docker-php-ext-enable mysqli

EXPOSE 9000
CMD ["php-fpm"]

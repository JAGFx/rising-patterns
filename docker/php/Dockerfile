FROM php:8.4-fpm

LABEL org.opencontainers.image.source=https://github.com/JAGFx/rising-patterns
LABEL org.opencontainers.image.licenses=MIT

COPY php.ini /usr/local/etc/php/conf.d/docker-php-config.ini
COPY conf.d/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
COPY conf.d/error_reporting.ini /usr/local/etc/php/conf.d/error_reporting.ini
COPY conf.d/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

RUN set -eux; \
    apt update -yqq \
    && apt upgrade -y \
    && apt full-upgrade -y \
    && apt dist-upgrade -y \
    && apt autoremove -y \
    && apt install -yqq --no-install-recommends zip unzip libzip-dev libpq-dev libicu-dev libxml2-dev \
    && pecl install apcu \
    && docker-php-ext-install zip opcache intl xml \
    && docker-php-ext-enable apcu

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && curl -L https://cs.symfony.com/download/php-cs-fixer-v3.phar -o php-cs-fixer \
    && chmod a+x php-cs-fixer \
    && mv php-cs-fixer /usr/local/bin/php-cs-fixer

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apt purge -y --auto-remove \
        autoconf \
        build-essential \
        php-dev \
        git \
        gnupg \
        ; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN useradd --create-home --shell /bin/bash --user-group dev
WORKDIR /var/www/app
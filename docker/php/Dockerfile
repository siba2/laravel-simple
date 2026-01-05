FROM php:8.2-apache

ARG HOST_UID=1000
ARG HOST_GID=1000

RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libzip-dev \
    zip unzip git curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip \
    && a2enmod rewrite

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf

RUN groupadd -g ${HOST_GID} sebastian || true
RUN useradd -u ${HOST_UID} -g ${HOST_GID} -m sebastian || true
RUN usermod -aG www-data sebastian

WORKDIR /var/www/html

COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

CMD ["/usr/local/bin/start.sh"]

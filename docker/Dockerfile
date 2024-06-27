FROM php:7.4-fpm

RUN apt-get update -y
RUN apt-get install -y --force-yes --no-install-recommends \
    libmemcached-dev \
    libmcrypt-dev \
    libreadline-dev \
    libgmp-dev \
    libzip-dev \
    libz-dev \
    libbz2-dev \
    libpq-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libssl-dev \
    openssh-server \
    libmagickwand-dev \
    cron \
    nano \
    libxml2-dev \
    mariadb-client \
    supervisor \
    curl \
    nginx

# Clear out the local repository of retrieved package files
RUN apt-get clean

# Install soap extention
RUN pecl install mcrypt && docker-php-ext-enable mcrypt

# Install soap extention
RUN docker-php-ext-install soap

# Install for image manipulation
RUN docker-php-ext-install exif

# Install the PHP pcntl extention
RUN docker-php-ext-install pcntl

# Install the PHP intl extention
RUN docker-php-ext-install intl

# Install the PHP gmp extention
RUN docker-php-ext-install gmp

# Install the PHP zip extention
RUN docker-php-ext-install zip

# Install the PHP pdo_mysql extention
RUN docker-php-ext-install pdo_mysql

# Install the PHP bcmath extension
RUN docker-php-ext-install bcmath

#####################################
# PHPRedis:
#####################################
RUN pecl install redis && docker-php-ext-enable redis

#####################################
# Imagick:
#####################################

RUN pecl install imagick && \
    docker-php-ext-enable imagick

#####################################
# GD:
#####################################

# Install the PHP gd library
RUN docker-php-ext-install gd && \
    docker-php-ext-configure gd \
        --with-jpeg=/usr/lib \
        --with-freetype=/usr/include/freetype2 && \
    docker-php-ext-install gd

#####################################
# PHP Memcached:
#####################################

# Install the php memcached extension
RUN pecl install memcached && docker-php-ext-enable memcached

# Install Composer
RUN curl --silent --show-error "https://getcomposer.org/installer" \
    | php -- --install-dir=/usr/local/bin --filename=composer

# Install nvm
ENV NVM_DIR /root/.nvm
ENV NPM_VERSION 18
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash \
    && . $NVM_DIR/nvm.sh \
    && nvm install $NPM_VERSION \
    && nvm use $NPM_VERSION

RUN rm -r /var/lib/apt/lists/*

RUN mkdir -p /var/log/supervisor
RUN mkdir -p /var/run/php
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
RUN rm -f /usr/local/etc/php-fpm.d/* \
    && usermod -u 1000 www-data

COPY ./supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY ./php-fpm/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN usermod -u 1000 www-data

RUN mkdir -p /www/html/e-user

COPY ./app/e-user.languelite.com.tar.gz /www/html/e-user.languelite.com.tar.gz
RUN tar -xf /www/html/e-user.languelite.com.tar.gz -C /www/html/e-user \
    && rm -f /www/html/e-user.languelite.com.tar.gz
COPY ./e-user.env /www/html/e-user/.env

WORKDIR /www/html/e-user

# set laravel application permission
RUN chown -R www-data:www-data /www/html/e-user/ \
    && find /www/html/e-user -type f -exec chmod 644 {} \; \
    && find /www/html/e-user -type d -exec chmod 755 {} \;

EXPOSE 80
EXPOSE 443

CMD ["/usr/bin/supervisord"]
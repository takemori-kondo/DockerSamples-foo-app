FROM ubuntu:22.04

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN apt-get -y update
RUN apt-get -y install curl vim unzip iputils-ping
RUN apt-get -y install software-properties-common
RUN add-apt-repository ppa:ondrej/php
RUN apt-get -y update
RUN apt-get -y install php8.3 php8.3-dev php8.3-gd php8.3-intl php8.3-mbstring php8.3-xml php8.3-zip
RUN apt-get -y install php8.3-mysqlnd php8.3-redis php8.3-memcached
RUN apt-get -y install php8.3-fpm php8.3-opcache php8.3-apcu
RUN apt-get -y install php8.3-xdebug

RUN mkdir -p /var/log/php8.3-fpm && \
    touch /var/log/php8.3-fpm/master-error.log && \
    touch /var/log/php8.3-fpm/www-slow.log && \
    touch /var/log/php8.3-fpm/www-error.log && \
    chown www-data:www-data /var/log/php8.3-fpm/www-slow.log && \
    chown www-data:www-data /var/log/php8.3-fpm/www-error.log && \
    chmod 644 /var/log/php8.3-fpm/www-slow.log && \
    chmod 644 /var/log/php8.3-fpm/www-error.log

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get -y install php-phalcon5

# php-fpm.conf の pidパラメータのディレクトリを作る（ないので）
RUN mkdir -p /run/php/
# nginx の default.confのパラメータい対応するディレクトリを作る（ないので）
RUN mkdir -p /scripts

COPY docker-php-entrypoint /usr/local/bin/

EXPOSE 9000
# which php-fpm8.3
# /usr/sbin/php-fpm8.3
CMD ["php-fpm8.3", "-F"]
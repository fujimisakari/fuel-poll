FROM php:5.6.29-fpm

RUN mkdir -p /usr/src/fuel-todo
WORKDIR /usr/src/fuel-todo
ENV DOCKER true

RUN rm -rf /usr/local/etc/php-fpm.d
RUN mkdir /var/run/php-fpm
RUN touch /tmp/fuel_app.log

RUN apt-get update
RUN apt-get install -y mysql-client vim net-tools telnet curl

RUN docker-php-ext-install pdo pdo_mysql

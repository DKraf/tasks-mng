FROM php:7.4-fpm

RUN apt-get update
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql

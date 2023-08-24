FROM php:8.2.9-apache

RUN docker-php-ext-install mysqli

COPY /src /var/www/html

EXPOSE 80
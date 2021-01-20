FROM php:7.1-apache
ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=Asia/Tokyo

RUN mv /etc/apache2/mods-available/headers.load /etc/apache2/mods-enabled  \
    && /bin/sh -c a2enmod headers

COPY ./apache2.conf /etc/apache2/apache2.conf

RUN apt update && \
    docker-php-ext-install mysqli pdo_mysql

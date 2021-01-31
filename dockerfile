FROM php:7.1-apache
ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=Asia/Tokyo

RUN mv /etc/apache2/mods-available/headers.load /etc/apache2/mods-enabled  \
    && /bin/sh -c a2enmod headers

RUN apt -y update && \
    apt -y install \
        libpq-dev && \
    docker-php-ext-install pdo_pgsql

COPY --chown=www-data:www-data ./dbController/color-change-api.php /var/www/html/
COPY --chown=www-data:www-data ./dbController/dbSetting.php /var/www/html/
COPY --chown=www-data:www-data ./dbController/dbCreate.php /var/www/html/

EXPOSE 80
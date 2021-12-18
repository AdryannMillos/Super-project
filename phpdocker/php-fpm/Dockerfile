FROM phpdockerio/php:8.0-fpm
WORKDIR "/application"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php8.0-http \
        php8.0-mcrypt \
        php8.0-oauth \
        php8.0-pgsql \
        php8.0-raphf; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \

RUN chmod -R 777 storage/

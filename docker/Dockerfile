FROM php:8.2-apache
RUN apt-get update \
    && apt-get install -y libzip-dev unzip \
    && docker-php-ext-install pdo pdo_mysql \
    && a2enmod rewrite headers
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf /etc/apache2/apache2.conf
WORKDIR /var/www/html
CMD ["apache2-foreground"]

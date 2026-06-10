FROM php:8.2-apache

# Устанавливаем расширения pdo_mysql и curl, которые требуются для плагина
RUN apt-get update && apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev \
    && docker-php-ext-install pdo_mysql curl \
    && a2enmod rewrite

# Копируем все файлы проекта в веб-директорию Apache
COPY . /var/www/html/

# Выставляем правильные права на файлы
RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80
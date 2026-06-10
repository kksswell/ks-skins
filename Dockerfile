FROM php:8.2-apache

# Установка необходимых системных зависимостей и PHP-расширений
RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    && docker-php-ext-install pdo_mysql curl \
    && rm -rf /var/lib/apt/lists/*

# Копируем файлы проекта в рабочую директорию Apache
COPY . /var/www/html/

# Выставляем корректные права на файлы через стандартный синтаксис
RUN chown -R www-data:www-data /var/www/html

# Открываем порт для веб-сервера
EXPOSE 80
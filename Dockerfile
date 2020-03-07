FROM juannavasjn/laravel-nginx

WORKDIR /var/www/html/backend

COPY . .

RUN composer install

RUN chown -R www-data:www-data /var/www/html/* && \
    chmod -R 755 /var/www/html/*

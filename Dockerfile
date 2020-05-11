FROM docker.io/bitnami/php-fpm:latest
WORKDIR /var/www/html

COPY nginx.conf /etc/nginx/sites-available/studenti.conf

RUN apt update && apt install -y nginx \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

CMD ["bash", "docker-start.sh"]

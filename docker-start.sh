#!/bin/sh

#php /usr/bin/composer install

if [ ! -f /var/www/html/.env ]
then
  echo "Env doesn't exist"
  cd /var/www/html
  cp .env.example .env
  php artisan key:generate
else
 echo "Env exists"
fi

cat /var/www/html/nginx.conf > /etc/nginx/sites-available/default
nginx
php-fpm -F --pid /opt/bitnami/php/tmp/php-fpm.pid -y /opt/bitnami/php/etc/php-fpm.conf

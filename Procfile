web: vendor/bin/heroku-php-apache2 public/
release: php artisan migrate
worker: php artisan queue:restart && php artisan queue:work

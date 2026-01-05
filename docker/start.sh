#!/bin/bash

chown -R developer:www-data /var/www/html
chmod -R 775 /var/www/html/storage
chmod -R 775 /var/www/html/bootstrap/cache
chmod 775 /var/www/html/public

exec apache2-foreground

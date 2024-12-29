#!/bin/bash

# Ensure proper file permissions for storage and bootstrap/cache directories
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Run migrations if needed
php /var/www/html/artisan migrate --force

# Execute the main container command (i.e., start Apache)
exec "$@"

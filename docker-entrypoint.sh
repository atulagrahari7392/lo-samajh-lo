#!/bin/bash
set -e

# Configure Apache port based on PORT environment variable provided by Render (fallback to 80)
PORT="${PORT:-80}"
sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf
sed -i "s/80/${PORT}/g" /etc/apache2/sites-available/000-default.conf

# Create storage symlink if it doesn't exist
php artisan storage:link --force || true

# Run Laravel optimizations
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Execute Apache in foreground
exec apache2-foreground

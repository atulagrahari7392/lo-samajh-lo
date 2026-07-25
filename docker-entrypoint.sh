#!/bin/bash
set -e

# Configure Apache port based on PORT environment variable provided by Render / Railway (fallback to 80)
PORT="${PORT:-80}"
sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf 2>/dev/null || true
sed -i "s/80/${PORT}/g" /etc/apache2/sites-available/000-default.conf 2>/dev/null || true

# Ensure SQLite database file exists if using sqlite
if [ "${DB_CONNECTION}" = "sqlite" ] || [ -z "${DB_CONNECTION}" ]; then
    DB_FILE="${DB_DATABASE:-/var/www/html/database/database.sqlite}"
    if [ ! -f "$DB_FILE" ]; then
        echo "Creating SQLite database at $DB_FILE..."
        mkdir -p "$(dirname "$DB_FILE")"
        touch "$DB_FILE"
    fi
    chown -R www-data:www-data /var/www/html/database
    chmod -R 777 /var/www/html/database
fi

# Set proper permissions for storage and bootstrap cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Create storage symlink if missing
php artisan storage:link --force || true

# Generate APP_KEY if missing
if [ -z "$APP_KEY" ]; then
    echo "Generating Application Key..."
    php artisan key:generate --force || true
fi

# Run database migrations and demo seeder automatically
php artisan migrate --force || true
php artisan db:seed --class=DemoUserSeeder --force || true

# Run Laravel optimizations
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Execute Apache in foreground
exec apache2-foreground

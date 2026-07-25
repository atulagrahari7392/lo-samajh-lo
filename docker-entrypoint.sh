#!/bin/bash
set -e

# 1. Configure Apache port based on PORT environment variable provided by Railway / Render (fallback to 80)
PORT="${PORT:-80}"
echo "Configuring Apache to listen on port ${PORT}..."
sed -i "s/Listen 80/Listen ${PORT}/g" /etc/apache2/ports.conf 2>/dev/null || true
sed -i "s/<VirtualHost \*:80>/<VirtualHost \*:${PORT}>/g" /etc/apache2/sites-available/000-default.conf 2>/dev/null || true

# 2. Ensure .env exists if missing
if [ ! -f /var/www/html/.env ]; then
    echo "Creating .env from .env.example..."
    if [ -f /var/www/html/.env.example ]; then
        cp /var/www/html/.env.example /var/www/html/.env
    else
        touch /var/www/html/.env
    fi
fi

# 3. Ensure SQLite database file exists and permissions are 777 for www-data
DB_FILE="${DB_DATABASE:-/var/www/html/database/database.sqlite}"
echo "Ensuring SQLite database file at $DB_FILE..."
mkdir -p "$(dirname "$DB_FILE")"
touch "$DB_FILE"
chown -R www-data:www-data /var/www/html/database /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 777 /var/www/html/database /var/www/html/storage /var/www/html/bootstrap/cache

# 4. Create storage symlink
php artisan storage:link --force || true

# 5. Generate APP_KEY if missing
if [ -z "$APP_KEY" ] && ! grep -q "^APP_KEY=base64" /var/www/html/.env; then
    echo "Generating Application Key..."
    php artisan key:generate --force || true
fi

# 6. Run database migrations and demo seeder automatically
echo "Running migrations and seeders..."
php artisan migrate --force || true
php artisan db:seed --class=DemoUserSeeder --force || true

# 7. Re-apply permissions after artisan commands
chown -R www-data:www-data /var/www/html/database /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 777 /var/www/html/database /var/www/html/storage /var/www/html/bootstrap/cache

# 8. Clear and cache configurations
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# 9. Execute Apache in foreground
echo "Starting Apache web server on port ${PORT}..."
exec apache2-foreground

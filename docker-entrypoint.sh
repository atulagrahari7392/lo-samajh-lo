#!/bin/bash
set -e

# 1. Configure Apache port dynamically for Railway / Render (takes milliseconds)
PORT="${PORT:-80}"
echo "Configuring Apache web server to listen on port ${PORT}..."

sed -i "s/Listen [0-9]*/Listen ${PORT}/g" /etc/apache2/ports.conf 2>/dev/null || true
sed -i "s/<VirtualHost \*:[0-9]*>/<VirtualHost \*:${PORT}>/g" /etc/apache2/sites-available/000-default.conf 2>/dev/null || true
sed -i "s/<VirtualHost \*:[0-9]*>/<VirtualHost \*:${PORT}>/g" /etc/apache2/sites-enabled/*.conf 2>/dev/null || true

# 2. Ensure .env file exists
if [ ! -f /var/www/html/.env ]; then
    if [ -f /var/www/html/.env.example ]; then
        cp /var/www/html/.env.example /var/www/html/.env
    else
        touch /var/www/html/.env
    fi
fi

# 3. Ensure SQLite database directory & file exist with 777 permissions
DB_FILE="${DB_DATABASE:-/var/www/html/database/database.sqlite}"
mkdir -p "$(dirname "$DB_FILE")"
touch "$DB_FILE"
chown -R www-data:www-data /var/www/html/database /var/www/html/storage /var/www/html/bootstrap/cache 2>/dev/null || true
chmod -R 777 /var/www/html/database /var/www/html/storage /var/www/html/bootstrap/cache 2>/dev/null || true

# 4. Asynchronous background initialization (runs while Apache is already listening on $PORT)
(
    sleep 1
    php artisan storage:link --force || true

    if [ -z "$APP_KEY" ] && ! grep -q "^APP_KEY=base64" /var/www/html/.env; then
        echo "Generating Application Encryption Key..."
        php artisan key:generate --force || true
    fi

    echo "Running migrations and seeders in background..."
    php artisan migrate --force || true
    php artisan db:seed --class=DemoUserSeeder --force || true

    chown -R www-data:www-data /var/www/html/database /var/www/html/storage /var/www/html/bootstrap/cache 2>/dev/null || true
    chmod -R 777 /var/www/html/database /var/www/html/storage /var/www/html/bootstrap/cache 2>/dev/null || true

    php artisan config:cache || true
    php artisan view:cache || true
    echo "Background initialization complete."
) &

# 5. Start Apache web server immediately in foreground
echo "Starting Apache web server on port ${PORT} immediately..."
exec apache2-foreground

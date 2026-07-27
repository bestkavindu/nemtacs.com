#!/bin/bash
set -e

chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

DB_FILE="${DB_DATABASE:-/var/www/html/database/database.sqlite}"

if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ] && [ "$DB_FILE" != ":memory:" ]; then
    echo "🗄️  Preparing SQLite database at ${DB_FILE}..."
    mkdir -p "$(dirname "$DB_FILE")"
    touch "$DB_FILE"
    # SQLite writes -journal/-wal/-shm siblings, so the directory must be writable too.
    chown -R www-data:www-data "$(dirname "$DB_FILE")"
    chmod 775 "$(dirname "$DB_FILE")"
    chmod 664 "$DB_FILE"
fi

echo "🚀 Caching configuration..."
php artisan optimize
php artisan view:cache

if [ ! -L public/storage ]; then
    echo "🔗 Linking storage..."
    php artisan storage:link
fi

echo "📦 Running migrations..."
php artisan migrate --force

if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ] && [ "$DB_FILE" != ":memory:" ]; then
    # migrate ran as root and may have re-created the file / left root-owned wal files.
    chown -R www-data:www-data "$(dirname "$DB_FILE")"
fi

echo "�🔥 Starting Supervisord..."
exec "$@"
#!/bin/bash
set -e

cd /var/www/html

# Persistent volumes (Coolify) mount empty and root-owned, so create the tree first.
mkdir -p storage/app/public storage/framework/cache/data storage/framework/sessions \
         storage/framework/views storage/logs bootstrap/cache

# Files committed to the repo are seeded into the volume without overwriting uploads.
if [ -d docker/seed-storage ]; then
    echo "🌱 Seeding storage/app/public..."
    cp -rn docker/seed-storage/. storage/app/public/
fi

chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R u+rwX,go+rX storage/app/public

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

# A git checkout on Windows (core.symlinks=false) can leave a real directory here,
# and a stale symlink can point at a path that no longer exists. Both break /storage.
if [ ! -L public/storage ] || [ ! -d public/storage ]; then
    echo "🔗 Linking storage..."
    if [ -d public/storage ] && [ ! -L public/storage ]; then
        # Real directory: rescue its contents into the volume before replacing it.
        cp -rn public/storage/. storage/app/public/ || true
    fi
    rm -rf public/storage
    php artisan storage:link
    chown -h www-data:www-data public/storage
fi

echo "📦 Running migrations..."
php artisan migrate --force

if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ] && [ "$DB_FILE" != ":memory:" ]; then
    # migrate ran as root and may have re-created the file / left root-owned wal files.
    chown -R www-data:www-data "$(dirname "$DB_FILE")"
fi

echo "�🔥 Starting Supervisord..."
exec "$@"
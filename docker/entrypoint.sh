#!/bin/sh
set -e

cd /var/www/html

echo "==> Booting nemtacs.com (APP_ENV=${APP_ENV:-production})"

# ---------------------------------------------------------------------------
# Writable runtime paths (volumes mounted by Coolify start out empty/root-owned)
# ---------------------------------------------------------------------------
mkdir -p \
    storage/app/public \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true

# ---------------------------------------------------------------------------
# SQLite: make sure the database file exists before migrating
# ---------------------------------------------------------------------------
if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
    DB_FILE="${DB_DATABASE:-/var/www/html/database/database.sqlite}"
    mkdir -p "$(dirname "$DB_FILE")"
    [ -f "$DB_FILE" ] || touch "$DB_FILE"
    chown www-data:www-data "$(dirname "$DB_FILE")" "$DB_FILE" || true
    echo "==> SQLite database: $DB_FILE"
fi

# ---------------------------------------------------------------------------
# APP_KEY is required. Do not auto-generate: a new key on every deploy would
# invalidate all sessions and break every encrypted column.
# ---------------------------------------------------------------------------
if [ -z "${APP_KEY}" ]; then
    echo "!! APP_KEY is not set. Generate one with 'php artisan key:generate --show'"
    echo "!! and add it to the Coolify environment variables. Refusing to start."
    exit 1
fi

# ---------------------------------------------------------------------------
# Caches — always rebuilt at runtime so injected env vars are picked up.
# ---------------------------------------------------------------------------
php artisan config:clear
php artisan optimize   # config + route + view + event cache

# public/storage -> storage/app/public
if [ ! -e public/storage ]; then
    php artisan storage:link || true
fi

# ---------------------------------------------------------------------------
# Migrations (set RUN_MIGRATIONS=false to deploy without touching the schema)
# ---------------------------------------------------------------------------
if [ "${RUN_MIGRATIONS:-true}" = "true" ]; then
    echo "==> Running migrations"
    php artisan migrate --force --no-interaction
else
    echo "==> Skipping migrations (RUN_MIGRATIONS=${RUN_MIGRATIONS})"
fi

echo "==> Ready"

exec "$@"

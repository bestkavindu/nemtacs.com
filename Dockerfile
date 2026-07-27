# syntax=docker/dockerfile:1

# ---------------------------------------------------------------------------
# Stage 1 — Composer dependencies
# ---------------------------------------------------------------------------
FROM php:8.4-cli-alpine AS vendor

COPY --from=mlocati/php-extension-installer:latest /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN install-php-extensions \
    bcmath \
    intl \
    pdo_mysql \
    pdo_pgsql \
    pdo_sqlite \
    zip \
    gd \
    exif \
    pcntl

WORKDIR /app

# Cache the dependency layer: only composer files first.
COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --prefer-dist \
    --no-scripts \
    --no-autoloader

# Full source, then finish the autoloader + package discovery.
COPY . .
RUN mkdir -p bootstrap/cache storage/framework/views \
    && composer dump-autoload --no-dev --optimize --classmap-authoritative \
    && composer run-script post-autoload-dump --no-dev

# ---------------------------------------------------------------------------
# Stage 2 — Front-end assets (Vite 8 needs Node >= 22.12)
# ---------------------------------------------------------------------------
FROM node:22-alpine AS assets

WORKDIR /app

COPY package.json package-lock.json .npmrc ./
RUN npm ci --no-audit --no-fund

# Blade/JS/CSS sources the Tailwind scanner and Vite need.
COPY vite.config.js ./
COPY resources ./resources
COPY app ./app
COPY routes ./routes
COPY --from=vendor /app/vendor ./vendor

RUN npm run build

# ---------------------------------------------------------------------------
# Stage 3 — Runtime
# ---------------------------------------------------------------------------
FROM php:8.4-fpm-alpine AS runtime

COPY --from=mlocati/php-extension-installer:latest /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions \
    bcmath \
    intl \
    pdo_mysql \
    pdo_pgsql \
    pdo_sqlite \
    zip \
    gd \
    exif \
    pcntl \
    redis \
    opcache

RUN apk add --no-cache \
    nginx \
    supervisor \
    tzdata \
    curl \
    sqlite \
    fcgi

WORKDIR /var/www/html

# Config
COPY docker/nginx.conf              /etc/nginx/nginx.conf
COPY docker/php-fpm.conf            /usr/local/etc/php-fpm.d/zz-app.conf
COPY docker/php.ini                 /usr/local/etc/php/conf.d/zz-app.ini
COPY docker/opcache.ini             /usr/local/etc/php/conf.d/zz-opcache.ini
COPY docker/supervisord.conf        /etc/supervisord.conf
COPY docker/entrypoint.sh           /usr/local/bin/entrypoint
RUN chmod +x /usr/local/bin/entrypoint

# Application
COPY --chown=www-data:www-data . .
COPY --from=vendor --chown=www-data:www-data /app/vendor        ./vendor
COPY --from=assets --chown=www-data:www-data /app/public/build  ./public/build

# Runtime-writable paths. .env is NOT baked in — Coolify injects env vars.
RUN rm -f .env \
    && mkdir -p \
        storage/app/public \
        storage/framework/cache/data \
        storage/framework/sessions \
        storage/framework/views \
        storage/framework/testing \
        storage/logs \
        bootstrap/cache \
        /var/lib/nginx/tmp \
        /var/log/supervisor \
    && chown -R www-data:www-data storage bootstrap/cache /var/lib/nginx /var/log/nginx \
    && chmod -R ug+rwX storage bootstrap/cache

ENV APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    OCTANE_SERVER= \
    PHP_MEMORY_LIMIT=512M \
    RUN_MIGRATIONS=true \
    RUN_QUEUE_WORKER=true \
    RUN_SCHEDULER=true

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=5s --start-period=40s --retries=3 \
    CMD curl -fsS http://127.0.0.1/up || exit 1

ENTRYPOINT ["entrypoint"]
CMD ["supervisord", "-c", "/etc/supervisord.conf"]

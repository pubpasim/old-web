# syntax=docker/dockerfile:1
#
# Production image for the Laravel app: nginx + php-fpm + queue workers under supervisor,
# mirroring what nixpacks.toml did. Built on the official PHP image so the patch level is
# whatever PHP_VERSION says (Nixpacks pins an old nixpkgs archive and cannot be bumped).

ARG PHP_VERSION=8.4.27
ARG NGINX_VERSION=1.30.6
ARG NODE_VERSION=24

# ---- base: PHP-FPM (Debian, www-data is uid 33 like the old Nixpacks image) + nginx.org stable ----
FROM docker.io/library/php:${PHP_VERSION}-fpm AS base
ARG NGINX_VERSION
RUN apt-get update \
 && apt-get install -y --no-install-recommends curl gnupg ca-certificates gettext-base supervisor libpq-dev \
 && curl -fsSL https://nginx.org/keys/nginx_signing.key -o /tmp/nginx_signing.key \
 && gpg --show-keys --with-colons /tmp/nginx_signing.key | grep -q '^fpr:::::::::573BFD6B3D8FBC641079A6ABABF5BD827BD9BF62:' \
 && gpg --dearmor < /tmp/nginx_signing.key > /usr/share/keyrings/nginx-archive-keyring.gpg \
 && . /etc/os-release \
 && echo "deb [signed-by=/usr/share/keyrings/nginx-archive-keyring.gpg] https://nginx.org/packages/debian ${VERSION_CODENAME} nginx" > /etc/apt/sources.list.d/nginx.list \
 && apt-get update \
 && apt-get install -y --no-install-recommends "nginx=${NGINX_VERSION}-1~${VERSION_CODENAME}" \
 && docker-php-ext-install -j"$(nproc)" pdo_pgsql pdo_mysql pcntl \
 && rm -rf /var/lib/apt/lists/* /tmp/nginx_signing.key

# ---- vendor: composer dependencies (production only) ----
FROM base AS vendor
RUN apt-get update && apt-get install -y --no-install-recommends unzip && rm -rf /var/lib/apt/lists/*
COPY --from=docker.io/library/composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-scripts --no-autoloader
COPY . .
RUN composer dump-autoload --no-dev --optimize --no-interaction

# ---- assets: vite build ----
FROM docker.io/library/node:${NODE_VERSION}-alpine AS assets
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY vite.config.js postcss.config.js tailwind.config.js ./
COPY resources ./resources
COPY public ./public
# tailwind.config.js also scans the framework's pagination views
COPY --from=vendor /app/vendor/laravel/framework/src/Illuminate/Pagination/resources ./vendor/laravel/framework/src/Illuminate/Pagination/resources
RUN npm run build

# ---- runtime ----
FROM base AS runtime
WORKDIR /app
COPY --from=vendor --chown=www-data:www-data /app /app
COPY --from=assets --chown=www-data:www-data /app/public/build /app/public/build
COPY docker/nginx.conf.template /etc/nginx/nginx.conf.template
COPY docker/supervisord.conf /etc/supervisor/supervisord.conf
COPY docker/php-fpm-pool.conf /usr/local/etc/php-fpm.d/zzz-app.conf
COPY docker/php.ini /usr/local/etc/php/conf.d/zz-app.ini
COPY --chmod=0755 docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chown -R www-data:www-data storage bootstrap/cache && chmod -R ug+rwX storage bootstrap/cache
RUN cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

ENV PORT=80
EXPOSE 80
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

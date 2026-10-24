#!/bin/sh
set -e

export PORT="${PORT:-80}"
envsubst '${PORT}' < /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf

# Volumes mounted over storage/ may arrive owned by root; only re-own when needed.
for dir in /app/storage /app/bootstrap/cache; do
    [ "$(stat -c %U "$dir")" = "www-data" ] || chown -R www-data:www-data "$dir"
done

exec supervisord -c /etc/supervisor/supervisord.conf

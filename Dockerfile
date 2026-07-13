# syntax=docker/dockerfile:1

# ---------------------------------------------------------------------------
# Étape 1 : build des assets front-end (Vite + Tailwind + GSAP)
# ---------------------------------------------------------------------------
FROM node:22-alpine AS assets
WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY . .
RUN npm run build


# ---------------------------------------------------------------------------
# Étape 2 : image applicative (PHP-FPM + Nginx via serversideup/php)
# ---------------------------------------------------------------------------
FROM serversideup/php:8.4-fpm-nginx AS app

# Extensions PHP (pdo_mysql pour la base MySQL)
USER root
RUN install-php-extensions pdo_mysql intl
USER www-data

WORKDIR /var/www/html

# Dépendances Composer (couche mise en cache tant que composer.json/.lock ne changent pas)
COPY --chown=www-data:www-data composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist --optimize-autoloader

# Code de l'application
COPY --chown=www-data:www-data . .

# Assets compilés récupérés depuis l'étape 1
COPY --chown=www-data:www-data --from=assets /app/public/build ./public/build

# Finalisation de l'autoloader optimisé.
# --no-scripts : on n'exécute PAS artisan au build (pas de .env/APP_KEY disponible).
# Laravel régénère le manifeste des packages automatiquement au 1er démarrage.
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts \
    && composer dump-autoload --optimize --no-scripts

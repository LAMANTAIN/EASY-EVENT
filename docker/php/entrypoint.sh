#!/bin/bash

cd /var/www/html

# Installer les dépendances PHP si elles ne sont pas encore là
if [ ! -d vendor ]; then
    composer install
fi

# Installer les dépendances front (Vite, Tailwind...)
if [ -f package.json ]; then
    npm install
    npm run build
fi

# Attendre MySQL puis migrer
until php artisan migrate --force; do
    echo "Attente de PostgreSQL..."
    sleep 3
done

# Lancer le serveur Laravel
php artisan serve --host=0.0.0.0 --port=8000

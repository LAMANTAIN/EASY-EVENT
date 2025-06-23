#!/bin/bash

# 1. Aller dans le dossier de l'app
cd /var/www/html

# 2. Installer les dépendances
composer install

# 3. Installer les dépendances front
npm install

# 4. Générer la clé Laravel (si non générée)
if [ ! -f /var/www/html/storage/oauth-private.key ]; then
  php artisan key:generate
fi

# 5. Migrer la base de données
php artisan migrate --force

# 6. Compiler le front
npm run build

# 7. Lancer le serveur Laravel
php artisan serve --host=0.0.0.0 --port=8000

# Utilisez une image Apache2 avec PHP préinstallé
FROM php:apache

# Copiez les fichiers de votre application dans le conteneur
COPY . /var/www/html

# Exposez le port 80 pour qu'Apache2 puisse écouter les requêtes HTTP
EXPOSE 80


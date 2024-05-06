# Utilisation d'une image de base avec Node.js déjà installé
FROM node:14

# Définir le répertoire de travail dans le conteneur
WORKDIR /app

# Copier le fichier package.json et package-lock.json (s'ils existent) dans le répertoire de travail
COPY FRONTEND/package*.json ./

# Installer les dépendances de l'application
RUN npm install

# Copier le reste du code source de l'application dans le répertoire de travail
COPY . .

# Exposer le port sur lequel l'application s'exécute
EXPOSE 3000

# Commande pour démarrer l'application
CMD ["npm", "start"]


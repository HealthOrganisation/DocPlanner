# Exemple Dockerfile pour une application React/Vite
FROM node:18-alpine

# Définir le répertoire de travail dans le conteneur
WORKDIR /app

# Copier package.json et installer les dépendances
COPY package.json ./
RUN npm install

# Copier le reste de l'application
COPY . .

# Exposer le port 5173 pour Vite
EXPOSE 5173

# Commande pour lancer l'application
CMD ["npm", "run", "dev"]

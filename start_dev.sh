#!/bin/bash

echo "Démarrage de l'environnement de développement..."

cd ./Docker/dev

# Si les conteneurs existent déjà, les lancer
if docker ps -a --format '{{.Names}}' | grep -q 'bloc5-dev-db' && docker ps -a --format '{{.Names}}' | grep -q 'bloc5-dev-web'; then
    echo "Les conteneurs existent déjà, lancement..."
    docker-compose start
else
    echo "Création et lancement des conteneurs..."
    docker-compose up -d
fi

echo "Environnement de développement demarré sur http://localhost:9000"
#!/bin/bash

echo "Démarrage de l'environnement de production..."

cd ./Docker/prod

docker-compose up -d --build

echo "Environnement de production demarré sur http://localhost:8080"
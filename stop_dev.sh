#!/bin/bash

echo "Extinction de l'environnement de développement..."

cd ./Docker/dev

docker-compose stop

echo "Environnement de développement arreté."
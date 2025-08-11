# Démarrage du projet avec Docker Compose

Ce document décrit les principales commandes pour démarrer et gérer vos conteneurs Docker à l'aide de `docker-compose`.

## Prérequis

- Docker
- Docker Compose

## Démarrage des conteneurs

Pour lancer vos conteneurs en arrière‑plan :

```bash
docker-compose up -d
```

## Vérification de l'état des conteneurs

Pour afficher la liste des conteneurs et leur statut :

```bash
docker-compose ps
```

## Arrêt et suppression des conteneurs

Pour arrêter les conteneurs et supprimer le réseau associé :

```bash
docker-compose down
```

## Création user 

```bash
htpasswd -c .htpasswd user
```


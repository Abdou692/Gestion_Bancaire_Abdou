# Gestion_Bancaire_Abdou

# Gestion Bancaire - Projet Abdou

## Introduction

Ce projet est une application de gestion bancaire développée par Abdou, suivant une architecture MVC (Modèle-Vue-Contrôleur) de base, avec des fonctionnalités pour gérer les clients, les comptes et les administrateurs.

## Structure du Projet

Le projet est organisé de la manière suivante :

* **css/** : Contient les feuilles de style CSS pour la mise en forme de l'application.
* **dao/** : Contient le code d'accès aux données (Data Access Object), avec `connexion.php` pour gérer la connexion à la base de données.
* **js/** : Contient les fichiers JavaScript pour l'interactivité côté client.
* **models/** : Contient les classes PHP représentant les entités de la base de données (administrateurs, clients, comptes).
* **views/** : Contient les vues PHP, organisées par entité (admins, clients, comptes) et un dossier `templates` pour les éléments réutilisables.
* **admin\_credentials.txt** : Contient les informations d'identification de l'administrateur.
* **gestion\_bancaire.sql** : Contient le schéma de la base de données MySQL.
* **index.php** : Le point d'entrée de l'application, agissant comme un routeur pour les requêtes.

## Composants Clés

### Modèles (models/)

* `admin.php`, `client.php`, `compte.php` : Définissent les classes pour les entités de la base de données. Ils contiennent les propriétés et les méthodes pour manipuler les données.

### Vues (views/)

* `admins/`, `clients/`, `comptes/` : Contiennent les fichiers PHP générant le code HTML pour l'affichage des données.
* `templates/` : Contient les fichiers PHP pour les éléments HTML réutilisables (en-tête, pied de page, etc.).

### Contrôleurs

* `index.php` : Agit comme un contrôleur de base, gérant les requêtes, l'interaction avec les modèles et les vues, et la logique de l'application.

### DAO (dao/connexion.php)

* `connexion.php` : Établit une connexion à la base de données MySQL en utilisant PDO.

### Routeur (index.php)

* `index.php` : Analyse l'URL, détermine l'action à exécuter, et inclut les fichiers appropriés. Il gère également l'authentification de base.

### Base de données (gestion\_bancaire.sql)

* `gestion\_bancaire.sql` : Contient les instructions SQL pour créer les tables et les relations de la base de données.

### Configuration (admin\_credentials.txt)

* `admin\_credentials.txt` : Contient les informations d'identification de l'administrateur (à noter : à sécuriser en production).

## Flux de l'Application

1.  L'utilisateur envoie une requête via son navigateur.
2.  `index.php` reçoit la requête et analyse l'URL.
3.  `index.php` détermine l'action à exécuter.
4.  `index.php` inclut les fichiers de modèle et de vue nécessaires.
5.  Les modèles interagissent avec la base de données via `dao/connexion.php`.
6.  Les vues affichent les données à l'utilisateur.

## Améliorations Possibles

* Implémenter des contrôleurs explicites pour chaque entité.
* Ajouter une gestion des erreurs robuste.
* Améliorer la sécurité (hachage des mots de passe, requêtes préparées, etc.).
* Ajouter une validation des données côté serveur.
* Envisager l'utilisation d'un framework PHP pour une meilleure structure et sécurité.

## Installation et Utilisation

1.  Clonez le dépôt Git.
2.  Importez `gestion\_bancaire.sql` dans votre base de données MySQL.
3.  Configurez la connexion à la base de données dans `dao/connexion.php`.
4.  Créez `admin\_credentials.txt` avec les informations d'identification de l'administrateur.
5.  Accédez à l'application via votre navigateur.

## Contributeur

* Abdou

## Licence

Ce projet est sous licence [Votre Licence].
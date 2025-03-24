# Gestion Bancaire - Mon Projet

Ce projet est une application de gestion bancaire conçue et développée en suivant l'architecture MVC (Modèle-Vue-Contrôleur). L'objectif principal était de créer une plateforme robuste et évolutive pour la gestion des opérations bancaires, en mettant l'accent sur la séparation des préoccupations et la maintenabilité du code.

## Architecture MVC : Un Choix Délibéré et Ses Implications

L'architecture MVC a été choisie pour sa capacité à organiser le code en trois composants distincts, facilitant ainsi le développement, les tests et la maintenance :

* **Modèles (Models)** : Ces composants représentent les entités de la base de données et la logique métier associée. Ils encapsulent les données et les règles de gestion, permettant une abstraction de la couche de données. J'ai utilisé des classes PHP pour représenter les clients, les comptes, les administrateurs et les contrats, avec des méthodes pour interagir avec la base de données. Chaque modèle contient des propriétés correspondant aux champs de la base de données et des méthodes pour effectuer des opérations CRUD (Créer, Lire, Mettre à jour, Supprimer). Les modèles sont utilisés par les contrôleurs pour effectuer des opérations sur les données.
    * `Admin` : Représente les administrateurs de l'application. Utilisé par `AdminController`.
    * `Client` : Représente les clients de la banque. Utilisé par `ClientController`.
    * `Compte` : Représente les comptes bancaires. Utilisé par `CompteController`.
    * `Contrat` : Représente les contrats bancaires. Utilisé par `ContratController`.
* **Vues (Views)** : Les vues sont responsables de la présentation des données à l'utilisateur. Elles génèrent le code HTML, en utilisant des modèles de conception tels que les templates, pour assurer une interface utilisateur cohérente. J'ai utilisé des fichiers PHP pour générer dynamiquement le contenu HTML, en intégrant des boucles et des conditions pour afficher les données de manière structurée. Les vues reçoivent les données des contrôleurs et les affichent de manière conviviale.
* **Contrôleurs (Controllers)** : Les contrôleurs agissent comme des intermédiaires entre les modèles et les vues. Ils reçoivent les requêtes de l'utilisateur, interagissent avec les modèles pour récupérer ou manipuler les données, et sélectionnent les vues appropriées pour afficher les résultats. J'ai créé des contrôleurs pour gérer les actions liées aux clients, aux comptes, aux administrateurs et aux contrats, en utilisant des méthodes pour traiter les requêtes HTTP et interagir avec les modèles. Les contrôleurs contiennent la logique de l'application et coordonnent les interactions entre les modèles et les vues.

## Fonctionnalités Clés et Leur Implémentation

L'application offre un ensemble de fonctionnalités pour la gestion bancaire :

* **Gestion des Administrateurs** : Permet la création, la modification et la suppression des comptes administrateurs, ainsi que la gestion des sessions de connexion. J'ai utilisé des formulaires HTML pour la saisie des données, des requêtes SQL pour interagir avec la base de données, et des sessions PHP pour gérer l'authentification.
* **Gestion des Clients** : Offre la possibilité de créer, modifier et supprimer des profils clients, ainsi que de consulter les informations détaillées des clients. J'ai implémenté des formulaires HTML pour la saisie des données, des requêtes SQL pour interagir avec la base de données, et des pages de détails pour afficher les informations des clients.
* **Gestion des Comptes Bancaires** : Permet la création, la modification et la suppression des comptes bancaires, ainsi que la consultation des soldes et des transactions. J'ai utilisé des formulaires HTML pour la saisie des données, des requêtes SQL pour interagir avec la base de données, et des tableaux HTML pour afficher les transactions.
* **Gestion des Contrats** : Gère les contrats bancaires, y compris la création, la modification et la suppression des contrats, ainsi que la consultation des détails des contrats. J'ai implémenté des formulaires HTML pour la saisie des données, des requêtes SQL pour interagir avec la base de données, et des pages de détails pour afficher les informations des contrats.
* **Tableau de bord** : Permet l'affichage de statistiques générales de la banque comme le nombre de clients, le nombre de comptes et le nombre de contrats.

## Composants Techniques et Leurs Détails

* **index.php (Routeur)** : Ce fichier agit comme un point d'entrée unique pour toutes les requêtes, en analysant l'URL et en dispatchant les requêtes vers les contrôleurs appropriés. J'ai utilisé des conditions `if` et `switch` pour analyser l'URL et appeler les contrôleurs appropriés.
* **Contrôleurs (controllers/)** : Les contrôleurs gèrent la logique de l'application, en interagissant avec les modèles et en sélectionnant les vues appropriées. J'ai utilisé des méthodes pour traiter les requêtes HTTP, interagir avec les modèles, et appeler les vues.
    * `AdminController` : Gère les opérations liées aux administrateurs (connexion, création, modification, suppression, affichage).
    * `ClientController` : Gère les opérations liées aux clients (création, modification, suppression, affichage).
    * `ContratController` : Gère les opérations liées aux contrats (création, modification, suppression, affichage).
    * `CompteController` : Gère les opérations liées aux comptes bancaires (création, modification, suppression, affichage) et affiche le tableau de bord.
* **Modèles (models/)** : Les modèles représentent les entités de la base de données et la logique métier associée. J'ai utilisé des classes PHP pour représenter les entités de la base de données, avec des propriétés pour les attributs et des méthodes pour les opérations CRUD.
* **Vues (views/)** : Les vues génèrent le code HTML pour l'interface utilisateur, en utilisant des templates pour la mise en page. J'ai utilisé des fichiers PHP pour générer dynamiquement le contenu HTML, en intégrant des boucles et des conditions pour afficher les données de manière structurée.
* **DAO (dao/connexion.php)** : Ce composant gère la connexion à la base de données MySQL, en utilisant PDO pour les opérations de base de données. J'ai utilisé PDO pour exécuter des requêtes SQL, récupérer les résultats, et gérer les erreurs de base de données.
* **Base de Données (gestion_bancaire.sql)** : Ce fichier contient le schéma de la base de données, définissant les tables et les relations. J'ai utilisé des instructions SQL pour créer les tables, définir les clés primaires et étrangères, et insérer des données de test.
* **Configuration (admin_credentials.txt)** : Ce fichier contient les informations d'identification de l'administrateur, à des fins de développement. J'ai utilisé ce fichier pour stocker les informations de connexion de l'administrateur, mais il est important de noter que cela n'est pas sécurisé pour un environnement de production.

## Conclusion

Ce projet de gestion bancaire, développé selon l'architecture MVC, offre une plateforme solide et évolutive pour la gestion des opérations bancaires. La séparation des préoccupations entre les modèles, les vues et les contrôleurs facilite la maintenance et l'évolution de l'application. Les fonctionnalités clés, telles que la gestion des administrateurs, des clients, des comptes et des contrats, sont implémentées de manière claire et efficace. Les composants techniques, tels que le routeur, les contrôleurs, les modèles, les vues et le DAO, sont bien structurés et documentés, facilitant la compréhension et la modification du code.

Structure général du projet : 

gestion_bancaire/
├── controllers/
│   ├── adminController.php       # Gère les opérations liées aux administrateurs
│   ├── clientController.php      # Gère les opérations liées aux clients
│   ├── compteController.php      # Gère les opérations liées aux comptes bancaires
│   └── contratController.php     # Gère les opérations liées aux contrats bancaires
├── css/
│   └── style.css                 # Fichier de styles CSS pour l'interface utilisateur
├── dao/
│   └── connexion.php             # Gère la connexion à la base de données MySQL
├── js/
│   └── script.js                 # Fichiers JavaScript pour les interactions utilisateur (si existant)
├── models/
│   ├── admin.php                 # Modèle pour les administrateurs
│   ├── client.php                # Modèle pour les clients
│   ├── compte.php                # Modèle pour les comptes bancaires
│   └── contrat.php               # Modèle pour les contrats bancaires
├── views/
│   ├── admins/
│   │   ├── create.php            # Vue pour la création d'un administrateur
│   │   ├── edit.php              # Vue pour la modification d'un administrateur
│   │   ├── index.php             # Vue pour la liste des administrateurs
│   │   └── connexion.php         # Vue pour la connexion des administrateurs
│   ├── clients/
│   │   ├── create.php            # Vue pour la création d'un client
│   │   ├── edit.php              # Vue pour la modification d'un client
│   │   ├── index.php             # Vue pour la liste des clients
│   │   └── view.php              # Vue pour les détails d'un client
│   ├── comptes/
│   │   ├── create.php            # Vue pour la création d'un compte bancaire
│   │   ├── edit.php              # Vue pour la modification d'un compte bancaire
│   │   ├── index.php             # Vue pour la liste des comptes bancaires
│   │   └── view.php              # Vue pour les détails d'un compte bancaire
│   ├── contrats/
│   │   ├── create.php            # Vue pour la création d'un contrat
│   │   ├── edit.php              # Vue pour la modification d'un contrat
│   │   ├── index.php             # Vue pour la liste des contrats
│   │   └── view.php              # Vue pour les détails d'un contrat
│   ├── templates/
│   │   ├── dashboard.php         # Vue pour le tableau de bord
│   │   └── layout.phtml           # Template de base pour les vues
├── admin_credentials.txt         # Fichier de configuration pour les identifiants d'administrateur (à des fins de développement)
├── gestion_bancaire.sql         # Fichier SQL pour la création de la base de données
├── index.php                     # Point d'entrée de l'application (routeur)
└── README.md   
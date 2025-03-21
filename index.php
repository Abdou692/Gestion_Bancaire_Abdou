<?php
session_start();

// Inclure les contrôleurs et la connexion à la base de données
require_once __DIR__ . '/controllers/clientController.php';
require_once __DIR__ . '/controllers/compteController.php';
require_once __DIR__ . '/controllers/adminController.php';
require_once __DIR__ . '/dao/connexion.php';

// Instancier les contrôleurs
$clientController = new ClientController();
$compteController = new CompteController();
$adminController = new AdminController();

// Gérer les actions
if (isset($_GET['action'])) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING); // Filtrer l'entrée

    switch ($action) {
        case 'connexion_admin':
            $adminController->connexionAdmin();
            break;
        case 'ajouter_admin':
            $adminController->createAdmin();
            break;
        case 'liste_admin':
            $adminController->index();
            break;
        case 'listClient':
            $clientController->index();
            break;
        case 'ajouter_client':
            $clientController->create();
            break;
        case 'modifier_client':
            $clientController->edit();
            break;
        case 'supprimer_client':
            $clientController->delete();
            break;
        case 'voir_client':
            $clientController->view();
            break;
        case 'listes_comptes':
            $compteController->index();
            break;
        case 'ajouter_compte':
            $compteController->create();
            break;
        case 'modifier_compte':
            $compteController->edit();
            break;
        case 'supprimer_compte':
            $compteController->delete();
            break;
        case 'voir_compte':
            $compteController->view();
            break;
        case 'creer_compte':
            $compteController->create();
            break;
        default:
            // Action non reconnue, afficher une erreur ou une page par défaut
            echo "Action non reconnue.";
            $clientController->index(); // Ou une autre action par défaut
            break;
    }
} else {
    $clientController->index(); // Action par défaut si aucune action n'est spécifiée
}
?>
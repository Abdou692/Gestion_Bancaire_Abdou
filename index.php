<?php
session_start();

require_once __DIR__ . '/controllers/clientController.php';
require_once __DIR__ . '/controllers/compteController.php';
require_once __DIR__ . '/controllers/adminController.php';
require_once __DIR__ . '/controllers/contratController.php';
require_once __DIR__ . '/dao/connexion.php';

$clientController = new ClientController();
$compteController = new CompteController();
$adminController = new AdminController();
$contratController = new ContratController();

if (isset($_GET['action'])) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

    switch ($action) {
        // Actions pour les administrateurs
        case 'connexion_admin':
            $adminController->connexionAdmin();
            break;
        case 'deconnexion_admin':
            $adminController->deconnexionAdmin();
            break;
        case 'ajouter_admin':
            $adminController->createAdmin();
            break;
        case 'modifier_admin':
            $adminController->editAdmin();
            break;
        case 'supprimer_admin':
            $adminController->deleteAdmin();
            break;
        case 'liste_admins':
            $adminController->index();
            break;

        // Actions pour les clients
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

        // Actions pour les comptes
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
        case 'tableau_de_bord':
            $compteController->dashboard();
            break;

        // Actions pour les contrats
        case 'liste_contrats':
            $contratController->index();
            break;
        case 'ajouter_contrat':
            $contratController->create();
            break;
        case 'modifier_contrat':
            $contratController->edit();
            break;
        case 'supprimer_contrat':
            $contratController->delete();
            break;
        case 'voir_contrat':
            $contratController->view();
            break;

        // Action par défaut
        default:
            $adminController->connexionAdmin();
            break;
    }
} else {
    // Action par défaut si aucune action n'est spécifiée
    $adminController->connexionAdmin();
}
?>
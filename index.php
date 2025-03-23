<?php
session_start();

require_once __DIR__ . '/controllers/clientController.php';
require_once __DIR__ . '/controllers/compteController.php';
require_once __DIR__ . '/controllers/adminController.php';
require_once __DIR__ . '/dao/connexion.php';

$clientController = new ClientController();
$compteController = new CompteController();
$adminController = new AdminController();

if (isset($_GET['action'])) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

    switch ($action) {
        case 'connexion_admin':
            $adminController->connexionAdmin();
            break;
        case 'deconnexion':
            $adminController->deconnexionAdmin();
            break;
        case 'ajouter_admin':
            $adminController->createAdmin();
            break;
        case 'liste_admin':
            $adminController->index();
            break;
        case 'modifier_admin':
            $adminController->editAdmin();
            break;
        case 'supprimer_admin':
            $adminController->deleteAdmin();
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
            $adminController->connexionAdmin();
            break;
    }
} else {
    $adminController->connexionAdmin();
}
?>
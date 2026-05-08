<?php



require '../app/core/DbConnect.php';

require '../app/models/Livre.php';
require '../app/models/Personne.php';
require '../app/models/Emprunt.php';

require '../app/controllers/LivreController.php';
require '../app/controllers/PersonneController.php';
require '../app/controllers/EmpruntController.php';

$controllerName = isset($_GET['controller'])
    ? $_GET['controller']
    : 'livre';

$action = isset($_GET['action'])
    ? $_GET['action']
    : 'index';

switch($controllerName) {

    case 'personne':
        $controller = new PersonneController();
        break;

    case 'emprunt':
    $controller = new EmpruntController();
    break;

    default:
        $controller = new LivreController();
        break;
}

switch($action) {

    case 'create':
        $controller->create();
        break;

    case 'edit':
        $controller->edit();
        break;

    case 'delete':
        $controller->delete();
        break;

    case 'retourner':
    $controller->retourner();
    break;

    default:
        $controller->index();
        break;
}
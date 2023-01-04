<?php

const __PROJECT_ROOT__ = __DIR__;

require_once __PROJECT_ROOT__ . "/Common/SingletonTrait.php";
require_once __PROJECT_ROOT__ . "/Common/functions.php";

require_once __PROJECT_ROOT__ . "/Entity/Projet.php";
require_once __PROJECT_ROOT__ . "/Entity/Database.php";
require_once __PROJECT_ROOT__ . "/Entity/contact.php";
require_once __PROJECT_ROOT__ . "/Entity/Commentaire.php";
require_once __PROJECT_ROOT__ . "/Entity/tag.php";
require_once __PROJECT_ROOT__ . "/Entity/User.php";

require_once __PROJECT_ROOT__ . "/Service/DatabaseProjectService.php";
require_once __PROJECT_ROOT__ . "/Service/DatabaseContactService.php";
require_once __PROJECT_ROOT__ . "/Service/CommentaireService.php";
require_once __PROJECT_ROOT__ . "/Service/CompteService.php";
require_once __PROJECT_ROOT__ . "/Service/LoginService.php";

require_once __PROJECT_ROOT__ . "/Controllers/AbstractController.php";
require_once __PROJECT_ROOT__ . "/Controllers/AjoutProjetController.php";
require_once __PROJECT_ROOT__ . "/Controllers/CompteController.php";
require_once __PROJECT_ROOT__ . "/Controllers/CompteModifController.php";
require_once __PROJECT_ROOT__ . "/Controllers/ContactController.php";
require_once __PROJECT_ROOT__ . "/Controllers/CommentaireController.php";
require_once __PROJECT_ROOT__ . "/Controllers/ProjetController.php";
require_once __PROJECT_ROOT__ . "/Controllers/AccueilController.php";
require_once __PROJECT_ROOT__ . "/Controllers/LoginController.php";
require_once __PROJECT_ROOT__ . "/Controllers/InscriptionController.php";
require_once __PROJECT_ROOT__ . "/Controllers/LikeController.php";
require_once __PROJECT_ROOT__ . "/Controllers/ModoController.php";
require_once __PROJECT_ROOT__ . "/Controllers/PublicationProjetController.php";
require_once __PROJECT_ROOT__ . "/Controllers/SupressionProjetController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );


switch ($uri[1]) :
    // List/Home view
    case "":
    case "accueil":
        (new AccueilController(DatabaseProjectService::getInstance() ))->render();
        break;

    case "projet":
        // Extraction de l'id de la tâche depuis l'URI /task/{id}
        $projet_id = isset($uri[2])

            ? intval($uri[2])
            : null;
        (new ProjetController(DatabaseProjectService::getInstance(), $projet_id ))->render();
        break;
    case "login":
        (new LoginController(CompteService::getInstance()))->render();
        break;

    case "inscription":
        (new InscriptionController(CompteService::getInstance()))->render();
        break;

    case "create":
        (new AjoutProjetController(DatabaseProjectService::getInstance()))->render();
        break;

    case "compte":
        (new CompteController(CompteService::getInstance()))->render();
        break;
    case "contact":
        (new ContactController(DatabaseContactService::getInstance()))->render();
        break;

    case "commentaire":
        (new CommentaireController(CommentaireService::getInstance()))->render();
        break;

    case "like":
        (new LikeController(CommentaireService::getInstance()))->render();
        break;

    case "compteModif":
        (new CompteModifController(CompteService::getInstance()))->render();
        break;

    case "modo":
        (new ModoController(DatabaseProjectService::getInstance()))->render();
        break;

    case "publication":
        (new PublicationProjetController(DatabaseProjectService::getInstance()))->render();
        break;

    case "suppression":
        (new SupressionProjetController(DatabaseProjectService::getInstance()))->render();
        break;

    // Default 404
    default:
        http_response_code(404);
        include('View/404.php');
        die();
        exit();
endswitch;
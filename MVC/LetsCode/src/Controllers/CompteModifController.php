<?php

class CompteModifController extends AbstractController
{

    public function render(): void
    {
        echo get_template(
            __PROJECT_ROOT__."/View/compteModif.php", [
                "titre" =>
            ]
        );
    case "CompteModif":
        (new CompteModifController(ComteService::getInstance()))->render();
        break;
    }
}
<?php

class AccueilContoller extends AbstractController
{


    public function render(): void
    {
        echo get_template(__PROJECT_ROOT__ . "/View/accueil.php", [

        ]);
    }
}
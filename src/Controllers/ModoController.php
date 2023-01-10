<?php

class ModoController extends AbstractController
{

    private DatabaseProjectService $projetService;

    public function __construct(AllService $Service) {
        parent::__construct(($Service));
        $this->projetService = DatabaseProjectService::getInstance();


    }
    public function render(): void
    {

        // TODO: Implement render() method.
        if(!isset($_SESSION["ids"])){
            header("location: http://localhost/login");
        }
        $serviceCompte = CompteService::getInstance();
        $userActuel = $serviceCompte->get($_SESSION['ids']);

        echo get_template(__PROJECT_ROOT__ . "/View/modo.php", [
            "user" => $serviceCompte->get($userActuel->getId()),
            "project"=>$this->projetService->getModerateur(),
            "count"=>$this->projetService->countProjet()
        ]);
    }
}
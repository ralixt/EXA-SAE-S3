<?php

class LoginController extends AbstractController
{
    private CompteService $loginService;

    public function __construct(AllService $Service) {
        parent::__construct(($Service));
         $this->loginService=CompteService::getInstance();

    }

    public function render(): void
    {



       // $serviceCompte = CompteService::getInstance();

    if(isset($_POST["adr_email"])&&isset($_POST["mp"])) {
        $compte = $this->loginService->connexion($_POST["adr_email"], $_POST["mp"]);
        var_dump($compte);
        if($compte) {
            header('location: http://localhost');
        }
    }

        echo get_template(__PROJECT_ROOT__ . "/View/login.php", [
            "p"=>null
        ]);

       /* if($compte==true){
            header(' location: http:://localhost');
        }*/







       /* if(isset($compte)){
            $id = get($compte);
        }*/


    }
}

?>
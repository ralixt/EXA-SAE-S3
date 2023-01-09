<?php
session_start();
class LoginController extends AbstractController
{
    private CompteService $loginService;
    public bool $compte;
    public string $erreur="";
    public function __construct(AllService $Service) {
        parent::__construct(($Service));
         $this->loginService=CompteService::getInstance();
         $this->compte=false;

    }

    public function render(): void
    {
       // $serviceCompte = CompteService::getInstance();
        $c=[];
    if(isset($_POST["adr_email"])&&isset($_POST["mp"])) {
         $this->compte=$this->loginService->connexion($_POST["adr_email"], $_POST["mp"]);

    }
        if($this->compte==true) {
            $erreur="";
            header("location: http://localhost/compte ");

        }
        else {
            $erreur="Adresse Mail ou  mot de passe incorrects";
            echo get_template(__PROJECT_ROOT__ . "/View/login.php", [
                "erreur" => $erreur
            ]);
        }
    }
}

?>
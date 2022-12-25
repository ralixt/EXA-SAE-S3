<?php

class InscriptionController extends AbstractController
{

    private CompteService $InscriptionService;
    private bool $c;
    private string $erreur="";
    public function __construct(AllService $Service) {
        parent::__construct(($Service));
        $this->InscriptionService=CompteService::getInstance();
        $this->c=false;




    }
    public function render(): void
    {



        if(isset($_POST["confirmation_mp"])&&isset($_POST["creation_mp"])&&isset($_POST["adr_email"])&&isset($_POST["Pseudo"])) {
            if (hash('sha256', $_POST["creation_mp"]) === hash('sha256', $_POST["confirmation_mp"])) {
                $user = new User();
                $user->setPassword($_POST["confirmation_mp"])
                    ->setEmail($_POST["adr_email"])
                    ->setPseudo($_POST["Pseudo"])
                    ->setIsPremium(0)
                    ->setSubscription(0)
                    ->setRole("User");


                $this->c = $this->InscriptionService->create($user);







            }
            else{
                $erreur="les deux mots de passes sont pas identiques";
            }
        }

        if($this->c==false) {
            echo get_template(__PROJECT_ROOT__ . "/View/inscription.php", [
                "erreur"=>$erreur
            ]);
        }else{
            echo get_template(__PROJECT_ROOT__ . "/View/login.php", [
                []
            ]);
        }


        }




}
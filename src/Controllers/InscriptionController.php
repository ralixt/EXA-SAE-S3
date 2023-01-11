<?php

class InscriptionController extends AbstractController
{

    private CompteService $InscriptionService;
    private bool $c;
    private bool $pseudo;
    private bool $email;
    private string $erreur;
    public function __construct(AllService $Service) {
        parent::__construct(($Service));
        $this->InscriptionService=CompteService::getInstance();
        $this->c=false;

        $this->erreur="";




    }
    public function render(): void
    {
        $tabMPPseudo = $this->InscriptionService->getEmailMp();
        if(isset($_POST["confirmation_mp"])&&isset($_POST["creation_mp"])&&isset($_POST["adr_email"])&&isset($_POST["Pseudo"])) {

               $pseudoAvailable= $this->InscriptionService->isPseudoAvailable($_POST["Pseudo"]);
               $emailAvailable=$this->InscriptionService->isEmailAvailable($_POST["adr_email"]);
            //var_dump($this->InscriptionService->getEmailMp());
                    if($pseudoAvailable and $emailAvailable) {

                        if (hash('sha256', $_POST["creation_mp"]) === hash('sha256', $_POST["confirmation_mp"])) {
                            $user = new User();
                            $user->setPassword($_POST["confirmation_mp"])
                                ->setEmail($_POST["adr_email"])
                                ->setPseudo($_POST["Pseudo"])
                                ->setIsPremium(0)
                                ->setSubscription(0)
                                ->setRole("User");


                            $this->c = $this->InscriptionService->create($user);


                        } else {
                            $this->erreur = "les deux mots de passes ne sont pas identiques";
                        }
                    }
                    elseif(!$pseudoAvailable and !$emailAvailable ){
                        $this->erreur = "l'adresse mail et le pseudo existe déjà";
                    }
                    elseif(!$pseudoAvailable){
                        $this->erreur = "le Pseudo existe déjà";
                    }elseif(!$emailAvailable){
                        $this->erreur = "l'adresse mail existe déjà";
                    }


        }

        if($this->c==false) {
            echo get_template(__PROJECT_ROOT__ . "/View/inscription.php", [
                "erreur"=>$this->erreur
            ]);
        }else{
            echo get_template(__PROJECT_ROOT__ . "/View/login.php", [
                []
            ]);
        }


        }




}
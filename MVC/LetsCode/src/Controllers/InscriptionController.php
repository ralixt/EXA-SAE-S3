<?php

class InscriptionController extends AbstractController
{

    private CompteService $InscriptionService;
    private bool $c;
    private bool $p;
    private bool $e;
    private string $erreur;
    public function __construct(AllService $Service) {
        parent::__construct(($Service));
        $this->InscriptionService=CompteService::getInstance();
        $this->c=false;
        $this->p=true;
        $this->e=true;
        $this->erreur="";




    }
    public function render(): void
    {
        $tabMPPseudo = $this->InscriptionService->getEmailMp();
        if(isset($_POST["confirmation_mp"])&&isset($_POST["creation_mp"])&&isset($_POST["adr_email"])&&isset($_POST["Pseudo"])) {
                  for($i=0;$i<count($tabMPPseudo);$i++) {
                      if ($tabMPPseudo[$i]["Pseudo"] == $_POST["Pseudo"] ) {
                        $this->p=false;
                      }
                      elseif($tabMPPseudo[$i]["Pseudo"] != $_POST["Pseudo"]){
                          $this->p=true;
                      }
                      if($tabMPPseudo[$i]["email"] == $_POST["adr_email"]){
                          $this->e=false;
                      }
                      elseif($tabMPPseudo[$i]["email"] != $_POST["adr_email"]){
                          $this->e=true;
                      }
                      if ($tabMPPseudo[$i]["Pseudo"] == $_POST["Pseudo"] and $tabMPPseudo[$i]["email"] == $_POST["adr_email"] ) {
                          $this->p=false;
                          $this->e=false;
                      }elseif($tabMPPseudo[$i]["Pseudo"] != $_POST["Pseudo"] and $tabMPPseudo[$i]["email"] != $_POST["adr_email"]){
                          $this->p=true;
                          $this->e=true;
                      }
                  }

            //var_dump($this->InscriptionService->getEmailMp());
                    if($this->p==true and $this->e==true) {

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
                    elseif($this->p==false and $this->e==false ){
                        $this->erreur = "l'adresse mail et le pseudo existe déjà";
                    }
                    elseif($this->p==false){
                        $this->erreur = "le Pseudo existe déjà";
                    }elseif($this->e==false){
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
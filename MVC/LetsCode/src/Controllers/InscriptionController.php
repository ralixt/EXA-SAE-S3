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



        if(isset($_POST["confirmation_mp"])&&isset($_POST["creation_mp"])&&isset($_POST["adr_email"])&&isset($_POST["Pseudo"])) {
                  for($i=0;$i<count($this->InscriptionService->getEmailMp());$i++) {
                      if ($this->InscriptionService->getEmailMp()[$i]["Pseudo"] == $_POST["Pseudo"] ) {
                        $this->p=false;
                      }
                      elseif($this->InscriptionService->getEmailMp()[$i]["Pseudo"] != $_POST["Pseudo"]){
                          $this->p=true;
                      }
                      if($this->InscriptionService->getEmailMp()[$i]["email"] == $_POST["adr_email"]){
                          $this->e=false;
                      }
                      elseif($this->InscriptionService->getEmailMp()[$i]["email"] != $_POST["adr_email"]){
                          $this->e=true;
                      }
                      if ($this->InscriptionService->getEmailMp()[$i]["Pseudo"] == $_POST["Pseudo"] and $this->InscriptionService->getEmailMp()[$i]["email"] == $_POST["adr_email"] ) {
                          $this->p=false;
                          $this->e=false;
                      }elseif($this->InscriptionService->getEmailMp()[$i]["Pseudo"] != $_POST["Pseudo"] and $this->InscriptionService->getEmailMp()[$i]["email"] != $_POST["adr_email"]){
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
                            $this->erreur = "les deux mots de passes sont pas identiques";
                        }
                    }
                    elseif($this->p==false and $this->e==false ){
                        $this->erreur = "l'adresse mail et le pseudo existe déja";
                    }
                    elseif($this->p==false){
                        $this->erreur = "le Pseudo existe déja";
                    }elseif($this->e==false){
                        $this->erreur = "l'adresse mail existe déja";
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
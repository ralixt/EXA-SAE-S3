<?php

class ProjetController extends AbstractController
{
    public function __construct(AllService $Service, $projet_id) {
        parent::__construct(($Service));
        if($projet_id!=null){
            $this->task = $this->Service->get($projet_id);
        }
        else{
            header("location: localhost");
        }
    }

    public function render(): void
    {
        $serviceCommmentaire=CommentaireService::getInstance();
        $commentaire=new Commentaire();

        $contenu=null;
        $rating=null;
        $iduser=null;
        $projet=null;
        $Pseudo=null;

        if(isset($_POST["commentaire"])){
            $contenu=$_POST["commentaire"];
        }
        if(isset($_POST["note"])){
            $rating=$_POST["note"];
        }
        if(isset($_SESSION["ids"])){
            $iduser=$_SESSION["ids"];
        }
        if(isset($_POST["projet"])){
            $rating=$_POST["projet"];
        }
        if(isset($_SESSION["Pseudo"])){
            $Pseudo=$_SESSION["Pseudo"];
        }

        $commentaire->setContent($contenu);
        $commentaire->setRating($rating);
        $commentaire->setAuthor($iduser);
        $commentaire->setProjet($projet);
        $commentaire->setPseudo($Pseudo);


        $serviceCommmentaire->create($commentaire);




    }
}
<?php

class ProjetController extends AbstractController
{

    private PDO $CommentaireService;
    public function __construct(AllService $Service, $projet_id) {
        parent::__construct(($Service));
        $this->CommentaireService = CommentaireService::getInstance();
        if($projet_id!=null){
            $this->task = $this->Service->get($projet_id);

        }
        else{
            header("location: localhost");
        }
    }

    public function render(): void
    {
        //

        $id=null;
        if(isset($_GET['id_project'])) {
            $id= $_GET['id_project'];

        }
        echo get_template(__PROJECT_ROOT__ . "/View/project.php", [
            "project" => $this->task,
            "comments"=>$this->task
        ]);
/*
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
        $commentaire->setAuthor(11);
        $commentaire->setProjet($projet);
        $commentaire->setPseudo($Pseudo);


        $success=$serviceCommmentaire->create($commentaire);
        if (!$success) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }


*/



    }
}
<?php

class ProjetController extends AbstractController
{

    private CommentaireService $CommentaireService;

    private int $id;
    public function __construct(AllService $Service, $projet_id) {
        parent::__construct(($Service));
        $this->CommentaireService = CommentaireService::getInstance();
        if($projet_id!=null){
            $this->task = $this->Service->get($projet_id);
            $this->tasks = $this->CommentaireService->getById($projet_id);
            $this->id=$projet_id;

        }
        else{
            header("location: localhost");
        }
    }

    public function render(): void
    {
        
        $commentaire=new Commentaire();
        $contenu='';
        $rating=0;
        $iduser=11;
        $projet=$this->id;

        if(isset($_POST["commentaire"])){
            $contenu=$_POST["commentaire"];
        }
        if(isset($_POST["note"])){
            $rating=$_POST["note"];
        }
        if(isset($_SESSION["ids"])){
            $iduser=$_SESSION["ids"];
        }


        $commentaire->setContent($contenu);
        $commentaire->setRating($rating);
        $commentaire->setAuthor(11);
        $commentaire->setProjet($this->id);
        $this->CommentaireService->create($commentaire);

        echo get_template(__PROJECT_ROOT__ . "/View/project.php", [
            "project" => $this->task,
            "comments"=>$this->tasks
        ]);


    }
}
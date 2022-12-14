<?php

class ProjetController extends AbstractController
{

    private CommentaireService $CommentaireService;

    private int $id;

    public function __construct(AllService $Service, $projet_id) {
        parent::__construct(($Service));
        $this->CommentaireService = CommentaireService::getInstance();
        if($projet_id!=null){
            $this->id = $projet_id;

        }
        else{
            header("location: http://localhost/");
        }
    }

    public function render(): void
    {

        //commentaire

                if (isset($_POST["commentaire"]) && isset($_POST["note"]) && isset($_SESSION["ids"])) {

                    $commentaire = new Commentaire();
                        $commentaire->setContent($_POST["commentaire"]);
                        $commentaire->setRating($_POST["note"]);
                        $commentaire->setAuthor($_SESSION["ids"]);
                        $commentaire->setProjet($this->id);
                        $this->CommentaireService->create($commentaire);
                    }

                echo get_template(__PROJECT_ROOT__ . "/View/project.php", [
                    "project" => $this->Service->get($this->id),
                    "comments"=>$this->CommentaireService->getById($this->id)
                ]);
                }







}
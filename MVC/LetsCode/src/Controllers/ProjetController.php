<?php

class ProjetController extends AbstractController
{

    private CommentaireService $CommentaireService;

    private int $id;
    private bool $commentProject;

    public function __construct(AllService $Service, $projet_id) {
        parent::__construct(($Service));
        $this->CommentaireService = CommentaireService::getInstance();
        $this->commentProject=false;
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
                if(isset($_GET["idcomment"])) {
                    $this->commentProject=$this->CommentaireService->getCommentLike($_GET["idcomment"], $_SESSION["ids"]);
                    if ( $this->commentProject== false) {
                        $this->CommentaireService->createCommentLike($_GET["idcomment"], $_SESSION['ids']);
                    } else {
                        $this->CommentaireService->deleteCommentLike($_GET["idcomment"], $_SESSION['ids']);
                    }
                }
        echo get_template(__PROJECT_ROOT__ . "/View/project.php", [
            "project" => $this->Service->get($this->id),
            "comments"=>$this->CommentaireService->getById($this->id)
        ]);


                }







}
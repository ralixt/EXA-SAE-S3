<?php

class CommentaireController extends AbstractController
{
    private CommentaireService $CommentaireService;
    private int $id;
    private int $id2;
    private bool $commentProject;
    public function __construct(AllService $Service) {
        parent::__construct(($Service));
        $this->CommentaireService = CommentaireService::getInstance();
        $this->id=0;
        $this->id2=0;
        $this->commentProject=false;

    }
    public function render(): void
    {

        // TODO: Implement render() method.

        if (isset($_POST["commentaire"]) && isset($_POST["note"]) && isset($_SESSION["ids"])) {
            $this->id=$_GET["idproject"];
            $commentaire = new Commentaire();

            $commentaire->setContent($_POST["commentaire"]);
            $commentaire->setRating($_POST["note"]);
            $commentaire->setAuthor($_SESSION["ids"]);
            $commentaire->setProjet($this->id);
            $this->Service->create($commentaire);

            header("location: http://localhost/projet/$this->id");
        }

        if(isset($_SESSION["ids"])){

            if(isset($_GET["idcomment"])) {
                $this->id2=$_GET["idprojects"];
                $this->commentProject=$this->CommentaireService->getCommentLike($_GET["idcomment"], $_SESSION["ids"]);
                if ( $this->commentProject== false) {
                    $this->CommentaireService->createCommentLike($_GET["idcomment"], $_SESSION['ids']);
                    header("location: http://localhost/projet/$this->id2" );
                } else {
                    $this->CommentaireService->deleteCommentLike($_GET["idcomment"], $_SESSION['ids']);
                    header("location: http://localhost/projet/$this->id2" );

                }
            }
        }else if(!isset($_SESSION["ids"])){
            header("location: http://localhost/login" );
        }
    }
}
<?php

class LikeController extends AbstractController
{
    private CommentaireService $CommentaireService;
    private int $id;
    private bool $LikeProject;
    public function __construct(AllService $Service) {
        parent::__construct(($Service));
        $this->CommentaireService = CommentaireService::getInstance();
        $this->id=0;
        $this->LikeProject=false;
    }
    public function render(): void
    {
        // TODO: Implement render() method.
        if(isset($_SESSION["ids"])){

            if(isset($_GET["idprojectss"])) {
                $this->id=$_GET["idprojectss"];
                $this->LikeProject=$this->CommentaireService->getProjectLike($_GET["idprojectss"], $_SESSION["ids"]);

                if ( $this->LikeProject== false) {
                    $this->CommentaireService->createProjectLike($_GET["idprojectss"], $_SESSION['ids']);
                    header("location: http://localhost/" );

                } else {
                    $this->CommentaireService->deleteProjectLike($_GET["idprojectss"], $_SESSION['ids']);
                    header("location: http://localhost/projet/$this->id" );
                }
            }
        }else if(!isset($_SESSION["ids"])){
            header("location: http://localhost/login" );
        }
    }
}
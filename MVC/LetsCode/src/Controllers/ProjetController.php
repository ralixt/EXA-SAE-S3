<?php

class ProjetController extends AbstractController
{

    private CommentaireService $CommentaireService;
    private DatabaseProjectService $projectService;
    private int $nb;
    private int $id;
    private int $id2;
    private bool $commentProject;
    private bool $likeProject;

    public function __construct(AllService $Service, $projet_id) {
        parent::__construct(($Service));
        $this->CommentaireService = CommentaireService::getInstance();
        //$this->projectService=DatabaseProjectService::getInstance();
        $this->commentProject=false;
         $this->likeProject=true;
         $this->id2=$projet_id;
        if($projet_id!=null){
            $this->id = $projet_id;


        }
       else{
            header("location: http://localhost/");
        }
    }

    public function render(): void
    {

        echo get_template(__PROJECT_ROOT__ . "/View/project.php", [
            "project" => $this->Service->get($this->id),
            "comments"=>$this->CommentaireService->getById($this->id),



        ]);

        //commentaire



                //project
        /*if(isset($_SESSION["ids"])){
            $this->likeProject= $this->CommentaireService->getProjectLike($this->id,$_SESSION["ids"]);
            if ( $this->likeProject== true) {
                $this->CommentaireService->createProjectLike($this->id, $_SESSION['ids']);
                // $this->commentProject=true;


            } else  {
                $this->CommentaireService->deleteProjectLike($this->id, $_SESSION['ids']);
                //$this->commentProject=false;



            }
         }*/


    }







}
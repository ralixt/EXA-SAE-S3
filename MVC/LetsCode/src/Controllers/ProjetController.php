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



    }
}
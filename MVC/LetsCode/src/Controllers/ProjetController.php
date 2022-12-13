<?php

class ProjetController extends AbstractController
{

    private CommentaireService $CommentaireService;
    public function __construct(AllService $Service, $projet_id) {
        parent::__construct(($Service));
        $this->CommentaireService = CommentaireService::getInstance();
        if($projet_id!=null){
            $this->task = $this->Service->get($projet_id);
            $this->tasks=$this->CommentaireService->getById($projet_id);
            var_dump($this->tasks);
        }
        else{
            header("location: http://localhost/");
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
            "comments"=>$this->tasks
        ]);



    }
}
<?php

class ProjetController extends AbstractController
{

    private DatabaseProjectService $Projet;
    private CommentaireService $CommentaireService;
    private int $id;

    public function __construct(AllService $Service, $projet_id) {
        parent::__construct(($Service));
        $this->CommentaireService = CommentaireService::getInstance();
        $this->Projet= DatabaseProjectService::getInstance();
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
            "projectModo" => $this->Projet->getModo($this->id),
            "comments"=>$this->CommentaireService->getById($this->id),



        ]);

    }







}
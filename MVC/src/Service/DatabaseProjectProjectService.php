<?php

class DatabaseProjectProjectService implements ProjectServiceInterface
{
    use SingletonTrait;

    /**
     * @var projet[]
     */
    private array $data;
    private Database $database;

    protected function __construct() {
        $this->database = Database::getInstance();
        $this->init();
    }

    /**
     * Generate sample projet
     *
     * @return void
     */
    private function init() : void {
        $sentence = $this->database->get()-> prepare("SELECT projet.id,projet.createdAt,projet.titre,projet.content,user.pseudo,projet.status,projet.difficulte,projet.coverURL,projet.isPremium,projet.URL_Image FROM projet JOIN user ON projet.author=user.id;");
        $sentence -> execute();
        $projects = $sentence->fetchAll();
        $this->data = [];
        foreach ($projects as $projet){

            //Configuration projet

        }
    }

    public function get(int $id): ?Projet
    {
        // TODO: Implement get() method.
        $s=new Projet();
        return $s ;

    }

    public function list(array $args = []): array
    {
        // TODO: Implement list() method.
        return $args;
    }

    public function create(Projet $project): Projet
    {
        // TODO: Implement create() method.
        $statementAddprojet=$this->database->get()-> prepare("INSERT into projet (createdAt,titre,content,author,status,coverUrl,isPremium ,URL_Image) VALUES (:date,:titre,:content,:author,:status,:coverUrl,:premium,:fichier)");
        $statementAddprojet->execute([

            'titre'=>$project->getTitre(),
            'content'=>$project->getContent(),
            'author'=>$project->getAuthor(),
            'status'=>'Published',
            'coverUrl'=>'',
            'premium'=>$project->isPremium(),
            'fichier'=>$project->getURLImage()


        ]);
        return $project;

    }

    public function update(Projet $project): Projet
    {
        // TODO: Implement update() method.
        return $project;
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
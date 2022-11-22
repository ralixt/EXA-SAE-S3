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
    }

    public function list(array $args = []): array
    {
        // TODO: Implement list() method.
    }

    public function create(Projet $project): Projet
    {
        // TODO: Implement create() method.
    }

    public function update(Projet $project): Projet
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
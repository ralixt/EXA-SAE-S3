<?php

class DatabaseProjectService implements AllService
{
    use SingletonTrait;

    /**
     * @var projet[]
     */
    private array $data;
    private PDO $database;

    protected function __construct() {
        $this->database = Database::get();
        $this->init();
    }

    /**
     * Generate sample projet
     *
     * @return void
     */
    private function init() : void {
        $sentence = $this->database-> prepare("SELECT projet.id,projet.createdAt,projet.titre,projet.content,user.pseudo,projet.status,projet.difficulte,projet.coverURL,projet.isPremium,projet.URL_Image FROM projet JOIN user ON projet.author=user.id;");
        $sentence -> execute();
        $projects = $sentence->fetchAll();
        $this->data = [];
        foreach ($projects as $p){
            $this->data[$p[0]] = (new Projet())
                ->setId($p[0])
                ->setCreatedAt($p[1])
                ->setTitre($p[2])
                ->setContent($p[3])
                ->setAuthor($p[4])
                ->setStatus($p[5])
                ->setDifficulte($p[6])
                ->setCoverURL($p[7])
                ->setPremium($p[8])
                ->setURLImage($p[9]);
        }
    }

    public function get($entity): ?Projet
    {
        return $this->data[$entity] ?? null;
    }

    public function getlist(array $args = []): array
    {
    }

    public function create($entity)
    {
        $sentence = $this->database->prepare("INSERT INTO projet (titre,content,author,)");
    }

    public function update($entity)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
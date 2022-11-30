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

    private function init() : void {
        $sentence = $this->database-> prepare("SELECT projet.id, projet.createdAt, titre, content, author, pseudo, status, difficulte, isPremium, URL_Image, COUNT(project) FROM projet JOIN user ON author = user.id LEFT JOIN likeproject ON projet.id = project GROUP BY projet.id");
        $sentence -> execute();
        $projects = $sentence->fetchAll();
        $sentence = $this->database->prepare("SELECT tag.id, projet_tag.id_projet, tag.title FROM tag JOIN projet_tag ON projet_tag.id_tag = tag.id ORDER BY projet_tag.id_projet");
        $sentence ->execute();
        $tags = $sentence->fetchAll();

        $Orderedtags = array();

        foreach ($tags as $tag){
            $Orderedtags[$tag[1]][]= (new Tag())
                ->setId($tag[0])
                ->setName($tag[2]);
        }

        $this->data = [];
        foreach ($projects as $p){
            $this->data[$p[0]] = (new Projet())
                ->setId($p[0])
                ->setCreatedAt($p[1])
                ->setTitre($p[2])
                ->setContent($p[3])
                ->setAuthorID($p[4])
                ->setAuthor($p[5])
                ->setStatus($p[6])
                ->setDifficulte($p[7])
                ->setPremium($p[8])
                ->setURLImage($p[9])
                ->setLikes($p[10])
                ->setTags($Orderedtags[$p[0]]);
        }
    }

    public function get($entity): ?Projet
    {
        return $this->data[$entity] ?? null;
    }

    public function getlist(array $args = []): array
    {
    }
    /** @var projet $entity */
    public function create($entity)
    {
        $sentence = $this->database->prepare("INSERT INTO projet(titre,content,author,status,difficulte,isPremium,URL_Image) VALUES(:titre, :content, :author, :status, :difficulte, :isPremium, :URL_Image)");
        $sentence->execute(["titre"=> $entity->getTitre(),
                            "content" => $entity->getContent(),
                            "author" => $entity -> getAuthorID(),
                            "status" => $entity -> getStatus() ,
                            "difficulte" => $entity->getDifficulte(),
                            "isPremium" => $entity->isPremium()? 1:0,
                            "URL_Image" => $entity->getURLImage()]);

    }

    /** @var projet $entity */
    public function update($entity)
    {
        $sentence = $this->database->prepare("UPDATE projet SET titre = :titre, content = :content, status = :status, difficulte = :difficulte, isPremium = :isPremium, URL_Image = :URL_Image WHERE id = :id");
        $sentence->execute(["titre"=> $entity->getTitre(),
                            "content" => $entity->getContent(),
                            "status" => $entity -> getStatus() ,
                            "difficulte" => $entity->getDifficulte(),
                            "isPremium" => $entity->isPremium()? 1:0,
                            "URL_Image" => $entity->getURLImage(),
                            "id" => $entity ->getId()]);
    }

    /** @var projet $entity */
    public function delete($entity): void
    {
        $sentence = $this->database->prepare("DELETE FROM projet WHERE id = :id ");
        $sentence -> execute(["id" => $entity->getId()]);
    }
}
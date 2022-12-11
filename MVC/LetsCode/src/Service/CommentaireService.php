<?php

class CommentaireService implements AllService
{
    use SingletonTrait;
    /**
     * @var Commentaire[]
     */
    private array $data;
    private PDO $database;

    protected function __construct() {
        $this->database = Database::get();
        $this->init();
    }
    private function init() : void {
        $sentence = $this->database-> prepare("SELECT comment.id,comment.createdAt,comment.content,comment.rating,comment.author,comment.projet,user.Pseudo FROM comment Join user on comment.author=user.id;");
        $sentence -> execute();
        $comments = $sentence->fetchAll();
        $this->data = [];
        foreach ($comments as $comment){
            $this->data[$comment[0]]= (new Commentaire())

                ->setId($comment[0])
                ->setCreatedAt($comment[1])
                ->setContent($comment[2])
                ->setRating($comment[3])
                ->setAuthor($comment[4])
                ->setProjet($comment[5])
                ->setPseudo($comment[6]);







        }
    }

    /***
     * @param $entity
     * @return Commentaire|null
     */

    public function get($entity): ?Commentaire
    {

        return $this->data[$entity] ?? null;
    }



    /**
     * @var Commentaire $entity

     */
    public function delete($entity)
    {
        // TODO: Implement delete() method.
        $commentDeleteProjet=$this->database->prepare('DELETE from comment where id:id');
        $commentDeleteProjet->execute([
            'id'=>$entity->getId()
        ]);
    }

    public function getlist(): ?array
    {
        // TODO: Implement getlist() method.

    }

    /**
     * @var Commentaire $entity

     */
    public function create($entity)
    {
        // TODO: Implement create() method.
        $commentAddprojet=$this->database->prepare('INSERT INTO comment (  content,rating , author ,projet) VALUES( :commentaire,:note,:user,:projet)');

        $commentAddprojet->execute([


            'commentaire'=> $entity->getContent() ,
            'note'=>$entity->getRating(),
            'user'=>$entity->getAuthor(),
            'projet'=>$entity->getProjet(),



        ]);
    }

    /***
     * @param Commentaire $entity

     */
    public function update($entity)
    {
        // TODO: Implement update() method.
        $sentence = $this->database->prepare("UPDATE comment SET content = :content, rating = :rating, author = :author, Pseudo = :Pseudo,projet=:project");
        $sentence->execute(["titre"=> $entity->getTitre(),
            "content" => $entity->getContent(),
            "rating" => $entity ->getRating() ,
            "author" => $entity->getAuthor(),
            "Pseudo" => $entity->getPseudo(),
            "project"=>$entity->getProjet()
        ]);
    }
}
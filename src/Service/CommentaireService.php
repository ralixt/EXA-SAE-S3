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
        $sentence = $this->database-> prepare("SELECT comment.id,comment.content,comment.rating,comment.author,comment.projet,user.Pseudo FROM comment Join user on comment.author=user.id;");
        $sentence -> execute();
        $comments = $sentence->fetchAll();
        $this->data = [];
        foreach ($comments as $comment){
            $this->data[$comment[0]]= (new Commentaire())
                ->setId($comment[0])
                ->setContent($comment[1])
                ->setRating($comment[2])
                ->setAuthor($comment[3])
                ->setProjet($comment[4])
                ->setPseudo($comment[5]);







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

    /***
     * @param $projet
     * @return array|null
     */
    public function getById($projet):?array
    {
        $sentence = $this->database->prepare("SELECT comment.id,comment.createdAt,comment.content,comment.rating,comment.author,comment.projet,user.Pseudo FROM comment Join user on comment.author=user.id WHERE comment.projet=:projet order by comment.createdAt desc;");

        $sentence->execute(["projet" => $projet]);
        $comments = $sentence->fetchAll();


        $c = [];
        foreach ($comments as $comment) {

            $c[] = (new Commentaire())
                ->setId($comment["id"])
                ->setCreatedAt($comment["createdAt"])
                ->setContent($comment["content"])
                ->setRating($comment["rating"])
                ->setAuthor($comment["author"])
                ->setProjet($comment["projet"])
                ->setPseudo($comment["Pseudo"]);


        }

            return $c;


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
    public function getCommentLike($comment,$user):bool
    {
        $affichagelike=$this->database->prepare('SELECT * from likecomment where id_user=:iduser and id_comment=:idcomment' );
        $affichagelike->execute([
            'iduser'=>$user,
            'idcomment'=>$comment,
        ]);
        if($affichagelike->rowCount()>0){
            return true;
        }else {

            return false;
        }
    }

    public function createCommentLike($comment,$user )
    {
        $likecomment=$this->database->prepare('INSERT INTO likecomment (id_comment,id_user) VALUES(:idcomment, :iduser)');
        $likecomment->execute([
            'idcomment'=>$comment,
            'iduser'=>$user,


        ]);


    }
    public function deleteCommentLike($comment,$user)
    {
        $suppressionlike=$this->database->prepare('Delete from likecomment where id_user=:iduser and id_comment=:idcomment');
        $suppressionlike->execute([
            'idcomment'=>$comment,
            'iduser'=>$user,
        ]);
    }

    public function getCommentLike2($comment,$user):int
    {
        $affichagelike=$this->database->prepare('SELECT * from likecomment where id_user=:iduser and id_comment=:idcomment' );
        $affichagelike->execute([
            'iduser'=>$user,
            'idcomment'=>$comment,
        ]);
       return $affichagelike->rowCount();
    }
    public function NbrLike($commentId): int
    {
        $likeStatement =$this->database->prepare('SELECT Count(id_comment) FROM likecomment where id_comment = :id');
        $likeStatement-> execute(['id'=>$commentId]);
        $like=$likeStatement->fetchAll();

        return $like[0][0];

    }

    public function getProjectLike($project,$user):bool
    {
        $affichagelike=$this->database->prepare('SELECT * from likeproject where user=:iduser and project=:idproject' );
        $affichagelike->execute([
            'iduser'=>$user,
            'idproject'=>$project,
        ]);
        if($affichagelike->rowCount()==1){
            return true;
        }else{

            return false;
        }
    }

    public function createProjectLike($project,$user )
    {
        $likecomment=$this->database->prepare('INSERT INTO likeproject (user,project) VALUES( :iduser,:idproject )');
        $likecomment->execute([

            'iduser'=>$user,
            'idproject'=>$project,


        ]);


    }
    public function deleteProjectLike($project,$user)
    {
        $suppressionlike=$this->database->prepare('Delete from likeproject where user=:iduser and project=:idproject');
        $suppressionlike->execute([
            'idproject'=>$project,
            'iduser'=>$user,
        ]);
    }

}
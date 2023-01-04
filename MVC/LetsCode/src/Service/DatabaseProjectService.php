<?php

require_once ("AllService.php");

class DatabaseProjectService implements AllService
{
    use SingletonTrait;

    /**
     * @var projet[]
     */
    private array $data;
    private PDO $database;
    private int $lastId;

    protected function __construct() {
        $this->database = Database::get();
        $this->init();
    }

    private function init() : void {
        $sentence = $this->database-> prepare("SELECT projet.id, projet.createdAt, titre, content, author, pseudo, status, difficulte, isPremium, COUNT(project), listeTag(projet.id), listeImage(projet.id), URL_Zip FROM projet JOIN user ON author = user.id LEFT JOIN likeproject ON projet.id = project GROUP BY projet.id;");
        $sentence -> execute();
        $projects = $sentence->fetchAll();

        $sentence = $this->database-> prepare("SELECT MAX(id) FROM projet");
        $sentence -> execute();
        $this ->lastId = $sentence->fetchAll()[0][0];
        $this->data = [];


        foreach ($projects as $p){
            $tags = explode(",", $p[10]);
            array_pop($tags);
            for($i = 0; $i<count($tags); $i++){
                $tags[$i] = explode(":", $tags[$i]);
                $tags[$i] = (new tag)
                    ->setId($tags[$i][0])
                    ->setName($tags[$i][1]);
            }
            $images = explode(" ", $p[11]);
            array_pop($images);
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
                ->setLikes($p[9])
                ->setTags($tags)
                ->setURLImage($images)
                ->setURLZIP($p[12]);
        }
    }

    public function get($entity): ?Projet
    {
        return $this->data[$entity] ?? null;
    }

    public function getlist(array $args = []): array
    {
        $query = "SELECT projet.id, projet.createdAt, projet.titre, projet.content, projet.author, user.Pseudo, projet.status, projet.difficulte, projet.isPremium, COUNT(likeproject.project), listeTag(projet.id), listeImage(projet.id) from projet INNER JOIN( SELECT COUNT(likeproject.project) nb_like, projet.id proID FROM projet LEFT JOIN likeproject ON projet.id = likeproject.project GROUP BY proID ) as likes on proID = projet.id left JOIN(
    SELECT
        COUNT(comment.id) nb_comment,
        projet.id proID
    FROM
        comment
    LEFT JOIN projet ON projet.id = comment.projet
    GROUP BY
        proID
    ) as comments on comments.proID = projet.id 
    JOIN user on projet.author = user.id
    LEFT JOIN likeproject ON projet.id = likeproject.project";
        if(count($args) <= 0){
            return $this->data;
        }

        if(isset($args["recherche"])){
            $query .= ' where (titre LIKE :recherche OR content LIKE :recherche) ';
            $recherche = $args["recherche"];
            if (isset($args["tag"])) {
                $query .= "AND projet.id IN (SELECT p.id FROM PROJET p JOIN projet_tag pt ON pt.id_projet = p.id JOIN tag t ON pt.id_tag = t.id WHERE t.id IN (SELECT id FROM tag WHERE title IN (:tags)) GROUP BY p.id HAVING count(distinct t.id) = :nbTags) ";//faire gaffe peut y a voir une erreur sur les guillemets
                $tags = "'" . implode("', '", $args["tag"]) . "'";//précision il est nécessaire de donner un tableau avec les apostrophes comme guillemet entourant les tags
                $nbTag = count($args["tag"]);
            }
            if(isset($args["orderBy"])){
                $query .= "ORDER BY titre ";
            }
            elseif ($args["orderBy"] == "likeController"){
                $query .= "Order BY nb_like DESC";
            }
            elseif ($args["orderBy"] == "commentaire") {
                $query .= "Order BY nb_comment DESC";
            }
        }
        else {
            if (isset($args["tag"])) {
                $query .= "where projet.id IN (SELECT p.id FROM PROJET p JOIN projet_tag pt ON pt.id_projet = p.id JOIN tag t ON pt.id_tag = t.id WHERE t.id IN (SELECT id FROM tag WHERE title IN (:tags)) GROUP BY p.id HAVING count(distinct t.id) = :nbTags) ";//faire gaffe peut y a voir une erreur sur les guillemets
                $tags = "'" . implode("', '", $args["tag"]) ."'";//précision il est nécessaire de donner un tableau avec les apostrophes comme guillemet entourant les tags
                $nbTag = count($args["tag"]);
                if(isset($args["orderBy"])){
                    //a finir
                    if($args["orderBy"] == "nom"){
                        $query .= "ORDER BY titre ";
                    }
                    elseif ($args["orderBy"] == "likeController"){
                        $query .= "Order BY nb_like DESC";
                    }
                    elseif ($args["orderBy"] == "commentaire") {
                        $query .= "Order BY nb_comment DESC";
                    }
                }
            }
        }
        $query .= "LIMIT 30;";
        $statementList = $this->database->prepare($query);
        if(isset($recherche) && isset($tags)) {
            $statementList->execute([
                "recherche"=>$recherche,
                "tags"=>$tags,
                "nbTags"=>$nbTag
            ]);
        }
        elseif (isset($recherche) && !isset($tags)){
            $recherche = "%".$recherche."%";
            $statementList->execute([
                "recherche"=>$recherche,
            ]);

        }
        elseif (!isset($recherche) && isset($tags)){
            $statementList->execute([
                "tags"=>$tags,
                "nbTags"=>$nbTag
            ]);
        }


        $response = $statementList->fetchAll();
        $this->data = [];
        foreach ($response as $p){
            $tags = explode(",", $p[10]);
            array_pop($tags);
            for($i = 0; $i<count($tags); $i++){
                $tags[$i] = explode(":", $tags[$i]);
                $tags[$i] = (new tag)
                    ->setId($tags[$i][0])
                    ->setName($tags[$i][1]);
            }
            $image = explode(" ", $p[11]);
            array_pop($image);
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
                ->setLikes(intval($p[9]))
                ->setTags($tags)
                ->setURLImage($image);
        }
        return $this->data;
    }
    /** @var projet $entity */
    public function create($entity)
    {
        $sentence = $this->database->prepare("INSERT INTO projet(titre,content,author,status,difficulte,isPremium, URL_Zip) VALUES(:titre, :content, :author, :status, :difficulte, :isPremium, :URL_Zip)");
        $sentence->execute(["titre"=> $entity->getTitre(),
                            "content" => $entity->getContent(),
                            "author" => $entity->getAuthorID(),
                            "status" => $entity -> getStatus() ,
                            "difficulte" => $entity->getDifficulte(),
                            "isPremium" => $entity->isPremium() ? 1:0,
                            "URL_Zip" => $entity->getURLZIP()]);

        $query = "INSERT INTO projet_tag(id_projet, id_tag) VALUES ";
        $tags = $entity->getTags();
        for($i=0; $i<count($tags); $i++){
            if($i+1< count($tags)){
                $query.= "('" . $entity->getId() . "','" . $tags[$i]->getId() . "'),";
            }
            else{
                $query.= "('" . $entity->getId() . "','" . $tags[$i]->getId() . "');";
            }

        }

        $sentence = $this->database->prepare($query);
        $sentence->execute();

        $query = "INSERT INTO url_images(projet_id, nameImage) VALUES ";
        $images = $entity->getURLImage();
        for($i=0; $i<count($images); $i++){
            if($i+1< count($images)){
                $query.= '("' . $entity->getId() . '","' . $images[$i] . '"),';
            }
            else{
                $query.= '("' . $entity->getId() . '","' . $images[$i] . '");';
            }

        }
        $sentence = $this->database->prepare($query);
        $sentence->execute();


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



    /**
     * @return int
     */
    public function getLastId(): int
    {
        return $this->lastId;
    }

}
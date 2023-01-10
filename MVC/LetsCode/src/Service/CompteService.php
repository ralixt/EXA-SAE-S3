<?php

class CompteService implements AllService
{


    use SingletonTrait;

    /**
     * @var User[]
     * @var Projet[]
     */
    private array $data;
    private PDO $database;

    protected function __construct()
    {
        $this->database = Database::get();
        $this->init();
    }

    private function init(): void
    {
        $sentence = $this->database->prepare("SELECT user.id,user.Pseudo,user.email,user.password,user.role,user.subscriptionId,user.hasActiveSubscription FROM user;");
        $sentence->execute();
        $users = $sentence->fetchAll();
        $this->data = [];
        foreach ($users as $user) {
            $this->data[$user[0]] = (new User())
                ->setId($user[0])
                ->setPseudo($user[1])
                ->setEmail($user[2])
                ->setPassword($user[3])
                ->setRole($user[4])
                ->setSubscription(2)
                ->setIsPremium($user[6]);
        }
    }
    /*
        protected function __construct()
        {
            $this->database = Database::get();
        }
    */
    /**
     * @param int $entity
     * @return User
     */
    public function get($entity): ?User
    {
        return $this->data[$entity] ?? null;
    }

    /**
     * @param int $entity
     */
    public function delete($entity)
    {
        $statementDeleteUser = $this->database->prepare("DELETE FROM user WHERE id=:id");
        $statementDeleteUser->execute(['id' => $entity]);
        //$ligne = $statementDeleteUser->fetchAll();
    }

    public function hashPassword( string $password ) : string {
       // var_dump('appelé');
        return hash('sha256', trim($password));
    }

    /**
     * @param User $user
     */
    public function create($user):bool
    {

        $statementCreateUser = $this->database->prepare("INSERT INTO user(Pseudo, email, password, role, subscriptionId, hasActiveSubscription) VALUES (:pseudo, :email, :mdp, :role, :subscriptionId, :isPremium)");
        $statementCreateUser->execute([
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'mdp' => $this->hashPassword($user->getPassword()),
            'role' => 'User',
            'subscriptionId' => 0,
            'isPremium' => 0

        ]);
        //var_dump($statementCreateUser->rowCount());
        if($statementCreateUser->rowCount()>0){
            return true;
        }else{
            return false;
        }


        // TODO: Implement create() method.

    }


    /**
     * @param User $user
     */
    public function update($user)
    {
        $hashed = $this->hashPassword($user->getPassword());
        $statementUpdateUser = $this->database->prepare("UPDATE user SET password = :mdp, Pseudo = :pseudo, email = :mail, role = :role, subscriptionId = :subId, hasActiveSubscription = :isPremium where id  = :id");
        $statementUpdateUser->execute([
            'pseudo' => $user->getPseudo(),
            'mail' => $user->getEmail(),
            'mdp' => $hashed,
            'role' => $user->getRole(),
            'subId' => $user->getSubscription(),
            'isPremium' => $user->getPremium(),
            'id' => $user->getId()
        ]);
        $this->data[$user->getId()] = $user;
    }


    /**
     * @return array|null
     */
    public function getlist(): ?array
    {
        $projetLikeStatement = $this->database->prepare('select projet.id, projet.titre, user.Pseudo, AVG(comment.rating), Count(comment.id), listeImage(projet.id), listeTag(projet.id), projet.status FROM projet LEFT JOIN comment on comment.projet = projet.id join user on user.id = projet.author where projet.author = :id group by projet.id;');
        $projetLikeStatement->execute(['id'=>$_SESSION['ids']]);
        $dataProjet = [];
        $result = $projetLikeStatement->fetchAll();
        foreach ($result as $p) {
            $tags = explode(",", $p[6]);
            array_shift($tags);
            for($i = 0; $i<count($tags); $i++){
                $tags[$i] = explode(":", $tags[$i]);
                $tags[$i] = (new tag)
                    ->setId((int)$tags[$i][0])
                    ->setName($tags[$i][1]);
            }
            $image = explode(" ", $p[5]);
            array_pop($image);
            $dataProjet[$p[0]] = (new Projet())
                ->setId($p[0])
                ->setTitre($p[1])
                ->setAuthor($p[2])
                ->setNbCom($p[4])
                ->setNote(is_null($p[3]) ? 0 : $p[3])
                ->setURLImage($image)
                ->setTags($tags)
                -> setStatus($p[7]);
        }
        return $dataProjet;
    }



    public function NbrUserProjet(): int
    {
        $projetUserStatement =$this->database->prepare('SELECT Count(id) FROM projet where author = :id');
        $projetUserStatement-> execute(['id'=>$_SESSION['ids']]);
        $projetPub=$projetUserStatement->fetchAll();
        return $projetPub[0][0];
    }

    /**
     * @param User $user
     * @return array
     */
    public function projectLike(User $user): array
    {
        $projetLikeStatement = $this->database->prepare('select projet.id, projet.titre, user.Pseudo, AVG(comment.rating), Count(comment.id), listeImage(projet.id), listeTag(projet.id) FROM projet LEFT JOIN comment on comment.projet = projet.id join likeproject on likeproject.project = projet.id join user on user.id = projet.author where likeproject.user = :id group by projet.id;');
        $projetLikeStatement->execute(['id'=>$user->getId()]);
        $dataProjet = [];
        $result = $projetLikeStatement->fetchAll();
        foreach ($result as $p) {
            $tags = explode(",", $p[6]);
            array_shift($tags);
            for($i = 0; $i<count($tags); $i++){
                $tags[$i] = explode(":", $tags[$i]);
                $tags[$i] = (new tag)
                    ->setId((int)$tags[$i][0])
                    ->setName($tags[$i][1]);
            }
            $image = explode(" ", $p[5]);
            array_pop($image);
            $dataProjet[$p[0]] = (new Projet())
                ->setId($p[0])
                ->setTitre($p[1])
                ->setAuthor($p[2])
                ->setNbCom($p[4])
                ->setNote(is_null($p[3]) ? 0 : $p[3])
                ->setURLImage($image)
                ->setTags($tags);
        }
        return $dataProjet;
    }

    public function connexion($idUser, $mdp):bool
    {
        $hashed = $this->hashPassword($mdp);

        $statementConnexionUser = $this->database->prepare("SELECT * FROM user WHERE email=:email  AND password=:mp");
        $statementConnexionUser->execute(['email' => $idUser, 'mp' => $hashed]);
        $result = $statementConnexionUser->fetchall();
        //var_dump($result);
        //var_dump($statementConnexionUser->rowCount());
       // return $result;


        if ($statementConnexionUser->rowCount() == 1) {

           $_SESSION["ids"] = strval($result[0][0]);
            $_SESSION["Pseudo"] = $result[0][1];
            $_SESSION["email"] = $result[0][2];
            $_SESSION["roles"] = strval($result[0][4]);

            return true;
        } else {
            return false;


        }
    }
    public function getEmailMp():array
    {
        $statementConnexionUser = $this->database->prepare("SELECT user.Pseudo,user.email  FROM user ");
        $statementConnexionUser->execute([]);
        $result = $statementConnexionUser->fetchall();
         return $result;
    }

}
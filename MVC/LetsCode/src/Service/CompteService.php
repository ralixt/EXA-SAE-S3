<?php
session_start();
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

    /**
     * @param User $user
     */
    public function create($user):bool
    {
        $statementCreateUser = $this->database->prepare("INSERT INTO user(Pseudo, email, password, role, subscriptionId, hasActiveSubscription) VALUES (:pseudo, :email, :mdp, :role, :subscriptionId, :isPremium)");
        $statementCreateUser->execute([
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'mdp' => hash('sha256', $user->getPassword()),
            'role' => 'User',
            'subscriptionId' => 0,
            'isPremium' => 0

        ]);
        var_dump($statementCreateUser->rowCount());
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
        if (hash('sha256', $user->getPassword()) == $this->user->getPassword()) {
            $statementUpdateUser = $this->database->prepare("UPDATE user SET password = :mdp, Pseudo = :pseudo, email = :mail, role = :role, subscriptionId = :subId, isPremium = :isPremium where id  = :id");
            $statementUpdateUser->execute([
                'pseudo' => $user->getPseudo(),
                'email' => $user->getEmail(),
                'password' => hash('sha256', $user->getPassword()),
                'role' => $user->getRole(),
                'subId' => $user->getSubscription(),
                'isPremium' => $user->getPremium()
            ]);
        }
        // TODO: Implement update() method.
    }


    public function getlist(): ?array
    {
        // TODO: Implement getlist() method.
        return null;
    }



    public function NbrUserProjet(){
        $projetUserStatement =$this->database->prepare('SELECT Count(*) FROM projet where author = :id');
        $projetUserStatement-> execute(['id'=>$_SESSION['ids']]);
        //$projetPub=$projetUserStatement->fetchAll();
    }

    public function connexion($idUser, $mdp)
    {
        $statementConnexionUser = $this->database->prepare("SELECT * FROM user WHERE (email=:email OR Pseudo = :pseudo) AND password=:mp");
        $statementConnexionUser->execute(['email' => $idUser, 'pseudo' => $idUser, 'mp' => hash('sha256',$mdp)]);
        $result = $statementConnexionUser->fetchall();


        if (count($result) > 0) {
            var_dump($result);
            $_SESSION["ids"] = strval($result[0][0]);
            $_SESSION["Pseudo"] = $result[0][1];
            $_SESSION["email"] = $result[0][2];
            $_SESSION["roles"] = strval($result[0][4]);



        }
    }

}
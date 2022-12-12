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

    protected function __construct() {
        $this->database = Database::getInstance();
        $this->init();
    }
    private function init() : void
    {
        $sentence = $this->database->get()->prepare("SELECT user.id,user.Pseudo,user.email,user.password,user.role,user.subscription,user.hasActiveSucription FROM user;");
        $sentence->execute();
        $users = $sentence->fetchAll();
        $this->data = [];
        foreach ($users as $user) {
            $this->data[$user[0]] = (new User())
                ->setPremium($user[6])
                ->setSubscription($user[5])

                ->setRole($user[4])
                ->setPassword($user[3])
                ->setEmail($user[2])
                ->setPseudo($user[1])
                ->setId($user[0]);


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
        $statementDeleteUser = $this->database->get()->prepare("DELETE FROM user WHERE id=:id");
        $statementDeleteUser->execute(['id' => $entity]);
        //$ligne = $statementDeleteUser->fetchAll();
    }

    /**
     * @param User $user
     */
    public function create($user)
    {
        $statementCreateUser = $this->database->get()->prepare("INSERT INTO user(Pseudo, email, password, role, subscriptionId, hasActiveSubscription) VALUES (:pseudo, :email, :mdp, :role, :subscriptionId, :isPremium)");
        $statementCreateUser->execute([
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'password' => hash('sha256', $user->getPassword()),
            'role' => 'User',
            'subscriptionId' => null,
            'isPremium' => 0
        ]);
        // TODO: Implement create() method.

    }

    /**
     * @param User $user
     */
    public function update($user)
    {
        if (hash('sha256', $user->getPassword()) == $this->user->getPassword()) {
            $statementUpdateUser = $this->database->get()->prepare("UPDATE user SET password = :mdp, Pseudo = :pseudo, email = :mail, role = :role, subscriptionId = :subId, isPremium = :isPremium where id  = :id");
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
        $projetUserStatement =$this->database->get()->prepare('SELECT Count(*) FROM projet where author = :id');
        $projetUserStatement-> execute(['id'=>$_SESSION['ids']]);
        //$projetPub=$projetUserStatement->fetchAll();
    }
}
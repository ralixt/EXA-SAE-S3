<?php

class CompteService implements AllService
{
    private PDO $database;
    private User $user;

    protected function __construct()
    {
        $this->database = Database::get();
    }

    /**
     * @param int $entity
     */
    public function get($entity): ?User
    {
        $statementGetUser = $this->database->get()->prepare("SELECT  id, Pseudo, email, password, role, subscription FROM user WHERE id=:id");
        $statementGetUser->execute(['id' => $entity]);
        $ligne = $statementGetUser->fetchAll();
        $this->user = new User($ligne[0][0], $ligne[0][1], $ligne[0][2], $ligne[0][3], $ligne[0][4], $ligne[0][5]);

        return $this->user;
    }

    /**
     * @param int $entity
     */
    public function delete($entity)
    {
        $statementDeleteUser = $this->database->get()->prepare("DELETE FROM user WHERE id=:id");
        $statementDeleteUser->execute(['id' => $entity]);
        $ligne = $statementDeleteUser->fetchAll();
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

    public function connexion($email, $mdp)
    {
        $statementConnexionUser = $this->database->get()->prepare("SELECT * FROM user WHERE email=:email AND password=:mp");
        $statementConnexionUser->execute(['email' => $email, 'mp' => $mdp]);

        if ($statementConnexionUser->rowCount() > 0) {
            $result = $statementConnexionUser->fetchall();
            $_SESSION["ids"] = strval($result[0][0]);
            $_SESSION["Pseudo"] = $result[0][1];
            $_SESSION["email"] = $result[0][2];
            $_SESSION["roles"] = strval($result[0][4]);
        }
    }
}
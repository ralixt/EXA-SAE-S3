<?php

class LoginService
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
            header('location:accueil.php');


        }
        else{
            header('location:login.php');
        }
    }

    public function inscription(){

        $pseudo = $_POST["Pseudo"];
        $email = $_POST["adr_email"];
        $mdp = hash('sha256', $_POST["creation_mp"]);
        $mdpVerification = hash('sha256', $_POST["confirmation_mp"]);

        echo($pseudo);
        echo($email);
        echo($mdp);
        echo($mdpVerification);


        $statementInscriptionUser = $this->database->get()->prepare('INSERT INTO user (Pseudo,email,password,role,subscriptionId,hasActiveSubscription) VALUES( :pseudo,:email ,:mp,:role,:subid,:active)');

        $statementInscriptionUser->execute(['pseudo'=> $pseudo, 'email'=> $email, 'mp'=>$mdpVerification, 'role'=>"User", 'subid'=>"null", 'active'=>0]);

        header('location:login.php');

    }



}
<?php

class CompteService implements AllService
{
    private PDO $database;

    protected function __construct() {
        $this->database = Database::get();
    }

    public function get($entity): ?User
    {
        $statementGetUser=$this->database->get()-> prepare("SELECT  id, Pseudo, email, password, role, subscription FROM user WHERE id=:id");
        $statementGetUser->execute(['id'=>$entity]);
        $ligne=$statementGetUser->fetchAll();
        $user = new User($ligne[0][0], $ligne[0][1], $ligne[0][2], $ligne[0][3],$ligne[0][4], $ligne[0][5]);

        return $user;
    }

    public function delete($entity)
    {
        $statementDeleteUser=$this->database->get()-> prepare("DELETE FROM user WHERE id=:id");
        $statementDeleteUser->execute(['id'=>$entity]);
        $ligne=$statementDeleteUser->fetchAll();
    }

    public function create($user)
    {
        $statementCreateUser=$this->database->get()-> prepare("INSERT INTO user(Pseudo, email, password) VALUES (:pseudo, :email, :mdp)");
        $statementCreateUser->execute([
            'pseudo'=>$user[1],
            'email'=>$user[2],
            'password'=>$user[3]
            ]);
        // TODO: Implement create() method.

    }

    public function update()
    {
        // TODO: Implement update() method.
    }


    public function getlist(): ?array
    {
        // TODO: Implement getlist() method.
        return null;
    }



    public function connexion(){

        $email=$_POST["adr_email"];
        $createmdp=hash('sha256', $_POST["mp"]);


        $statementConnexionUser=$this->database->get()-> prepare("SELECT * FROM user WHERE email=:email AND password=:mp");
        $statementConnexionUser->execute([ 'email'=>$email, 'mp'=>$createmdp]);

        if($statementConnexionUser->rowCount() > 0){
            $result=$statementConnexionUser->fetchall();
            $_SESSION["ids"]=strval($result[0][0]);
            $_SESSION["Pseudo"]=$result[0][1];
            $_SESSION["email"]=$result[0][2];
            $_SESSION["roles"]=strval($result[0][4]);
        }
    }

}
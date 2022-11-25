<?php

class CompteService implements AllService
{
    private PDO $database;

    protected function __construct() {
        $this->database = Database::get();
    }

    public function get($entity): ?User
    {
        $statementGetUser=$this->database->get()-> prepare("SELECT  id, Pseudo, email, password, role, subscription From user where id=:id");
        $statementGetUser->execute(['id'=>$entity]);
        $ligne=$statementGetUser->fetchAll();
        $user = new User($ligne[0][0], $ligne[0][1], $ligne[0][2], $ligne[0][3],$ligne[0][4], $ligne[0][5]);

        return $user;
    }

    public function delete($entity)
    {
        $statementDeleteUser=$this->database->get()-> prepare("DELETE From user where id=:id");
        $statementDeleteUser->execute(['id'=>$entity]);
        $ligne=$statementDeleteUser->fetchAll();
    }

    public function getlist() : ?array
    {
        // TODO: Implement getlist() method.
        $statementGetUser=$this->database->get()-> prepare("SELECT  id, Pseudo, email, password, role, subscription From user");
        $statementGetUser->execute(['id'=>$entity]);
        $ligne=$statementGetUser->fetchAll();
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}
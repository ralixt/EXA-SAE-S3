<?php

class DatabaseContactService implements AllService
{
    use SingletonTrait;

    /**
     * @var contact[]
     */
    private array $data;
    private PDO $database;

    protected function __construct() {
        $this->database = Database::getInstance();
        $this->init();
    }



    /**
     * Generate sample projet
     *
     * @return void
     */
    private function init() : void {
        $sentenceContact = $this->database->get()-> prepare("SELECT contact.id,contact.nom,contact.mail,contact.prenom,contact.message FROM contact ;");
        $sentenceContact -> execute();
        $contacts = $sentenceContact->fetchAll();
        $this->data = [];
        foreach ($contacts as $contact){
            $this->data[count($contacts)]=(new contact())
                ->setNom($contact["nom"])
                ->setMail($contact["mail"])
                ->setMessage($contact["message"])
                ->setPrenom($contact["prenom"])
                ->setIdentifiant($contact["id"]);


        }
    }



    public function get($entity): ?contact
    {
        // TODO: Implement get() method.
        return $this->data[$entity] ?? null;
    }


    public function delete($entity)
    {
        // TODO: Implement delete() method.
        $statementDeletecontact=$this->database->get()-> prepare(
            "Delete From contact where id=:id;"

        );
        $statementDeletecontact->execute([
           'id'=>$entity
        ]);

    }

    public function getlist(): ?array
    {
        // TODO: Implement getlist() method.
    }

    /***
     * @var contact $entity
     * @return void
     */
    public function create($entity)
    {
        // TODO: Implement create() method.
        $statementAddcontact=$this->database->get()-> prepare(
            "INSERT INTO contact (nom, prenom, mail, message) VALUES (:nom, :prenom, :mail, :message);"

        );
        $statementAddcontact->execute([
            'nom' => $entity->getNom(), 'prenom' => $entity->getPrenom(), 'mail' => $entity->getMail(), 'message' => $entity->getMessage()
        ]);
    }

    /***
     * @param contact $entity

     */
    public function update($entity)
    {
        // TODO: Implement update() method.
        $sentence = $this->database->prepare("UPDATE contact SET nom = :nom, prenom = :prenom, mail = :mail, message = :message");
        $sentence->execute(["titre"=> $entity->getTitre(),
            "nom" => $entity->getNom(),
            "prenom" => $entity ->getPrenom() ,
            "mail" => $entity->getMail(),
            "message" => $entity->getMessage()
            ]);



    }
}
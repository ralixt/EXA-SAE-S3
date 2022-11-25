<?php

class DatabaseContactService implements ContactServiceInterface
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










            //Configuration projet

        }
    }

    public function get(int $id): ?contact
    {
        $statementGetContact=$this->database->get()-> prepare(
            "SELECT  contact.id,contact.nom,contact.mail,contact.prenom,contact.message From contact where id=:id"

        );
        $statementGetContact->execute([
            'id'=>$id
        ]);
        $ligne=$statementGetContact->fetchAll();

        $contact=new contacts();
        $contact->setIdentifiant($ligne[0][0]);
        $contact->setMail($ligne[0][2]);
        $contact->setMessage($ligne[0][4]);
        $contact->setPrenom($ligne[0][3]);
        $contact->setNom($ligne[0][1]);

        return $contact;
    }

    public function create(contact $Contact): contact
    {
        // TODO: Implement create() method.
        $statementAddcontact=$this->database->get()-> prepare(
            "INSERT INTO contact (nom, prenom, mail, message) VALUES (:nom, :prenom, :mail, :message);"

        );
        $statementAddcontact->execute([
            'nom' => $Contact->getNom(), 'prenom' => $Contact->getPrenom(), 'mail' => $Contact->getMail(), 'message' => $Contact->getMessage()
        ]);
        return $Contact;
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }

    public function list(array $Contacts): array
    {
        // TODO: Implement list() method.
    }
}
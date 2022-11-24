<?php

require_once('EXA-SAE-S3/Mohamed/lib/config.php');
use Application\lib\config\config;

class contacts
{
    public string $nom;
    public string $mail;
    public string $prenom;
    public string $message;
    public int $identifiant;

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getIdentifiant(): int
    {
        return $this->identifiant;
    }

    /**
     * @param int $identifiant
     */
    public function setIdentifiant(int $identifiant): void
    {
        $this->identifiant = $identifiant;
    }


}


/*
class contactsrepository
{
    public config $connexion;

    public function addcontacts($nom,$prenom,$mail,$message):bool{
        $statementAddcontact=$this->connexion->getDatabase()->prepare(
            "INSERT INTO contact (nom, prenom, mail, message) VALUES (:nom, :prenom, :mail, :message);"

        );
        $lines=$statementAddcontact->execute([
            'nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'message' => $message
        ]);
        return ($lines>0);
    }


    public function getcontact($identifiant){
        $statementGetContact=$this->connexion->getDatabase()->prepare(
            "SELECT * From contact where id_Contact=:id"

        );
        $statementGetContact->execute([
           'id'=>$identifiant
        ]);
        $ligne=$statementGetContact->fetchAll();

        $contact=new contacts();
        $contact->identifiant=$ligne["id"];
        $contact->mail=$ligne["nom"];
        $contact->message=$ligne["message"];
        $contact->prenom=$ligne["mail"];
        $contact->nom=$ligne["nom"];

        return $contact;
    }



    public  function getcontacts($identifiant){
        $statementGetContacts=$this->connexion->getDatabase()->prepare(
            "SELECT * From contact"

        );
        $statementGetContacts->execute([
            'id'=>$identifiant
        ]);
        $ligne=$statementGetContacts->fetchAll();

        $contact=new contacts();
        $contact->identifiant=$ligne["id"];
        $contact->mail=$ligne["nom"];
        $contact->message=$ligne["message"];
        $contact->prenom=$ligne["mail"];
        $contact->nom=$ligne["nom"];

        return $contact;
    }

}
*/
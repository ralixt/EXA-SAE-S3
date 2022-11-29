<?php

class ContactController extends AbstractController
{
    //DatabaseContactService $c;
    public function render(): void
    {
      $serviceContact= DatabaseContactService::getInstance() ;
      $contact=new contact();
        // TODO: Implement render() method.
        $nom=null;
        $prenom=null;
        $message=null;
        $mail=null;

        if(isset($_POST["nom"])){
            $nom=$_POST["nom"];
        }
        if(isset($_POST["prenom"])){
            $prenom=$_POST["prenom"];
        }
        if(isset($_POST["message"])){
            $message=$_POST["message"];
        }
        if(isset($_POST["mail"])){
            $mail=$_POST["mail"];
        }
        $contact->setMail($mail);
        $contact->setMessage($message);
        $contact->setNom($nom);
        $contact->setPrenom($prenom);

        $serviceContact->create($contact);



    }
}
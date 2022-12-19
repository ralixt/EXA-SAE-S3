<?php

class ContactController extends AbstractController
{
    //DatabaseContactService $c;
    public function render(): void
    {
        if(isset($_POST["nom"])){
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

            $this->Service->create($contact);
            header("location: http://localhost/");
        }
        else{
            echo get_template(__PROJECT_ROOT__ . "/View/contact.php", []);
        }





    }
}
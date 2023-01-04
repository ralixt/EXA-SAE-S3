<?php

class CompteModifController extends AbstractController
{

    public function render(): void
    {
        $serviceCompte = CompteService::getInstance();
        $userActuel = $serviceCompte->get($_SESSION['ids']);

        if(isset($_POST["adr_email"]) && isset($_POST["mdp"]) && $serviceCompte->hashPassword($_POST['mdp']) == $userActuel->getPassword()) {
            $user = new User();
            $user->setId($userActuel->getId())
                ->setPassword($_POST["mdp"])
                ->setEmail($_POST["adr_email"])
                ->setPseudo($userActuel->getPseudo())
                ->setIsPremium(0)
                ->setSubscription(0)
                ->setRole("User");
            $serviceCompte->update($user);
            header('location:  http://localhost/compte');
        }
        elseif (isset($_POST["Pseudo"]) && isset($_POST["mdp"])  && $serviceCompte->hashPassword($_POST['mdp']) == $userActuel->getPassword()){
            $user = new User();
            $user->setId($userActuel->getId())
                ->setPassword($_POST["mdp"])
                ->setEmail($userActuel->getEmail())
                ->setPseudo($_POST['Pseudo'])
                ->setIsPremium(0)
                ->setSubscription(0)
                ->setRole("User");
            $serviceCompte->update($user);
            header('location:  http://localhost/compte');
        }
        elseif (isset($_POST["nouveau_mdp"]) && isset($_POST["confirmation_mdp"]) && isset($_POST["ancien_mdp"]) && $_POST['nouveau_mdp'] === $_POST['confirmation_mdp']  && $serviceCompte->hashPassword($_POST['ancien_mdp']) == $userActuel->getPassword()){
            $user = new User();
            $user->setId($userActuel->getId())
                ->setPassword($_POST["nouveau_mdp"])
                ->setEmail($userActuel->getEmail())
                ->setPseudo($userActuel->getPseudo())
                ->setIsPremium(0)
                ->setSubscription(0)
                ->setRole("User");
            $serviceCompte->update($user);
            header('location:  http://localhost/compte');
        }
        elseif (isset($_POST["mdp"]) && $serviceCompte->hashPassword($_POST['mdp']) == $userActuel->getPassword()){
            $serviceCompte->delete($userActuel->getId());
            session_destroy();
            header('Location: /');
        }


        $raison = $_GET["raison"] ?? "Pseudo";
        switch($raison) :
            case "pseudo" :
                echo get_template(
                    __PROJECT_ROOT__ . "/View/compteModif.php", [
                        "titre" => "Changer de Pseudo",
                        "form" => 0
                ]
                );
                break;
            case "mail" :
                echo get_template(
                    __PROJECT_ROOT__ . "/View/compteModif.php", [
                        "titre" => "Changer d'email",
                        "form" => 1
                ]
                );
                break;
            case "mdp" :
                echo get_template(
                    __PROJECT_ROOT__ . "/View/compteModif.php", [
                        "titre" => "Changer de mot de passe",
                        "form" => 2
                ]
                );
                break;
            case "delete" :
                echo get_template(
                    __PROJECT_ROOT__ . "/View/compteModif.php", [
                        "titre" => "Suppression de votre compte!!",
                        "form" => 3
                    ]
                );
                break;


        endswitch;

    }
}
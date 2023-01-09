<?php

class CompteModifController extends AbstractController
{

    public function render(): void
    {

        $serviceCompte = CompteService::getInstance();
        $userActuel = $serviceCompte->get($_SESSION['ids']);
        $erreurModif = "";
        $tabMPPseudo = $serviceCompte->getEmailMp();
        $email = false;
        $pseudo = false;
        if(isset($_POST["adr_email"])) {
            for ($i = 0; $i < count($tabMPPseudo); $i++) {
                if ($tabMPPseudo[$i]["email"] == $_POST["adr_email"]) {
                    $email = false;
                    break;
                } elseif ($tabMPPseudo[$i]["email"] != $_POST["adr_email"]) {
                    $email = true;
                }
            }
        }
        if(isset($_POST["Pseudo"])){
            for ($i = 0; $i < count($tabMPPseudo); $i++) {
                if ($tabMPPseudo[$i]["Pseudo"] == $_POST["Pseudo"]) {
                    $pseudo = false;
                    break;
                } elseif ($tabMPPseudo[$i]["Pseudo"] != $_POST["Pseudo"]) {
                    $pseudo = true;
                }
            }
        }

        if(isset($_POST["adr_email"]) && isset($_POST["mdp"])) {
            if($serviceCompte->hashPassword($_POST['mdp']) == $userActuel->getPassword() && $email) {
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
            elseif(!$email){
                $erreurModif = "le mail est déjà utilisé";
            }
            elseif ($serviceCompte->hashPassword($_POST['mdp']) != $userActuel->getPassword()){
                $erreurModif = "votre mot de passe n'est pas correct";
            }
        }
        elseif (isset($_POST["Pseudo"]) && isset($_POST["mdp"])){
            if($serviceCompte->hashPassword($_POST['mdp']) == $userActuel->getPassword() && $pseudo) {
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
            elseif(!$pseudo){
                $erreurModif = "le pseudo est déjà utilisé";
            }
            elseif ($serviceCompte->hashPassword($_POST['mdp']) != $userActuel->getPassword()){
                $erreurModif = "votre mot de passe n'est pas correct";
            }
        }
        elseif (isset($_POST["nouveau_mdp"]) && isset($_POST["confirmation_mdp"]) && isset($_POST["ancien_mdp"])){
            if($_POST['nouveau_mdp'] === $_POST['confirmation_mdp']  && $serviceCompte->hashPassword($_POST['ancien_mdp']) == $userActuel->getPassword()) {
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
            elseif($_POST['nouveau_mdp'] != $_POST['confirmation_mdp']){
                $erreurModif = "vous n'avez pas mis les deux mêmes mots de passes";
            }
            elseif ($serviceCompte->hashPassword($_POST['ancien_mdp']) != $userActuel->getPassword()){
                $erreurModif = "votre ancien mot de passe n'est pas correct";
            }
        }
        elseif (isset($_POST["mdp"])){
            if($serviceCompte->hashPassword($_POST['mdp']) == $userActuel->getPassword()) {
                $serviceCompte->delete($userActuel->getId());
                session_destroy();
                header('Location: /');
            }
            else{
                $erreurModif = "votre mot de passe est incorrect";
            }
        }


        $raison = $_GET["raison"] ?? "pseudo";
        switch($raison) :
            case "pseudo" :
                echo get_template(
                    __PROJECT_ROOT__ . "/View/compteModif.php", [
                        "titre" => "Changer de Pseudo",
                        "form" => 0,
                        "erreur" => $erreurModif
                ]
                );
                break;
            case "mail" :
                echo get_template(
                    __PROJECT_ROOT__ . "/View/compteModif.php", [
                        "titre" => "Changer d'email",
                        "form" => 1,
                        "erreur" => $erreurModif
                ]
                );
                break;
            case "mdp" :
                echo get_template(
                    __PROJECT_ROOT__ . "/View/compteModif.php", [
                        "titre" => "Changer de mot de passe",
                        "form" => 2,
                        "erreur" => $erreurModif
                ]
                );
                break;
            case "delete" :
                echo get_template(
                    __PROJECT_ROOT__ . "/View/compteModif.php", [
                        "titre" => "Suppression de votre compte!!",
                        "form" => 3,
                        "erreur" => $erreurModif
                    ]
                );
                break;


        endswitch;

    }
}
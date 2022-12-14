<?php

class CompteController extends AbstractController
{

    public function render(): void
    {
        $userActuel = $this->Service->get($_SESSION['ids']);
        $serviceCompte = CompteService::getInstance();

        var_dump($_POST);

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
        }
        elseif (isset($_POST["nouveau_mdp"]) && isset($_POST["confirmation_mdp"]) && isset($_POST["ancien_mdp"]) && $_POST['nouveau_mdp'] === $_POST['confirmation_mdp']  && $serviceCompte->hashPassword($_POST['ancien_mdp']) == $userActuel->getPassword()){
            $user = new User();
            $user->setId($userActuel->getId())
                ->setPassword($_POST["nouvau_mdp"])
                ->setEmail($userActuel->getEmail())
                ->setPseudo($_POST['Pseudo'])
                ->setIsPremium(0)
                ->setSubscription(0)
                ->setRole("User");
            $serviceCompte->update($user);
        }

        echo get_template(
            __PROJECT_ROOT__."/View/compte.php", [
                "user" => $this->Service->get($userActuel->getId()),
                "nbProjet" => $this->Service->NbrUserProjet()
            ]
        );
    }
}

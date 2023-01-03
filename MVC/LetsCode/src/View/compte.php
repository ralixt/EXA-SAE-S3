<?php
/**
 * @var User $user
 * @var int $nbProjet
 * @var array $like
 * @var array $vosProjets
 */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel='stylesheet' href='../Ressource/css/compte.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/styles.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/header.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/footer.css'  type='text/css' media='screen'>
    <title>Mon Compte</title>

</head>

<body>
<header>
    <nav id="navbar">
        <a href="http://localhost" ><img class="logoLetsCode" src="../Ressource/images/logoLetsCode.png" alt="Logo Let's Code"></a>

        <div id="nav-links">
            <ul style="list-style-type:none">
                <li><a href="http://localhost">Accueil</a></li>
                <!--pour les user connecté-->

                <?php if(isset($_SESSION["Pseudo"])) : ?>
                    <li><a href="/create">Nouveau Projet</a></li>
                    <div class="buttonLog">
                        <li><a href="/compte" class="loginButton">Mon compte</a></li>
                    </div>

                <?php else : ?>
                    <!--pour les user non connecté-->
                    <div class="buttonLog">
                        <li><a href="/login" class="loginButton">Connexion/Inscription</a></li>

                    </div>

                <?php endif; ?>

            </ul>
        </div>

    </nav>
</header>
<main>
    <?php
    if(isset($_SESSION['ids']) && $_SESSION['ids']!=null){
        echo('<a href="http://localhost/login">Changer de compte</a>');
    }
    else{
        header('location : /');
    }
    ?>
    <div class="papaEnTete">
        <h1 class="flou enTete">Mon Compte</h1>
        <div class="flou enTete">
            <div>
                <h1 id="pseudoname">Bienvenue <?php echo $user->getPseudo() ?></h1>
            </div>
            <div>
                <p id="AdresseMail"><?php echo $user->getEmail() ?></p>
            </div>
            <div>
                <p id="ProjetPub"><?php echo $nbProjet ?> projets publiés</p>
            </div>
        </div>
    </div>
    <div class="rectangle flexColumn">
        <h3>Projets Favoris</h3>
        <div class="flexRow">
            <?php
            foreach ($like as $projet)
                echo get_template(__PROJECT_ROOT__."/View/Fragments/project-card.php", [
                    "projet" => $projet
                ])
            ?>
        </div>
    </div>
    <div class="rectangle flexColumn">
        <h3>Vos Projets</h3>
        <div class="flexRow">
            <?php
            foreach ($vosProjets as $projet)
                echo get_template(__PROJECT_ROOT__."/View/Fragments/project-card.php", [ //le template est à modifier car ce n'est pas le même que celui au-dessus
                    "projet" => $projet
                ])
            ?>
        </div>
    </div>
    <div id="basdepage" class="flexRow">
        <div class="rectangle flexColumn">
            <h2>Vos informations personnelles</h2>
            <form class="ModifierSesInfos" method="post">
                <div>
                    <p>Pseudo :</p>
                    <input type="text" id="prenom" name="Pseudo" placeholder=<?php echo $user->getPseudo() ?> maxlength="16" minlength="6" required>
                    <p>Mot de passe :</p>
                    <input id="mdp" name="mdp" type="password" placeholder="Rentrer votre mot de passe" minlength="8" required>
                    <button id="valider" type="submit" class="button">Modifier son pseudo</button>
                </div>
            </form>
            <form class="ModifierSesInfos" method="post">
                <div>
                    <p>Adresse e-mail :</p>
                    <input name="adr_email" type="email" placeholder=<?php echo $user->getEmail() ?> required>
                    <p>Mot de passe :</p>
                    <input name="mdp" type="password" placeholder="Rentrer votre mot de passe" minlength="8" required>
                    <button id="valider" type="submit" class="button">Modifier son mail</button>
                </div>
            </form>
            <form class="ModifierSesInfos" method="post">
                <div>
                    <p>Nouveau mot de passe :</p>
                    <input name="nouveau_mdp" type="password" placeholder="Rentrer un nouveau mot de passe" minlength="8" required>
                    <p>Confirmation du mot de passe :</p>
                    <input name="confirmation_mdp" type="password" placeholder="Confirmer le mot de passe" required>
                    <p>Ancien mot de passe :</p>
                    <input name="ancien_mdp" type="password" placeholder="Rentrer votre ancien mot de passe" minlength="8" required>
                    <button id="valider" type="submit" class="button">Modifier son mot de passe</button>
                </div><br>
            </form>
            <a class="button red" href="http://localhost/logout.php" >Deconnexion</a><br>
            <button class="button red">Supprimer le compte</button><br>
        </div>
            <div class="rectangle flexColumn">
                <h2>Abonnement Premium</h2>
                <div class="rectangle blanc">
                    <h2>Gratuit</h2>
                    <ul>
                        <li>Accès à des millions de projets</li>
                        <li>Publication de projets</li>
                        <li>Accès aux ressources de projets</li>
                    </ul>
                    <Button class="buttonSelectedProject">Selectionné</Button>
                </div>
                <div class="rectangle blanc">
                    <h2>Premium</h2>
                    <ul>
                        <li>Accès à des millions de projets</li>
                        <li>Publication de projets</li>
                        <li>Accès aux ressources de projets</li>
                        <li>Accès à des projets premium</li>
                    </ul>
                    <Button id="premium" class="buttonSelectedProject">Selectionner</Button>
                </div>
            </div>
        </div>
    </main>

</body>
<?php include 'footer.php'?>
</html>
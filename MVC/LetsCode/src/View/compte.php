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
<?php include 'header.php'?>
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
                <h1>Bienvenue <?php echo $user->getPseudo() ?></h1>
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
            <div><br>
                 <p>Pseudo :</p>
                 <p> <?php echo $user->getPseudo() ?> </p>
                 <a href="http://localhost/compteModif?raison=pseudo" class="button">changer de pseudo</a>
            </div>
            <br>
            <br>
            <br>
            <div>
                <p>Adresse e-mail :</p>
                <p><?php echo $user->getEmail() ?> </p>
                <a href="http://localhost/compteModif?raison=mail" class="button">changer d'email</a>
            </div>
            <br>
            <br>
            <br>
            <div>
                <p>mot de passe :</p>
                <p>********</p>
                <a href="http://localhost/compteModif?raison=mdp" class="button">changer de mot de passe</a>
            </div><br><br>
            <br>
            <a class="button red centre" href="http://localhost/logout.php" >Deconnexion</a><br>
            <br><br>
            <button class="button red centre">Supprimer le compte</button><br>
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
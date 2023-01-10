<?php
/**
 * @var string $erreur
 */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel='stylesheet' href='../Ressource/css/login.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/header.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/footer.css'  type='text/css' media='screen'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Document</title>
</head>
<body>

    <?php include 'header.php'?>

<main>
    <div class="login">
        <div class="imageconnexion">
            <div class="connexion">
                <p id="titreConnexion"> Connexion</p>
            </div>
        </div>
        <div class="firebase" id="firebase">
        <div class="google marginer">
            <button>
                <span>Continuer avec google</span>
                <img class="image" src="../Ressource/images/google.png" alt="connexion avec google">
            </button>
        </div>
        <div class="facebook marginer">
            <button>
                <span>Continuer avec facebook </span>
                <img class="image" src="../Ressource/images/facebook.png" alt="connexion avec facebook">
            </button>
        </div>
        <div class="github marginer">
            <button>
                <span>Continuer avec github</span>
                <img class="image" src="../Ressource/images/github.png" alt="connexion avec github">
            </button>
        </div>
    </div>
        <br>
        <br>
        <?php
        if(isset($_POST["connexionButton"])):?>
            <div class="ErrorInscription">
                <span><?= $erreur ?></span>
            </div><br>
        <?php endif;?>
        <form action="http://localhost/login" method="post">
            <div class="mail">
                <span class="material-symbols-outlined">alternate_email</span>
                <input class="input" name="adr_email" type="email" placeholder=" Email" required>
            </div><br>
            <div class="mp">
                <span class="material-symbols-outlined">password</span>
                <input  class="input" name="mp" type="password" placeholder=" Mot de Passe" minlength="8" required>
            </div><br>
            <br>
            <div class='firebase'>
                <div class="connecter">
                    <button type="submit" name="connexionButton" >Connexion</button>
                </div>
            </div>
        </form>
        <br>

        <p class="phraseAvantInscription">
            <span>Vous n’avez pas de compte inscrivez-vous :</span>
        </p>
        <p class="lienInscription">
            <a href="http://localhost/inscription">Inscription</a>
        </p>
    </div>
    <?php include 'footer.php'?>
</main>
</body>


</html>
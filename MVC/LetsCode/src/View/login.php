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
    <link rel='stylesheet' href='../Ressource/css/login.css'  type='text/css' media='screen'>


    <title>Document</title>
</head>
<header>
    <div class= menu_header>
        <a href="http://localhost">Accueil</a>
    </div>

</header>
<br>
<body>
<div class="login">
    <div class="imageconnexion">
        <img class="imagess" src="../Ressource/images/login.png" alt="">
        <div class="test">
            <div class="connexion">

                <button>   Connexion</button>
            </div>
        </div>

    </div>
    <div class="firebase">
        <div class="google">
            <button>
                <span>Continuer avec google</span>
                <img class="image" src="../Ressource/images/google.png" alt="connexion avec google">
            </button>
        </div>
        <div class="facebook">
            <button>


                <span>Continuer avec facebook </span>
                <img class="image" src="../Ressource/images/facebook.png" alt="connexion avec facebook">


            </button>

        </div>
        <div class="github">
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

        <div>
            <input class="input" name="adr_email" type="email" placeholder=" @    Email" required>
        </div><br>

        <div>

            <input class="input" name="mp" type="password" placeholder=" ***   Mot de Passe" required>
        </div><br>
        <div class='firebase'>
            <div class="connecter">
                <button type="submit" name="connexionButton" >Connexion</button>
            </div>
            <div class="modo">
                <button type="submit" >Modo</button>
            </div>
        </div>

    </form>
    <p class="phraseAvantInscription">
        <span>Vous n’avez pas de compte inscrivez-vous :</span>
    </p>
    <p class="lienInscription">
        <a href="http://localhost/inscription">Inscription</a>
    </p>

</div>

</body>


<footer>
    <?php include 'footer.php'?>
</footer>
</html>
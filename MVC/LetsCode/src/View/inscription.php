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
    <link rel='stylesheet' href='../Ressource/css/styles.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/login.css'  type='text/css' media='screen'>


    <title>Document</title>
</head>
<header>

    <a href="http://localhost" ><img class="logoLetsCode" src="../Ressource/images/logoLetsCode.png" alt="Logo Let's Code"></a>

    <a href="http://localhost" >Accueil</a>
    <!--pour les user connecté-->
    <a href="http://localhost/create">Nouveau Projet</a>

    <!--pour les user non connecté-->

    <a href="http://localhost/login" class="loginButton">Connexion/Inscription</a>
</header>
<br>

<body>
<div class="login">
    <div class="imageconnexion">
        <img class="imagess" src="../Ressource/images/login.png" alt="">
        <div class="test">
            <div class="connexion">

                <button>Inscription</button>
            </div>
        </div>

    </div>
    <div class="firebase">
        <div class="google">
            <button>
                <span>Continuer avec google</span>
                <img class="image" src="../Ressource/images/google.png" alt="">
            </button>
        </div>
        <div class="facebook">
            <button>


                <span>Continuer avec facebook </span>
                <img class="image" src="../Ressource/images/facebook.png" alt="">


            </button>

        </div>
        <div class="github">
            <button>
                <span>Continuer avec github</span>
                <img class="image" src="../Ressource/images/github.png" alt="">
            </button>
        </div>
    </div>
    <br>
    <br>

        <?php
        if(isset($_POST["inscriptionButton"])):?>
        <div class="ErrorInscription">
            <span ><?= $erreur ?></span>
        </div>
        <?php endif;?>
   <br>

    <form action="http://localhost/inscription" method="post">
        <!--
                <div>
                    <label for="id"></label>
                    <input type="hidden" name="id" values='<?php //echo($GET['id'])?>'>
                </div>
                -->
        <div>
            <input class="input" name="Pseudo" type="text" placeholder=" Pseudo " required>
        </div><br>
        <div>

            <input class="input" name="adr_email" type="email" placeholder=" @    Email" required>
        </div><br>

        <div>

            <input class="input" name="creation_mp" type="password" placeholder=" ***   Mot de passe" required>
        </div><br>
        <div>

            <input class="input" name="confirmation_mp" type="password" placeholder=" ***   Confirmez votre mot de passe" required>
        </div><br>
        <div class='firebase'>
            <div class="inscription">
                <button type="submit"  name="inscriptionButton">Inscription</button>
            </div>

        </div>

    </form>
    <br>
    <br>
    <p class="phraseAvantInscription">
        <span>Vous avez déja un compte  connectez-vous :</span>
    </p>

    <p class="lienInscription">
        <a href="http://localhost/login">Connexion</a>
    </p>


</div>

</body>

<br>
<br>
<br>

<footer>
    <?php include 'footer.php'?>
</footer>
</html>
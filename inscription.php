<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">


    <title>Document</title>
  
</head>
<header>
    <div class=menu_header>
        <ul>
            <li>Accueil</li>
            <li>Compte</li>
            <li>Nouveau projet</li>
            <li>Contact</li>
        </ul>
    </div>
   
</header>

<body>
    <div class="login" align="center">
        <div>
            <h1><span>Inscription</span></h1>
        </div>
        <div>
            <button>google</button>
            <button>Facebook </button>
            <button>Github</button>
        </div>
        <div>
            <span>OU</span>
        </div>
        <h2>
            <span>
                Inscrivez-vous avec votre adresse e-mail
            </span>
        </h2>
        <form action="post-inscription.php" method="post">
            <div class="field-wrapper">
                <input type="text" id="prenom" name="Pseudo" placeholder="Pseudo" maxlength="16" minlength="6" required>
                <ul class="error-container static"></ul>
            </div ><br>
            <div class="field-wrapper">


                <input id="adr_email" name="adr_email" type="email" placeholder="Email" required>
                <ul class="error-container static"></ul>
            </div><br>
           

            <div class="field-wrapper">

                <input id="creation_mp" name="creation_mp" type="password" placeholder=" Créer un mot de passe"
                    minlength="8" required>
                <ul class="error-container static"></ul>
            </div><br>
            <div class="field-wrapper">

                <input id="confirmation_mp" name="confirmation_mp" type="password"
                    placeholder="Confirmer le mot de passe" required>
                    <ul class="error-container static"></ul>
            </div><br>
            <div class="field-wrapper">
                <button id="valider" type="submit" class="button-27" name="submit">S'inscrire</button>
                <ul class="error-container static"></ul>
            </div>
        </form>

    </div>


</body>

</html>
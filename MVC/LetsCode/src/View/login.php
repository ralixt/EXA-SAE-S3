<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel='stylesheet' href='../Ressource/css/styles.css'  type='text/css' media='screen'>


    <title>Document</title>
</head>
<header>
    <div class= menu_header>
        <a href="Accueil.php">Accueil</a>
    </div>

</header>
<body>
    <div class="login">
        <div>
            <h1><span>Connexion</span></h1>
        </div>
        <div>
            <button>google</button>
            <button>facebook</button>
            <button>github</button>
        </div>
        <div>
            <span>OU</span>
        </div>
        <h2>
                <span>
                    Connectez-vous avec votre adresse e-mail
                </span>
        </h2>
        <form action="http://localhost/login" method="post">
            <!--
                <div>
                    <label for="id"></label>
                    <input type="hidden" name="id" values='<?php echo($GET['id'])?>'>
                </div>
                -->
            <div>

                <input id="adr_email" name="adr_email" type="email" placeholder="Email" required>
            </div><br>

            <div>

                <input id="mp" name="mp" type="password" placeholder="Password" required>
            </div><br>
            <button type="submit" class="button-27">Valider</button>
        </form>
        <p>
            <span>Vous n'avez pas encore de compte? <a href="http://localhost/inscription">Inscrivez-vous gratuitement</a></span>
        </p>
    </div>

</body>
<?php include 'footer.php'?>

</html>
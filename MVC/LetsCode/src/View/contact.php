<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel='stylesheet' href='../Ressource/css/header.css'  type='text/css' media='screen'>
        <link rel='stylesheet' href='../Ressource/css/contact.css'  type='text/css' media='screen'>
        <link rel='stylesheet' href='../Ressource/css/footer.css'  type='text/css' media='screen'>

        <title>Contact</title>
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

            <div id="formulaire">
                <h1>Contactez-nous</h1>
                <form method="post">
                    <div>
                        <div>
                            <!--<label for="nom">Nom<span class="obligatoire">*</span> : </label>-->
                            <input id="nom" name="nom" type="text" placeholder="Nom" required>
                        </div>
                        <br>

                        <div>
                            <!--<label for="prenom">Prénom<span class="obligatoire">*</span> : </label>-->
                            <input id="prenom" name="prenom" type="text" placeholder="Prénom" required>
                        </div>
                        <br>


                        <div>
                            <!--<label for="mail">Email<span class="obligatoire">*</span> : </label>-->
                            <input id="mail" name="mail" type="email" placeholder="Adresse Email" required>
                        </div>
                        <br>

                        <!--
                        <div>
                            <label for="objet">Objet<span class="obligatoire">*</span> : </label>
                            <input id="objet" name="objet" type="text" required>
                        </div>
                        <br>
    -->

                        <div>
                            <!--<label for="message">Votre message : </label><br>-->
                            <textarea id ="message" name="message" placeholder="Ecrivez votre message"></textarea>
                        </div>
                        <br>

                        <input type="submit" value="Envoyer" id="envoyer">

                    </div>
                </form>

            </div>

        </main>
        <?php include 'footer.php'?>
    </body>

</html>

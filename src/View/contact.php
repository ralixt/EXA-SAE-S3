<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel='stylesheet' href='../Ressource/css/header.css'  type='text/css' media='screen'>
        <link rel='stylesheet' href='../Ressource/css/contact.css'  type='text/css' media='screen'>
        <link rel='stylesheet' href='../Ressource/css/footer.css'  type='text/css' media='screen'>
        <link rel="icon" type="image/x-icon" href="../Ressource/images/logoLetsCode.png">

        <title>Contact</title>
    </head>
    <body>
        <?php include 'header.php'?>
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
                    </div>
                    <input type="submit" value="Envoyer" id="envoyer">
                </form>

            </div>

        </main>
        <?php include 'footer.php'?>
        <script src="../Ressource/JS/header.js"></script>
    </body>

</html>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <title>Contact</title>
    </head>
    <body>
        <main>
            <form action="Controllers/ContactController" method="post">
                <div>
                    <div>
                        <label for="nom">Nom<span class="obligatoire">*</span> : </label>
                        <input id="nom" name="nom" type="text" required>
                    </div>
                    <br>

                    <div>
                        <label for="prenom">Prénom<span class="obligatoire">*</span> : </label>
                        <input id="prenom" name="prenom" type="text" required>
                    </div>
                    <br>


                    <div>
                        <label for="mail">Email<span class="obligatoire">*</span> : </label>
                        <input id="mail" name="mail" type="email" placeholder="yourmail@domain.com" required>
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
                        <label for="message">Votre message : </label><br>
                        <textarea id ="message" name="message" placeholder="Ecrivez votre message"></textarea>
                    </div>
                    <br>

                    <input type="submit" value="Envoyer" id="envoyer">

                </div>
            </form>
        </main>
    </body>
    <?php include 'footer.php'?>
</html>

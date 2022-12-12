<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Ajout d'un projet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>


</head>

<body>
<main>
    <form action="http://localhost/login" method="post">
        <div>
            <fieldset>
                <legend><strong>Informations personnelles</strong></legend>
                <div>
                    <label for="surname">Nom<span class="obligatoire">*</span> : </label>
                    <input id="surname" name="uname" type="text" required>
                </div>
                <br>

                <div>
                    <label for="firstname">Prénom<span class="obligatoire">*</span> : </label>
                    <input id="firstname" name="fname" type="text" required>
                </div>
                <br>

                <br>

                <div>
                    <label for="adr_email">Email<span class="obligatoire">*</span> : </label>
                    <input id="adr_email" name="adr_email" type="email" placeholder="yourmail@domain.com" required>
                </div>

            </fieldset>
            <fieldset>
                <legend><strong>Votre demande</strong></legend>
                <div>
                    <label for="object">Objet<span class="obligatoire">*</span> : </label>
                    <input id="object" name="oname" type="text" required>
                </div>
                <br>

                <div>
                    <label for="message_demande">Votre message : </label>
                    <p>
                        <textarea id ="message_demande" name="message" placeholder="Ecrivez votre message"></textarea>
                    </p>
                </div>
            </fieldset>
            <br>
            <input type="submit" value="Envoyer">
        </div>
    </form>
</main>
</body>

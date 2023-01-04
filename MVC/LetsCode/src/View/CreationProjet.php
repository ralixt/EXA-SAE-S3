<?php
/**
 * @var tag[] $tags
 */
?>
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
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel='stylesheet' href='../Ressource/css/styles.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/creationProjet.css'  type='text/css'>
    <link rel='stylesheet' href='../Ressource/css/footer.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/header.css'  type='text/css' media='screen'>

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
                        <li id="selected"><a href="/create">Nouveau Projet</a></li>
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
        <div class="flex-horizontal_header">
            <img src="../Ressource/images/header_ajoutProjet.jpg" id="header_image"/>
            <p id="title">Nouveau projet</p>
        </div>


        <form method="post" id="formulaireadd" enctype="multipart/form-data">

            <div class="flex-horizontal">
                <div class="flex-vertical">
                    <label for="images" class="input hover">
                        <input type="file" name="images[]" id="images" accept="image/png, image/jpeg" multiple>
                        <p id="labelImages"><b>+</b> <br/> Ajouter des images <br/> 0 Fichiers</p>
                    </label>
                    <br>
                    <label for="ressources" class="input hover">
                        <input type="file" name="zip" id="ressources" accept=".zip,.rar,.7zip">
                        <p id="labelZip"><b>+</b> <br/> Ajouter un zip <br/> Aucun fichiers </p>
                    </label>
                </div>
                <div class="flex-vertical">
                    <input type="text" name="titre" id="titre" class="input hover" placeholder="Quel est le titre de votre projet ?">
                    <br>
                    <textarea name="contenu" id="contenu" placeholder="Quel est le contenu du projet ?" class="input"></textarea>
                </div>
            </div>

        </div>
        <br>
        <div class="flex-horizontal2">
            <select name="difficulte" id="difficulte" class="input hover">
                <option value="" disabled selected>Quel est la difficulté du projet ?</option>
                <option value="facile">Facile</option>
                <option value="moyen">Moyen</option>
                <option value="difficile">Difficile</option>
            </select>
            <br>
            <?php if(isset($_SESSION['roles']) && $_SESSION['roles'] ==  'Premium_User') : ?>
                <div class="input">
                    <p class="decalage">Est-ce que votre projet est premium ?</p>
                    <div class="center">
                        <label for="oui" class="button">
                            <input type="radio" id="oui" name="isPremium" value="oui">
                            Oui
                        </label>
                        <label for="non" class="button">
                                <input type="radio" id="non" name="isPremium" value="non" checked>
                                Non
                        </label>
                    </div>
                </div>
                <br>
            <?php endif; ?>

            <div class="input">
                <p class="decalage">Quels sont les langage de programmation de votre projet ?</p>
                <div class="tags">
                    <label for="HTML" class="button">
                        <input type="checkbox" id="HTML" name="tag[]" value=36>
                        HTML
                    </label>
                    <label for="Java" class="button">
                        <input type="checkbox" id="Java" name="tag[]" value=6>
                        Java
                    </label>
                    <label for="Python" class="button">
                        <input type="checkbox" id="Python" name="tag[]" value=3>
                        Python
                    </label>
                    <label for="C++" class="button">
                        <input type="checkbox" id="C++" name="tag[]" value=1>
                        C++
                    </label>
                    <label for="C" class="button">
                        <input type="checkbox" id="C" name="tag[]" value=4>
                        C
                    </label>
                    <label for="C#" class="button">
                        <input type="checkbox" id="C#" name="tag[]" value=5>
                        C#
                    </label>
                    <label for="PHP" class="button">
                        <input type="checkbox" id="PHP" name="tag[]" value=2>
                        PHP
                    </label>
                    <label for="CSS" class="button">
                        <input type="checkbox" id="CSS" name="tag[]" value=37>
                        CSS
                    </label>
                    <label for="SQL" class="button">
                        <input type="checkbox" id="SQL" name="tag[]" value=38>
                        SQL
                    </label>
                    <label for="Javascript" class="button">
                        <input type="checkbox" id="Javascript" name="tag[]" value=7>
                        Javascript
                    </label>
                </div>
            </div>
            <br>
            <div class="input">
                <p class="decalage">Quels sont les supports de votre projet ?</p>
                <div class="tags">
                    <label for="Windows" class="button">
                        <input type="checkbox" id="Windows" name="tag[]" value=33>
                        Windows
                    </label>
                    <label for="Linux" class="button">
                        <input type="checkbox" id="Linux" name="tag[]" value=34>
                        Linux
                    </label>
                    <label for="MacOS" class="button">
                        <input type="checkbox" id="MacOS" name="tag[]" value=35>
                        MacOS
                    </label>
                    <label for="Android" class="button">
                        <input type="checkbox" id="Android" name="tag[]" value=39>
                        Android
                    </label>
                    <label for="IOS" class="button">
                        <input type="checkbox" id="IOS" name="tag[]" value=40>
                        IOS
                    </label>
                </div>
            </div>
            <br>
            <div class="input" class="button">
                <p class="decalage">Quels sont les langues de votre projet ?</p>
                <div class="tags">
                    <label for="Français" class="button">
                        <input type="checkbox" id="Français" name="tag[]" value=29>
                        Français
                    </label>
                    <label for="English" class="button">
                        <input type="checkbox" id="English" name="tag[]" value=30>
                        English
                    </label>
                    <label for="Español" class="button">
                        <input type="checkbox" id="Español" name="tag[]" value=31>
                        Español
                    </label>
                    <label for="Deutsch" class="button">
                        <input type="checkbox" id="Deutsch" name="tag[]" value=32>
                        Deutsch
                    </label>
                </div>
            </div>
        </div>
        <br/>
        <div class="flex droite" id="button_confirmation">
            <a id="annuler" href="http://localhost" class="button_clear">Annuler</a>
            <button id="ajouter" type="submit" class="button">Ajouter un nouveau projet</button>
        </div>
    </form>

    <?php
    include 'footer.php'
    ?>
    <script type="text/javascript" src="../Ressource/JS/visualisationUploadFichier.js"></script>
    <script>var simplemde = new SimpleMDE({ element: document.querySelector("#contenu"), toolbar: false, toolbarTips: false, status:false });</script>
</body>
</html>

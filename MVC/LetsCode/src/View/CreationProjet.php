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
                    <label for="images" class="input">
                        <input type="file" name="images[]" id="images" accept="image/png, image/jpeg" multiple>
                        <p><b>+</b> <br/> Ajouter des images</p>
                    </label>
                    <br>
                    <label for="ressources" class="input">
                        <input type="file" name="zip" id="ressources" accept=".zip,.rar,.7zip">
                        <p><b>+</b> <br/> Ajouter un zip</p>
                    </label>
                </div>
                <div class="flex-vertical">
                    <input type="text" name="titre" id="titre" class="input" placeholder="Quel est le titre de votre projet ?">
                    <br>
                    <textarea name="contenu" id="contenu" placeholder="Quel est le contenu du projet ?" class="input"></textarea>
                </div>
            </div>

        </div>
        <br>
        <div class="flex-horizontal2">
            <select name="difficulte" id="difficulte" class="input">
                <option value="" disabled selected>Quel est la difficulté du projet ?</option>
                <option value="facile">Facile</option>
                <option value="moyen">Moyen</option>
                <option value="difficile">Difficile</option>
            </select>
            <div class="input">
                <p>Est-ce que votre projet est premium ?</p>
                <input type="radio" id="oui" name="isPremium" value="oui"
                <label for="oui">Oui</label>
                <input type="radio" id="non" name="isPremium" value="non" checked>
                <label for="non">Non</label>
            </div>
        </div>
        <br>
<!--            --><?php //if(isset($_SESSION['roles']) && $_SESSION['roles'] ==  'Premium_User') : ?>

<!--            --><?php //endif; ?>





        <button id="ajouter" type="submit" >Ajouter</button>
        <a id="annuler" href="http://localhost" >Annuler</a>

                <div class="tags">
                    <fieldset>
                        <legend>Langage de programmation</legend>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=36>
                            <label for="tag[]">HTML</label>
                        </div>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=6>
                            <label for="tag[]">Java</label>
                        </div>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=3>
                            <label for="tag[]">Python</label>
                        </div>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=1>
                            <label for="tag[]">C++</label>
                        </div>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=4>
                            <label for="tag[]">C</label>
                        </div>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=5>
                            <label for="tag[]">C#</label>
                        </div>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=2>
                            <label for="tag[]">PHP</label>
                        </div>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=37>
                            <label for="tag[]">CSS</label>
                        </div>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=38>
                            <label for="tag[]">SQL</label>
                        </div>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=7>
                            <label for="tag[]">Javascript</label>
                        </div>

                    </fieldset>
                </div>

                <div class="tags">
                    <fieldset>
                        <legend>Support</legend>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=33>
                            <label for="tag[]">Windows</label>
                        </div>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=34>
                            <label for="tag[]">Linux</label>
                        </div>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=35>
                            <label for="tag[]">Mac</label>
                        </div>
                    </fieldset>
                </div>
                <div class="tags">
                    <fieldset>
                        <legend>Langue</legend>
                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=29>
                            <label for="tag[]">Français</label>
                        </div>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=30>
                            <label for="tag[]">English</label>
                        </div>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=31>
                            <label for="tag[]">Español</label>
                        </div>

                        <div>
                            <input type="checkbox" id="tag[]" name="tag[]" value=32>
                            <label for="tag[]">Deutsch</label>
                        </div>
                    </fieldset>
                </div>

    </form>
    <script>var simplemde = new SimpleMDE({ element: document.querySelector("#contenu"), toolbar: false, toolbarTips: false, status:false });</script>
</body>

</html>

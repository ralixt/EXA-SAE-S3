<?php

/**
 * @var Projet[] $project
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel='stylesheet' href='../Ressource/css/styles.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/footer.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/header.css'  type='text/css' media='screen'>

    <title>Accueil</title>
</head>
<body>
    <header>
        <nav id="navbar">
            <a href="http://localhost" ><img class="logoLetsCode" src="../Ressource/images/logoLetsCode.png" alt="Logo Let's Code"></a>

            <div id="nav-links">
                <ul style="list-style-type:none">
                    <li id="selected"><a href="http://localhost">Accueil</a></li>
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
        <?php if(isset($_SESSION["Pseudo"])):?>
            <div id="welcome">
                <p> Bienvenue <?php echo($_SESSION["Pseudo"])?></p>
            </div>
        <?php endif; ?>


        <div class="searchDiv">
            <form method="GET">

                <input type="search" name="recherche" id="recherche" placeholder="Quel projet recherchez vous ?">


                <fieldset>
                    <legend>Langage de programmation</legend>

                    <div>
                        <input type="checkbox" id="tag[]"" name="tag[]" value="HTML">
                        <label for="tag[]">HTML</label>
                    </div>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="Java">
                        <label for="tag[]">Java</label>
                    </div>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="Python">
                        <label for="tag[]">Python</label>
                    </div>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="C++">
                        <label for="tag[]">C++</label>
                    </div>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="C">
                        <label for="tag[]">C</label>
                    </div>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="C#">
                        <label for="tag[]">C#</label>
                    </div>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="PHP">
                        <label for="tag[]">PHP</label>
                    </div>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="CSS">
                        <label for="tag[]">CSS</label>
                    </div>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="SQL">
                        <label for="tag[]">SQL</label>
                    </div>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="Javascript">
                        <label for="tag[]">Javascript</label>
                    </div>

                </fieldset>

                <fieldset>
                    <legend>Support</legend>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="Windows">
                        <label for="tag[]">Windows</label>
                    </div>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="Linux">
                        <label for="tag[]">Linux</label>
                    </div>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="Mac">
                        <label for="tag[]">Mac</label>
                    </div>

                </fieldset>

                <fieldset>
                    <legend>Langue</legend>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="Francais">
                        <label for="tag[]">Français</label>
                    </div>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="English">
                        <label for="tag[]">English</label>
                    </div>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="Espanol">
                        <label for="tag[]">Español</label>
                    </div>

                    <div>
                        <input type="checkbox" id="tag[]" name="tag[]" value="Deutsch">
                        <label for="tag[]">Deutsch</label>
                    </div>
                </fieldset>


                <label for="difficulte">Difficulté :</label>
                <select name="difficulte" id="difficulte">
                    <option value="facile">Facile</option>
                    <option value="moyen">Moyen</option>
                    <option value="difficile">Difficile</option>
                </select>


                <label for="orderby">Trier par :</label>
                <select name="orderby" id="orderby">
                    <option value="nom"> nom </option>
                    <option value="difficulte"> difficulte </option>
                    <option value="like"> like </option>
                    <option value="commentaire"> commentaire </option>
                </select>

            </form>
        </div>

        <div id="projectCards">
            <?php
            foreach ($project as $projet)
                echo get_template(__PROJECT_ROOT__."/View/Fragments/project-card.php", [
                    "projet" => $projet
                ])
            ?>
        </div>

    </main>

    <?php include 'footer.php'?>
</body>



</html>
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
    <link rel='stylesheet' href='../Ressource/css/accueil.css' type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/footer.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/header.css'  type='text/css' media='screen'>
    <link rel="stylesheet" href="../Ressource/css/card_projet.css" type="text/css" media="screen">

    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


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


        <div id="searchDiv">
            <form method="GET">

                <div id="searchBar">
                    <span class="material-symbols-outlined filtreIconSpace">search</span>
                    <input type="search" name="recherche" id="recherche" placeholder="Quel projet recherchez vous ?">
                </div>



                <div id="popup" style="display: none">

                    <div id="popupBackground">
                        <div class="accordion">
                            <div class="contentBox">

                                <div class="label">
                                    <span class="material-symbols-outlined filtreIconSpace">terminal</span>
                                    Langage de programmation
                                </div>
                                <div class="content">
                                    <div class="tags">
                                        <input type="checkbox" id="choiceHTML" name="tag[]" value="HTML">
                                        <label for="choiceHTML">HTML</label>
                                    </div>

                                    <div class="tags">
                                        <input type="checkbox" id="choiceJava" name="tag[]" value="Java">
                                        <label for="choiceJava">Java</label>
                                    </div>

                                    <div class="tags">
                                        <input type="checkbox" id="choicePython" name="tag[]" value="Python">
                                        <label for="choicePython">Python</label>
                                    </div>

                                    <div class="tags">
                                        <input type="checkbox" id="choiceCPP" name="tag[]" value="C++">
                                        <label for="choiceCPP">C++</label>
                                    </div>

                                    <div class="tags">
                                        <input type="checkbox" id="choiceC" name="tag[]" value="C">
                                        <label for="choiceC">C</label>
                                    </div>

                                    <div class="tags">
                                        <input type="checkbox" id="choiceCSharp" name="tag[]" value="C#">
                                        <label for="choiceCSharp">C#</label>
                                    </div>

                                    <div class="tags">
                                        <input type="checkbox" id="choicePHP" name="tag[]" value="PHP">
                                        <label for="choicePHP">PHP</label>
                                    </div>

                                    <div class="tags">
                                        <input type="checkbox" id="choiceCSS" name="tag[]" value="CSS">
                                        <label for="choiceCSS">CSS</label>
                                    </div>

                                    <div class="tags">
                                        <input type="checkbox" id="choiceSQL" name="tag[]" value="SQL">
                                        <label for="choiceSQL">SQL</label>
                                    </div>

                                    <div class="tags">
                                        <input type="checkbox" id="choiceJS" name="tag[]" value="Javascript">
                                        <label for="choiceJS">Javascript</label>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="accordion">
                            <div class="contentBox">
                                <div class="label">
                                    <span class="material-symbols-outlined filtreIconSpace">devices</span>
                                    Support
                                </div>
                                <div class="content">
                                    <div class="tags">
                                        <input type="checkbox" id="choiceWindows" name="tag[]" value="Windows">
                                        <label for="choiceWindows">Windows</label>
                                    </div>

                                    <div class="tags">
                                        <input type="checkbox" id="choiceLinux" name="tag[]" value="Linux">
                                        <label for="choiceLinux">Linux</label>
                                    </div>

                                    <div class="tags">
                                        <input type="checkbox" id="choiceMac" name="tag[]" value="Mac">
                                        <label for="choiceMac">Mac</label>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="accordion">
                            <div class="contentBox">
                                <div class="label">
                                    <span class="material-symbols-outlined filtreIconSpace">language</span>
                                    Langue
                                </div>
                                <div class="content">

                                    <div class="tags">
                                        <input type="checkbox" id="choiceFR" name="tag[]" value="Francais">
                                        <label for="choiceFR">Français</label>
                                    </div>

                                    <div class="tags">
                                        <input type="checkbox" id="choiceEN" name="tag[]" value="English">
                                        <label for="choiceEN">English</label>
                                    </div>

                                    <div class="tags">
                                        <input type="checkbox" id="choiceES" name="tag[]" value="Espanol">
                                        <label for="choiceES">Español</label>
                                    </div>

                                    <div class="tags">
                                        <input type="checkbox" id="choiceDE" name="tag[]" value="Deutsch">
                                        <label for="choiceDE">Deutsch</label>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="accordion">
                            <div class="contentBox">
                                <div class="label">
                                    <span class="material-symbols-outlined filtreIconSpace">book</span>
                                    Difficulté
                                </div>

                                <div class="content">
                                    <div class="tags">
                                        <input type="radio" id="facile" name="contact" value="facile">
                                        <label for="facile">Facile</label>
                                    </div>
                                    <div class="tags">
                                        <input type="radio" id="moyen" name="contact" value="moyen">
                                        <label for="moyen">Moyen</label>
                                    </div>
                                    <div class="tags">
                                        <input type="radio" id="difficile" name="contact" value="difficile">
                                        <label for="difficile">Difficile</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>





                </div>


                <div id="searchDivBottom">
                    <div id="tri">

                        <span class="material-symbols-outlined">sort_by_alpha</span>
                        <label for="orderby">Trier par :</label>
                        <select name="orderby" id="orderby">
                            <option value="nom"> nom </option>
                            <option value="difficulte"> difficulte </option>
                            <option value="like"> like </option>
                            <option value="commentaire"> commentaire </option>
                        </select>
                    </div>



                    <button class="filtre"  type="button" onclick="filtre()">
                            <span class="material-symbols-outlined">filter_alt</span>
                            Filtre
                    </button>

                </div>

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
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./../Ressource/JS/projet-card.js"></script>
    <script src="../Ressource/JS/accueil.js"></script>
</body>



</html>
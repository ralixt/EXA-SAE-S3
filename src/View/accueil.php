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
    <link rel="icon" type="image/x-icon" href="../Ressource/images/logoLetsCode.png">

    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0..1,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <title>Accueil</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="http://localhost" ><img class="logoLetsCode" src="../Ressource/images/logoLetsCode.png" alt="Logo Let's Code"></a>

            <div class="nav-links">
                <ul style="list-style-type:none">
                    <li id="selected"><a href="/">Accueil</a></li>
                    <!--pour les user connectés-->

                    <?php if(isset($_SESSION["Pseudo"])) : ?>
                        <li><a href="/create">Nouveau Projet</a></li>
                        <li><a href="/compte" class="loginButton">Mon compte</a></li>


                    <?php else : ?>
                        <!--pour les user non connectés-->
                        <li><a href="/login">Nouveau Projet</a></li>
                        <li><a href="/login" class="loginButton">Connexion/Inscription</a></li>

                    <?php endif; ?>
                </ul>
            </div>
            <img class="menu-hamburger" src="../Ressource/images/menu.png" alt="menu hamburger">
            <img class="menu-hamburger-close" src="../Ressource/images/close.png" alt="close menu hamburger">

        </nav>
    </header>

    <main>
        <?php if(isset($_SESSION["Pseudo"])):?>
            <?php if (!isset($_SESSION['logged'])) :?>
                <div class="welcome">
                    <p> Bienvenue <?php echo($_SESSION["Pseudo"])?></p>
                </div>
                <?php $_SESSION['logged'] = true;?>
            <?php endif; ?>
        <?php endif; ?>



        <div id="searchDiv">
            <form method="GET">

                <div id="popup" style="display: none">

                    <div id="popupBackground">
                        <div id="popupFiltreTitleClose">
                            <div>
                                <p id="filtreTitle" class="popupSection JSfiltres">Filtres (0)</p>
                            </div>

                            <button class="closeButton" type="button" onclick="filtre()">
                                <span class="material-symbols-outlined">close</span>
                            </button>
                        </div>


                        <div class="filterSection">
                            <div class="accordion">
                                <div class="contentBox">

                                    <div class="label">
                                        <span class="material-symbols-outlined filtreIconSpace">terminal</span>
                                        Langage de programmation
                                    </div>

                                    <div class="content tagsFiltre">

                                        <div>
                                            <label for="choiceHTML">
                                                <input type="checkbox" id="choiceHTML" name="tag[]" value="HTML">
                                                <span class="tagTitle">HTML</span>
                                            </label>
                                        </div>


                                        <div>
                                            <label for="choiceJava">
                                                <input type="checkbox" id="choiceJava" name="tag[]" value="Java">
                                                <span>Java</span>
                                            </label>
                                        </div>

                                        <div>
                                            <label for="choicePython">
                                                <input type="checkbox" id="choicePython" name="tag[]" value="Python">
                                                <span>Python</span>
                                            </label>
                                        </div>

                                        <div>
                                            <label for="choiceCPP">
                                                <input type="checkbox" id="choiceCPP" name="tag[]" value="C++">
                                                <span>C++</span>
                                            </label>

                                        </div>

                                        <div>
                                            <label for="choiceC">
                                                <input type="checkbox" id="choiceC" name="tag[]" value="C">
                                                <span>C</span>
                                            </label>
                                        </div>

                                        <div>
                                            <label for="choiceCSharp">
                                                <input type="checkbox" id="choiceCSharp" name="tag[]" value="C#">
                                                <span>C#</span>
                                            </label>
                                        </div>


                                        <div>
                                            <label for="choicePHP">
                                                <input type="checkbox" id="choicePHP" name="tag[]" value="PHP">
                                                <span>PHP</span>
                                            </label>
                                        </div>

                                        <div>
                                            <label for="choiceCSS">
                                                <input type="checkbox" id="choiceCSS" name="tag[]" value="CSS">
                                                <span>CSS</span>
                                            </label>
                                        </div>

                                        <div>
                                            <label for="choiceSQL">
                                                <input type="checkbox" id="choiceSQL" name="tag[]" value="SQL">
                                                <span>SQL</span>
                                            </label>
                                        </div>

                                        <div>
                                            <label for="choiceJS">
                                                <input type="checkbox" id="choiceJS" name="tag[]" value="Javascript">
                                                <span>JavaScript</span>
                                            </label>
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

                                        <div>
                                            <label for="choiceWindows">
                                                <input type="checkbox" id="choiceWindows" name="tag[]" value="Windows">
                                                <span>Windows</span>
                                            </label>
                                        </div>

                                        <div>
                                            <label for="choiceLinux">
                                                <input type="checkbox" id="choiceLinux" name="tag[]" value="Linux">
                                                <span>Linux</span>
                                            </label>
                                        </div>

                                        <div>
                                            <label for="choiceMac">
                                                <input type="checkbox" id="choiceMac" name="tag[]" value="Mac">
                                                <span>Mac</span>
                                            </label>
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
                                        <div>
                                            <label for="choiceFR">
                                                <input type="checkbox" id="choiceFR" name="tag[]" value="Francais">
                                                <span>Français</span>
                                            </label>
                                        </div>


                                        <div>
                                            <label for="choiceEN">
                                                <input type="checkbox" id="choiceEN" name="tag[]" value="English">
                                                <span>English</span>
                                            </label>
                                        </div>

                                        <div>
                                            <label for="choiceES">
                                                <input type="checkbox" id="choiceES" name="tag[]" value="Espanol">
                                                <span>Español</span>
                                            </label>
                                        </div>

                                        <div>
                                            <label for="choiceDE">
                                                <input type="checkbox" id="choiceDE" name="tag[]" value="Deutsch">
                                                <span>Deutsch</span>
                                            </label>
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

                                        <div>
                                            <label for="facile">
                                                <input type="radio" id="facile" name="tag[]" value="facile">
                                                <span>Facile</span>
                                            </label>
                                        </div>

                                        <div>
                                            <label for="moyen">
                                                <input type="radio" id="moyen" name="tag[]" value="moyen">
                                                <span>Moyen</span>
                                            </label>
                                        </div>

                                        <div>
                                            <label for="difficile">
                                                <input type="radio" id="difficile" name="tag[]" value="difficile">
                                                <span>Difficile</span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="rechercheButton">Rechercher</button>

                    </div>
                </div>


                <div id="searchBar">
                    <span class="material-symbols-outlined filtreIconSpace">search</span>
                    <input type="search" name="recherche" id="recherche" placeholder="Quel projet recherchez vous ?">
                </div>

                <button class="rechercheButton firstButton">Rechercher</button>



                <div id="searchDivBottom">

                    <button class="filtre JSfiltres"  type="button" onclick="filtre()" id="filtre_button" >
                            <span class="material-symbols-outlined">filter_alt</span>
                            Filtres (0)

                    </button>

                    <div id="tri">

                        <span class="material-symbols-outlined">sort_by_alpha</span>
                        <!-- <label for="orderby">Trier par  </label>-->
                        <select name="orderby" id="orderby">
                            <option value="" disabled selected> Trier Par</option>
                            <option value="nom"> Nom </option>
                            <option value="like"> Like </option>
                            <option value="commentaire"> Commentaire </option>
                        </select>
                    </div>


                </div>

            </form>
        </div>





        <div class="projectCards grid">
            <?php
            foreach ($project as $projet)
                echo get_template(__PROJECT_ROOT__."/View/Fragments/project-card.php", [
                    "projet" => $projet,
                    "status" => false
                ])
            ?>
        </div>

    </main>

    <?php include 'footer.php'?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./../Ressource/JS/projet-card.js"></script>
    <script src="../Ressource/JS/accueil.js"></script>
    <script src="../Ressource/JS/header.js"></script>
</body>



</html>
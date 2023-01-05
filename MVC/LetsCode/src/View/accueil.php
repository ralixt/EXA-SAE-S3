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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />


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



                <div id="popup" style="display: none";>

                    <div class="accordion">
                        <div class="contentBox">

                            <div class="label">
                                <span class="material-symbols-outlined filtreIconSpace">terminal</span>
                                Langage de programmation
                            </div>
                            <div class="content">
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
                                    <input type="radio" id="facile" name="contact" value="facile">
                                    <label for="facile">Facile</label>

                                    <input type="radio" id="moyen" name="contact" value="moyen">
                                    <label for="moyen">Moyen</label>

                                    <input type="radio" id="difficile" name="contact" value="difficile">
                                    <label for="difficile">Difficile</label>
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
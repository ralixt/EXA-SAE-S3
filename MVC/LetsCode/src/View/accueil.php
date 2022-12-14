<?php
session_start();
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
    <title>Accueil</title>
</head>
<body>
    <header>
<<<<<<< Updated upstream
        <p> Bienvenu dans votre compte <?php echo($_SESSION["Pseudo"])?></p>
        <a>Accueil</a>
=======
>>>>>>> Stashed changes

        <img class="logoLetsCode" src="../Ressource/images/logoLetsCode.png" alt="Logo Let's Code">

        <a>Accueil</a>
        <!--pour les user connecté-->
        <a href="http://localhost/create">Nouveau Projet</a>
        <a href="http://localhost/compte">Mon compte</a>

        <!--pour les user non connecté-->

        <a href="http://localhost/login" class="loginButton">Connexion/Inscription</a>
    </header>

    <main>
        <div class="searchDiv">
            <form method="GET">

                <p>
                    langage de programmation
                    <br/>
                    HTML: <input type="checkbox" name="tag[]" value="HTML" />
                    <br/>
                    Java: <input type="checkbox" name="tag[]" value="Java" />
                    <br/>
                    Python: <input type="checkbox" name="tag[]" value="Python" />
                    <br/>
                    C++: <input type="checkbox" name="tag[]" value="C++" />
                    <br/>
                    C: <input type="checkbox" name="tag[]" value="C" />
                    <br/>
                    C#: <input type="checkbox" name="tag[]" value="C#" />
                    <br/>
                    PHP: <input type="checkbox" name="tag[]" value="PHP" />
                    <br/>
                    CSS: <input type="checkbox" name="tag[]" value="CSS" />
                    <br/>
                    SQL: <input type="checkbox" name="tag[]" value="SQL" />
                    <br/>
                    Javascript: <input type="checkbox" name="tag[]" value="Javascript" />
                    <br/>
                </p>
                <p>
                    support
                    <br/>
                    Windows: <input type="checkbox" name="tag[]" value="Windows" />
                    <br/>
                    Linux: <input type="checkbox" name="tag[]" value="Linux" />
                    <br/>
                    Mac: <input type="checkbox" name="tag[]" value="Mac" />
                    <br/>
                </p>
                <p>
                    langue
                    <br/>
                    Français: <input type="checkbox" name="tag[]" value="francais" />
                    <br/>
                    English: <input type="checkbox" name="tag[]" value="english" />
                    <br/>
                    Espanol: <input type="checkbox" name="tag[]" value="espanol" />
                    <br/>
                    Deutsch: <input type="checkbox" name="tag[]" value="deutsch" />
                    <br/>
                </p>
                <input type="search" name="recherche" id="recherche" placeholder="Quel projet voulez vous recherchez ?">

                <p>Order by</p>
                <select name="orderby">
                    <option value="nom"> nom </option>
                    <option value="difficulte"> difficulte </option>
                    <option value="like"> like </option>
                    <option value="commentaire"> commentaire </option>
                </select>
            </form>
        </div>


        <?php
        foreach ($project as $projet)
            echo get_template(__PROJECT_ROOT__."/View/Fragments/project-card.php", [
                "projet" => $projet
            ])

        ?>
    </main>
</body>

<?php include 'footer.php'?>

</html>

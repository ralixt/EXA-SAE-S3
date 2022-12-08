<?php
/**
 * @var Projet[] $project
 */
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
    <header>
        <a>Accueil</a>

        <!--pour les user connecté-->
        <a href="projet.php">Nouveau Projet</a>
        <a href="login.php">Mon compte</a>

        <!--pour les user non connecté-->
        <a href="login.php">Nouveau projet</a>
        <a href="login.php">Connexion/Inscription</a>

        <form method="GET">
            <input type="search" name="recherche" id="recherche" value=''>
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

                difficulté
                <br/>
                Facile: <input type="checkbox" name="tag[]" value="debutant" />
                <br/>
                Moyen: <input type="checkbox" name="tag[]" value="intermediaire" />
                <br/>
                Difficile: <input type="checkbox" name="tag[]" value="avance" />
                <br/>

                support
                <br/>
                Windows: <input type="checkbox" name="tag[]" value="Windows" />
                <br/>
                Linux: <input type="checkbox" name="tag[]" value="Linux" />
                <br/>
                Mac: <input type="checkbox" name="tag[]" value="Mac" />
                <br/>

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
            <p>Order by</p>
            <select name="orderby" size="5">
                <option value="nom"> nom </option>
                <option value="difficulte"> difficulte </option>
                <option value="like"> like </option>
                <option value="commentaire"> commentaire </option>
            </select>
        </form>
    </header>
    <?php
    foreach ($project as $projet)
        echo get_template(__PROJECT_ROOT__."/View/Fragments/project-card.php", [
                "projet" => $projet
        ])

    ?>
</body>
</html>

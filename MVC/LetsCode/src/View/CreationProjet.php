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


</head>
<header>

</header>
<body>
<h1>ajouter un projet</h1>
<form method="post" id="formulaireadd" enctype="multipart/form-data">

    <div>
        <label for="titre">Le titre du projet: </label><br>
        <input type="text" name="titre" id="titre"><br>

    </div>
    <br>

    <br>

<!--premium-->
        <div>
            <h2>premium?</h2>
        </div>
        <div>

            <input type="radio" id="oui" name="isPremium" value="oui"

            <label for="oui">Oui</label>
        </div>



        <div>
            <input type="radio" id="non" name="isPremium" value="non"
                   checked>
            <label for="non">Non</label>
        </div>

        <br>
<!--fin premium-->

    <div>
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

        <select name="difficulte">
            <option value="debutant">Facile</option>
            <option value="intermediaire">Moyen</option>
            <option value="avance">Difficile</option>
        </select>
    </div>
    <br>

    <br>
    <div>
        <label for="images">Images: </label><br>
        <input type="file" name="images[]" id="images" accept="image/png, image/jpeg" multiple>
    </div>
    <br>
    <div>
        <label for="zip">ressources: </label><br>
        <input type="file" name="zip" id="ressources" accept=".zip,.rar,.7zip">
    </div>
    <br>
    <div>
        <label for="contenu">Projet: </label><br>
        <textarea name="contenu" id="contenu"></textarea>
    </div>
    <br>
    <button id="ajouter" type="submit" >Ajouter</button>
</form>
<script>var simplemde = new SimpleMDE({ element: document.querySelector("#contenu") });</script>

</body>
<?php include 'footer.php'?>

</html>

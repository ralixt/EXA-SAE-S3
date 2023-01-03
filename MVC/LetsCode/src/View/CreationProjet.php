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

<?php if(isset($_SESSION['roles']) && $_SESSION['roles'] ==  'Premium_User') : ?>
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
<?php endif; ?>

    <div>
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


        <label for="difficulte">Difficulté :</label>
        <select name="difficulte" id="difficulte">
            <option value="facile">Facile</option>
            <option value="moyen">Moyen</option>
            <option value="difficile">Difficile</option>
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

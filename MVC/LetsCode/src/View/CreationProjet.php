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
        <label for="support"><strong>choisissez le support:</strong></label><br>

        <select  id="support" name="tags[]" multiple >
            <?php foreach($tags as $tag):?>

                <option  value='<?php echo($tag->getId())?>'><?php echo($tag->getName())?></option>

            <?php endforeach?>
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
<script>var simplemde = new SimpleMDE({ element: document.getElementById("contenu") });</script>

</body>
<?php include 'footer.php'?>

</html>

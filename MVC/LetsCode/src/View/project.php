<?php
/**
* @var Commentaire[] $comments
 * @var Projet $project
*/
?>
<!doctype html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<title>Nom du Projet</title>-->
</head>
    <body>
        <header>
            <h2><?= $project-> getTitre() ?></h2>
            <p><?= $project-> getCreatedAt() ?></p>
            <!-- Tags ici -->
            <!-- likes du projet ici-->
        </header>
        <section>
            <h2>Projet</h2>
            <p><?= $project-> getContent() ?></p>
        </section>
        <section>
            <h2>Ressources</h2>
            <!-- ressources ici -->
        </section>
        <section>
            <h2>Commentaires</h2>
            <article>
                <form action="http://localhost/projet/<?php echo($project->getId())?>" method="post">
                    <div>
                        <!-- input id user-->
                    </div>
                    <div>
                        <input type="hidden" name="id_project" value="<?php echo($project->getId())?>">

                        <!-- input idprojet-->
                    </>
                    <div>
                        <input type="radio" id="note0"
                               name="note" value="0" checked>
                        <label for="note0">0</label>

                        <input type="radio" id="note1"
                               name="note" value="1">
                        <label for="note1">1</label>

                        <input type="radio" id="note2"
                               name="note" value="2">
                        <label for="note2">2</label>

                        <input type="radio" id="note3"
                               name="note" value="3" >
                        <label for="note3">3</label>

                        <input type="radio" id="note4"
                               name="note" value="4">
                        <label for="note4">4</label>

                        <input type="radio" id="note5"
                               name="note" value="5">
                        <label for="note5">5</label>
                    </div>
                    <br>
                    <div>
                        <label for="commentaire"></label>
                        <input type="text" name="commentaire" id="commentaire" placeholder="Ajouter un commentaire">
                    </div>
                    <button type="submit" id="ajouter">Ajouter Un Commentaire</button>
                </form>
            </article>
            <article>

                <?php foreach ($comments as $comment) {
                    echo get_template(__PROJECT_ROOT__ . "/View/Fragments/project-comment.php", [
                        "comment" => $comment
                    ]);
                }
                ?>

            </article>
        </section>


    </body>
</html>

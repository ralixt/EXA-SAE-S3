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
            <h2>Titre du projet</h2>
            <p>Date De creation</p>
            <!-- Tags ici -->
            <!-- likes du projet ici-->
        </header>
        <section>
            <h2>Projet</h2>
            <p>Markdown ici</p>
        </section>
        <section>
            <h2>Ressources</h2>
            <!-- ressources ici -->
        </section>
        <section>
            <h2>Commentaires</h2>
            <article>
                <form action="post-comment.php" method="post">
                    <div>
                        <!-- input id user-->
                    </div>
                    <div>
                        <!-- input idprojet-->
                    </div>
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
                <!-- Affichage des commentaires -->
            </article>
        </section>


    </body>
</html>

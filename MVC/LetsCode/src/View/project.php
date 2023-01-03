<?php
/**
* @var Commentaire[] $comments
 * @var Projet $project

*/
require_once  "Ressource/libs/Parsedown.php";


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel='stylesheet' href='./.././Ressource/css/styles.css' media='screen'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0..1,0" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <link rel='stylesheet' href='../Ressource/css/project.css'  type='text/css' media='screen'>
</head>


    <header>

        <a href="http://localhost" ><img class="logoLetsCode" src="../Ressource/images/logoLetsCode.png" alt="Logo Let's Code"></a>

        <a href="http://localhost" >Accueil</a>
        <!--pour les user connecté-->
        <a href="http://localhost/create">Nouveau Projet</a>

        <!--pour les user non connecté-->

        <a href="http://localhost/login" class="loginButton">Connexion/Inscription</a>
    </header>

<br>
<body>
<div class="container">

    <?php for($i=0;$i<count($project->getURLImage());$i++):?>
                  <div class="slides">
        <!--            <img src=".././RessourcesProject/--><!--/images/--><?php //echo($project->getURLImage()[0][0])?><!--" alt="erreur" >-->
                      <?php echo('<img src= ./.././RessourcesProject/'.$project->getId().'/'.'images'.'/'.str_replace(' ', '', $project->getURLImage()[$i]).'>' );?>
                  </div>
    <?php endfor;?>
        <!--  <div class="slides">-->
        <!--    <img src=".././Ressource/test/image2.png" >-->
        <!--  </div>-->

            <div  class="point" style="text-align:center" >
                <?php for($i=0;$i<count($project->getURLImage());$i++):?>
                <?php if(count($project->getURLImage())>1):?>
                 <span class="dot" onclick="currentSlide(<?= $i+1 ?>)"></span>
                <?php endif;?>
                <?php endfor;?>
        <!--        <span class="dot" onclick="currentSlide(2)"></span>-->
            </div>

    <?php if(count($project->getURLImage())>1):?>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    <?php endif;?>
    <div class="titre">
        <section >
            <button ><p id="text"><?= $project-> getTitre() ?></p></button>
        </section>
    </div>
</div>
<div class="authorContenair">
    <div class="author">
       <span>De <?= $project-> getAuthor()?></span> 
    </div>
    
    
    <div class="like">
        <?php if($project->isPremium()==1 and $_SESSION["roles"]=='User'):?>
            <img src=".././Ressource/images/premium.png" >
        <?php endif; ?>

        <?php $like = $c = CommentaireService::getInstance()->getProjectLike($project->getId(), $_SESSION["ids"]??1);?>
        <?php if(!$like):?>
            <a href="http://localhost/like?idprojectss=<?php echo($project->getId())?>"><span  class="material-symbols-outlined ">favorite</span></a>
        <?php endif; ?>
        <?php if($like): ?>
            <a href="http://localhost/like?idprojectss=<?php echo($project->getId())?>"><span  class="material-symbols-outlined filled ">favorite</span></a>
        <?php endif;?>

    </div>
</div><br><br>

<?php if($project->isPremium()==1 and $_SESSION["roles"]=='User'):?>
<div class="projetPremium">
    <span>Ce Projet est Premium</span>
    <img src=".././Ressource/images/premium.png" >
</div>
<br>
<div>
    <span>Si vous voulez accéder a ce projet abonnez-vous: </span>
</div><br>
<div>
<p class="lienInscription">
        <a href="http://localhost/login">S'abonnez</a>
</p>
</div>


<?php else:?>

<div class="menu">
    <h3>Table des matières</h3><br><br><br>
    <a href="#contenu"><span>Projet</span><br><br></a>
    <a href="#ressource"><span>Ressource</span><br><br></a>
    <a href="#commentaire"><span>Commentaire</span><br></a>


</div>
<br><br>
<div id="contenu" class="Contenu">
    <h3>Projet</h3><br><br><br>
    <?php
        $parsedown=new Parsedown();
        $text=$project->getContent();
     ?>
    
    <span ><?= $parsedown->text($text)?></span><br>
</div>
<br>
<br>

<div id="ressource" class="Ressource">
    <h3>Ressource</h3><br><br><br>
    <div class="RessourceContenair">

        <div class='folderImg'>
    <img src="./.././Ressource/images/folder_zip.png" alt="errors">
        </div>
        <div class='folderZip'>
        <span> <?= $project->getURLZIP()?></span>
        </div>
        <div class="download">
         <?php echo('<a href= ./.././RessourcesProject/'.$project->getId().'/'.'zip'.'/'.str_replace(' ', '', $project->getURLZIP()).'>'.'<img src="./.././Ressource/images/download.png" alt="error">'.'</a>');?>
        </div>
    </div>
</div>
<br>
<br>
<div id="commentaire"class="Commentaire">

    <h3>Commentaire</h3><br><br><br>

        <div class="CommentaireContenair">

                    <div class="AjoutCommentaire">
                    <form action="http://localhost/commentaire?idproject=<?php echo($project->getId())?>" method="post">
                    <span>Votre Commentaire</span><br><br>
                    <span>Note:</span><br><br>
                    
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
                    

                    <br><br>
                    
                        <span>Message: </span><br><br>
                        <textarea name="commentaire" id="commentaire" cols="40" rows="10" placeholder="Ecrivez votre message ici" required></textarea><br>
                        <button type="submit" id="ajouter">Ajouter Un Commentaire</button>
                    </form>

            </div>
            <div class="AffichageCommentaire">
            


                    <?php foreach ($comments as $comment):?>
                            <?php echo get_template(__PROJECT_ROOT__ . "/View/Fragments/project-comment.php", [
                                "comment" => $comment,
                            "projet"=>$project,



                            ]);?>

                    <?php endforeach;?>

            </div>
            
        </div>
</div>
<?php endif;?>
</body>
<br><br>

<script type="text/javascript" src="./.././Ressource/JS/ProjectText.js"></script>
<script type="text/javascript" src="./.././Ressource/JS/ImageProjet.js"></script>
<script type="text/javascript" src="./.././Ressource/JS/likecomment.js"></script>


<?php include 'footer.php'?>
</html>

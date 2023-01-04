<?php
/**
* @var Commentaire[] $comments
 * @var Projet $project
 * @var Projet $projectModo

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
    <link rel='stylesheet' href='./.././Ressource/css/accueil.css' media='screen'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0..1,0" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <link rel='stylesheet' href='../Ressource/css/header.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/project.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/footer.css'  type='text/css' media='screen'>
</head>




<body>

    <header>
        <nav id="navbar">
            <a href="http://localhost" ><img class="logoLetsCode" src="../Ressource/images/logoLetsCode.png" alt="Logo Let's Code"></a>

            <div id="nav-links">
                <ul style="list-style-type:none">
                    <li><a href="http://localhost">Accueil</a></li>
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
<?php if($projectModo==null):?>
            <main>
                <div class="container">
                    <?php if( count($project->getURLImage())==0 ):?>
                        <div class="slides">
                            <img src="./.././Ressource/test/imageParDefault.jpg">
                        </div>
                    <?php elseif(count($project->getURLImage())>0 and $project->getURLImage()[0]==""): ?>
                        <div class="slides">
                            <img src="./.././Ressource/test/imageParDefault.jpg">
                        </div>
                    <?php else: ?>
                        <?php for($i=0;$i<count($project->getURLImage());$i++):?>
                            <div class="slides">

                                <a href="./.././RessourcesProject/<?=$project->getId()?>/images/<?=str_replace(' ', '', $project->getURLImage()[$i])?>"> <?php echo('<img src= ./.././RessourcesProject/'.$project->getId().'/'.'images'.'/'.str_replace(' ', '', $project->getURLImage()[$i]).'>' );?> </a>

                            </div>
                        <?php endfor;?>
                    <?php endif;?>


                    <div  class="point" style="text-align:center" >
                        <?php for($i=0;$i<count($project->getURLImage());$i++):?>
                            <?php if(count($project->getURLImage())>1):?>
                                <span class="dot" onclick="currentSlide(<?= $i+1 ?>)"></span>
                            <?php endif;?>
                        <?php endfor;?>
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
                        <?php if($project->isPremium()==1 and isset($_SESSION["roles"]) and  $_SESSION["roles"]=='User'):?>
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

                    <?php if($project->isPremium()==1 and isset($_SESSION["roles"]) and $_SESSION["roles"]=='User'):?>
                        <div class="projetPremium">
                            <span>Ce Projet est Premium</span>
                            <img src=".././Ressource/images/premium.png" >
                        </div>
                        <br>
                        <div class="premiumtext">
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
                                <?php echo('<a href= "./../RessourcesProject/'.$project->getId().'/'.'zip'.'/'.$project->getURLZIP().'" download>'.'<img src="./.././Ressource/images/download.png" alt="error">'.'</a>');?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                <?php if($_SESSION["roles"]=='Admin' and $project->getStatus()=="Reviewing"):?>
                    <div class="AdminButton">
                        <a href="http://localhost/publication?idproject=<?php echo($project->getId())?>"><button>Publier</button></a>
                        <a href="http://localhost/suppression?idproject=<?php echo($project->getId())?>"><button>Refuser</button></a>
                    </div>

                <?php else:?>
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
                                    <textarea name="commentaire" id="commentairess"  placeholder="Ecrivez votre message ici" required></textarea><br>
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

                    <?php endif;?>

            </main>
<?php else:;?>

    <main>
        <div class="container">
            <?php if( count($projectModo->getURLImage())==0 ):?>
                <div class="slides">
                    <img src="./.././Ressource/test/imageParDefault.jpg">
                </div>
            <?php elseif(count($projectModo->getURLImage())>0 and $projectModo->getURLImage()[0]==""): ?>
                <div class="slides">
                    <img src="./.././Ressource/test/imageParDefault.jpg">
                </div>
            <?php else: ?>
                <?php for($i=0;$i<count($projectModo->getURLImage());$i++):?>
                    <div class="slides">

                        <a href="./.././RessourcesProject/<?=$projectModo->getId()?>/images/<?=str_replace(' ', '', $projectModo->getURLImage()[$i])?>"> <?php echo('<img src= ./.././RessourcesProject/'.$projectModo->getId().'/'.'images'.'/'.str_replace(' ', '', $projectModo->getURLImage()[$i]).'>' );?> </a>

                    </div>
                <?php endfor;?>
            <?php endif;?>


            <div  class="point" style="text-align:center" >
                <?php for($i=0;$i<count($projectModo->getURLImage());$i++):?>
                    <?php if(count($projectModo->getURLImage())>1):?>
                        <span class="dot" onclick="currentSlide(<?= $i+1 ?>)"></span>
                    <?php endif;?>
                <?php endfor;?>
            </div>

            <?php if(count($projectModo->getURLImage())>1):?>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <?php endif;?>
            <div class="titre">
                <section >
                    <button ><p id="text"><?= $projectModo-> getTitre() ?></p></button>
                </section>
            </div>
        </div>
        <div class="authorContenair">
            <div class="author">
                <span>De <?= $projectModo-> getAuthor()?></span>
            </div>


            <div class="like">
                <?php if($projectModo->isPremium()==1 and isset($_SESSION["roles"]) and  $_SESSION["roles"]=='User'):?>
                    <img src=".././Ressource/images/premium.png" >
                <?php endif; ?>

                <?php $like = $c = CommentaireService::getInstance()->getProjectLike($projectModo->getId(), $_SESSION["ids"]??1);?>
                <?php if(!$like):?>
                    <a href="http://localhost/like?idprojectss=<?php echo($projectModo->getId())?>"><span  class="material-symbols-outlined ">favorite</span></a>
                <?php endif; ?>
                <?php if($like): ?>
                    <a href="http://localhost/like?idprojectss=<?php echo($projectModo->getId())?>"><span  class="material-symbols-outlined filled ">favorite</span></a>
                <?php endif;?>

            </div>
        </div><br><br>

        <?php if($projectModo->isPremium()==1 and isset($_SESSION["roles"]) and $_SESSION["roles"]=='User'):?>
            <div class="projetPremium">
                <span>Ce Projet est Premium</span>
                <img src=".././Ressource/images/premium.png" >
            </div>
            <br>
            <div class="premiumtext">
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
                $text=$projectModo->getContent();
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
                        <span> <?= $projectModo->getURLZIP()?></span>
                    </div>
                    <div class="download">

                        <?php echo('<a href= "./../RessourcesProject/'.$projectModo->getId().'/'.'zip'.'/'.$projectModo->getURLZIP().'" download>'.'<img src="./.././Ressource/images/download.png" alt="error">'.'</a>');?>


                    </div>
                </div>
            </div>
            <br>
            <br>
            <?php if($_SESSION["roles"]=='Admin' and $projectModo->getStatus()=="Reviewing"):?>
                <div class="AdminButton">
                    <a class="publication" href="http://localhost/publication?idproject=<?php echo($projectModo->getId())?>"><button>Publier</button></a>
                    <a class="suppression" href="http://localhost/suppression?idproject=<?php echo($projectModo->getId())?>"><button>Refuser</button></a>
                </div>

            <?php else:?>
                <div id="commentaire"class="Commentaire">

                    <h3>Commentaire</h3><br><br><br>

                    <div class="CommentaireContenair">

                        <div class="AjoutCommentaire">
                            <form action="http://localhost/commentaire?idproject=<?php echo($projectModo->getId())?>" method="post">
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
                                <textarea name="commentaire" id="commentairess"  placeholder="Ecrivez votre message ici" required></textarea><br>
                                <button type="submit" id="ajouter">Ajouter Un Commentaire</button>
                            </form>

                        </div>
                        <div class="AffichageCommentaire">



                            <?php foreach ($comments as $comment):?>
                                <?php echo get_template(__PROJECT_ROOT__ . "/View/Fragments/project-comment.php", [
                                    "comment" => $comment,
                                    "projet"=>$projectModo,


                                ]);?>

                            <?php endforeach;?>

                        </div>

                    </div>
                </div>
            <?php endif;?>

        <?php endif;?>

    </main>
<?php endif;?>
    <?php include 'footer.php'?>
</body>

<script type="text/javascript" src="./.././Ressource/JS/ProjectText.js"></script>
<script type="text/javascript" src="./.././Ressource/JS/ImageProjet.js"></script>
<script type="text/javascript" src="./.././Ressource/JS/likecomment.js"></script>



</html>

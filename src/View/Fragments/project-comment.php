<?php
/***
 * @var Commentaire $comment
 * @var Projet $projet


 */
  

    $like = $c = CommentaireService::getInstance()->getCommentLike($comment->getId(), $_SESSION["ids"]??1);
    $nb = $c = CommentaireService::getInstance()->NbrLike($comment->getId());

?>

<div class="AffichageCommentaires">
        <div class="AffichageCommentaireContenaire">
            <div class="PseudoCommentaire">
                <p>De <?= ($comment->getPseudo())?></p>
            </div>
            <div class="NoteCommentaire">
                <ul>
                    <li> <?= ($comment->getRating())?>/5</li>
                </ul>

            </div>
            <div class="LikeCommentaire">

                <?php if(!$like):?>
                <a href="http://localhost/commentaire?idcomment=<?php echo($comment->getId()) ?>&idprojects=<?php echo($projet->getId())?>"><p  class="material-symbols-outlined ">favorite</p></a>

                    <?php endif; ?>
                    <?php if($like): ?>
                        <a href="http://localhost/commentaire?idcomment=<?php echo($comment->getId()) ?>&idprojects=<?php echo($projet->getId())?>"><p  class="material-symbols-outlined filled ">favorite</p></a>

                    <?php endif;?>
            </div>
            <div class="nbrLike">
            <p> (<?= $nb?>)</p>
            </div>
        </div>
            <div class="date">
               
                <?php
                $date=$comment->getCreatedAt();
                $dates=new dateTime($date);
                $datess=datesss($dates)
                ?>
                <p class="affichageDate"><?= $datess;?></p>
            </div><br>

            <div class="Contenu">
                <p class="textCommentaire">
                <?= $comment->getContent();?>
                </p>
            </div><br>
            

</div>


   


    









<?php
/***
 * @var Commentaire $comment
 * @var Projet $projet

 */

$like=$c=CommentaireService::getInstance()->getCommentLike($comment->getId(),$_SESSION["ids"]);
?>

<div>


    <h2><?= ($comment->getPseudo())?></h2>
    <!-- likes projet -->
    <?php if(!$like):?>
        <a href="http://localhost/projet/<?php echo($projet->getId())?>?idcomment= <?php echo($comment->getId()) ?>"><span  class="material-symbols-outlined ">favorite</span></a>
    <?php endif; ?>
    <?php if($like): ?>
        <a href="http://localhost/projet/<?php echo($projet->getId())?>?idcomment= <?php echo($comment->getId()) ?>"><span  class="material-symbols-outlined filled ">favorite</span></a>
    <?php endif;?>
    <h3>Note: <?= ($comment->getRating())?></h3>
    <p><?= ($comment->getContent())?></p>
</div>







<?php
/***
 * @var Commentaire $comment
 * @var Projet $projet
 * @var bool $id
 */
?>

<div>

    <?php if(!$id):?>

    <a href="http://localhost/projet/<?php echo($projet->getId())?>?idcomment= <?php echo($comment->getId()) ?>"><span  class="material-symbols-outlined ">favorite</span></a>
    <?php endif; ?>
    <?php if($id): ?>
    <a href="http://localhost/projet/<?php echo($projet->getId())?>?idcomment= <?php echo($comment->getId()) ?>"><span  class="material-symbols-outlined filled ">favorite</span></a>
    <?php endif; ?>
    <h2><?= ($comment->getPseudo())?></h2>
  
    <!-- likes projet -->
    <h3>Note: <?= ($comment->getRating())?></h3>
    <p><?= ($comment->getContent())?></p>
</div>







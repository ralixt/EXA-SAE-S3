<?php
/***
 * @var Commentaire $comment
 * @var Projet $projet
 */
?>

<div>
    <a href="http://localhost/projet/<?php echo($projet->getId())?>?idcomment= <?php echo($comment->getId()) ?>"><span  class="material-symbols-outlined ">favorite</span></a>
    <h2><?= ($comment->getPseudo())?></h2>
  
    <!-- likes projet -->
    <h3>Note: <?= ($comment->getRating())?></h3>
    <p><?= ($comment->getContent())?></p>
</div>







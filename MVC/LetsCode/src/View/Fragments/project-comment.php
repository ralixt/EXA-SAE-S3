<?php
/***
 * @var Commentaire $comment
 */
?>
<div>
    <h2><?= ($comment->getPseudo())?></h2>
    <!-- likes projet -->
    <h3>Note: <?= ($comment->getRating())?></h3>
    <p><?= ($comment->getContent())?></p>
</div>







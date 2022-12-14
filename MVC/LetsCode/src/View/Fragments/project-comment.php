<?php
/***
 * @var Commentaire $comment
 */
?>
<div>
    <span class="material-symbols-outlined ">favorite</span>
    <h2><?= ($comment->getPseudo())?></h2>
    <!-- likes projet -->
    <h3>Note: <?= ($comment->getRating())?></h3>
    <p><?= ($comment->getContent())?></p>
</div>







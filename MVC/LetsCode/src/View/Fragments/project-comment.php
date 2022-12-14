<?php
/***
 * @var Commentaire $comment
 */
?>

<div>
    <span class="material-symbols-outlined ">favorite</span>
    <h2><?= ($comment->getPseudo())?></h2>
    <span class="material-symbols-outlined">favorites</span>
    <!-- likes projet -->
    <h3>Note: <?= ($comment->getRating())?></h3>
    <p><?= ($comment->getContent())?></p>
</div>







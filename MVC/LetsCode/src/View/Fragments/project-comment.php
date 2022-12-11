<?php
/***
 * @var Commentaire $comment
 */
?>
<div>
    <h2><?= ($comment->getPseudo())?></h2>
    <!-- likes projet -->
    <h3>Note: <?php echo($comment->getRating())?></h3>
    <p><?php echo ($comment->getContent())?></p>
</div>







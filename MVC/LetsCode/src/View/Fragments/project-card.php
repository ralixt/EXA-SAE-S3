<?php
/**
 * @var Projet $projet
 */
?>
<a href="http://localhost/projet/<?php echo($projet->getId())?>">
    <div>
        <p><?php echo($projet->getTitre()) ?></p>
        <p>de <?php echo($projet->getAuthor())?> </p>
    </div>
</a>

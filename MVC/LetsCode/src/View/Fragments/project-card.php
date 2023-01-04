<?php
/**
 * @var Projet $projet
 */
?>
<a href="http://localhost/projet/<?php echo($projet->getId())?>">
    <?php foreach ($projet->getURLImage() as $name):?>
    <img class="card_img" src="./../../RessourcesProject/<?php echo $projet->getId()?>/images/<?php echo $name?>">
    <?php endforeach;?>
    <p><?php echo $projet-> getTitre()?></p>
</a>

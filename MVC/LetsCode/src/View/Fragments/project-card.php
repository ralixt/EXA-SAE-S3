<?php
/**
 * @var Projet $projet
 */
?>
<a href="http://localhost/projet/<?php echo($projet->getId())?>">
    <div class="info">
        <p><?php echo $projet->getTitre()?></p>
    </div>
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php foreach ($projet->getURLImage() as $image):?>
            <div class="swiper-slide">
                <img class="card_img" src="./../../RessourcesProject/<?php echo $projet->getId() ?>/images/<?php echo $image ?>">
            </div>
            <?php endforeach;?>
        </div>
    </div>
</a>

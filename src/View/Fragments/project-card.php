<?php
/**
 * @var Projet $projet
 * @var bool $status
 */

?>
<?php if($projet->getStatus() == "Published" || (isset($_SESSION["roles"]) && $_SESSION["roles"]== "Admin")):?>
<a href="http://localhost/projet/<?php echo($projet->getId())?>">
<?php else:?>
    <a>
<?php endif;?>
    <div class="info">
        <p><?php echo $projet->getTitre()?></p>
        <div class="tags">
            <?php if(count($projet->getTags()) > 3): ?>
            <?php for($i = 0; $i<3 ; $i++):?>
            <p><?php echo $projet->getTags()[$i]->getName()?></p>
            <?php endfor;?>
            <p>...</p>
            <?php else:?>
            <?php foreach ($projet->getTags() as $tag):?>
            <p><?php echo $tag->getName() ?></p>
            <?php endforeach; endif;?>
        </div>

        <div class="comments">

            <?php if($projet->getStatus() == "Published"):?>
           
            <span class="material-symbols-outlined message">chat</span>
            <p><?php echo $projet->getNbCom()?></p>
            <span class=" circle material-symbols-outlined">circle</span>
            <p><?php echo $projet->getNote()?>/5</p>
            <?php endif;?>

            <?php if($status && $projet->getStatus() == "Published"): ?>
                <p class="status published">Publié</p>
            <?php elseif ($status && $projet->getStatus() == "Reviewing"): ?>
                <p class="status Reviewing">En attente</p>
            <?php elseif ($status && $projet->getStatus() == "Refused"): ?>
                <p class="status Refused">Refusé</p>
            <?php endif;?>
        </div>



    </div>
    <div class="swiper swiperCards">
        <div class="swiper-wrapper">

            <?php if(count($projet->getURLImage()) == 0 || $projet->getURLImage()[0] == ""):?>
            <img class="card_img" src="./.././Ressource/test/imageParDefault.jpg">
            <?php elseif (count($projet->getURLImage()) == 1 && $projet->getURLImage()[0] != ""):?>
            <img class="card_img" src="./../../RessourcesProject/<?php echo $projet->getId() ?>/images/<?php echo $projet->getURLImage()[0] ?>">
            <?php else:?>

            <?php foreach ($projet->getURLImage() as $image):?>
            <div class="swiper-slide">
                <img class="card_img" src="./../../RessourcesProject/<?php echo $projet->getId() ?>/images/<?php echo $image ?>">
            </div>
            <?php endforeach; ?>
            <?php endif;?>


        </div>
    </div>
</a>

<?php
/**
 * @var User $user
 * @var Projet[] $project
 * @var int $count
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <link rel='stylesheet' href='./.././Ressource/css/accueil.css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/header.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/footer.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/compte.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/card_projet.css' type='text/css' media='screen'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="../Ressource/images/logoLetsCode.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Document</title>
</head>
<body>

<?php include 'header.php'?>

<main>
    <div class="papaEnTete">
        <h1 class="flou enTete">Mon Compte</h1>
        <div class="flou enTete">
            <div>
                <h1>Bienvenue <?php echo $user->getPseudo() ?></h1>
            </div>
            <div>
                <p id="AdresseMail"><?php echo $user->getEmail() ?></p>
            </div>


        </div>
    </div>
    <div class="rectangle flexColumn">
        <h3 class="projetverif">Projet à vérifié <?php echo $count?></h3>
        <div class="flexRow projet">
            <div class="swiper-scroll">
                <div class="swiper-wrapper">
                    <?php foreach ($project as $projet): ?>
                        <div class="swiper-slide projectCards">
                            <?php echo get_template(__PROJECT_ROOT__."/View/Fragments/project-card.php", [
                                "projet" => $projet,
                                "status" => true
                            ])?>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>

    <div id="basdepage" class="flexRow">
        <div class="rectangle flexColumn" id="infosPersos">
            <h2>Vos informations personnelles</h2>

            <div class="flexCorrect">
                <div class="infosPersosDiv">
                    <p>Pseudo :</p>
                    <p> <?php echo $user->getPseudo() ?> </p>
                </div>
                <a href="http://localhost/compteModif?raison=pseudo" class="button">changer de pseudo</a>
            </div>

            <div class="flexCorrect">
                <div class="infosPersosDiv">
                    <p>Adresse e-mail :</p>
                    <p><?php echo $user->getEmail() ?> </p>
                </div>
                <a href="http://localhost/compteModif?raison=mail" class="button">changer d'email</a>
            </div>
            <div class="flexCorrect">
                <div class="infosPersosDiv">
                    <p>mot de passe :</p>
                    <p>********</p>
                </div>
                <a id="motPasse" href="http://localhost/compteModif?raison=mdp" class="button">changer de mot de passe</a>
            </div>
            <a class="button red centre" href="http://localhost/logout.php">Deconnexion</a>
            <a class="button red centre" href="compteModif?raison=delete">Supprimer mon compte</a>
        </div>
</main>

<?php include 'footer.php'?>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="./../Ressource/JS/projet-card.js"></script>
<script src="./../Ressource/JS/projet-scroll.js"></script>
<script src="../Ressource/JS/accueil.js"></script>
<script src="../Ressource/JS/header.js"></script>
</body>
</html>
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
    <link rel='stylesheet' href='../Ressource/css/login.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='./.././Ressource/css/accueil.css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/header.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/footer.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/compte.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/card_projet.css' type='text/css' media='screen'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>


    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />

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
    <div>
        <span>Projet à vérifié <?php echo $count?></span>
    </div>

    <div id="projectCards">
        <?php
        foreach ($project as $projet)
            echo get_template(__PROJECT_ROOT__."/View/Fragments/project-card.php", [
                "projet" => $projet
            ])
        ?>
    </div>

</main>

<?php include 'footer.php'?>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="./../Ressource/JS/projet-card.js"></script>
<script src="../Ressource/JS/accueil.js"></script>
</body>
</html>
<?php
/**
 * @var User $user
 * @var int $nbProjet
 * @var array $like
 * @var array $vosProjets
 */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel='stylesheet' href='../Ressource/css/compte.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/accueil.css' type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/card_projet.css' type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/header.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/footer.css'  type='text/css' media='screen'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Mon Compte</title>

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
            <div>
                <p id="ProjetPub"><?php echo $nbProjet ?> projets publiés</p>
            </div>
        </div>
    </div>
    <div class="rectangle flexColumn">
        <h3>Projets Favoris</h3>
        <div class="flexRow projet">
            <div class="swiper-scroll">
                <div class="swiper-wrapper">
                    <?php foreach ($like as $projet) : ?>
                    <div class="swiper-slide projectCards">
                        <?php echo get_template(__PROJECT_ROOT__."/View/Fragments/project-card.php", [
                            "projet" => $projet,
                            "status" =>false
                        ])
                        ?>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <div class="rectangle flexColumn">
        <h3>Vos Projets</h3>
        <div class="flexRow projet" >
            <div class="swiper-scroll">
                <div class="swiper-wrapper">
                    <?php foreach ($vosProjets as $projet): ?>
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
            <div class="rectangle flexColumn">
                <h2>Abonnement Premium</h2>
                <div class="rectangle blanc">
                    <h2>Gratuit</h2>
                    <ul class="gauche">
                        <li>Accès à des millions de projets</li>
                        <li>Publication de projets</li>
                        <li>Accès aux ressources de projets</li>
                    </ul>
                    <a>Choisi</a>
                </div>
                <div class="rectangle blanc" id="premium">
                    <div id="flexBetween">
                        <h2>Premium</h2>
                        <img src="../Ressource/images/premium.png">
                    </div>
                    <ul class="gauche">
                        <li>Accès à des millions de projets</li>
                        <li>Publication de projets</li>
                        <li>Accès aux ressources de projets</li>
                        <li>Accès à des projets premium</li>
                    </ul>
                    <Button class="button">Choisir</Button>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./../Ressource/JS/projet-card.js"></script>
    <script src="./../Ressource/JS/projet-scroll.js"></script>
    <script src="../Ressource/JS/header.js"></script>

</body>

</html>
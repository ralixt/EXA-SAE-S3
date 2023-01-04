<?php
/**
 * @var User $titre
 * @var int $form
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
    <title>Mon Compte</title>

    <link rel='stylesheet' href='../Ressource/css/footer.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/header.css'  type='text/css' media='screen'>
</head>



<body>
    <header>
        <?php include 'header.php' ?>
    </header>
    <main>
        <div class="papaEnTete">
            <h1 class="flou enTete"><?php echo $titre ?></h1>
        </div>

        <form method="post">
            <?php
            if($form === 0){
                echo '<input type="text" name="Pseudo" placeholder="Nouveau Pseudo" maxlength="16" minlength="6" required><br><br>';
                echo '<input name="mdp" type="password" placeholder="Rentrer votre mot de passe" minlength="8" required><br><br>';
                echo '<button class="button" type="submit">'.$titre.'</button>';

            }
            elseif ($form === 1){
                echo '<input name="adr_email" type="email" placeholder="Nouvel Email" required><br><br>';
                echo '<input name="mdp" type="password" placeholder="Rentrer votre mot de passe" minlength="8" required><br><br>';
                echo '<button class="button" type="submit">'.$titre.'</button>';
            }
            elseif ($form === 2){
                echo '<input name="nouveau_mdp" type="password" placeholder="Rentrer le nouveau mot de passe" minlength="8" required><br><br>';
                echo '<input name="confirmation_mdp" type="password" placeholder="Confirmer le nouveau mot de passe" required><br><br>';
                echo '<input name="ancien_mdp" type="password" placeholder="Rentrer votre mot de passe" minlength="8" required><br><br>';
                echo '<button class="button" type="submit">'.$titre.'</button>';
            }
            elseif ($form === 3){
                echo '<h1>Etes-vous sûr de vouloir supprimer votre compte ?</h1>';
                echo '<p>Après avoir rentrer votre mot de passe et cliquer sur valider il sera impossible de récupérer votre compte</p><br>';
                echo '<input name="mdp" type="password" placeholder="Rentrer votre mot de passe pour confirmer" minlength="8" required><br>';
                echo '<a class="button" href="compte">Retour</a><button class="red button" type="submit">Valider</button>';
            }
            ?>
        </form>







    </main>
    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>



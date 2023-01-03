<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel='stylesheet' href='../Ressource/css/compte.css'  type='text/css' media='screen'>
    <link rel='stylesheet' href='../Ressource/css/styles.css'  type='text/css' media='screen'>
    <title>Mon Compte</title>
    <link rel='stylesheet' href='../Ressource/css/footer.css'  type='text/css' media='screen'>
</head>

<header>
    <?php
    if(isset($_SESSION['ids']) && $_SESSION['ids']!=null){
        echo('<a href="http://localhost/login">Changer de compte</a>');
    }
    else{
        header('location : /');
    }
    ?>
    <a href="http://localhost"><?php echo $titre ?></a>
</header>

<body>
    <main>
        <div class="papaEnTete">
            <h1 class="flou enTete"></h1>
        </div>

    </main>
</body>



<?php
    require_once "config.php";
    require_once "variables.php";   
    
    $postData = $_POST;
    

    if (!isset($_POST['message'])){
        echo('Il faut un message pour soumettre le formulaire.');
        return;
    }	

    $nom= $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $message = $_POST['message'];

    $addContactStatement = $pdo->prepare('INSERT INTO contact (nom, prenom, mail, message) VALUES (:nom, :prenom, :mail, :message);');
    $addContactStatement -> execute(['nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'message' => $message ]);


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message envoyé</title>
</head>
<body>
    <h1>Votre message a bien été envoyé</h1>
    <h3>Récapitulatif du message :</h3>
    <p>Nom : <?php echo $nom?></p>
    <p>Prénom : <?php echo $prenom?></p>
    <p>E-mail : <?php echo $mail?></p>
    <p>Message : </p>
    <p><?php echo $message?></p>
</body>
</html>
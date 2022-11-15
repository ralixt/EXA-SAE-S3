<?php
include_once("config.php");

$pseudo=$_POST["Pseudo"];
$email=$_POST["adr_email"];
$createmdp=hash('sha256', $_POST["creation_mp"]);
$confirmationmdp=hash('sha256', $_POST["confirmation_mp"]);
//$date=dateTime();
echo($pseudo);
echo($email);
echo($createmdp);
echo($confirmationmdp);


$ajoutinfo=$pdo->prepare('INSERT INTO user (Pseudo,email,password,role,subscriptionId,hasActiveSubscription) VALUES( :pseudo,:email ,:mp,:role,:subid,:active)');

$ajoutinfo->execute([

'pseudo'=> $pseudo,
'email'=> $email,
'mp'=>$confirmationmdp,
'role'=>"User",
'subid'=>"null",
'active'=>0



]);


header('location:login.php');


?>

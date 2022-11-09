<?php

include_once('config.php');
include_once('variables.php');
include_once('login.php');

$commentaire=$_POST['commentaire'];
$idprojet=$_POST['idprojets'];
$iduser=$_SESSION['ids'];
$note=$_POST['note'];



$commentprojet=$pdo->prepare('INSERT INTO comment (  content,rating , author,projet) VALUES( :commentaire,:note,:user,:projet)');
$commentprojet->execute([


'commentaire'=> $commentaire,
'note'=>$note,
'user'=>$iduser,
'projet'=>$idprojet


]);



header('location:accueil.php');


?>
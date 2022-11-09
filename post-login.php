<?php
include_once("config.php");
session_start();
//$pseudo=$_POST["Pseudo"];
$email=$_POST["adr_email"];
$createmdp=md5($_POST["mp"]);
//$id=$_POST['id'];


$ajoutinfo=$pdo->prepare('SELECT * FROM user where email=:email and password=:mp');

$ajoutinfo->execute([
'email'=>$email,
'mp'=>$createmdp,






]);
/*
if(mysqli_num_rows($ajoutinfo)>0){
    $result=mysqli_fetch_array($ajoutinfo);
   

}
*/
if($ajoutinfo->rowCount() > 0){
    $result=$ajoutinfo->fetchall();
    $_SESSION["ids"]=strval($result[0][0]);
    $_SESSION["Pseudo"]=$result[0][1];
    $_SESSION["email"]=$result[0][2];
    $_SESSION["roles"]=strval($result[0][4]);
   // var_dump($_SESSION["roles"]);

    header('location:accueil.php');
    

}
else{
    header('location:login.php');  
}




//header('location:accueil.php');

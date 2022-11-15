<?php
include 'config.php';
$tab=$_POST['secteur'];




include 'variables.php';


$statusMsg = '';

// File upload path
$targetDir = "image/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

$titre=$_POST["titre"];
$contenu=$_POST["contenu"];

$date=date( "Y-m-d H:i:s");
$URL='url';
if(isset($_SESSION["ids"])and $_SESSION["roles"]=='Premium_User'){
    if($_POST["oui"]=="oui"){
        $ispremium=1;
    }else {
        $ispremium=0;
    }
}
elseif(isset($_SESSION["ids"])&& !($_SESSION["roles"]=='Premium_User' )){
    $ispremium=0;
}
if(isset($_SESSION['ids'])){
$iduser=$_SESSION['ids'];
}

    // Allow certain file formats
    $allowTypes = array('zip,png');
    
        // Upload file to server
        if(isset($_SESSION['ids'])){
            // Insert image file name into database
            $insertprojet = $pdo->prepare("INSERT into projet (createdAt,titre,content,author,status,coverUrl,isPremium ,URL_Image) VALUES (:date,:titre,:content,:author,:status,:coverUrl,:premium,:fichier)");
            $insertprojet->execute([
                'date'=>$date,
                'titre'=>$titre,
                'content'=>$contenu,
                'author'=>$iduser,
                'status'=>'Published',
                'coverUrl'=>$URL,
                'premium'=>$ispremium,
                'fichier'=>$fileName


            ]);

            $selectprojetc=$pdo->prepare('Select id from projet where createdAt=:date and titre=:titre and content=:content and author=:author and status=:status and coverUrl=:coverUrl and isPremium=:premium  and URL_Image=:fichier');
            $selectprojetc->execute([
                'date'=>$date,
                'titre'=>$titre,
                'content'=>$contenu,
                'author'=>$iduser,
                'status'=>'Published',
                'coverUrl'=>$URL,
                'premium'=>$ispremium,
                'fichier'=>$fileName
            ]);
            $projet=$selectprojetc->fetchall();

           
          
            for($i=0;$i<count($tab);$i++){
            $insertTag = $pdo->prepare("INSERT into projet_tag (id_projet,id_tag) VALUES (:projet,:tag)");
            $insertTag->execute([
                'projet'=>$projet[0][0],
                'tag'=>$tab[$i]
            ]);
            header('location:accueil.php');
            }
        }else{
            header('location:login.php');
        }
// Display status message

?>
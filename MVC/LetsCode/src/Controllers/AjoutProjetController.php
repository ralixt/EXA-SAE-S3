<?php
const __PROJECT_ROOT__ = __DIR__;

require_once __PROJECT_ROOT__ . "/AbstractController.php";

class AjoutProjetController extends AbstractController
{


    public function render(): void
    {
        $serviceProjet=DatabaseProjectProjectService::getInstance();
        $projet=new Projet();
        // TODO: Implement render() method.

         $titre=null;
         $content=null;
         $file=null;

        $secteur=null;;
        $ispremium=null;
        $author=null;

        $secteur=null;
        if(isset($_POST["titre"])){
            $titre=$_POST["titre"];
        }
        if(isset($_POST["contenu"])){
            $content=$_POST["contenu"];
        }
        if(isset($_POST["file"])) {
            $file = $_POST["file"];
        }
        if(isset($_POST["secteur"])){
            $secteur=$_POST["secteur"];
        }
        if(isset($_POST["oui"])){
            $ispremium=$_POST["oui"];
        }
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
        $statusMsg = '';

// File upload path
        if(isset($_POST["file"])) {
            $targetDir = "image/";
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowTypes = array('zip,png');
        }
        if(isset($_SESSION["ids"])){
            $author=$_SESSION["nom"];
        }

        $projet->setContent($content)
            ->setPremium($ispremium)
            ->setTitre($titre)
            ->setAuthor($author)
            ->setURLImage($fileName)
            
        ;

        $serviceProjet->create($projet);


        //commentaire

        $serviceCommmentaire=CommentaireService::getInstance();
        $commentaire=new Commentaire();

        $contenu=null;
        $rating=null;
        $iduser=null;
        $projet=null;
        $Pseudo=null;

        if(isset($_POST["commentaire"])){
            $contenu=$_POST["commentaire"];
        }
        if(isset($_POST["note"])){
            $rating=$_POST["note"];
        }
        if(isset($_SESSION["ids"])){
            $iduser=$_SESSION["ids"];
        }
        if(isset($_GET["id"])){
            $projet=$_GET["id"];
        }
        if(isset($_SESSION["Pseudo"])){
            $Pseudo=$_SESSION["Pseudo"];
        }

        $commentaire->setContent($contenu);
        $commentaire->setRating($rating);
        $commentaire->setAuthor($iduser);
        $commentaire->setProjet($projet);
        $commentaire->setPseudo($Pseudo);


        $serviceCommmentaire->create($commentaire);







    }
}
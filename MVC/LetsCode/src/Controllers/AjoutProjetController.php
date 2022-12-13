<?php



class AjoutProjetController extends AbstractController
{
    public function render(): void
    {
        if(isset($_POST["titre"])){
            $titre = isset($_POST["titre"]) ? $_POST["titre"] : null;
            $content = isset($_POST["content"]) ? $_POST["titre"] : null;
            $tags=[];
            if(isset($_POST["tags"])){
                foreach($_POST["tags"] as $tag){
                    $tags[] = (new tag())
                    ->setId($tag);
                }
            }
            $isPremium = isset($_POST["isPremium"]) && $_SESSION["roles"]=='Premium_User'? $_POST["isPremium"] : 0;
            $author = $_SESSION["nom"];
            $imagesNames = [];
            if(isset($_FILES["images"])){
                $path = __PROJECT_ROOT__ . "/Ressources/" . ($this->Service->getLastId()+1) . "/images";
                is_dir($path)? "" : mkdir($path);
                $countfiles = count($_FILES['images']['name']);
                for($i=0;$i<$countfiles;$i++){
                    $filename = $_FILES['images']['name'][$i];
                    $imagesNames[] = $filename;
                    // Upload file
                    move_uploaded_file($_FILES['images']['tmp_name'][$i],$path . "/" . $filename);
                }
            }
            $zipName = null;
            if(isset($_FILES["zip"])){
                $path = __PROJECT_ROOT__ . "/Ressources/" . ($this->Service->getLastId()+1) . "/zip";
                is_dir($path)? "" : mkdir($path);
                $zipName = $_FILES['zip']['name'];
                move_uploaded_file($_FILES['zip']['tmp_name'],$path . "/" . $_FILES['zip']['name']);
            }
            $status = "Reviewing";



            header("location:http://localhost/");






//            $projet=new Projet();
//            // TODO: Implement render() method.
//
//            $titre=null;
//            $content=null;
//            $ispremium=0;
//            $author=null;
//            $tags = [];
//
//            if(isset($_POST["file"])) {
//                $targetDir = "image/";
//                $fileName = basename($_FILES["file"]["name"]);
//                $targetFilePath = $targetDir . $fileName;
//                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
//                $allowTypes = array('zip,png');
//            }
//
//            if(isset($_POST["contenu"])) {
//                $projet->setContent($content)
//                    ->setPremium($ispremium)
//                    ->setTitre($titre)
//                    ->setAuthor($author)
//                    ->setURLImage($fileName);
//                $this->Service->create($projet);
//            }
//            header("location:http://localhost/");
        }
        else{
            echo get_template(__PROJECT_ROOT__ . "/View/CreationProjet.php", [
                "tags"=>$this->Service->getTags()
            ]);
        }

    }
}
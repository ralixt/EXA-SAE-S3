<?php
class AjoutProjetController extends AbstractController
{
    public function render(): void
    {
//        if(!isset($_SESSION["nom"])){
//            header("location: http://localhost/");
//        }
        var_dump($_POST);
        if(isset($_POST["titre"]) && isset($_POST["contenu"])){
            $projet = new Projet();

            $titre = $_POST["titre"];
            $projet->setTitre($titre);

            $content = $_POST["contenu"];
            $projet->setContent($content);

            $tags=[];
            if(isset($_POST["tags"])){
                foreach($_POST["tags"] as $tag){
                    $tags[] = (new tag())
                    ->setId($tag);
                }
                $projet->setTags($tags);
            }

            $difficulte = $_POST["difficulte"] ?? "debutant";
            $projet->setDifficulte($difficulte);



            //$isPremium = isset($_POST["isPremium"]) && $_SESSION["roles"]=='Premium_User'? $_POST["isPremium"] : 0;
            $isPremium = 0;
            $projet -> setPremium($isPremium);

            $author = 11;
            $projet -> setAuthorID($author);


            $imagesNames = [];
            if(isset($_FILES["images"]) && empty($_FILES["images"])){
                !is_dir(__PROJECT_ROOT__ . "/RessourcesProject") ? mkdir(__PROJECT_ROOT__ . "/RessourcesProject") : null;
                !is_dir(__PROJECT_ROOT__ . "/RessourcesProject/" . ($this->Service->getLastId()+1)) ? mkdir(__PROJECT_ROOT__ . "/RessourcesProject/" . ($this->Service->getLastId()+1)): null;
                $path = __PROJECT_ROOT__ . "/RessourcesProject/" . ($this->Service->getLastId()+1) . "/images";
                mkdir($path);
                $countfiles = count($_FILES['images']['name']);
                for($i=0;$i<$countfiles;$i++){
                    $filename = $_FILES['images']['name'][$i];
                    $imagesNames[] = $filename;
                    // Upload file
                    move_uploaded_file($_FILES['images']['tmp_name'][$i],$path . "/" . $filename);
                }
                $projet -> setURLImage($imagesNames);
            }


            $zipName = null;
            if(isset($_FILES["zip"]) && empty($_FILES["images"])){
                !is_dir(__PROJECT_ROOT__ . "/RessourcesProject") ? mkdir(__PROJECT_ROOT__ . "/RessourcesProject") : null;
                !is_dir(__PROJECT_ROOT__ . "/RessourcesProject/" . ($this->Service->getLastId()+1)) ? mkdir(__PROJECT_ROOT__ . "/RessourcesProject/" . ($this->Service->getLastId()+1)): null;
                $path = __PROJECT_ROOT__ . "/RessourcesProject/" . ($this->Service->getLastId()+1) . "/zip";
                is_dir($path)? "" : mkdir($path);
                $zipName = $_FILES['zip']['name'];
                move_uploaded_file($_FILES['zip']['tmp_name'],$path . "/" . $_FILES['zip']['name']);
                $projet->setURLZIP($zipName);
            }


            $status = "Reviewing";
            $projet -> setStatus($status);

            $this->Service->create($projet);
            header("location:http://localhost/");
        }
        else{
            echo get_template(__PROJECT_ROOT__ . "/View/CreationProjet.php", [
            ]);
        }

    }
}
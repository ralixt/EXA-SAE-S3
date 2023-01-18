<?php
class AjoutProjetController extends AbstractController
{
    public function render(): void
    {
        if(!isset($_SESSION["ids"])){
            header("location: http://localhost/login");
        }
        else if(isset($_POST["titre"]) && isset($_POST["contenu"])){
            $projet = new Projet();

            $projet -> setId($this->Service->getLastId()+1);
            $projet->setTitre($_POST["titre"]);

            $projet->setContent($_POST["contenu"]);

            $tags=[];
            if(isset($_POST["tag"])){
                foreach($_POST["tag"] as $tag){
                    $tags[] = (new tag())
                    ->setId($tag);
                }
                $projet->setTags($tags);
            }

            $difficulte = $_POST["difficulte"];
            $projet->setDifficulte($difficulte);



            $isPremium = isset($_POST["isPremium"]) && $_SESSION["roles"]=='Premium_User'? $_POST["isPremium"] : 0;
            $projet -> setPremium($isPremium);

            $author = $_SESSION['ids'];
            $projet -> setAuthorID($author);


            $imagesNames = [];
            if(isset($_FILES["images"]) && !empty($_FILES["images"])){
                !is_dir(__PROJECT_ROOT__ . "/RessourcesProject") ?
                    mkdir(__PROJECT_ROOT__ . "/RessourcesProject") : null;
                !is_dir(__PROJECT_ROOT__ . "/RessourcesProject/" . ($projet->getId())) ?
                    mkdir(__PROJECT_ROOT__ . "/RessourcesProject/" . ($projet->getId())): null;
                !is_dir(__PROJECT_ROOT__ . "/RessourcesProject/" . ($projet->getId()). "/images") ?
                    mkdir(__PROJECT_ROOT__ . "/RessourcesProject/" . ($projet->getId()) . "/images"): null;
                $path = __PROJECT_ROOT__ . "/RessourcesProject/" . ($projet->getId()) . "/images";
                $countfiles = count($_FILES['images']['name']);
                for($i=0;$i<$countfiles;$i++){
                    $filename = str_replace(' ','',$_FILES['images']['name'][$i]);
                    $imagesNames[] = $filename;
                    // Upload file
                    move_uploaded_file($_FILES['images']['tmp_name'][$i],$path . "/" . str_replace(' ','',$filename));
                }
                $projet -> setURLImage(str_replace(' ','',$imagesNames));
            }


            $zipName = null;
            if(isset($_FILES["zip"]) && !empty($_FILES["zip"])){
                !is_dir(__PROJECT_ROOT__ . "/RessourcesProject") ?
                    mkdir(__PROJECT_ROOT__ . "/RessourcesProject") : null;
                !is_dir(__PROJECT_ROOT__ . "/RessourcesProject/" . ($projet->getId())) ?
                    mkdir(__PROJECT_ROOT__ . "/RessourcesProject/" . ($projet->getId())): null;
                !is_dir(__PROJECT_ROOT__ . "/RessourcesProject/" . ($projet->getId()) . "/zip") ?
                    mkdir(__PROJECT_ROOT__ . "/RessourcesProject/" . ($projet->getId()) . "/zip"): null;
                $path = __PROJECT_ROOT__ . "/RessourcesProject/" . ($projet->getId()) . "/zip";
                $zipName = str_replace(' ', '', $_FILES['zip']['name']);
                move_uploaded_file($_FILES['zip']['tmp_name'],$path . "/" .  str_replace(' ', '', $_FILES['zip']['name']));
                $projet->setURLZIP(str_replace(' ', '', $zipName));
            }
            $projet -> setStatus("Reviewing");

            $this->Service->create($projet);
           header("location:http://localhost/");
        }
        else{
            echo get_template(__PROJECT_ROOT__ . "/View/CreationProjet.php", [
            ]);
        }

    }
}
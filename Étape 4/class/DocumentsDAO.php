<!--
    Auteur: Mael Mane
    Date de créaton: 16/11/2022
    Dernière modifcation: 14/12/2022
-->
<?php
    
    include_once ('Document.class.php');
    include_once ('../config/connexionBD.php');

    class DocumentsDAO{

        public static function getTousLesNomsDocuments(){
            try{
                $user_name = $_SESSION['username'];
                $listeDocuments =  array();
                $req = "SELECT titre FROM documents WHERE auteur = '$user_name'";
                $cnx = Database::getConnexion();
                $resultat = $cnx->query($req);
                
                foreach($listeDocuments as $row){
                    $document = new Document();
                    $document->setTitre($row['titre']);
                    array_push($listeDocuments,$document);
                }
                $resultat->closeCursor();
                return $listeDocuments;
            }catch(PDOException $e){
                print "Erreur!: " . $e->getMessage() . "<br/>";
		        return $listeDocuments;
            }
        }

        public static function find($titreDocument){
            $bd = Database::getConnexion();
            $stmt = $bd->prepare("SELECT * FROM files WHERE titre = :x");
            $stmt->execute(array(':x' => $titreDocument));

            $resultat = $stmt->fetch(PDO::FETCH_OBJ);

            if($resultat){
                $document = new Document();
                $document->setTitre($resultat->VALEUR);
                $stmt->closeCursor();
                return $document->getTitre();
            }
            $stmt->closeCursor();
            return null;
        }
    }
?>
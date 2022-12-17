<!--
    Auteur: Mael Mane
    Date de créaton: 16/11/2022
    Dernière modifcation: 15/12/2022
    Modifié par : Lesly Gourdet
-->
<?php

    include_once ('ConnexionBD.class.php');
    include_once ('../modele/classes/Document.class.php');

    class DocumentsDAO{

        public static function getTousLesNomsDocuments(){
            try{
                $listeDocuments =  array();
                $req = "SELECT * FROM files";
                $cnx = ConnexionBD::getConnexion();
                $resultat = $cnx->query($req);
                
                foreach($resultat as $row){ // Ici c'est $résultat et non pas $listeDocuments
                    $document = new Document();
                    $document->setTitre($row['titre']);
                    $document->setAuteur($row['auteur']);
                    $document->setStatut($row['statut']);
                    array_push($listeDocuments,$document);
                }
                $resultat->closeCursor();
                ConnexionBD::close(); // Fermer la connexion à la BD après la recherche
                return $listeDocuments;
            }catch(PDOException $e){
                print "Erreur!: " . $e->getMessage() . "<br/>";
		        return $listeDocuments;
            }
        }

        public static function getTousLesDocumentsPublics(){
            try{
                $listeDocuments =  array();
                $req = "SELECT * FROM files WHERE statut = 'public'";
                $cnx = ConnexionBD::getConnexion();
                $resultat = $cnx->query($req);
                
                foreach($resultat as $row){
                    $document = new Document();
                    $document->setTitre($row['titre']);
                    $document->setNbLike($row['nbLike']);
                    $document->setAuteur($row['auteur']);
                    array_push($listeDocuments,$document);
                }
                $resultat->closeCursor();
                ConnexionBD::close();
                return $listeDocuments;
            }catch(PDOException $e){
                print "Erreur!: " . $e->getMessage() . "<br/>";
		        return $listeDocuments;
            }
        }

        public static function find($titreDocument){
            $bd = ConnexionBD::getConnexion();
            $stmt = $bd->prepare("SELECT * FROM files WHERE titre = :x");
            $stmt->execute(array(':x' => $titreDocument));

            $resultat = $stmt->fetch(PDO::FETCH_OBJ);

            if($resultat){
                $document = new Document();
                $document->setTitre($resultat->titre); // pas $resultat->VALEUR
                $stmt->closeCursor();
                return $document; // pas besoin de ->setTitre()
            }
            $stmt->closeCursor();
            ConnexionBD::close();
            return null;
        }
    }
?>
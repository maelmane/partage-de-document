<!--
    Auteur: Lesly Gourdet
    Date de créaton: 16/11/2022
    Dernière modifcation: 15/12/2022
    Modifié par : Lesly Gourdet
-->
<?php
    include_once ('ConnexionBD.class.php');
    include_once ('../modele/classes/Files.class.php');

    class FilesDAO{

        public static function getTousLesFiles(){
            try{
                $listeFiles = array();
                $cnx = ConnexionBD::getConnexion();
                $req = "SELECT * FROM files";
                $resultat = $cnx->query($req);
                
                foreach($resultat as $row){ // Ici c'est $résultat et non pas $listeDocuments
                    $file = new Files();
                    $file->setTitre($row['titre']);
                    $file->setAuteur($row['auteur']);
                    $file->setStatut($row['statut']);
                    array_push($listeFiles,$file);
                }
                $resultat->closeCursor();
                ConnexionBD::close(); // Fermer la connexion à la BD après la recherche
                return $listeFiles;
            }catch(PDOException $e){
                print "Erreur!: " . $e->getMessage() . "<br/>";
		        return $listeFiles;
            }
        }

        public static function getTousLesFilesPublics(){
            try{
                $listeFiles = array();
                $cnx = ConnexionBD::getConnexion();
                $req = "SELECT * FROM files WHERE statut = 'public'";
                $resultat = $cnx->query($req);
                
                foreach($resultat as $row){
                    $file = new Files();
                    $file->setTitre($row['titre']);
                    $file->setNbLike($row['nbLike']);
                    $file->setAuteur($row['auteur']);
                    array_push($listeFiles,$file);
                }
                $resultat->closeCursor();
                ConnexionBD::close();
                return $listeFiles;
            }catch(PDOException $e){
                print "Erreur!: " . $e->getMessage() . "<br/>";
		        return $listeFiles;
            }
        }

        public static function findFile($titreFile){
            try
            {
                $file=null;
                $bd = ConnexionBD::getConnexion();
                $req = $bd->prepare("SELECT * FROM files WHERE titre = :x");
                $req = bindParam(":x", $titreFile);
                $req->execute();

                $resultat = $req->fetch(PDO::FETCH_OBJ);

                if($resultat){
                    $file = new Files($resultat['titre']);
                }
                $req->closeCursor();
                ConnexionBD::close();
                return $file; // pas besoin de ->setTitre()
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }
        }

        public static function insertFile($titreFile){
            try
            {
                $file=null;
                $bd = ConnexionBD::getConnexion();
                $req =  $bd->prepare ("INSERT INTO files (id, titre, auteur, date, statut, nbLike) VALUES (:i, :t, :a, :d, :s, :n)");
                
                $id=$titreFile->getId();
                $tit=$titreFile->getTitre();
                $aut=$titreFile->setAuteur();
                $dat=$titreFile->getDate();
                $stat=$titreFile->getStatut();
                $nb=$titreFile->getnbLike();

                $req = bindParam(":i", $id);
                $req = bindParam(":t", $tit);
                $req = bindParam(":a", $aut);
                $req = bindParam(":d", $dat);
                $req = bindParam(":s", $stat);
                $req = bindParam(":n", $nb);
                return $req->execute();

            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }
        }

        public static function updateFile($titreFile){
            try
            {
            
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }
        }

        public static function deleteFile($titreFile){
            try
            {
                $bd = ConnexionBD::getConnexion();
                $req = $bd->prepare("SELECT * FROM files WHERE titre = :x");
                $req = bindParam(":x", $titreFile);
                $req->execute();

                $resultat = $req->fetch(PDO::FETCH_OBJ);

                if($resultat){
                    $location = "upload/".$file_name;
                    if(file_exists($location)){
	                    $delete  = unlink($location);
	                if($delete){
		                echo "delete réussi";
	                }else{
	                    echo "delete pas réussi";
	                }
                    }
                }
                $req->closeCursor();
                ConnexionBD::close();
                return $file; // pas besoin de ->setTitre()
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }
        }
    }
?>
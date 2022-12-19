<!--
    Auteur: Lesly Gourdet
    Date de créaton: 15/12/2022
    Dernière modifcation: 15/12/2022
    Modifié par : Lesly Gourdet
-->
<?php

    include_once ('ConnexionBD.class.php');
    include_once ('../modele/classes/Relation.class.php');

    class RelationDAO{

        public static function getTousLesRelations(){
            try{
                $listeRelation =  array();
                $cnx = ConnexionBD::getConnexion();
                $req = "SELECT * FROM relation";
                $resultat = $cnx->query($req);
                
                foreach($resultat as $row){
                    $relation = new Relation();
                    $relation->setSender($row['sender']);
                    $relation->setReceiver($row['receiver']);
                    $relation->setStatut($row['statut']);
                    array_push($listeRelation,$relation);
                }
                $resultat->closeCursor();
                ConnexionBD::close();
                return $listeRelation;
            }catch(PDOException $e){
                print "Erreur!: " . $e->getMessage() . "<br/>";
		        return $listeRelation;
            }
        }

        public static function getTousLesRelationsPending(){
            try{
                $listeRelation =  array();
                $cnx = ConnexionBD::getConnexion();
                $req = "SELECT * FROM relation WHERE statut = 'P'";
                $resultat = $cnx->query($req);
                
                foreach($resultat as $row){
                    $relation = new Relation();
                    $relation->setSender($row['sender']);
                    $relation->setReceiver($row['receiver']);
                    $relation->setStatut($row['statut']);
                    array_push($listeRelation,$relation);
                }
                $resultat->closeCursor();
                ConnexionBD::close();
                return $listeRelation;
            }catch(PDOException $e){
                print "Erreur!: " . $e->getMessage() . "<br/>";
		        return $listeRelation;
            }
        }

        public static function getTousLesRelationsFriend(){
            try{
                $listeRelation =  array();
                $cnx = ConnexionBD::getConnexion();
                $req = "SELECT * FROM relation WHERE statut = 'F'";
                $resultat = $cnx->query($req);
                
                foreach($resultat as $row){
                    $relation = new Relation();
                    $relation->setSender($row['sender']);
                    $relation->setReceiver($row['receiver']);
                    $relation->setStatut($row['statut']);
                    array_push($listeRelation,$relation);
                }
                $resultat->closeCursor();
                ConnexionBD::close();
                return $listeRelation;
            }catch(PDOException $e){
                print "Erreur!: " . $e->getMessage() . "<br/>";
		        return $listeRelation;
            }
        }

        public static function findRelation($laRelation){
            try
            {
                $relation=null;
                $bd = ConnexionBD::getConnexion();
                $req = $bd->prepare("SELECT * FROM relation WHERE sender = :x");
                $req = bindParam(":x", $laRelation);
                $req->execute();

                $resultat = $req->fetch(PDO::FETCH_OBJ);

                if($resultat){
                    $relation = new Relation($resultat['sender'],$resultat['statut']);
                }
                $req->closeCursor();
                ConnexionBD::close();
                return $relation;
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }
        }
    }
?>
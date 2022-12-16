<!--
    Auteur: Lesly Gourdet
    Date de créaton: 15/12/2022
    Dernière modifcation: 15/12/2022
    Modifié par : Lesly Gourdet
-->
<?php

    include_once ('ConnexionBD.class.php');
    include_once ('../modele/classes/User.class.php');

    class DocumentsDAO{

        public static function getTousLesNomsUsers(){
            try{
                $listeUsers =  array();
                $req = "SELECT * FROM users";
                $cnx = ConnexionBD::getConnexion();
                $resultat = $cnx->query($req);
                
                foreach($resultat as $row){
                    $user = new Document();
                    $user->setUsername($row['username']);
                    $user->setPassword($row['password']);
                    array_push($listeUsers,$user);
                }
                $resultat->closeCursor();
                ConnexionBD::close();
                return $listeUsers;
            }catch(PDOException $e){
                print "Erreur!: " . $e->getMessage() . "<br/>";
		        return $listeUsers;
            }
        }

        public static function findUser($nomUser){
            $bd = ConnexionBD::getConnexion();
            $stmt = $bd->prepare("SELECT * FROM users WHERE username = :x");
            $stmt->execute(array(':x' => $nomUser));

            $resultat = $stmt->fetch(PDO::FETCH_OBJ);

            if($resultat){
                $user = new Document();
                $user->setUsername($resultat->username);
                $stmt->closeCursor();
                return $user;
            }
            $stmt->closeCursor();
            ConnexionBD::close();
            return null;
        }

        
    }
?>
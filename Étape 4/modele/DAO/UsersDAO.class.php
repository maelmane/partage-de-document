<!--
    Auteur: Lesly Gourdet
    Date de créaton: 15/12/2022
    Dernière modifcation: 15/12/2022
    Modifié par : Lesly Gourdet
-->
<?php
    
    include_once ('ConnexionBD.class.php');
    include_once ('../modele/classes/Users.class.php');

    class UsersDAO{

        public static function getTousLesUsers(){
            try{
                $listeUsers =  array();
                $cnx = ConnexionBD::getConnexion();
                $req = "SELECT * FROM users";
                $resultat = $cnx->query($req);
                
                foreach($resultat as $row){
                    $user = new Users();
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
            try
            {
                $user=null;
                $bd = ConnexionBD::getConnexion();
                $req = $bd->prepare("SELECT * FROM users WHERE username = :x");
                $req = bindParam(":x", $nomUser);
                $req->execute();

                $resultat = $req->fetch(PDO::FETCH_OBJ);

                if($resultat){
                    $user = new Users($resultat['username']);
                }
                $req->closeCursor();
                ConnexionBD::close();
                return $user;
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            } 
        }
    }
?>
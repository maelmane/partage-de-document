<!--
    Auteur: Lesly Gourdet
    Date de créaton: 10/11/2022
    Dernière modifcation: 18/12/2022
    Modifié par: Lesly Gourdet
-->

<?php
  session_start();
  $user_name = $_SESSION['username'];

  require_once ('../modele/DAO/ConnexionBD.class.php');
  require_once ('../modele/classes/Files.class.php');
  require_once ('../modele/DAO/FilesDAO.class.php');
  $daoF = new FilesDAO();

  $cnx=ConnexionBD::getConnexion();
    public static function deleteFile($titreFile){
        try
        {
            $file_name = $_POST['file_name'];
            $location = "upload/".$file_name;
            if(file_exists($location)){
                $delete  = unlink($location);
            if($delete){
                echo "delete réussi";
            }else{
               echo "delete pas réussi";
            }
            }
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
    }
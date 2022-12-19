<!--
    Auteur: Lesly Gourdet
    Date de créaton: 18/12/2022
    Dernière modifcation: 19/12/2022
    Modifié par: Mael Mane
-->

<?php
  session_start();
  $user_name = $_SESSION['username'];

  require_once '../modele/config/dbConfig.php';


  try{
      $errors= array();
      $titreMod = $_POST['fileName'];
      $param_username = $param_filename = "";
      
      
      $param_filename = trim($titreMod);
      $param_username = trim($user_name);

        if(empty($errors)==true){
          $req = "DELETE FROM files where titre= '$titreMod' AND auteur = '$user_name'";
          if($res = $cnx->prepare($req)){
            $res->bindParam($titreMod, $param_filename, PDO::PARAM_STR);
            $res->bindParam($user_name, $param_username, PDO::PARAM_STR);
            
            $param_filename = $titreMod;
            $param_username = $user_name; 
          }
          
          if($res->execute()){
            header("location: ../vue/vueCompte.php");
          }else{
            echo "Erreur";
          }
        }else{
          print_r($errors);
        }
        
      
    }catch (PDOException $e){
    print "Erreur!: " . $e->getMessage() . "<br/>";
    die();
  }

?>

  
<!--
    Auteur: Mael Mane
    Date de créaton: 10/12/2022
    Dernière modifcation: 14/12/2022
    Modifié par: Mael Mane
-->
<?php
  session_start();
  $user_name = $_SESSION['username'];

  require_once '../config/dbConfig.php';

  $cnx=ConnexionBD::getConnexion();
  try{
    if(isset($_FILES['file'])){
      $errors= array();
      $file_name = $_FILES['file']['name'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      $file_content = file_get_contents($_FILES['file']);

      $titreMod = $_POST['titreFile'];
      $file_visibility = $_POST['visibilite'];

      $param_username = $param_filename = "";
      
      $param_username = trim($user_name);
      $param_filename = trim($file_name);
      if($titreMod==""){
        echo ("<script>
                window.alert('Vous devez entrer le nom du fichier à modifier');
                window.location.href='../vue/vueCompte.php';
              </script>");
      }else{
        if(empty($errors)==true){
<<<<<<< HEAD
          move_uploaded_file($file_tmp,"uploads/".$file_name);
=======
          //move_uploaded_file($file_tmp,"uploads/".$file_name);
>>>>>>> 0619bd099c267e639247e04a8fbafea387eb7587
          $req = "UPDATE files set titre = '$file_name', statut='$file_visibility' where titre = '$titreMod'";
          if($res = $cnx->prepare($req)){
            $res->bindParam($user_name, $param_username, PDO::PARAM_STR);
            $res->bindParam($file_name, $param_filename, PDO::PARAM_STR);
            
            $param_filename = $file_name;
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
      }  
      
    }
  }catch (PDOException $e){
    print "Erreur!: " . $e->getMessage() . "<br/>";
    die();
  }
?>
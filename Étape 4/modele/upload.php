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
  try{
    if(isset($_FILES['file'])){
      $errors= array();
      $file_name = $_FILES['file']['name'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      $file_content = file_get_contents($_FILES['file']);
      $file_visibility = $_POST['visibilite'];

      $param_username = $param_filename = "";
      
      $param_username = trim($user_name);
      $param_filename = trim($file_name);
        
      if(empty($errors)==true){
        move_uploaded_file($file_tmp,"uploads/".$file_name);
        $req = "INSERT INTO files (titre, auteur, statut) VALUES ('$file_name', '$user_name', '$file_visibility')";
        if($res = $cnx->prepare($req)){
          $res->bindParam($user_name, $param_username, PDO::PARAM_STR);
          $res->bindParam($file_name, $param_filename, PDO::PARAM_STR);
          
          $param_filename = $file_name;
          $param_username = $user_name;
        }
        
        if($res->execute()){
          header("location: ../vue/vueCompte.php");
        }else{
          echo "Error";
        }
      }else{
        print_r($errors);
      }
    }
  }catch (PDOException $e){
    print "Erreur!: " . $e->getMessage() . "<br/>";
    die();
  }
?>
<!--
    Auteur: Lesly Gourdet
    Date de créaton: 18/12/2022
    Dernière modifcation: 18/12/2022
    Modifié par: Mael Mane
-->

<?php
  session_start();
  $user_name = $_SESSION['username'];

  require_once '../modele/config/dbConfig.php';


  try{
    if(isset($_FILES['file'])){
      $errors= array();
      //$file_name = $_FILES['file']['name'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      //$file_content = file_get_contents($_FILES['file']);

      $titreMod = $_POST['titreFile'];
      

      $param_filename = "";
      
      
      $param_filename = trim($titreMod);
      if($titreMod==""){
        echo ("<script>
                window.alert('Vous devez entrer le nom du fichier à modifier');
                window.location.href='../vue/vueCompte.php';
              </script>");
      }else{
        if(empty($errors)==true){
          $req = "DELETE FROM fies where titre= '$titreMod'";
          if($res = $cnx->prepare($req)){
            $res->bindParam($titreMod, $param_filename, PDO::PARAM_STR);
            
            $param_filename = $titreMod;
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

  
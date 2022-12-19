<!--
    Auteur: Mael Mane
    Date de créaton: 18/12/2022
    Dernière modifcation: 18/12/2022
    Modifié par: Mael Mane
-->
<?php
    require_once ('../modele/DAO/ConnexionBD.class.php');

    $cnx=ConnexionBD::getConnexion();
    $nbLike = $_POST['nbLike'];
    $file_name = $_POST['fileName'];

    $param_fileName = "";
    $param_filename = trim($file_name);

    try{
        //$req = "SELECT * FROM files where titre = $fileName";
        //$res = $cnx->query($req);
        //foreach($res as $r){
        //    $likeIni = $r['nbLike'];
        //}

        $newNbLike = $nbLike + 1;
        $req = "UPDATE files SET nbLike = '$newNbLike' WHERE titre = '$file_name'";
        if ($res = $cnx->prepare($req)){
            $res->bindParam($file_name, $param_filename, PDO::PARAM_STR);

            $param_filename = $file_name;
        }
        if($res->execute()){
            header("location: ../vue/vueDocPub.php");
          }else{
            echo "Erreur";
          }
    }catch(PDOException $e){

    }
?>
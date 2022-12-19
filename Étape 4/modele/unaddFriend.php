<!--
    Auteur: Mael Mane
    Date de créaton: 17/12/2022
    Dernière modifcation: 17/12/2022
    Modifié par: Mael Mane
-->

<?php
    session_start();
    require_once ('../modele/DAO/ConnexionBD.class.php');

    $cnx=ConnexionBD::getConnexion();
    $user_name = $_SESSION['username'];
    $friendName = $_POST['profileName'];
    $param_friendname = $param_username = "";

    try{
        if(isset($friendName)){

            $param_friendname = trim($friendName);
            $param_username = trim($user_name);
            $req = "DELETE FROM relation where ((sender='$friendName' AND receiver='$user_name') OR (sender='$user_name' AND receiver='$friendName'))";
            if($res = $cnx->prepare($req)){
                $res->bindParam($user_name, $param_username, PDO::PARAM_STR);
                $res->bindParam($friendName, $param_friendname, PDO::PARAM_STR);
                
                $param_friendname = $friendName;
                $param_username = $user_name;
            }

            if($res->execute()){
                header("location: ../vue/vueCompte.php");
            }else{
                echo "Error";
            }
        }

    }catch(PDOException $e){

    }
?>
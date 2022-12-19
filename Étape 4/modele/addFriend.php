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
        //Vérifier le statut de la relation entre l'utilisateur connecté et celui de la page profile
        $query = "SELECT statut FROM relation WHERE ((sender='$friendName' AND receiver='$user_name') OR (sender='$user_name' AND receiver='$friendName'))";
        $res = $cnx->query($query);
        $statut = "";
        foreach($res as $row){
            $statut = $row['statut'];
        }
        
        //Si aucune relation insérer une nouvelle relation dans la BD
        if($statut == ""){
            $req = "INSERT INTO relation (sender, receiver, statut) VALUES ('$user_name', '$friendName', 'P')";
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
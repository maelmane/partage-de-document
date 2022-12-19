<!--
    Auteur: Mael Mane
    Date de créaton: 16/12/2022
    Dernière modifcation: 17/12/2022
    Modifié par: Mael Mane
-->
<?php
    session_start();
    $user_name = "";
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        $user_name = $_SESSION["username"];
    }
    $profileName = $_POST['profileName'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <style><?php include "css/styleProfile.css"?></style>
    <title>PartageDeDocuments</title>
</head>
<body>
    <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            include_once ('../modele/headerConnecte.inc.php');
        }else{
            include_once ('../modele/header.inc.php');
        }
        require_once ('../modele/DAO/ConnexionBD.class.php');
    ?>

    <div class="container mt-3">
        <div class="mt-4 p-5 text-white rounded" id="jumbo">
            <h1 class="text-center">BIENVENUE SUR LE PROFILE DE</h1>
            <h3 class="text-center"><?php echo $profileName ?></h3>
        </div>
        <div class="row">
            <main class="col-6 col-md-9">
                <div id="bouton">
                    <?php
                        $cnx=ConnexionBD::getConnexion();
                        try{
                            //Chercher le statut de la relation entre l'utilisateur connecté et l'utilisateur de la page
                            $query = "SELECT statut FROM relation WHERE ((sender='$profileName' AND receiver='$user_name') OR (sender='$user_name' AND receiver='$profileName'))";
                            $res = $cnx->query($query);
                            $statut = "";
                            foreach($res as $row){
                                $statut = $row['statut'];
                            }

                            if($statut == ""){
                                echo ("<form method='post' action='../modele/addFriend.php'>
                                            <button class='btn btn-primary btnAction' type='submit' title='Add Friend'><i class='bi bi-person-plus'></i></button>
                                            <input type='hidden' name='profileName' value='$profileName'>
                                        </form>");
                            }elseif($statut=="F"){
                                echo ("<form method='post' action='../modele/unaddFriend.php'>
                                            <button title='Unadd Friend' class='btn btn-danger btnAction' type='submit'><i class='bi bi-person-dash'></i></button>
                                            <input type='hidden' name='profileName' value='$profileName'>
                                        </form>");
                            }elseif($statut == "P"){
                                echo ("<form method='post' action='../modele/addPending.php'>
                                            <button class='btn btn-primary btnAction' type='submit title='Add Friend''><i class='bi bi-person-plus'></i></button>
                                            <input type='hidden' name='profileName' value='$profileName'>
                                        </form>");
                            }

                        }catch(PDOException $e){

                        }
                    ?>
                </div>
                <div class="docs">
                        <?php       //AFFICHAGE DES DOCUMENTS DE L'UTILISATEUR
                            try{
                                
                                $req = "SELECT * FROM relation WHERE (sender='$profileName' AND receiver='$user_name' AND statut='F') OR (sender='$user_name' AND receiver='$profileName' AND statut='F')";
                                $res = $cnx->query($req);
                                $friend = "";
                                foreach($res as $row) {
                                    $friend = $row['statut'];
                                }
                                if($friend == "F"){
                                    $requette = "SELECT * FROM files WHERE auteur = '$profileName' AND (statut='public' or statut='protégé')";
                                }else{
                                    $requette = "SELECT * FROM files WHERE auteur = '$profileName' AND statut='public'";
                                }

                                $resultat = $cnx->query($requette);

                                foreach ($resultat as $row){
                                    $fileName = $row['titre'];
                                    echo "<div class='card'>";
                                        echo "<div class='card-body'>";
                                            echo ("<a title='Download' href=../modele/uploads/$fileName download>
                                                    <span class='icon'><button class='btn btnOrange' type='button'><i class='bi bi-cloud-arrow-down'></i></button></span>
                                                  </a>");
                                            echo "<p>".$fileName."</p>";
                                            echo "<a class='hoverName'>".$row["auteur"]."</a>";
                                        echo "</div>";
                                    echo "</div>";
                                }
                                $resultat->closeCursor();
                            } catch (PDOException $e){
                                //print "Erreur!: " . $e->getMessage() . "<br/>";
                                die();
                            } finally {
                                //Fermer la connexion avec la base de données
                            }
                        ?>
                    </div>
            </main>
            <aside class="col-6 col-md-3">
                <h3>Amis</h3>
                <div>
                        <?php   //AFFICHAGE DES AMIS  
                                try{
                                    $requette = "SELECT * FROM relation WHERE (sender = '$profileName' OR receiver ='$profileName') AND statut = 'F'";
                                    $resultat = $cnx->query($requette);
                                    $nomDemande = "";
    
                                    foreach ($resultat as $row){
                                        if($row["sender"]!= $profileName){
                                            $nomDemande = $row["sender"];
                                        }elseif($row["receiver"]!=$profileName){
                                            $nomDemande = $row["receiver"];
                                        }
                                        echo "<div class='card'>";
                                            echo "<div class='card-body'>";
                                                echo ("<form action=vueProfile.php method='post'>
                                                            <input type='hidden' name='profileName' value='$nomDemande'>
                                                            <input type='submit' value='$nomDemande' class='nomProfile'>
                                                        </form>");
                                            echo "</div>";
                                        echo "</div>";

                                    }
                                    $resultat->closeCursor();
                                } catch (PDOException $e){
                                    print "Erreur!: " . $e->getMessage() . "<br/>";
                                    die();
                                }
                        ?>
                        
                    </div>
            </aside>
        </div>
    </div>
</body>
</html>
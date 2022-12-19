<!--
    Auteur: Mael Mane
    Date de créaton: 21/10/2022
    Dernière modifcation: 14/12/2022
    Modifié par: Mael Mane
-->

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
        <style><?php include "css/styleDocPub.css"?></style>
        <title>PartageDeDocuments</title>
    </head>
    <body>
       <?php
            session_start();
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                include_once ('../modele/headerConnecte.inc.php');
            }else{
                include_once ('../modele/header.inc.php');
            }
            require_once ('../modele/DAO/ConnexionBD.class.php');
            require_once ('../modele/classes/Files.class.php');
            require_once ('../modele/DAO/FilesDAO.class.php');
            $daoF = new FilesDAO();
       ?>
        <main>
            <div class="container mt-3">
                <div class="row">
                    <div class="col-6 col-md-9 docs">
                        <?php
                            try{
                                //Insérer les données dans la table compte et l'executer
                                $resultat = $daoF->getTousLesFilesPublics();
                                foreach ($resultat as $row){
                                    $nomDemande = $row->getAuteur();
                                    $nbLike = $row->getNbLike();
                                    $fileName = $row->getTitre();
                                    echo "<div class='card'>";
                                        echo "<div class='card-body'>";
                                            echo "<p>".$fileName."</p>";
                                            echo ("<a title='Download' href=../modele/uploads/$fileName download>
                                                    <span class='icon'><button class='btn btnOrange' type='button'><i class='bi bi-cloud-arrow-down'></i></button></span>
                                                  </a>");
                                            echo ("<form action=vueProfile.php method='post'>
                                                            <input type='hidden' name='profileName' value='$nomDemande'>
                                                            <input type='submit' value='$nomDemande' class='nomProfile'>
                                                    </form>");
                                            echo ("<form action='../modele/likeDoc.php' method='post'>
                                                        <button id='like' type=submit><i class='bi bi-heart'></i></button>
                                                        <span>".$nbLike."</span>
                                                        <input type='hidden' name= 'nbLike' value='$nbLike'>
                                                        <input type='hidden' name= 'fileName' value='$fileName'>
                                                    </form>");
                                        echo "</div>";
                                        echo "<div class='card-footer'>";
                                            echo "<form class='d-flex'>";
                                                echo "<input class='form-control me-2' type='text' placeholder='Écrire un commentaire'>";
                                                echo "<button class='btn btnOrange' type='button'><i class='bi bi-chat-left'></i></button>";
                                            echo "</form>";
                                        echo "</div>";
                                    echo "</div>";
                                }
                                //$resultat->closeCursor();
                            } catch (PDOException $e){
                            print "Erreur!: " . $e->getMessage() . "<br/>";
                            die();
                            } finally {
                                //Fermer la connexion avec la base de données
                                $cnx=null;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
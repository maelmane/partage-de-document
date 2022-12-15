<!--
    Auteur: Mael Mane
    Date de créaton: 19/10/2022
    Dernière modifcation: 14/12/2022
    Modifié par: Mael Mane
-->
<?php
    session_start();
    $user_name = $_SESSION['username'];
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
        <style><?php include "css/styleCompte.css"?></style>
        <script src="../modele/code.js"></script>
        <?php
            //require_once ('../config/connexionBD.php');
            //require_once ('../class/DocumentsDAO.php');
            //$dao = new DocumentsDAO();
        ?>
        <title>ParatgeDeDocuments</title>
    </head>
    <body>
        <?php
            include_once ('../modele/headerConnecte.inc.php');
       ?>
        <div class="container mt-3">
            
            <div class="row">
                <main class="col-6 col-md-9">
                    <article>
                        <h2>Vos Documents</h2>
                        <button class="btn btnOrange" type="button" onclick="openForm()">Ajouter un document <i class="bi bi-cloud-arrow-up"></i></button>
                        <button class="btn btnOrange" type="button" onclick="openFormMod()">Modifier un document <i class="bi bi-cloud-arrow-up"></i></button>
                        
                        <div class="form-popup" id="formDoc">
                            <form action="../modele/upload.php" method="post" enctype="multipart/form-data" class="form-container">
                                <h5 class="text-center">Veuillez choisir un document</h5>
                                <label>Nom du fichier :</label>
                                <input type="text" name="nomFichier" id="nomFichier">
                                <input type="file" name="file" id="file"/>
                                <input type="submit" class="btn btnOrange"/>
                                <button type="button" class="btn btn-danger" onclick="closeForm()">Annuler</button>
                            </form>
                        </div>

                        <div class="form-popup" id="formMod">
                            <form action="../modele/update.php" method="post" enctype="multipart/form-data" class="form-container">
                                <h5 class="text-center">Veuillez choisir un document</h5>
                                <label>Nom du fichier :</label>
                                <input type="text" name="titreFile" id="nomFichier"/>
                                <input type="file" name="file"  id="file"/>
                                <input type="submit" class="btn btnOrange"/>
                                <button type="button" class="btn btn-danger" onclick="closeFormMod()">Annuler</button>
                            </form>
                        </div>

                        <div class="docs">
                            
                            <div class="card">  <!--Une card pour chaque document...??-->
                                <div class="card-body">
                                    <p>NomDocument</p>
                                    <a class="hoverName" href="#">NomUser</a> <!--Faudrait link vers leur profil si possible-->
                                    <div class="dropdown">
                                        <button type="button" class="btn btnOrange dropdown-toggle" data-bs-toggle="dropdown">Visibilité</button>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">Public</a></li>
                                          <li><a class="dropdown-item" href="#">Privé</a></li>
                                          <li><a class="dropdown-item" href="#">Protégé</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <?php       //AFFICHAGE DES DOCUMENTS DE L'UTILISATEUR
                            try{
                                //Établir une connexion avec la base de données 
                                require_once '../config/dbConfig.php';
                                
                                //Insérer les données dans la table compte et l'executer
                                //$requette = "SELECT * FROM documents WHERE auteur = ".$_SESSION['username'];
                                $requette = "SELECT * FROM documents WHERE auteur = '$user_name'";
                                $resultat = $cnx->query($requette);

                                foreach ($resultat as $row){
                                    echo "<div class='card'>";
                                        echo "<div class='card-body'>";
                                            echo "<p>".$row["titre"]."</p>";
                                            echo "<a class='hoverName'>".$row["auteur"]."</a>";
                                        echo "</div>";
                                    echo "</div>";
                                }
                                $resultat->closeCursor();
                            } catch (PDOException $e){
                                print "Erreur!: " . $e->getMessage() . "<br/>";
                                die();
                            } finally {
                                //Fermer la connexion avec la base de données
                                $cnx=null;
                            }
                        ?>
                        </div>
                    </article>
                </main>
                <aside class="col-6 col-md-3">
                    <h3>Demande d'amis</h3>
                    <div>
                        <div class="card">  <!--Une card pour chaque ami...??-->
                            <div class="card-body">
                                <a class="hoverName" href="#">NomUser </a> <!--Faudrait link vers leur profil si possible-->
                                <span class="icon"><i class="bi bi-person-plus" id="addFriend"></i> <i class="bi bi-person-dash" id="removeFriend"></i></span>    <!--bouton ajouter ou refuser demande d'ami-->
                            </div>
                        </div>
                        
                    </div>
                    <h3>Vos Amis</h3>
                    <div>
                        <div class="card">  <!--Une card pour chaque ami...??-->
                            <div class="card-body">
                                <a class="hoverName" href="#">NomUser </a>  <!--Faudrait link vers leur profil si possible-->
                                <span class="icon"><i class="bi bi-person-dash"></i></span>      <!--bouton supprimer ami-->
                            </div>
                        </div>
                        <div class="card">  <!--Une card pour chaque ami...??-->
                            <div class="card-body">
                                <a class="hoverName" href="#">NomUser </a>  <!--Faudrait link vers leur profil si possible-->
                                <span class="icon"><i class="bi bi-person-dash"></i></span>
                            </div>
                        </div>
                        <div class="card">  <!--Une card pour chaque ami...??-->
                            <div class="card-body">
                                <a class="hoverName" href="#">NomUser </a>  <!--Faudrait link vers leur profil si possible-->
                                <span class="icon"><i class="bi bi-person-dash"></i></span>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>        
    </body>
</html>
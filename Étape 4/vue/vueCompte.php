<!--
    Auteur: Mael Mane
    Date de créaton: 19/10/2022
    Dernière modifcation: 15/12/2022
    Modifié par: Lesly Gourdet
-->
<?php
    session_start();
    //$user_name = $_SESSION['username'];
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
        <title>PartageDeDocuments</title>
    </head>
    <body>
        <?php
            include_once ('../modele/headerConnecte.inc.php');
            require_once ('../modele/classes/Document.class.php');
            require_once ('../modele/DAO/DocumentsDAO.class.php');
            $dao = new DocumentsDAO();
       ?>
        <div class="container mt-3">
            
            <div class="row">
                <main class="col-6 col-md-9">
                    <article>
                        <h2>Vos Documents</h2>

                        <button class="btn btnOrange btnAction" type="button" onclick="openForm()">Ajouter un document <i class="bi bi-cloud-arrow-up"></i></button>
                        <button class="btn btnOrange btnAction" type="button" onclick="openFormMod()">Modifier un document</button>
                        
                        <div class="form-popup" id="formDoc">
                            <form action="../modele/upload.php" method="post" enctype="multipart/form-data" class="form-container">
                                <h5 class="text-center">Veuillez choisir un document</h5>
                                <input type="file" name="file" id="file"/>
                                <label for="visibilite">Visibilité: </label>
                                <select name="visibilite" id="visibilite">
                                    <option value="privé">Privé</option>
                                    <option value="protégé">Protégé</option>
                                    <option value="public">Public</option>
                                </select>
                                <input type="submit" class="btn btnOrange"/>
                                <button type="button" class="btn btn-danger" onclick="closeForm()">Annuler</button>
                            </form>
                        </div>

                        <div class="form-popup" id="formMod">
                            <form action="../modele/update.php" method="post" enctype="multipart/form-data" class="form-container">
                                <h5 class="text-center">Veuillez choisir un document</h5>
                                <label>Nom du fichier a modifié:</label>
                                <input type="text" name="titreFile" id="nomFichier"/>
                                <input type="file" name="file"  id="file"/>
                                <label for="visibilite">Visibilité: </label>
                                <select name="visibilite" id="visibilite">
                                    <option value="privé">Privé</option>
                                    <option value="protégé">Protégé</option>
                                    <option value="public">Public</option>
                                </select>
                                <input type="submit" class="btn btnOrange"/>
                                <button type="button" class="btn btn-danger" onclick="closeFormMod()">Annuler</button>
                            </form>
                        </div>

                        <div class="docs">
                            
                            <?php       //AFFICHAGE DES DOCUMENTS DE L'UTILISATEUR
                            try{
                                /*Établir une connexion avec la base de données 
                                include_once ('../modele/DAO/ConnexionBD.class.php');
                                
                                Insérer les données dans la table compte et l'executer
                                $requette = "SELECT * FROM documents WHERE auteur = ".$_SESSION['username'];
                                $requette = "SELECT * FROM documents WHERE auteur = '$user_name'";
                                $resultat = $cnx->query($requette);
                                */
                                $resultat = $dao->getTousLesNomsDocuments();
                                foreach ($resultat as $row){
                                    echo "<div class='card'>";
                                        echo "<div class='card-body'>";
                                            echo "<p>".$row->getTitre()."</p>";
                                            echo "<a class='hoverName'>".$row->getAuteur()."</a>";
                                            echo "<button type='button' class='btn btnOrange' id='vis' onclick='openFormVisi()'>Visibilité</button>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
                                }
                               // $resultat->closeCursor();
                            } catch (PDOException $e){
                                print "Erreur!: " . $e->getMessage() . "<br/>";
                                die();
                            } /*finally {
                                //Fermer la connexion avec la base de données
                                $cnx=null;
                            } */
                        ?>
                        </div>
                        <div class="form-popup" id="visibilite">
                            <form action="" method="post" enctype="multipart/form-data" class="form-container">
                                <h5 class="text-center">Veuillez choisir une option</h5>
                                <p>HELLO</p>
                                <input type="submit" class="btn btnOrange"/>
                                <button type="button" class="btn btn-danger" onclick="closeFormVisi()">Annuler</button>
                            </form>
                        </div>
                    </article>
                </main>
                <aside class="col-6 col-md-3">
                    <h3>Demande d'amis</h3>
                    <form>
                        <input type=text name="nomAmi" placeholder="Rechercher un utilisateur"/>            <!--Ajouter action trouver amis-->
                        <input type="submit" class="btn btnOrange" id="recherche" value="Rechercher">
                    </form>
                    <div>
                        <div class="card">  <!--Une card pour chaque ami...??-->
                            <div class="card-body">
                                <a class="hoverName" href="#">NomUser </a> <!--Faudrait link vers leur profil si possible-->
                                <span class="icon"><i class="bi bi-person-plus" id="addFriend"></i> <i class="bi bi-person-dash" id="removeFriend"></i></span>    <!--bouton ajouter ou refuser demande d'ami-->
                            </div>
                        </div>
                        <?php   //AFFICHAGE DES DEMANDES AMIS           Ajouter bouton pour accepter demande ami
                                try{
                                    //Aller chercher les informations des utilisateur ayant une relation P(ending) avec l'utilisateur connecté
                                    $requette = "SELECT * FROM relation WHERE (sender = '$user_name' OR receiver ='$user_name') AND statut = 'P'";
                                    $resultat = $cnx->query($requette);
                                    $nomDemande = "";
    
                                    foreach ($resultat as $row){
                                        if($row["sender"]!= $user_name){
                                            $nomDemande = $row["sender"];
                                        }elseif($row["receiver"]!=$user_name){
                                            $nomDemande = $row["receiver"];
                                        }
                                        echo "<div class='card'>";
                                            echo "<div class='card-body'>";
                                                echo "<a class='hoverName'>".$nomDemande."</a>";
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
                    <h3>Vos Amis</h3>
                    <div>
                        
                        <?php   //AFFICHAGE DES AMIS DE L'UTILISATEUR       Ajouter bouton pour enlever ami
                                try{
                                    //Aller chercher les informations des utilisateur ayant une relation F(riend) avec l'utilisateur connecté
                                    $requette = "SELECT * FROM relation WHERE (sender = '$user_name' OR receiver ='$user_name') AND statut = 'F'";
                                    $resultat = $cnx->query($requette);
                                    $nomAmi = "";

                                    foreach ($resultat as $row){
                                        if($row["sender"]!= $user_name){
                                            $nomAmi = $row["sender"];
                                        }elseif($row["receiver"]!=$user_name){
                                            $nomAmi = $row["receiver"];
                                        }
                                        echo "<div class='card'>";
                                            echo "<div class='card-body'>";
                                                echo "<a class='hoverName'>".$nomAmi."</a>";
                                                //echo "<span class='icon'><i class='bi bi-person-plus' id='addFriend'></i> <i class='bi bi-person-dash' id='removeFriend'></span>";
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
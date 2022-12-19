<!--
    Auteur: Mael Mane
    Date de créaton: 19/10/2022
    Dernière modifcation: 15/12/2022
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
        <title>PartageDeDocuments</title>
    </head>
    <body>
        <?php
            include_once ('../modele/headerConnecte.inc.php');
            require_once '../modele/config/dbConfig.php';
       ?>
        <div class="container mt-3">
            
            <div class="row">
                <main class="col-6 col-md-9">
                    <article>
                        <h2>Vos Documents</h2>
                        
                        <button class="btn btnOrange btnAction" type="button" onclick="openForm()">Ajouter un document <i class="bi bi-cloud-plus"></i></button>
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
    
                                    $requette = "SELECT * FROM files WHERE auteur = '$user_name'";
                                    $resultat = $cnx->query($requette);
    
                                    foreach ($resultat as $row){
                                        $fileName = $row['titre'];
                                        $auteur = $row['auteur'];
                                        echo "<div class='card'>";
                                            echo "<div class='card-body'>";
                                                echo "<p>".$fileName."</p>";
                                                echo ("<form action='../modele/delete.php' method='post'>
                                                        <button class='btn btn-danger' id='trash' type=submit title='Supprimer Fichier'><i class='bi bi-trash3'></i></button>
                                                        <input type='hidden' name= 'fileName' value='$fileName'>
                                                    </form>");
                                                echo ("<a title='Télécharger' href=../modele/uploads/$fileName download>
                                                        <span class='icon'><button class='btn btnOrange' type='button'><i class='bi bi-cloud-arrow-down'></i></button></span>
                                                      </a>");
                                                
                                                echo "<a class='hoverName'>".$auteur."</a>";
                                                
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
                    </article>
                </main>
                <aside class="col-6 col-md-3">
                    <form action="vueProfile.php" method="POST">
                        <input type=text name="profileName" placeholder="Rechercher un utilisateur"/>
                        <input type="submit" class="btn btnOrange" id="recherche" value="Rechercher">
                    </form>
                    <h3>Demande d'amis</h3>
                    
                    <div>
                        <?php   //AFFICHAGE DES DEMANDES AMIS          
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
                                                echo ("<form action=vueProfile.php method='post'>
                                                            <input type='hidden' name='profileName' value='$nomDemande'>
                                                            <input type='submit' value='$nomDemande' class='nomProfile'>
                                                        </form>");
                                                //echo "<a class='hoverName' href='vueProfile.php'>".$nomDemande."</a>";
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
                        
                        <?php   //AFFICHAGE DES AMIS DE L'UTILISATEUR
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
                                        echo ("<form action=vueProfile.php method='post'>
                                                <input type='hidden' name='profileName' value='$nomAmi'>
                                                <input type='submit' value='$nomAmi' class='nomProfile'>
                                            </form>");
                                            //echo "<a class='hoverName' href='vueAutreUser.php'>".$nomAmi."</a>";
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
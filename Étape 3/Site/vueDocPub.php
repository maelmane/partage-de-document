<!--
    Auteur: Mael Mane
    Date de créaton: 21/10/2022
    Dernière modifcation: 8/11/2022
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
        <link href="css/styleDocPub.css" rel="stylesheet">
        <title>ParatgeDeDocuments</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
              <div class="container-fluid">
                    <a class="navbar-brand" href="vueAcceuil.html">
                        <img id="logo" src="img/logoOrange.png" alt="Logo ParatgeDeDocuments"/>
                    </a>
        
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar"> <!--Pour écran mobile faire menu défilant -->
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link" href="vueDocPub.php">Documents Publics</a>
                            </li>
                        </ul>
                    </div>
                    <a href="vueConnexion.php" class="btn btnOrange" id="Connexion">Connexion</a>
                    <a href="vueCreerCompte.php" class="btn btnOrange" id="CreerCompte">Créer un compte</a>
                    
                    <a href="vueCompte.html" class="btn btnOrange" id="compte">Votre compte</a>     <!--Seulement visible si user est connecter-->
              </div>   
            </nav>
        </header>
        <main>
            <div class="container mt-3">
                <div class="row">
                    <div class="col-6 col-md-9 docs">
                        <!--  GABARIT DES CARDS POUR AFFICHAGE DES DOCS PUBLICS
                        <div class="card">  
                            <div class="card-body">
                                <p>NomDocument <span><i class="bi bi-heart"></i></span></p>     <--bouton "liker">
                                <span class="icon"><button class="btn btnOrange" type="button"><i class="bi bi-cloud-arrow-down"></i></button></span>    <--bouton télécharger>
                                <a class="hoverName" href="#">NomUser</a> <--Faudrait link vers leur profil si possible>
                            </div>
                            <div class="card-footer">
                                <form class="d-flex">
                                    <input class="form-control me-2" type="text" placeholder="Écrire un commentaire">
                                    <button class="btn btnOrange" type="button"><i class="bi bi-chat-left"></i></button>    <--bouton commenter>
                                </form>
                            </div>
                        </div> 
                        -->

                        <?php
                            try{
                                //Établir une connexion avec la base de données partagedoc
                                $cnx = new PDO('mysql:host=localhost; dbname=partagedoc', "root", "root");
                                
                                //Prendre les données des input du form  dans vueCreerCompte
                                
                                //Insérer les données dans la table compte et l'executer
                                $requette = "SELECT * FROM docpublic";
                                $resultat = $cnx->query($requette);

                                foreach ($resultat as $row){
                                    echo "<div class='card'>";
                                        echo "<div class='card-body'>";
                                            echo "<p>".$row["titre"]."<span> <i class='bi bi-heart'></i></span> ".$row["nbLike"]."</p>";
                                            echo "<span class='icon'><button class='btn btnOrange' type='button'><i class='bi bi-cloud-arrow-down'></i></button></span>";
                                            echo "<a class='hoverName'>".$row["username"]."</a>";
                                        echo "</div>";
                                        echo "<div class='card-footer'>";
                                            echo "<form class='d-flex'>";
                                                echo "<input class='form-control me-2' type='text' placeholder='Écrire un commentaire'>";
                                                echo "<button class='btn btnOrange' type='button'><i class='bi bi-chat-left'></i></button>";
                                            echo "</form>";
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
                </div>
            </div>
        </main>
    </body>
</html>
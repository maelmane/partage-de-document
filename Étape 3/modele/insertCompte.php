<!--
    Auteur: Mael Mane
    Date de créaton: 8/11/2022
    Dernière modifcation: 8/11/2022
    Modifié par: Mael Mane
-->

<!DOCTYPE html>
<html>
    <head>
        <title>Page Insert</title>
    </head>
    <body>
        <?php
            //Try catch pour attraper les erreurs de connexion
           try{
                //Établir une connexion avec la base de données partagedoc
                $cnx = new PDO('mysql:host=localhost; dbname=partagedoc', "root", "root");
                
                //Prendre les données des input du form  dans vueCreerCompte
                $username = $_REQUEST['username'];
                $email = $_REQUEST['email'];
                $passwd = $_REQUEST['passwd'];

                //Insérer les données dans la table compte et l'executer
                $requette = "INSERT INTO compte (username,email,passwd) VALUES ('$username',
                            '$email', '$passwd')";
                
                $resultat = $cnx->exec($requette);
                if ($resultat){
                    print("<p>Nouveau produit inséré avec succés.</p>");
                }
                else {
                    print("<p>Insertion du nouveau produit échouée</p>");
                }

            } catch (PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
            } finally {
                //Fermer la connexion avec la base de données
                $cnx=null;
            }
        ?>
    </body>
</html>
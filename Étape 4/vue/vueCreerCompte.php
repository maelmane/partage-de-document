<!--
    Auteur: Mael Mane
    Date de créaton: 19/10/2022
    Dernière modifcation: 15/12/2022
    Modifié par: Mael Mane
-->


<?php
    //Inclusion de la page connexionBD et User
    include_once ('../modele/DAO/ConnexionBD.class.php');
    /*
    include_once ('../modele/classes/User.class.php');
    include_once ('../modele/DAO/UserDAO.class.php');
    $dao = new UserDAO();
    */

    
    //Définir et initialiser les variables
    $username = $password = $confirm_password = "";
    $err_username = $err_password = $confirm_err_password = "";
    

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        //Valider l'username
        if(empty(trim($_POST["username"]))){
            $err_username = "Veuillez entrer un username";
        } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
            $err_username = "Username ne peut contenir que des lettres, des chiffres et underscores.";
        } else{
            //Requette SELECT
            $requette = "SELECT id FROM users WHERE username = :username";
            
            if($res = $cnx->prepare($requette)){
                $res->bindParam(":username", $param_username, PDO::PARAM_STR);
                
                // Set les paramètres
                $param_username = trim($_POST["username"]);
                
                if($res->execute()){
                    if($res->rowCount() == 1){
                        $err_username = "Username déja utilisé";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Un problème est survenue. Réessayer.";
                }
                unset($res);
            }
        }
        
        //Valider le password
        if(empty(trim($_POST["password"]))){
            $err_password = "Veuillez entrer un username";     
        }else{
            $password = trim($_POST["password"]);
        }
        
        //Valider le confirm_password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_err_password = "Veuillez confimer votre password";     
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($err_password) && ($password != $confirm_password)){
                $confirm_err_password = "Mots de passe différents";
            }
        }
        
        //Vérifier si des erreurs de saisies avant de l'INSERT dans la bd
        if(empty($err_username) && empty($err_password) && empty($confirm_err_password)){
            
            //Requette INSERT
            $requette = "INSERT INTO users (username, password) VALUES (:username, :password)";
            
            if($res = $cnx->prepare($requette)){
                $res->bindParam(":username", $param_username, PDO::PARAM_STR);
                $res->bindParam(":password", $param_password, PDO::PARAM_STR);
                
                // Set les paramètres
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); //Créer un hash pour le mot de passe
                
                if($res->execute()){
                    //Redirger vers la page de login.php
                    header("location: vueConnexion.php");
                } else{
                    echo "Oops! Un problème est survenue. Réessayer.";
                }

                //Fermer le statement
                unset($res);
            }
        }
        
        //Fermer la connexion
        unset($cnx);
    }
?>
 
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "css/styleCreerCompte.css"?></style>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>Création de compte</title>

    <style>
        
    </style>
  </head>
  <body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <h1>Création de compte</h1>
      <div class="logo">
            <img src="img/logoOrange.png" alt="" />
      </div>
      <div class="formcontainer">
        <div class="container">
            <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control <?php echo (!empty($err_username)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $err_username; ?></span>
                </div>    
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($err_password)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                    <span class="invalid-feedback"><?php echo $err_password; ?></span>
                </div>
                <div class="form-group">
                    <label>Confirmation du mot de passe</label>
                    <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_err_password)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                    <span class="invalid-feedback"><?php echo $confirm_err_password; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-secondary" value="Submit">
                    <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                    <a href="vueAccueil.html"><input type="button" class="btn btn-secondary ml-2" value="Annuler"></a>
                </div>
                <p>Déja un compte? <a href="vueConnexion.php">Connectez-vous ici</a>.</p>
            </div>
      </div>
    </form>
  </body>
</html>
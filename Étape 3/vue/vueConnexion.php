<!--
    Auteur: Mael Mane
    Date de créaton: 19/10/2022
    Dernière modifcation: 12/11/2022
    Modifié par: Mael Mane
-->

<?php
// Initialiser la session
session_start();
 
// Vérifier si l'utilisateur est déja logged in, si oui le rediriger vers la page d'acceuil
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
//Inclusion de la page de config
require_once "../config/config.php";
 
//Définir et initialiser les variables
$username = $password = "";
$err_username = $err_password = $err_connexion = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    //Vérifier si le username est vide
    if(empty(trim($_POST["username"]))){
        $err_username = "Veuillez entrer un username";
    } else{
        $username = trim($_POST["username"]);
    }
    
    //Vérifier si le password est vide
    if(empty(trim($_POST["password"]))){
        $err_password = "Veuillez entrer un mot de passe";
    } else{
        $password = trim($_POST["password"]);
    }
    
    //Valider les identifiants
    if(empty($err_username) && empty($err_password)){
        //Requette Select 
        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            //Lier les paramètres à la requette
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set les paramètres
            $param_username = trim($_POST["username"]);
            
            //Executer la requette
            if($stmt->execute()){
                //Verifier si l'username exist dans la bd, si oui verifier le password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];

                        if(password_verify($password, $hashed_password)){
                            //Si le password correspond commencer une nouvelle session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            //Rediriger vers la page d'acceuil
                            header("location: welcome.php");
                        } else{
                            //Password pas bon
                            $err_connexion = "Username ou Password invalide";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $err_connexion = "Username ou Password invalide";
                }
            } else{
                echo "Oops! Un problème est survenue. Réessayer.";
            }

            //Fermer le statement
            unset($stmt);
        }
    }
    
    // Fermer la connexion
    unset($pdo);
}
?>
 


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleCreerCompte.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>Connexion</title>

    <style>
        .btn-secondary{color: #fff;
                    background-color: #E26D00;
                    border-color: #E26D00;}
        input[type=text], input[type=password] {
            width: 100%;
            padding: 8px 8px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;}
    </style>
  </head>
  <body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <h1>Connexion</h1>
      <div class="logo">
            <img src="../img/logoOrange.png" alt="" />
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
                    <input type="submit" class="btn btn-secondary" value="Connexion">
                </div>
                <p>Pas de compte? <a href="register.php">Créez-vous en un ici</a>.</p>
            </div>
      </div>
    </form>
  </body>
</html>
<!--
    Auteur: Mael Mane
    Date de créaton: 19/10/2022
    Dernière modifcation: 8/11/2022
    Modifié par: Mael Mane
-->

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="css/styleConnexion.css">
    <title>Connexion</title>
  </head>
  <body>
    <form > <!-- rajouter action="/action_page.php"-->
      <h1>Connexion</h1>
      <div class="logo">
        <img src="img/logoOrange.png" alt="" />
      </div>
      <div class="formcontainer">
      <div class="container">
        <label for="uname"><strong>Username</strong></label>
        <input type="text" placeholder="Entrez Votre Username" name="uname" required>
        <label for="psw"><strong>Mot de passe</strong></label>
        <input type="password" placeholder="Entrez Votre Mot de passe" name="mdp" required>
      </div>
      <button type="submit"><strong>Se connecter</strong></button>
      <a href="vueAcceuil.html"><button type="button"><strong>Annuler</strong></button></a>
      
    </form>
  </body>
</html>
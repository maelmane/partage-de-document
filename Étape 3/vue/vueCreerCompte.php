<!--
    Auteur: Mael Mane
    Date de créaton: 19/10/2022
    Dernière modifcation: 12/11/2022
    Modifié par: Mael Mane
-->

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="css/styleCreerCompte.css">
    <title>Création de compte</title>
  </head>
  <body>
    <form action="modele/insertCompte.php" method="post">
      <h1>Création de compte</h1>
      <div class="logo">
        <img src="img/logoOrange.png" alt="" />
      </div>
      <div class="formcontainer">
      <div class="container">
        <label for="uname"><strong>Username</strong></label>
        <input type="text" placeholder="Entrez Votre Username" name="username" required>
        <label for="mail"><strong>E-mail</strong></label>
        <input type="text" placeholder="Entrez Votre E-mail" name="email" required>
        <label for="psw"><strong>Mot de passe</strong></label>
        <input type="password" placeholder="Entrez Votre Mot de passe" name="passwd" required>
      </div>
      <input type="submit" name="submit" value="S'inscrire" class="button"></input>
      <a href="vueAcceuil.html"><input type="button" value="Anuuler" class="button"></input></a>
    </form>
  </body>
</html>
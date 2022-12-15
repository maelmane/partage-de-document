<!--
    Auteur: Mael Mane
    Date de créaton: 18/10/2022
    Dernière modifcation: 13/11/2022
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
        <link href="../css/styleAcceuil.css" rel="stylesheet">
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
    ?>

    <main>
      <h1>Bienvenue sur PartageDeDocuments</h1>
      <div id="imgLogo">
      </div>
      <h4>Partagez vos documents sans sousis</h4>
    </main>

    <footer>
        <div class="row pb-3">
          <div id="Propos" class="text-center col-12  col-md-4">
            <div class="font-weight-bold text-uppercase" >À propos de nous</div>
            <p class="TexteGris mx-auto">Suspendisse porta risus at purus consectetur, id mattis metus volutpat. Fusce egestas tempus
                            arcu eget ultricies. Donec gravida nibh sit amet pretium fringilla.
            </p>
          </div>
          <div id="Nouvelles" class="pt-3 col-12  col-md-4">
            <div class="font-weight-bold text-uppercase">Donnez-nous des nouvelles</div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Entrez votre message" aria-label="Entrez votre message">
                <div class="input-group-append">
                  <button type="button" class="input-group-text btn btn-dark"><i class="bi bi-envelope"></i></button>
                </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mx-auto" id="Equipe">
            <div class="font-weight-bold text-uppercase">Notre Équipe</div>
            <p class="TexteGris mx-auto">
                Johnathan Cormier,
                Lesly-Junior Gourdet,
                Maël Mane
            </p>
          </div>
        </div>
    </footer>
  </body>
</html>
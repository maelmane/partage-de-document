<!--
    Auteur: Mael Mane
    Date de créaton: 19/10/2022
    Dernière modifcation: 10/11/2022
    Modifié par: Lesly Gourdet
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
        <link href="css/styleCompte.css" rel="stylesheet">
        <title>Votre Compte</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
              <div class="container-fluid">
                    <a class="navbar-brand" href="vueAcceuil.html">
                        <img id="logo" src="img/logoOrange.png" alt="Logo Partage De Documents"/>
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
        
                    <a href="vueCompte.php" class="btn btnOrange" id="compte">Votre compte</a>
              </div>   
            </nav>
        </header>

        <div class="container mt-3">
            <!--<div class="mt-4 p-5 text-white text-center orangeBg">
                <h1>Informations du compte</h1>
                <p>Bonjour, "user" voici les informations de votre compte</p>	
            </div>-->
            
            <div class="row">
                <main class="col-6 col-md-9">
                    <article>
                        <h2>Vos Documents</h2>
                        <button class="btn btnOrange" type="button">Ajouter un document <i class="bi bi-cloud-arrow-up"></i></button>
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
                        </div>
                        <button class="btn btnOrange" type="button">Télécharger un document <i class="bi bi-cloud-arrow-down"></i></button>
                        <button class="btn btnOrange" type="button">Supprimer un document <i class="bi bi-cloud-minus"></i></button>
                    </article>
                </main>
                <aside class="col-6 col-md-3">
                    <h3>Demande d'amis</h3>
                    <div>
                        <div class="card">  <!--Une card pour chaque ami...??-->
                            <div class="card-body">
                                <a class="hoverName" href="#">NomUser </a> <!--Faudrait link vers leur profil si possible-->
                                <span class="icon"><i class="bi bi-person-plus"></i> <i class="bi bi-person-dash"></i></span>    <!--bouton ajouter ou refuser demande d'ami-->
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
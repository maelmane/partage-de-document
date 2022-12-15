<!--
    Auteur: Mael Mane
    Date de créaton: 14/12/2022
    Dernière modifcation: 14/12/2022
    Modifié par: Mael Mane
-->
<header>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="vueAcceuil.php">
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
        </div>   
      </nav>
</header>
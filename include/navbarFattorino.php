<nav class="navbar navbar-expand-lg navbar-light bg fixed-top">
  <div class="container">
    <a class="img-item navbar-left" href="home_fattorini.php">
    <img src="./img/logo.png" alt="Logo">
    </a>
    <h1 class="navbar-brand">
       Ciao, <?php echo $_SESSION["username"]; ?>
    </h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
       <ul class="navbar-nav ml-auto">
          <li class="nav-item">
             <a class="nav-link" href="dati_utente.php">Profilo
             <span class="sr-only">(current)</span>
             </a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="#">Contatti</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="logOut.php">Log out</a>
          </li>
       </ul>
    </div>
  </div>
</nav>

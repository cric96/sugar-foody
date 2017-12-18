<?php
// Inserisci in questo punto il codice per la connessione al DB e l'utilizzo delle varie funzioni.
include("./secureLogin/secureLogin.php");
sec_session_start();
require_once("./config.php");
if(login_check_user() != true) {
  if(login_check_fattorino()) {
    ?><script type="text/javascript">
   location.href = "home_fattorini.php";
   </script><?php
  } else if (login_check_admin()) {
    ?><script type="text/javascript">
   location.href = "home_admin.php";
   </script><?php
 } else {
  ?><script type="text/javascript">
 location.href = "index.php";
 </script><?php
}
$cn->close();
}
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <link rel="SHORTCUT ICON" href="img/logo.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <script src="https://use.fontawesome.com/42b65516fc.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/catProdotti.css">
    <link rel="stylesheet" href="./css/tabelle-style.css">
    <link rel="stylesheet" href="./css/popup-basic-style.css">
  <title>Categoria Prodotti</title>
  </head>
  <?php
    require_once("./config.php");
    $nomeRistorante = $_GET["nome"];
    $_SESSION['nomeRistorante'] = $nomeRistorante;
    $query = "SELECT DISTINCT categoria.nome, immagine FROM categoria, prodotto, listino
        WHERE prodotto.nomeCategoria=categoria.nome
        AND listino.idProdotto=prodotto.id
        AND listino.nomeRistorante='".$nomeRistorante."'";
    $res = $cn->query($query);
    if ($res !== false) {
   ?>
  <body>
    <nav w3-include-html="./include/navbarUtente.html" class="navbar navbar-expand-lg navbar-light bg fixed-top"></nav>
      <!-- Page Content -->
    <header>
      <div class="overlay">
        <h2 class="my-4">Categorie</h2>
      </div>
    </header>
    <main class="container content">
      <!-- Introduction Row -->
      <!-- Team Members Row -->
      <ul class="row">
        <?php
        if($res->num_rows > 0) {
          while($row = $res->fetch_assoc()) {
         ?>
        <li class="col-lg-3 col-5 col-md-4 col-sm-4 text-center mb-2">
          <a href="./componiOrdine.php?categoria=<?php echo $row["nome"];?>">
            <div class="img-wrapper">
              <img class="img-fluid d-block mx-auto" src=<?php echo $row["immagine"];?> alt=<?php echo $row["nome"];?>>
            </div>
          </a>
          <div class="link-wrapper">
            <a class="categories" href="./componiOrdine.php?categoria=<?php echo $row["nome"];?>"><?php echo $row["nome"];?></a>
          </div>
        </li>
        <?php
              }
            }
          } else {
            echo "Errore nell'interrogazione";
          }
         ?>
      </ul>
    </main>
    <footer w3-include-html="./include/footer.html" class="panel-footer"></footer>
    <?php include('./include/notification_modal.php') ?>
    <script>
       w3.includeHTML();
    </script>
  </body>
</html>

<!DOCTYPE html>
<?php
  include("./secureLogin/secureLogin.php");
  sec_session_start();
  include("config.php");
  if(!login_check()) {

    ?><script type="text/javascript">
    location.href = "index.php";
    </script><?php
    $cn->close();
  }
?>
<html lang="it">
   <head>
     <meta charset="UTF-8">
     <link rel="SHORTCUT ICON" href="img/logo.ico" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <script src="https://use.fontawesome.com/42b65516fc.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
     <script src="https://www.w3schools.com/lib/w3.js"></script>
     <link rel="stylesheet" href="./css/catProdotti.css">
     <link rel="stylesheet" href="./css/list-with-effects.css">
     <link rel="stylesheet" href="./css/overlay-style.css">
     <link rel="stylesheet" href="./css/admin.css">
     <link rel="stylesheet" href="./css/fa-style.css">
     <title>Fornitore </title>
   </head>
   <body>
     <nav w3-include-html="./include/navbarAdmin.html" class="navbar navbar-expand-lg navbar-light bg fixed-top"></nav>
     <header>
       <div class="overlay">
         <h2 class="my-4">Area gestione</h2>
       </div>
     </header>
      <main class="container">
        <ul class="row">
          <li class="col-lg-4 col-6 col-md-4 col-sm-4 text-center mb-2">
            <a href="listino_admin.php">
              <div class="img-wrapper">
                <img class="img-fluid d-block mx-auto" src="img/listino.png" alt="Listino">
              </div>
            </a>
            <div class="link-wrapper">
              <a class="my-4" href="listino_admin.php"> Listino </a>
            </div>
          </li>
          <li class="col-lg-4 col-6 col-md-4 col-sm-4 text-center mb-2">
            <a href="fattorini_admin.php">
              <div class="img-wrapper">
                <img class="img-fluid d-block mx-auto" src="img/ordini.png" alt="Pizza">
              </div>
            </a>
            <div class="link-wrapper">
              <a class="my-4" href="fattorini_admin.php"> Ordini </a>
            </div>
          </li>
          <li class="col-lg-4 col-6 col-md-4 col-sm-4 text-center mb-2">
            <a href="fattorini.php">
              <div class="img-wrapper">
                <img class="img-fluid d-block mx-auto" src="img/fattorino.png" alt="Pizza">
              </div>
            </a>
            <div class="link-wrapper">
              <a class="my-4" href="fattorini.php"> Fattorini </a>
            </div>
          </li>
        </ul>

      </main>
      <footer w3-include-html="./include/footer.html" class="panel-footer"></footer>
      <script>
         w3.includeHTML();
      </script>
      <?php include('./include/notification_modal.php') ?>
   </body>
</html>

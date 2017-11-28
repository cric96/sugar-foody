<!DOCTYPE html>
<html lang="it">
   <head>
      <meta charset="UTF-8">
      <link rel="SHORTCUT ICON" href="img/logo.ico" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <script src="https://use.fontawesome.com/42b65516fc.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link rel="stylesheet" href="./css/catProdotti.css">
      <link rel="stylesheet" href="css/fattori_admin.css">
      <link rel="stylesheet" href="./css/orders-style.css">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="./js/hide-accessibily.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <title>Dettaglio ordine</title>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light bg fixed-top">
         <div class="container">
            <a class="img-item navbar-left" href="#">
            <img src="./img/logo.png" alt="Logo">
            </a>
            <h1 class="navbar-brand">
               BENVENUTO USERNAME
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
                     <a class="nav-link" href="ordini.php">Storico ordini</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Contatti</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Log out</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <header>
         <div class="overlay">
            <h2 class="my-4">Ordine numero</h2>
            <!--numero ordine in php-->
         </div>
      </header>
      <main class="container">
         <section>
            <h3>
               Ordine #numero<!--numero ordine in php-->
            </h3>
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>Nome prodotto</th>
                     <th>Quantità</th>
                     <th>Categoria</th>
                     <th>Prezzo</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>Nome prodotto</td>
                     <td>Quantità</td>
                     <td>Categoria</td>
                     <td>Prezzo</td>
                  </tr>
                  <tr>
                     <td>Nome prodotto</td>
                     <td>Quantità</td>
                     <td>Categoria</td>
                     <td>Prezzo</td>
                  </tr>
               </tbody>
            </table>
         </section>
      </main>
      <div class="notification">
         <a href="#">
         <span class="fa fa-bell brown"></span>
         </a>
         <span class="badge badge-danger">2</span>
      </div>
      <footer class="panel-footer">
         <a href="#" >Informativa privacy</a>
         <a href="#" >Cookie</a>
         <a href="#" >Help</a>
         <a href="#" >FAQ</a>
      </footer>
   </body>
</html>

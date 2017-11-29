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
  <title>Categoria Prodotti</title>
  </head>
  <body>
    <div w3-include-html="navbarUtente.html"></div>
      <!-- Page Content -->
    <header>
      <div class="overlay">
        <h2 class="my-4">Categorie</h2>
      </div>
    </header>
    <div class="container content">
      <!-- Introduction Row -->
      <!-- Team Members Row -->
      <div class="row">
        <div class="col-lg-3 col-4 col-md-4 col-sm-4 text-center mb-2">
          <img class="img-fluid d-block mx-auto" src="./img/pasta.png" alt="Pasta">
          <a class="categories" href="#">Pasta</a>
        </div>
        <div class="col-lg-3 col-4 col-md-4 col-sm-4 text-center mb-2">
          <img class="img-fluid d-block mx-auto" src="./img/pizza.png" alt="Pizza">
          <a href="#" class="categories">Pizza</a>
        </div>
        <div class="col-lg-3 col-4 col-md-4 col-sm-4 text-center mb-2">
          <img class="img-fluid d-block mx-auto" src="./img/carne.png" alt="Carne">
          <a href="#" class="categories">Secondo di carne</a>
        </div>
        <div class="col-lg-3 col-4 col-md-4 col-sm-4 text-center mb-2">
          <img class="img-fluid d-block mx-auto" src="./img/pesce.png" alt="Pesce">
          <a href="#" class="categories">Pesce</a>
        </div>
        <div class="col-lg-3 col-4 col-md-4 col-sm-4 text-center mb-2">
          <img class="img-fluid d-block mx-auto" src="./img/panini.png" alt="Fast food">
          <a href="#" class="categories">Panini</a>
        </div>
        <div class="col-lg-3 col-4 col-md-4 col-sm-4 text-center mb-2">
          <img class="img-fluid d-block mx-auto" src="./img/piadina.png" alt="Piadine e crescioni">
          <a href="#" class="categories">Piadine</a>
        </div>
      </div>
      <div w3-include-html="notification.html"></div>
    </div>
    <div w3-include-html="footer.html"></div>
    <script>
       w3.includeHTML();
    </script>
  </body>
</html>

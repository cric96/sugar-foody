<!DOCTYPE html>
<html lang="it">
   <head>
      <meta charset="UTF-8">
      <link rel="SHORTCUT ICON" href="img/logo.ico" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <script src="https://use.fontawesome.com/42b65516fc.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://www.w3schools.com/lib/w3.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
      <script src="./js/hide-accessibily.js"></script>
      <link rel="stylesheet" href="./css/catProdotti.css">
      <link rel="stylesheet" href="css/form-style.css">
      <link rel="stylesheet" href="css/index-style.css">
      <title>Benvenuto in Foody</title>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light bg fixed-top" w3-include-html="./include/navbarIndex.html"></nav>
      <header>
            <div id="foodslider" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#foodslider" data-slide-to="0" class="active"></li>
                  <li data-target="#foodslider" data-slide-to="1"></li>
                  <li data-target="#foodslider" data-slide-to="2"></li>
                  <li data-target="#foodslider" data-slide-to="3"></li>
                  <li data-target="#foodslider" data-slide-to="4"></li>
               </ol>
               <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                     <img class="d-block img-fluid" src="./img/slider/slide1.jpg" alt="">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block img-fluid" src="./img/slider/slide2.jpg" alt="">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block img-fluid" src="./img/slider/slide3.jpg" alt="">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block img-fluid" src="./img/slider/slide4.jpg" alt="">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block img-fluid" src="./img/slider/slide5.jpg" alt="">
                  </div>
               </div>
            </div>
      </header>
      <main class="container">
          <h2>Foody</h2>
          <h3>Ricevi dove vuoi i tuoi piatti preferiti</h3>
          <h4>IN POCHI CLICK SCEGLI IL RISTORANTE, FAI L'ORDINE E MANGI</h4>
      </main>
      <footer class="panel-footer" w3-include-html="./include/footer.html"></footer>
      <script>
         w3.includeHTML();
      </script>
      <!-- The Modal -->
      <div class="modal fade" id="login">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Login</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <form method="post" class="form form-horizontal">
                     <div class="form-group">
                        <label for="user" class="control-label">Username</label>
                        <div class="col-sm-10 input-group">
                           <span class="input-group-addon"><a class="fa fa-user fa-fw fa-lg" aria-hidden="true"></a></span>
                           <input type="text" class="form-control form-control-sm rounded-0" name="user" id="user" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="psw" class="control-label">Password</label>
                        <div class="col-sm-10 input-group">
                           <span class="input-group-addon"><a class="fa fa-key fa-fw fa-lg" aria-hidden="true"></a></span>
                           <input type="password" class="form-control form-control-sm rounded-0" name="psw" id="psw" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="custom-control custom-checkbox" for="rememeber">
                        <input type="checkbox" class="custom-control-input" id = "rememeber">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description small">Ricordami</span>
                        </label>
                        <button type="submit" class="btn btn-submit  float-right"><em class="fa fa-sign-in fa-lg" aria-hidden="true"></em> Accedi</button>
                        <button type="reset" class="btn mb-2 mr-sm-2 mb-sm-0 float-right">Annulla</button>
                     </div>
                  </form>
               </div>
               <!-- Modal footer <div class="modal-footer">
                  </div> -->
            </div>
         </div>
      </div>
   </body>
</html>

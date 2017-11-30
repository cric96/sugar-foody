<!DOCTYPE html>
<html lang="it">
   <head>
      <meta charset="UTF-8">
      <link rel="SHORTCUT ICON" href="img/logo.ico" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <script src="https://use.fontawesome.com/42b65516fc.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://www.w3schools.com/lib/w3.js"></script>
      <script src="./js/hide-accessibily.js"></script>
      <link rel="stylesheet" href="./css/catProdotti.css">
      <link rel="stylesheet" href="css/form-style.css">
      <link rel="stylesheet" href="css/index-style.css">
      <title>Benvenuto in Foody</title>
   </head>
   <body>
      <div w3-include-html="navbarNoLogin.html"></div>
      <main class="container">
         <div class="row">
            <div class=" col-md-5 ">
               <div class="card">
                  <div class="card-header">
                     <h3 class="mb-0 text-center">Login</h3>
                  </div>
                  <div class="card-body">
                     <form method="post" class="form form-horizontal">
                        <div class="form-group">
                           <label for="user" class="control-label">Username</label>
                           <div class="col-sm-10 input-group">
                              <span class="input-group-addon"><a class="fa fa-user fa-fw fa-lg" aria-hidden="true"></a></span>
                              <input type="text" class="form-control form-control-sm rounded-0" name="user" id="user">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="psw" class="control-label">Password</label>
                           <div class="col-sm-10 input-group">
                              <span class="input-group-addon"><a class="fa fa-key fa-fw fa-lg" aria-hidden="true"></a></span>
                              <input type="password" class="form-control form-control-sm rounded-0" name="psw" id="psw">
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
                  <div class="card-footer">
                     <a class="signin mb-2 mr-sm-2 mb-sm-0 float-left" href="signin.php"><em class="fa fa-user-plus fa-lg" aria-hidden="true"></em> Registrati</a>
                  </div>
               </div>
            </div>
            <div class="col-md-7 banner-sec">
               <div id="foodslider" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                     <li data-target="#foodslider" data-slide-to="0" class="active"></li>
                     <li data-target="#foodslider" data-slide-to="1"></li>
                  </ol>
                  <div class="carousel-inner" role="listbox">
                     <div class="carousel-item active">
                        <img class="d-block img-fluid" src="http://www.vicenzatoday.it/~media/horizontal-hi/38737568227281/cibo-a-domicilio-2.jpg" alt="Cibo a domicilio">
                     </div>
                     <div class="carousel-item">
                        <img class="d-block img-fluid" src="http://www.lastampa.it/rf/image_lowres/Pub/p4/2017/05/06/Italia/Foto/RitagliWeb/GettyImages-659594406-kYrD-U11002623413213jjD-1024x576%40LaStampa.it.jpg" alt="Cibo vario">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <div w3-include-html="footer.html"></div>
      <script>
         w3.includeHTML();
      </script>
   </body>
</html>

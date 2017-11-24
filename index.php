<!DOCTYPE html>
<html lang="it">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Benvenuto in Foody</title>
      <link rel="stylesheet" type="text/css" title="stylesheet" href="./css/main-style.css">
      <link href="http://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="http://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
   </head>
   <body>
      <section class="main-block">
         <div class="container">
            <div class="row">
               <div class="col-md-4 main-sec">
                  <img src="./img/logo.png" alt="Foody" style="width:40%">
                  <h2 class="text-center">Login</h2>
                  <form method="post" class="login-form">
                     <div class="form-group">
                        <label for="user" class="text-uppercase">Username</label>
                        <input type="text" class="form-control" name="user" id="user">
                     </div>
                     <div class="form-group">
                        <label for="psw" class="text-uppercase">Password</label>
                        <input type="password" class="form-control" name="psw" id="psw">
                     </div>
                     <div class="form-check">
											 	<a href="signin.php">Registrati</a>
                        <button type="submit" class="btn btn-submit mb-2 mr-sm-2 mb-sm-0 float-right">Accedi</button>
                        <button type="reset" class="btn mb-2 mr-sm-2 mb-sm-0 float-right">Annulla</button>
                     </div>
                  </form>
               </div>
               <div class="col-md-8 banner-sec">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
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
         </div>
      </section>
   </body>
</html>

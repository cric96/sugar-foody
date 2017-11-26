<!DOCTYPE html>
<html lang="it">
   <head>
      <meta charset="UTF-8">
      <link rel="SHORTCUT ICON" href="img/logo.ico" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Benvenuto in Foody</title>
      <link rel="stylesheet" type="text/css" title="stylesheet" href="./css/main-style.css">
      <link href="http://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="http://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <section class="main-block">
         <div class="container">
            <div class="row">
               <div class="main-sec">
                 <div class=" col-md-4 ">
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
          </div>
         </div>
      </section>
  </body>
</html>

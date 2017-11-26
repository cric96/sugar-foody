<!DOCTYPE html>
<html lang="it">
   <head>
      <meta charset="UTF-8">
      <link rel="SHORTCUT ICON" href="img/logo.ico" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" title="stylesheet" href="./css/main-style.css">
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="http://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
      <script src="./js/scriptHide.js"></script>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <title>Registra un nuovo fattorino</title>
   </head>
   <body>
      <section class="main-block">
         <div class="container">
            <div class="row">
               <div class = "main-sec">
                  <a href="index.php"><img src="./img/logo.png" alt="Foody" style="width:10%"></a>
                  <h2 class="text-center">Registrazione nuovo fattorino per ristorante</h2>
                  <!--nome ristorante-->
                  <form method="post">
                     <div class="form-group">
                        <label for="user" class="text-uppercase">Username</label>
                        <input type="text" class="form-control" name="user" id="user">
                        <label for="mail" class="text-uppercase">Mail</label>
                        <input type="text" class="form-control" name="mail" id="mail">
                        <label for="telefono" class="text-uppercase">Telefono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono">
                        <label for="psw" class="text-uppercase">Password</label>
                        <input type="password" class="form-control" name="psw" id="psw">
                        <label for="psw2" class="text-uppercase">Conferma Password</label>
                        <input type="password" class="form-control" name="psw2" id="psw2">
                    </div>
                    <div class="form-check">
                         <button type="reset" class="btn">Annulla</button>
                         <button type="submit" class="btn btn-submit">Registra</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
   </body>
</html>

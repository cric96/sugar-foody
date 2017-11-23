<!DOCTYPE html>
<html lang="it">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Benvenuto in Foody</title>
      <link rel="stylesheet" type="text/css" title="stylesheet" href="./css/login-style.css">
      <link href="http://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="http://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
   </head>
   <body>
      <section class="login-block">
         <div class="container">
           <div class = "col-md-6 login-sec">
                               <img src="./img/logo.png" alt="Foody" style="width:10%">
                  <h2 class="text-center">Registrazione utenti</h2>

                  <form method="post">
                     <div class="form-group row">
                       <label for="user" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
                       <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" name="user" id="user">
                      </div>
                    </div>
                    <div class="form-group row">
                          <label for="mail" class="col-sm-2 col-form-label col-form-label-sm">Mail</label>
                          <div class="col-sm-5">
                          <input type="text" class="form-control form-control-sm" name="mail" id="mail">
                        </div></div>
                        <div class="form-group row">
                        <label for="tel" class="col-sm-2 col-form-label col-form-label-sm">Telefono</label>
                        <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" name="tel" id="tel">
                      </div></div>
                      <div class="form-group row">
                        <label for="psw" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
                        <div class="col-sm-5"><input type="password" class="form-control form-control-sm" name="psw" id="psw">
                        </div></div>
                        <div class="form-group row">
                        <label for="psw2" class="col-sm-2 col-form-label col-form-label-sm">Conferma password</label>
                        <div class="col-sm-5">
                          <input type="password" class="form-control form-control-sm" name="psw2" id="psw2">
                     </div></div>
                     <div class = "col-md-10">
                       <textarea readonly TextMode="MultiLine">
                       Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                         </textarea>
                       </div>
                         <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                           <label class="form-check-label">
                             <input class="form-check-input" type="checkbox"> Remember me
                           </label>
                     </div>
                     <div class="form-check">
											 	<button type="submit" class="btn btn-login float-right">Registrati</button>
                        <button type="reset" class="btn float-right">Annulla</button>
                     </div>
                  </form>
               </div>
             </div>
      </section>
   </body>
</html>

<!DOCTYPE html>
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://www.w3schools.com/lib/w3.js"></script>
      <link rel="stylesheet" href="./css/catProdotti.css">
      <link rel="stylesheet" href="./css/form-style.css">
      <title>Dati utente</title>
   </head>
   <body>
      <!--bisogna scegliere il menu tramite php-->
      <div w3-include-html="navbarUtente.html"></div>
      <main class="container content">
         <!--Il contenuto visualizzato potrà essere cambiato in caso di ristorante-->
         <h2 class="my-4">Dati personali</h2>
         <form method="post" class="form-horizontal">
            <div class="form-group row">
               <label for="user" class="control-label col-sm-2">Username</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control form-control-sm" name="user" id="user" readonly value="Mario Rossi">
               </div>
            </div>
            <div class="form-group row">
               <label for="mail" class="control-label col-sm-2">Mail</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control form-control-sm" name="mail" id="mail">
               </div>
            </div>
            <div class="form-group row">
               <label for="telefono" class="control-label col-sm-2">Telefono</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control form-control-sm" name="telefono" id="telefono">
               </div>
            </div>
            <!--Questo fieldset verrà visualizzato se e solo se l'utente è un ristorante-->
            <fieldset class="form-group fieldset-hide">
               <div class="form-group row">
                  <label for="nomeRistorante" class="control-label col-sm-2">Nome ristorante</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control form-control-sm" name="nomeRistorante" id="nomeRistorante">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="immagineRistorante" class="control-label col-sm-2">Immagine ristorante</label>
                  <div class="col-sm-10">
                     <!-- vedere se va bene come input-->
                     <input type="file" class="form-control form-control-sm form-control-file" name="immagineRistorante" id="immagineRistorante">
                  </div>
               </div>
            </fieldset>
            <div class="form-group row">
               <label for="psw" class="control-label col-sm-2">Nuova password</label>
               <div class="col-sm-10">
                  <input type="password" class="form-control form-control-sm" name="psw" id="psw">
               </div>
            </div>
            <div class="form-group row">
               <label for="psw2" class="control-label col-sm-2">Conferma Password</label>
               <div class="col-sm-10">
                  <input type="password" class="form-control form-control-sm" name="psw2" id="psw2">
               </div>
            </div>
            <div class="form-check btn-form">
               <button type="submit" class="btn btn-submit float-right"><em class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></em> Modifica</button>
               <button type="reset" class="btn btn-default float-right">Annulla</button>
            </div>
         </form>
      </main>
      <div w3-include-html="footer.html"></div>
      <script>
         w3.includeHTML();
      </script>
   </body>
</html>

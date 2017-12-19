<!DOCTYPE html>
<!--Faccio inserire direttamente l'indirizzo, il metodo di pagamento e i dati della carta
perché i dati dell'utente li ho essendo quelli dell'utente loggato(??)-->
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <link rel="SHORTCUT ICON" href="img/logo.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <script src="https://use.fontawesome.com/42b65516fc.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script src="./js/hide-accessibily.js"></script>
    <script src="./js/hidinPayments.js"></script>
    <script src="./js/hide-accessibily.js"></script>
    <link rel="stylesheet" href="./css/catProdotti.css">
    <link rel="stylesheet" href="./css/form-style.css">
    <link rel="stylesheet" href="./css/overlay-style.css">
    <link rel="stylesheet" href="/css/tabelle-style.css">
    <link rel="stylesheet" href="./css/popup-basic-style.css">
    <title>Pagamento</title>
  </head>
  <body>
    <script src="./js/firstHide.js"></script>
    <?php include("./include/navbarUtente.php"); ?>
    <main class="container content">
       <h2 class="my-4">Pagamento ordine</h2>
       <form method="post" class="form-horizontal" action="index.php">
         <fieldset>
           <legend>Come intendi effettuare il pagamento?</legend>
           <div class="checkbox-wrap d-flex justify-content-start p-2 mb-2">
              <label class="custom-control custom-radio" for="onDelivery">
              <span class="custom-control-description">Alla consegna</span>
              <input type="radio" class="custom-control-input" onchange="valueChanged()" checked="checked" name="check-hide" id="onDelivery">
              <span class="custom-control-indicator"></span>
              </label>
           </div>
           <div class="checkbox-wrap d-flex justify-content-start p-2 mb-2">
              <label class="custom-control custom-radio" for="check-hide">
              <span class="custom-control-description">Con carta di credito </span>
              <input type="radio" class="custom-control-input check-hide" onchange="valueChanged()" name="check-hide" id="check-hide">
              <span class="custom-control-indicator"></span>
              </label>
            </div>
          </fieldset>
            <!--Questo fieldset verrà visualizzato se e solo se l'utente sceglie come metodo di pagamento la carta-->
            <fieldset class="form-group  fieldset-hide">
               <div class="form-group row">
                  <label for="nomeTitolare" class="control-label col-sm-2">Nome titolare</label>
                  <div class="col-sm-10">
                     <input type="text" maxlength="40" minlength="3" class="form-control form-control-sm" name="nomeTitolare" id="nomeTitolare">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="cognomeTitolare" class="control-label col-sm-2">CognomeTitolare</label>
                  <div class="col-sm-10">
                     <!-- vedere se va bene come input-->
                     <input type="text" class="form-control form-control-sm" name="cognomeTitolare" id="cognomeTitolare">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="nomeTitolare" class="control-label col-sm-2">Numero carta</label>
                  <div class="col-sm-10">
                     <input type="number" class="form-control form-control-sm" name="numeroCarta" id="numeroCarta">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="psw" class="control-label col-sm-2">Codice di sicurezza</label>
                  <div class="col-sm-10">
                     <input type="number" max="999" min="100" class="form-control form-control-sm form-control-file" name="psw" id="psw">
                  </div>
               </div>
               <div class="form-group row">
                 <label for="data" class=" control-label col-sm-2">Scadenza</label>
                 <div class="col-sm-10">
                   <input type="date" name="date" class="form-control form-control-sm form-control-file" id="date">
                 </div>
               </div>
               <button type="submit" class="btn btn-submit float-right" name="signinBt"><em class="fa fa-credit-card fa-lg" aria-hidden="true"></em>Paga</button>
               <button type="reset" class="btn btn-default float-right">Annulla</button>
            </fieldset>
            <div class="form-check btn-form buttons-hides">
               <button type="submit" class="btn btn-submit float-right" name="signinBt">Concludi</button>
               <button type="reset" class="btn btn-default float-right">Annulla</button>
            </div>
       </form>
    </main>
    <footer w3-include-html="./include/footer.html" class="panel-footer"></footer>
    <?php include('./include/notification_modal.php') ?>
    <script>
       w3.includeHTML();
    </script>
  </body>
</html>

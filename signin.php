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
     <script src="./js/scriptHide.js"></script>
     <script src="./js/hide-accessibily.js"></script>
     <link rel="stylesheet" href="./css/catProdotti.css">
     <link rel="stylesheet" href="./css/form-style.css">
     <link rel="stylesheet" href="./css/overlay-style.css">
     <link rel="stylesheet" href="./css/popup-basic-style.css">
      <title>Registrati a Foody</title>
   </head>
   <body>
      <script src="./js/firstHide.js"></script>
      <nav class="navbar navbar-expand-lg navbar-light bg fixed-top" w3-include-html="./include/navbarSignin.html"></nav>
      <main class="container content">
         <h2 class="my-4">Registrazione utenti</h2>
         <form enctype="multipart/form-data" method="post" class="form-horizontal" action="signin.php">
            <div class="form-group row">
               <label for="user" class="control-label col-sm-2">Username</label>
               <div class="col-sm-10">
                  <input type="text" maxlength="30" minlength="5" class="form-control form-control-sm" name="user" id="user" required>
               </div>
            </div>
            <div class="form-group row">
               <label for="mail" class="control-label col-sm-2">Mail</label>
               <div class="col-sm-10">
                  <input type="email" maxlength="40" class="form-control form-control-sm" name="mail" id="mail" required>
               </div>
            </div>
            <div class="form-group row">
               <label for="telefono" class="control-label col-sm-2">Telefono (+39)</label>
               <div class="col-sm-10">
                  <input type="tel" maxlength="10" minlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control form-control-sm" name="telefono" id="telefono" required>
               </div>
            </div>
            <div class="checkbox-wrap d-flex justify-content-end p-2 mb-2">
               <label class="custom-control custom-checkbox" for="check-hide">
               <span class="custom-control-description">Sono un ristorante </span>
               <input type="checkbox" class="custom-control-input check-hide" onchange="valueChanged()" name="check-hide" id="check-hide">
               <span class="custom-control-indicator"></span>
               </label>
            </div>
            <!--Questo fieldset verrà visualizzato se e solo se l'utente è un ristorante che ha che ha fatto check-->
            <fieldset class="form-group fieldset-hide">
               <div class="form-group row">
                  <label for="nomeRistorante" class="control-label col-sm-2">Nome ristorante</label>
                  <div class="col-sm-10">
                     <input type="text" maxlength="40" minlength="3" class="form-control form-control-sm" name="nomeRistorante" id="nomeRistorante">
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
               <label for="psw" class="control-label col-sm-2">Password</label>
               <div class="col-sm-10">
                  <input type="password" maxlength="40" minlength="8" class="form-control form-control-sm" name="psw" id="psw" required>
               </div>
            </div>
            <div class="form-group row">
               <label for="psw2" class="control-label col-sm-2">Conferma Password</label>
               <div class="col-sm-10">
                  <input type="password" maxlength="40" minlength="8" class="form-control form-control-sm" name="psw2" id="psw2" required>
               </div>
            </div>
            <div class="checkbox-wrap d-flex justify-content-end p-2 mb-2">
               <label class="custom-control custom-checkbox" for="acceptTerms">
               <a class="link" data-toggle="modal" data-target="#termsPopUp">
                 <span class="custom-control-description">Accetto i termini e le condizioni d'uso </span>
               </a>
               <input type="checkbox" class="custom-control-input" name="acceptTerms" id="acceptTerms" required>
               <span class="custom-control-indicator"></span>
               </label>
            </div>
            <div class="form-check btn-form">
               <button type="submit" class="btn btn-submit float-right" name="signinBt"><em class="fa fa-user-plus fa-lg" aria-hidden="true"></em>Registrati</button>
               <button type="reset" class="btn btn-default float-right">Annulla</button>
            </div>
         </form>
      </main>
      <footer class="panel-footer" w3-include-html="./include/footer.html"></footer>
      <script>
         w3.includeHTML();
      </script>

      <!-- The Modal -->
      <div class="modal fade" id="termsPopUp">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Termini e condizioni d'uso</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                 <label for="terms" class="hide-acc">Termini e condizioni d'uso</label>
                 <textarea readonly  id="terms" class="form-control form-control-sm" rows="3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
               </div>
            </div>
         </div>
      </div>
   </body>
   <?php
   if(isset($_POST["signinBt"])) {
     if($_POST["psw"] !== $_POST["psw2"]) {
       ?><script type="text/javascript">
        alert("Passoword differenti.");
       </script><?php
     } else {
       require_once ('config.php');
     $user=$_POST["user"];
     $psw=$_POST["psw"];
     $telefono=$_POST["telefono"];
     $mail=$_POST["mail"];
     if(isset($_POST["check-hide"])) {
       $ristorante=$_POST["nomeRistorante"];
       // per prima cosa verifico che il file sia stato effettivamente caricato
      if (!isset($_FILES['immagineRistorante']) || !is_uploaded_file($_FILES['immagineRistorante']['tmp_name'])) {
        ?><script type="text/javascript">
         alert("Errore caricamento immagine.");
        </script><?php
        exit;
      }

      //percorso della cartella dove mettere i file caricati dagli utenti
      $uploaddir = '/img/';

      //Recupero il percorso temporaneo del file
      $userfile_tmp = $_FILES['immagineRistorante']['tmp_name'];

      //recupero il nome originale del file caricato
      $userfile_name = $_FILES['immagineRistorante']['name'];

      //copio il file dalla sua posizione temporanea alla mia cartella upload
      if (move_uploaded_file($userfile_tmp, getcwd() . $uploaddir . $userfile_name)) {
        //Se l'operazione è andata a buon fine...
      }else{
        //Se l'operazione è fallta...
        ?><script type="text/javascript">
         alert("Errore caricamento immagine.");
        </script><?php
        exit;
      }
      $immagineRistorante = '.' . $uploaddir . $userfile_name;
       //ristorante
       $sql="INSERT INTO `ristorante` (nomeRistorante, immagine) VALUES ('$ristorante', '$immagineRistorante');";
       $sql.="INSERT INTO `utente` (telefono, password, email, username, admin, nomeRistorante)
       VALUES ('$telefono', '$psw', '$mail', '$user', 1, '$ristorante');";
     } else {
       $sql="INSERT INTO `utente` (telefono, password, email, username)
       VALUES ('$telefono', '$psw', '$mail', '$user');";
     }
     if($cn->multi_query($sql) === TRUE)
     {
       ?><script type="text/javascript">
        location.href = "index.php";
        alert("Inserimento dei dati avvenuto correttamente.");
       </script><?php
     }
     else
     {
       ?><script type="text/javascript">
        alert("Errore nell'inserimento");
       </script><?php
     }
     $cn->close();
   }
   }
   ?>
</html>

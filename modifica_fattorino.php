<?php
// Inserisci in questo punto il codice per la connessione al DB e l'utilizzo delle varie funzioni.
include("./secureLogin/secureLogin.php");
sec_session_start();
include("config.php");
if(login_check_admin() != true || !isset($_GET['F']) || empty($_GET['F'])) {
 ?><script type="text/javascript">
 location.href = "index.php";
 </script><?php
 $cn->close();
} else {
  $fattorino=$_GET['F'];
}
?>
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
      <script src="./js/sha512.js"></script>
      <script src="./js/form.js"></script>
      <link rel="stylesheet" href="./css/catProdotti.css">
      <link rel="stylesheet" href="./css/form-style.css">
      <link rel="stylesheet" href="./css/overlay-style.css">
      <title>Dati utente</title>
   </head>
   <body>
      <nav w3-include-html="./include/navbarAdmin.html" class="navbar navbar-expand-lg navbar-light bg fixed-top"></nav>

      <?php
      if ($stmt = $cn->prepare("SELECT email, telefono FROM utente WHERE username = ? LIMIT 1")) {
         $stmt->bind_param('s', $fattorino);
         $stmt->execute();
         $stmt->store_result();
         $stmt->bind_result($mail, $telefono);
         $stmt->fetch();
         if($stmt->num_rows() <= 0 ) {
           ?><script type="text/javascript">
           location.href = "home_admin.php";
           </script><?php
           $cn->close();
           $stmt->close();
         }
       }
       $stmt->close();
      ?>
      <main class="container content">
         <h2 class="my-4">Dati fattorino</h2>
         <form enctype="multipart/form-data" method="post" class="form-horizontal" action="dati_utente.php">
            <div class="form-group row">
               <label for="user" class="control-label col-sm-2">Username</label>
               <div class="col-sm-10">
                  <input type="text" maxlength="30" minlength="5" class="form-control form-control-sm" name="user" id="user" readonly value="<?php echo $fattorino?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="mail" class="control-label col-sm-2">Mail</label>
               <div class="col-sm-10">
                  <input type="email" maxlength="40" class="form-control form-control-sm" name="mail" id="mail" value = "<?php echo $mail?>" required>
               </div>
            </div>
            <div class="form-group row">
               <label for="telefono" class="control-label col-sm-2">Telefono (+39)</label>
               <div class="col-sm-10">
                  <input type="tel" maxlength="10" minlength="10" class="form-control form-control-sm" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="telefono" id="telefono" value="<?php echo $telefono?>" required>
               </div>
            </div>
            <div class="form-check btn-form">
               <button type="submit" class="btn btn-submit float-right" name="changeBt" onclick="formhash(this.form, this.form.password);"><em class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></em> Modifica</button>
               <button type="reset" class="btn btn-default float-right">Annulla</button>
            </div>
         </form>
      </main>
      <footer class="panel-footer" w3-include-html="./include/footer.html"></footer>
      <script>
         w3.includeHTML();
      </script>
   </body>
   <?php
   if(isset($_POST["changeBt"])) {
     if($_POST["psw"] !== $_POST["psw2"]) {
       ?><script type="text/javascript">
        alert("Passoword differenti.");
       </script><?php
     } else {
       require_once ('config.php');
       $telefono=$_POST["telefono"];
       $mail=$_POST["mail"];
       $resCheck = $cn->query("SELECT * FROM utente where email = '$mail' and username!= '$fattorino'");
       if($resCheck !== false) {
         if ($resCheck->num_rows > 0) {
           ?> <script type="text/javascript">
            location.href = "modifica_fattorino.php?F='<?php echo $fattorino; ?>'";
            alert("Mail già presente");
           </script>
           <?php
         }
       }
       $sql="UPDATE UTENTE
       SET telefono='$telefono',
       email='$mail'
       WHERE username = '$fattorino'";

     if($cn->multi_query($sql) === TRUE)
     {
       ?><script type="text/javascript">
          location.href = "home_admin.php";
       </script><?php
     }
     else
     {
       ?><script type="text/javascript">
        alert("Errore nella modifica dei dati del fattorino");
       </script><?php
     }
     $cn->close();
   }
   }
   ?>
</html>

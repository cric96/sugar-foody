<?php
// Inserisci in questo punto il codice per la connessione al DB e l'utilizzo delle varie funzioni.
include("./secureLogin/secureLogin.php");
sec_session_start();
include("config.php");
if(login_check($cn) != true) {
 ?><script type="text/javascript">
 location.href = "index.php";
 </script><?php
 $cn->close();
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
      <!--bisogna scegliere il menu tramite php-->
      <?php if(login_check_user($cn)) {
        ?><nav w3-include-html="./include/navbarUtente.html" class="navbar navbar-expand-lg navbar-light bg fixed-top"></nav>
        <?php
      } else if (login_check_fattorino($cn)) {
        ?><nav w3-include-html="./include/navbarFattorino.html" class="navbar navbar-expand-lg navbar-light bg fixed-top"></nav>
        <?php
      } else if (login_check_admin($cn)) {
        ?><nav w3-include-html="./include/navbarAdmin.html" class="navbar navbar-expand-lg navbar-light bg fixed-top"></nav>
        <?php
      }
      if ($stmt = $cn->prepare("SELECT email, telefono FROM utente WHERE username = ? LIMIT 1")) {
         $stmt->bind_param('s', $_SESSION["username"]); // esegue il bind del parametro '$username'.
         $stmt->execute(); // esegue la query appena creata.
         $stmt->store_result();
         $stmt->bind_result($mail, $telefono); // recupera il risultato della query e lo memorizza nelle relative variabili.
         $stmt->fetch();
       }
       $stmt->close();
      ?>
      <main class="container content">
         <!--Il contenuto visualizzato potrà essere cambiato in caso di ristorante-->

         <?php if(login_check_admin($cn)) {
           $ristorante = $_SESSION["nomeRistorante"];
           $query_sql="SELECT immagine FROM ristorante WHERE nomeRistorante = '$ristorante' ";
           $result = $cn->query($query_sql);
           if($result !== false) {
             if ($result->num_rows > 0) {
               $row = $result->fetch_assoc();
               $immagine = $row["immagine"]
               ?>
               <img width="10%" style="float:right; margin: 2%" src=<?php echo $immagine;?> alt=<?php echo $ristorante;?>>
               <h2 class="my-4">Ristorante</h2>
             <?php
             }
           }
         } else {
           ?>
           <h2 class="my-4">Dati personali</h2>
           <?php
         }
        ?>
         <form enctype="multipart/form-data" method="post" class="form-horizontal" action="dati_utente.php">
            <div class="form-group row">
               <label for="user" class="control-label col-sm-2">Username</label>
               <div class="col-sm-10">
                  <input type="text" maxlength="30" minlength="5" class="form-control form-control-sm" name="user" id="user" readonly value="<?php echo $_SESSION['username']?>">
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
            <!--Questo fieldset verrà visualizzato se e solo se l'utente è un ristorante, carica immagine e si può far modificare o no?-->
            <?php if(login_check_admin($cn)) { ?>
            <fieldset class="form-group fieldset-hide">
               <div class="form-group row">
                  <label for="nomeRistorante" class="control-label col-sm-2">Nome ristorante</label>
                  <div class="col-sm-10">
                     <input type="text" maxlength="40" minlength="3" class="form-control form-control-sm" name="nomeRistorante" id="nomeRistorante" value="<?php echo $ristorante ?>" readonly>
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
          <?php } ?>
            <div class="form-group row">
               <label for="password" class="control-label col-sm-2">Nuova password</label>
               <div class="col-sm-10">
                  <input type="password" maxlength="40" minlength="8" class="form-control form-control-sm" name="psw" id="password">
               </div>
            </div>
            <div class="form-group row">
               <label for="psw2" class="control-label col-sm-2">Conferma Password</label>
               <div class="col-sm-10">
                  <input type="password" maxlength="40" minlength="8" class="form-control form-control-sm" name="psw2" id="psw2">
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
       $username=$_SESSION["username"];
       $telefono=$_POST["telefono"];
       $mail=$_POST["mail"];
       if(login_check_admin($cn) && isset($_FILES['immagineRistorante'])) {
         // per prima cosa verifico che il file sia stato effettivamente caricato
         if(is_uploaded_file($_FILES['immagineRistorante']['tmp_name'])) {
         $uploaddir = '/img/';
         $userfile_tmp = $_FILES['immagineRistorante']['tmp_name'];
         $userfile_name = $_FILES['immagineRistorante']['name'];
         if($immagine !== '.' . $uploaddir . $userfile_name) {
           if (move_uploaded_file($userfile_tmp, getcwd() . $uploaddir . $userfile_name)) {
             //Se l'operazione è andata a buon fine...
           }else{
           //Se l'operazione è fallta...
           ?><script type="text/javascript">
            alert("Errore caricamento immagine.");
           </script><?php
           exit;
         }

         $immagine = '.' . $uploaddir . $userfile_name;
          //immagine da aggiornare
          $sql="UPDATE RISTORANTE SET immagine='$immagine' WHERE nomeRistorante='$ristorante';";
        }
      }
     } else {
       $sql='';
     }
     //controllo se ha inserito la nuova password
     if($_POST["psw"] != "") {
       $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
       // Crea una password usando la chiave appena creata.
       $psw = hash('sha512', $_POST["psw"].$random_salt);
       $sql.="UPDATE UTENTE
       SET telefono='$telefono',
       email='$mail',
       password='$psw',
       salt='$random_salt'
       WHERE username = '$username'";
    } else {
       $sql.="UPDATE UTENTE
       SET telefono='$telefono',
       email='$mail'
       WHERE username = '$username'";
     }
     if($cn->multi_query($sql) === TRUE)
     {
       ?><script type="text/javascript">
       <?php if(login_check_admin($cn)) {
         ?>location.href = "home_admin.php";
         <?php
       } else if(login_check_user($cn)) {
         ?>location.href = "home_admin.php";
         <?php
       } else {
         ?> location.href = "sceltaRistorante.php";
         <?php
       }?>
        alert("Modifica dei dati avvenuto correttamente.");
       </script><?php
     }
     else
     {
       ?><script type="text/javascript">
        alert("Errore nella modifica dei dati");
       </script><?php
     }
     $cn->close();
   }
   }
   ?>
</html>

<?php
// Inserisci in questo punto il codice per la connessione al DB e l'utilizzo delle varie funzioni.
include("./secureLogin/secureLogin.php");
sec_session_start();
require_once("./config.php");
if(login_check_user() != true) {
  if(login_check_fattorino()) {
    ?><script type="text/javascript">
   location.href = "home_fattorini.php";
   </script><?php
  } else if (login_check_admin()) {
    ?><script type="text/javascript">
   location.href = "home_admin.php";
   </script><?php
 } else {
  ?><script type="text/javascript">
 location.href = "index.php";
 </script><?php
}
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
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://www.w3schools.com/lib/w3.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
      <script src="./js/scriptHide.js"></script>
      <script src="./js/hide-accessibily.js"></script>
      <script type="text/javascript" src="./js/url-getter.js"> </script>
      <script src="./js/datalist-click.js"></script>
      <link rel="stylesheet" href="./css/catProdotti.css">
      <link rel="stylesheet" href="./css/fa-style.css">
      <link rel="stylesheet" href="./css/tabelle-style.css">
      <link rel="stylesheet" href="./css/popup-basic-style.css">
      <link rel="stylesheet" href="./css/orders-style.css">
      <link rel="stylesheet" href="./css/overlay-style.css">
      <title>Ordini</title>
   </head>
   <body>
      <?php include("./include/navbarUtente.php"); ?>
      <header>
         <div class="overlay">
            <h2 class="my-4">Ordini</h2>
         </div>
      </header>
      <main class="container">
         <section>
            <h3 class="hide-acc">Storico ordini</h3>
            <?php
            $username = $_SESSION['username'];
            $query_sql="SELECT numeroOrdine, data, stato, luogo, pagato FROM ordine WHERE stato != 'carrello' and utente = '$username' ";
      			$result = $cn->query($query_sql);
      			if($result !== false){
              if ($result->num_rows > 0) {
            ?>
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>#ordine</th>
                     <th>Stato</th>
                     <th>Luogo</th>
                     <th>Data / Ora</th>
                     <th>Pagamento</th>
                     <th>Dettagli</th>
                  </tr>
               </thead>
               <tbody>
               <?php
         				while($row = $result->fetch_assoc()) {
         						?>
                  <tr>
                    <td><?php echo $row["numeroOrdine"]; ?></td>
                    <td><?php echo $row["stato"]; ?></td>
                    <td><?php echo $row["luogo"]; ?></td>
                    <td><?php $date = date_create($row["data"]);
                    echo date_format($date, 'd/m/Y');
                    ?><br/><?php
                    echo date_format($date, 'H:i');
                    ?></td>
                    <td><?php if($row["pagato"] == 1) {
                      echo "EFFETTUATO";
                    } else {
                      echo "DA EFFETTUARE";
                    }
                    ?></td>
                    <td class="info"><a class="dettagli fa fa-info fa-2x" aria-hidden="true" value=<?php echo $row["numeroOrdine"] ?> data-toggle="modal" data-target="#dettagli_ordine"><span class="hide-acc">Dettagli</span></a></td>
                  </tr>
                  <?php
      					}
      				}
      			 ?>
           </tbody>
        </table>
        <?php
    			}
    			else{
    		?>
    			<p>Errore nell'interrogazione</p>
    		<?php
    			}
    		//	$cn->close();
             ?>
         </section>
      </main>
      <footer class="panel-footer" w3-include-html="./include/footer.html"></footer>
      <?php include('./include/dettagli_ordine.php');
      include('./include/notification_modal.php'); ?>
      <script>
         w3.includeHTML();
      </script>
   </body>
</html>

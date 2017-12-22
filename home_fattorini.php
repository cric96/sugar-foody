 <?php
 // Inserisci in questo punto il codice per la connessione al DB e l'utilizzo delle varie funzioni.
 include("./secureLogin/secureLogin.php");
 sec_session_start();
 require_once("./config.php");
 if(login_check_fattorino() != true) {
   if(login_check_user()) {
     ?><script type="text/javascript">
    location.href = "sceltaRistorante.php";
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
      <link rel="stylesheet" href="./css/catProdotti.css">
      <link rel="stylesheet" href="./css/fa-style.css">
      <link rel="stylesheet" href="./css/tabelle-style.css">
      <link rel="stylesheet" href="./css/popup-basic-style.css">
      <link rel="stylesheet" href="./css/orders-style.css">
      <link rel="stylesheet" href="./css/td-button-style.css">
      <link rel="stylesheet" href="./css/overlay-style.css">
      <link rel="stylesheet" href="./css/fattori_admin.css">
      <link rel="stylesheet" href="./css/home-fattorini-style.css">
      <title>Ordini assegnati</title>
   </head>
   <body>
     <?php include("./include/navbarFattorino.php"); ?>
      <header>
         <div class="overlay">
            <h2 class="my-4">I tuoi ordini</h2>
         </div>
      </header>
      <main class="container">
         <section>
            <h3 class="hide-acc">Storico ordini</h3>
            <?php
            $username = $_SESSION['username'];
            $query_sql="SELECT numeroOrdine, data, o.stato, valore, luogo
            FROM ordine o, stato s
            WHERE s.nome = o.stato
            AND fattorino = '$username'
            order by s.valore";
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
                     <th>Dettagli</th>
                  </tr>
               </thead>
               <tbody>
                 <?php
           				while($row = $result->fetch_assoc()) {
                    $queryStato="SELECT max(valore) as maxStato
                    FROM stato";
                    $resultS = $cn->query($queryStato);
                    if($resultS !== false){
                      if ($resultS->num_rows > 0) {
                        $rowS = $resultS->fetch_assoc();
                        $maxStato = $rowS["maxStato"];
                      }
                    }
                    if($row["valore"] === $maxStato) {
                      $max = true;
                      $stato = $row["stato"];
                    } else {
                      $max = false;
                    $valoreStato = $row["valore"]+1;
                    $queryStato="SELECT nome
                    FROM stato
                    WHERE valore = $valoreStato";
                    $resultS = $cn->query($queryStato);
                    if($resultS !== false){
                      if ($resultS->num_rows > 0) {
                        $rowS = $resultS->fetch_assoc();
                        $stato = $rowS["nome"];
                      }
                    }
                  }
           				?>
                  <tr>
                    <td><?php echo $row["numeroOrdine"]; ?></td>
                    <td>
                      <label for="status" class="hide-acc">Cambia stato</label>
                      <?php if($max) { ?>
                      <a>CONCLUSO</a>
                      <?php } else { ?>
                      <a class="link" href="changeStato.php?id=<?php echo $row['numeroOrdine'] ?>&stato=<?php echo $stato; ?>"><?php echo $stato; ?></a>
                      <?php } ?>
                    </td>
                    <td><?php echo $row["luogo"]; ?></td>
                    <td><?php echo $row["data"]; ?></td>
                     <td class="info"><a class="fa fa-info fa-2x" aria-hidden="true" value="<?php echo $row["numeroOrdine"] ?>" data-toggle="modal" data-target="#dettagli_ordine"><span class="hide-acc">Dettagli</span></a></td>
                  </tr>
                  <?php include('./include/dettagli_ordine.php);
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
        			//$cn->close();
                 ?>
         </section>
      </main>
      <footer class="panel-footer" w3-include-html="./include/footer.html"></footer>
      <?php include('./include/notification_modal.php') ?>
      <script>
         w3.includeHTML();
      </script>
   </body>
</html>

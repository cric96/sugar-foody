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
//devo controllare che ci sia almeno un ordine con stato carrello, altrimenti non saprei cosa mostrare
//devo controllare anche che sia settata almeno una categoria

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src="https://www.w3schools.com/lib/w3.js"></script>
  <script src="./js/hide-accessibily.js"></script>
  <script src="./js/modal-hide.js"></script>
  <script src="./js/checkTime.js"></script>
  <script src="./js/svuotaCarrello.js"></script>
  <script type="text/javascript" src="./js/updateOrdine.js"></script>
  <link rel="stylesheet" href="./css/catProdotti.css">
  <link rel="stylesheet" href="./css/tabelle-style.css">
  <link rel="stylesheet" href="./css/popup-basic-style.css">
  <link rel="stylesheet" href="./css/riepilogoOrdine.css">
  <link rel="stylesheet" href="./css/google-map.css">
  <title>Riepilogo ordine</title>
</head>
<?php
  $utente = $_SESSION["username"];
  $ordine = $_SESSION["ordine"];
  $query = "SELECT C.nomeIngrediente, C.idProdotto, De.prezzo, De.quantita, P.nome, De.idDettaglio
            FROM composizione C, dettaglio De, prodotto P
            WHERE De.numeroOrdine IN(
                        SELECT D.numeroOrdine
                        FROM ordine O,dettaglio D
                        WHERE O.utente ='$utente'
                        AND O.stato ='carrello'
                        AND O.numeroOrdine = D.numeroOrdine)
            AND P.id = C.idProdotto
            AND De.idProdotto = C.idProdotto
            AND C.nomeIngrediente NOT IN(
                        SELECT M.nomeIngrediente
                        FROM modifica M
                        WHERE M.idProdotto = C.idProdotto
                        AND De.idDettaglio = M.idDettaglio
                        AND M.numeroOrdine IN(
                              SELECT numeroOrdine
                              FROM ordine O
                              WHERE O.utente ='$utente'
                              AND O.stato = 'carrello')
                        AND M.rimozione = 1)
            AND C.nomeIngrediente NOT IN(
                        SELECT Co.nomeIngrediente
                        FROM composizione Co
                        WHERE Co.idProdotto = C.idProdotto
                        AND Co.aggiunta = 1
                        AND Co.nomeIngrediente NOT IN(
                              SELECT nomeIngrediente
                              FROM modifica M
                              WHERE M.idProdotto = Co.idProdotto
                              AND M.numeroOrdine IN(
                                    SELECT numeroOrdine
                                    FROM ordine O
                                    WHERE O.utente ='$utente'
                                    AND O.stato = 'carrello')
                              AND De.idDettaglio = M.idDettaglio))
            ORDER BY C.idProdotto, De.idDettaglio";
  $tot = 0;
 ?>
<body>
  <?php include("./include/navbarUtente.php");
  $querySql  = "SELECT luogo, note FROM ordine WHERE stato='carrello'";
  $res = $cn->query($querySql);
  if ($res!== false) {
    //presumo ci sarà sempre un solo ordine con stato carrello alla volta, se c'è
    if($res->num_rows != 1){
      if(!isset($_SESSION["categoria"])){?>
        <script>
          alert("Non ci sono ordini da confermare!");
          location.href = "./sceltaRistorante.php";
        </script>
      <?php
      }
      ?>
      <script>
        alert("Non ci sono ordini da confermare!");
        location.href = "./componiOrdine.php?categoria=<?php echo $_SESSION['categoria'];?>";
      </script>
      <?php
    }
  } else {
    echo "errore nella query";
  }
  $riga = $res->fetch_assoc();
  $luogo = $riga["luogo"];
  $note = $riga["note"];
  ?>
  <header>
    <div class="overlay">
      <h2 class="my-4">Riepilogo ordine</h2>
    </div>
  </header>
   <main class="container">
     <section>
       <table class="table table-striped">
         <thead thead-inverse>
           <tr>
             <th>Nome piatto</th>
             <th>Prezzo</th>
             <th>Quantità</th>
             <th>Ingredienti</th>
           </tr>
         </thead>
         <tbody>
           <?php
           $res = $cn->query($query);
           if ($res !== false) {
             if($res->num_rows > 0) {
               $first = 1;
               $row = $res->fetch_assoc();
               while($row !== NULL) {
                 $idProd = $row["idProdotto"];
                 $idDett = $row["idDettaglio"];
            ?>
             <tr scope="row">
               <td><?php echo $row["nome"]; ?></td>
               <td><?php echo "€".$row["prezzo"]/100; ?></td>
               <td><?php echo $row["quantita"]; ?></td>
               <?php $tot += $row["prezzo"]*$row["quantita"]; ?>
               <td>
                 <div>
                   <ul class="prova">
                     <?php while(($row!==NULL) && ($row["idProdotto"] === $idProd) && ($row["idDettaglio"] === $idDett)){?>
                     <li class="ingredienti"><?php echo $row["nomeIngrediente"];?></li>
                     <?php
                        $row = $res->fetch_assoc();
                      }

                     ?>
                   </ul>
                 </div>
             </td>
              <?php } ?>
             <tr scope="row">
               <?php $tot = $tot/100; ?>
               <td id="costoTot">Totale: €<?php echo $tot;?></td>
             </tr>
           <?php } else {
             echo "non ci sono elementi";
           } } else {
             echo "errore nella query";
           }?>
         </tbody>
       </table>
     </section>
     <form class="pay" method="post">
       <section>
         <div class="google">
           <input id="pac-input" class="controls" type="text" placeholder="Ricerca" value="<?php echo $luogo; ?>" required>
           <div id="map"></div>
           <script src="./js/script-google.js"></script>
           <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzSBGbvTC78VHiHMLfKfCsjiW81zRByYk&libraries=places&callback=initAutocomplete"
                async defer></script>
         </div>
         <div class="dettagli">
           <div class="dett">
             <label class="note">Note aggiuntive:
               <textarea id="note" name="Note" rows="2" cols="15" placeholder="citofono,..."><?php echo $note; ?></textarea>
             </label>
           </div>
           <label class="orario">Scegli l'orario di consegna:
              <input id="time" type="time" name="Orario" min="" max="" required>
          </label>
         </div>
       </section>
      <input id="submitButton" class="pagamento btn btn-submit float-right" type="submit" name="Paga" value="Paga">
      <input id="svuotaButton" class="pagamento btn float-right" type="reset" name="Cancella" value="Svuota carrello">
     </form>
   </main>
  <footer w3-include-html="./include/footer.html" class="panel-footer"></footer>
  <?php include('./include/notification_modal.php') ?>
  <script>
     w3.includeHTML();
  </script>
</body>
</html>

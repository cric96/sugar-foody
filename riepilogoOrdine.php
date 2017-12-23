<!--TODO passare in qualche modo il totale dell'ordine a conferma pagamento, anche se
  //il pagamento avverrà per finta-->
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src="https://www.w3schools.com/lib/w3.js"></script>
  <script src="./js/hide-accessibily.js"></script>
  <script src="./js/modal-hide.js"></script>
  <link rel="stylesheet" href="./css/catProdotti.css">
  <link rel="stylesheet" href="./css/tabelle-style.css">
  <link rel="stylesheet" href="./css/popup-basic-style.css">
  <link rel="stylesheet" href="./css/riepilogoOrdine.css">
  <link rel="stylesheet" href="./css/google-map.css">
  <title>Riepilogo ordine</title>
</head>
<?php
  require_once("./config.php");
  $utente = $_SESSION["username"];
  $query = "SELECT C.nomeIngrediente, C.idProdotto, De.prezzo, De.quantita, P.nome
            FROM composizione C, dettaglio De, prodotto P
            WHERE C.idProdotto IN(
                        SELECT D.idProdotto
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
                              WHERE M.idProdotto = Co.idProdotto))
            ORDER BY C.idProdotto";
  $res = $cn->query($query);
 ?>
<body>
  <?php include("./include/navbarUtente.php"); ?>
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
           if ($res !== false) {
             //while($row = $res->fetch_assoc()) {
               //var_dump($row);
             //}
             if($res->num_rows > 0) {
               $first = 1;
               $tot = 0;
               while($row = $res->fetch_assoc()) {
                 if($first) {
                   $idProd = $row["idProdotto"];
                 }
            ?>
             <tr scope="row">
               <td><?php echo $row["nome"]; ?></td>
               <td><?php echo "€".$row["prezzo"]/100; ?></td>
               <td><?php echo $row["quantita"]; ?></td>
               <?php $tot += $row["prezzo"] ?>
               <td>
                 <div>
                   <ul class="prova">
                     <?php while(($row!==false) && ($row["idProdotto"] === $idProd)){?>
                     <li class="ingredienti"><?php echo $row["nomeIngrediente"];?></li>
                     <?php
                        $row = $res->fetch_assoc();
                        if($idProd !==$row["idProdotto"]) {

                        }
                      }
                      $idProd = $row["idProdotto"];
                     ?>
                   </ul>
                 </div>
             </td>
              <?php } ?>
             <tr scope="row">
               <td>
                 <?php
                  $tot = $tot/100;
                  echo "Totale:  ".$tot."€"; ?>
               </td>
             </tr>
           <?php } else {
             echo "non ci sono elementi";
           } } else {
             echo "errore nella query";
           }?>
         </tbody>
       </table>
     </section>
     <form action="confermaPagamento.php" method="post">
       <section>
         <div class="google">
           <input id="pac-input" class="controls" type="text" placeholder="Ricerca" required>
           <div id="map"></div>
           <script src="./js/script-google.js"></script>
           <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzSBGbvTC78VHiHMLfKfCsjiW81zRByYk&libraries=places&callback=initAutocomplete"
                async defer></script>
         </div>

         <label class="orario">Scegli l'orario di consegna:
            <input type="time" name="" value="" required>
        </label>
       </section>

      <input class="pagamento btn btn-submit float-right" type="submit" name="Paga" value="Paga">
     </form>
   </main>
  <footer w3-include-html="./include/footer.html" class="panel-footer"></footer>
  <?php include('./include/notification_modal.php') ?>
  <script>
     w3.includeHTML();
  </script>
</body>
</html>

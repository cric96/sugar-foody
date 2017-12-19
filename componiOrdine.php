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
} else {
  if( !isset($_GET['categoria']) || empty($_GET['categoria'])) {
    ?><script type="text/javascript">
   location.href = "sceltaRistorante.php";
   </script><?php
 } else {
  $categoria = $_GET["categoria"];
  $_SESSION['categoria'] = $categoria;
 }
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
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/fa-style.css">
    <link rel="stylesheet" href="./css/componiOrdine.css">
    <link rel="stylesheet" href="./css/catProdotti.css">
    <link rel="stylesheet" href="./css/tabelle-style.css">
    <link rel="stylesheet" href="./css/popup-basic-style.css">
    <link rel="stylesheet" href="./css/modificaPiatto.css">
    <script src="./js/hide-accessibily.js"></script>
    <script src="./js/addToChart.js"></script>
    <title>Componi ordine</title>
  </head>
  <body>
    <nav w3-include-html="./include/navbarUtente.html" class="navbar navbar-expand-lg navbar-light bg fixed-top"></nav>
    <header>
      <div class="overlay">
        <h2 class="my-4">Ordine</h2>
      </div>
    </header>
    <main class="container">
      <section>
        <?php
        $ristorante = $_SESSION['nomeRistorante'];
        $query_sql="SELECT p.id, p.nome, l.prezzo FROM listino l, prodotto p
        WHERE l.idProdotto = p.id
        and l.nomeRistorante = '$ristorante'
        and p.nomeCategoria = '$categoria' ";
        $result = $cn->query($query_sql);
        if($result !== false){
          if ($result->num_rows > 0) {
        ?>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nome piatto</th>
              <th>Prezzo</th>
              <th>Aggiungi al carrello</th>
            </tr>
          </thead>
          <tbody>
            <?php
             while($row = $result->fetch_assoc()) {
                 ?>
            <tr>
              <td><?php echo $row["nome"]; ?></td>
              <td><?php echo $row["prezzo"]; ?></td>
              <td ><a class="fa fa-cart-plus modal-piatto" data-toggle="modal" data-target="#modificaPiatto" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['nome']; ?>"> <span class="hide-acc">aggiungi</span> </a></td>
            </tr>
            <?php
          }
          ?>
          </tbody>
        </table>

      <?php  } }
      else{
    ?>
      <p>Errore nell'interrogazione</p>
    <?php
      }
    //  $cn->close();
         ?>

      </section>
      <a class="fa fa-arrow-right float-right fa-5x goOn" href="riepilogoOrdine.php"> <span class="hide-acc">Prosegui</span> </a>
    </main>
    <div class="modal fade" id="modificaPiatto">
       <div class="modal-dialog">
          <div class="modal-content">
             <!-- Modal Header -->
             <div class="modal-header">
                <h4 class="modal-title" id="productName"> Modifica </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <!-- Modal body -->
             <div class="modal-body">
               <p id="productId" class="hide-acc"> Id</p>
               <form class="bubble" action="#" method="post">
                 <label class="etichetta">Quantità: <input class="qnt" type="number" min="1" max="10" name="quantità" value="1"></label>
                 <fieldset class="fset">
                   <?php
                    if( $_POST["id"] ) {
                      $id = $_POST['id'];
                       echo "Prodotto ". $id;
                    }

                    ?>
                   <legend class="ingr">Ingredienti: </legend>
                   <div class="prova">
                     <label>Ingrediente1 <input type="checkbox" name="Ingr1" value=""></label>
                     <label>Ingrediente2 <input type="checkbox" name="Ingr2" value=""></label>
                     <label>Ingrediente3 <input type="checkbox" name="Ingr1" value=""></label>
                     <label>Ingrediente4 <input type="checkbox" name="Ingr2" value=""></label>
                     <label>Ingrediente3 <input type="checkbox" name="Ingr1" value=""></label>
                     <label>Ingrediente4 <input type="checkbox" name="Ingr2" value=""></label>
                   </div>
                 </fieldset>
                 <fieldset class="fset">
                   <legend class="ingr">Aggiunte:</legend>
                   <div class="prova">
                     <label>Ingrediente1 <input type="checkbox" name="Ingr1" value=""></label>
                     <label>Ingrediente2 <input type="checkbox" name="Ingr2" value=""></label>
                     <label>Ingrediente3 <input type="checkbox" name="Ingr1" value=""></label>
                   </div>
                   </fieldset>
                   <input class="submit" type="submit" name="conferma" value="Conferma Modifiche">
                   <input class="reset" type="reset" name="Annulla" value="Annulla">
               </form>
             </div>
          </div>
       </div>
    </div>
    <footer w3-include-html="./include/footer.html" class="panel-footer"></footer>
    <script>
       w3.includeHTML();
    </script>
    <?php include('./include/notification_modal.php') ?>
  </body>
</html>

<?php
header('Content-type: application/html');
include("../secureLogin/secureLogin.php");
sec_session_start();
require_once("../config.php");
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
if(isset($_POST['rowid'])) {
   $id = $_POST['rowid'];
  $query_sql = "SELECT *
  FROM COMPOSIZIONE
  WHERE idProdotto = $id";
  $result = $cn->query($query_sql);
  if($result !== false){
    if ($result->num_rows > 0) {
      ?><form class="bubble" action="./include/addDettaglio.php?id=<?php echo $id?>" method="post">
        <label class="etichetta">Quantità: <input class="qnt" type="number" min="1" max="10" name="quantità" value="1"></label>
        <fieldset class="fset">
          <legend class="ingr">Ingredienti: </legend>
          <div class="prova">
      <?php
      while($row = $result->fetch_assoc()) {
        $ingr = $row['nomeIngrediente'];
        if($row['obbligatorio'] == 1) {
          //obbligatorio
          ?><label><?php addExtraSpaces(strlen($ingr)); echo $ingr; ?> <input type="checkbox" name="ingr[]" value="<?php echo $ingr ?>" disabled readonly checked></label><?php

        } else if($row['aggiunta'] == 0 && $row['obbligatorio'] == 0) {
          //ingrediente generico
          ?><label><?php addExtraSpaces(strlen($ingr)); echo $ingr; ?> <input type="checkbox" name="ingr[]" value="<?php echo $ingr ?>" checked></label><?php
        }
      }
    }
  }
  ?>
  </div>
  </fieldset>
  <fieldset class="fset">
    <legend class="ingr">Aggiunte:</legend>
    <div class="prova">
      <?php
      $result = $cn->query($query_sql);
      if($result !== false){
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            if($row['aggiunta'] == 1) {
              $ingr = $row['nomeIngrediente'];
              ?><label><?php addExtraSpaces(strlen($ingr)); echo $ingr; ?> <input type="checkbox" name="agg[]" value="<?php echo $ingr ?>"></label><?php
            }
          }
        }
      }
      ?>
    </div>
    </fieldset>
    <input class="submit" type="submit" name="conferma" value="Conferma">
    <input class="reset" type="reset" name="Annulla" value="Annulla">
  </form>
 <?php
}

function addExtraSpaces ($startSpaces) {
  if($startSpaces < 13) {
    echo str_repeat('&nbsp;', 13 - $startSpaces);
  }
}

?>

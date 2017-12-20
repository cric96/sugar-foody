<?php
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
if(isset($_POST["conferma"]) && isset($_GET["id"]) && !empty($_GET["id"]) && $_GET["id"] > 0) {
  if(!isset($_SESSION["ordine"])) {
    //ordine da creare
    //cerca amministratore
    $ristorante = $_SESSION["nomeRistorante"];
    $queryA = "SELECT username
    FROM UTENTE
    WHERE admin = 1
    AND nomeRistorante = '$ristorante'";
    $resultA = $cn->query($queryA);
    if($resultA !== false){
      if ($resultA->num_rows > 0) {
        $rowA = $resultA->fetch_assoc();
        $admin = $rowA["username"];
        $user = $_SESSION['username'];
        $insert="INSERT INTO `ORDINE` (`data`, `utente`, `stato`, `amministratore`)
        VALUES (now(), '$user', 'carrello', '$admin')";
        $res = $cn->query($insert);
        if($res === TRUE) {
          $_SESSION["ordine"] = $cn->insert_id;
        }
      }
    }
  }
  $idOrdine = $_SESSION["ordine"];
  $idProdotto = $_GET["id"];
  $qnt = intval($_POST["quantità"]);
  $sql='';
  $queryA = "SELECT prezzo
  FROM LISTINO
  WHERE idProdotto = $idProdotto";
  $resultA = $cn->query($queryA);
  if($resultA !== false){
    if ($resultA->num_rows > 0) {
      $rowA = $resultA->fetch_assoc();
      $prezzo=$rowA["prezzo"];
      //se ci sono ingredienti
      if (isset($_POST['ingr'])) {
        // vedere se in ingredienti ho tutti o ci sono state rimozioni
        //modificare prezzo ?
        $query = "SELECT nomeIngrediente
        FROM composizione
        where idProdotto=$idProdotto
        and aggiunta=0
        and obbligatorio=0";
        $result = $cn->query($query);
        if($result !== false){
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if (!in_array($row["nomeIngrediente"], $_POST['ingr'])) {
                  $ingrediente = $row["nomeIngrediente"];
                  $queryA = "SELECT prezzo FROM ingrediente where nome='$ingrediente'";
                  $resultA = $cn->query($queryA);
                  if($resultA !== false){
                    if ($resultA->num_rows > 0) {
                      $rowA = $resultA->fetch_assoc();
                      $prezzo -= $rowA["prezzo"];
                      $sql .= "INSERT INTO MODIFICA(idProdotto, numeroOrdine, nomeIngrediente, aggiunta, rimozione)
                        VALUES ($idProdotto, $idOrdine,'$ingrediente',0,1);";
                    }
                  }
                }
              }
            }
          }
      }
      //se ci sono aggiunte
      if (isset($_POST['agg'])) {
        foreach ($_POST['agg'] as $ingrediente) {
          //modificare prezzo
          $queryA = "SELECT prezzo FROM ingrediente where nome='$ingrediente'";
          $resultA = $cn->query($queryA);
          if($resultA !== false){
            if ($resultA->num_rows > 0) {
              $rowA = $resultA->fetch_assoc();
              $prezzo += $rowA["prezzo"];
              $sql .= "INSERT INTO MODIFICA(idProdotto, numeroOrdine, nomeIngrediente, aggiunta, rimozione)
                VALUES ($idProdotto, $idOrdine,'$ingrediente',1,0);";
            }
          }
        }
      }
      $sql .= "INSERT INTO `DETTAGLIO`(`idProdotto`, `numeroOrdine`, `prezzo`, `quantita`)
      VALUES ($idProdotto, $idOrdine, $prezzo, $qnt);";
      /*if($cn->multi_query($sql) !== TRUE)
      {
        //CAMBIA alert
        ?><script>
        alert("dettaglio non aggiunto <?php echo mysqli_error($cn) ?> ");
        </script><?php
      }*/
    }
  }
}
/*<script type="text/javascript">
location.href = "../componiOrdine.php?categoria=<?php echo $_SESSION['categoria']?>";
</script>*/
?>

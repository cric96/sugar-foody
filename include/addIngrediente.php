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
      //controllare tutte le checkbox fare la sotto e modificare il prezzo
    /*  $sql .= "INSERT INTO MODIFICA(idProdotto, numeroOrdine, nomeIngrediente, aggiunta, rimozione)
      VALUES ($idProdotto, $idOrdine,'$ingrediente',$aggiunta,$rimozione);";*/
      $sql .= "INSERT INTO `DETTAGLIO`(`idProdotto`, `numeroOrdine`, `prezzo`, `quantita`)
      VALUES ($idProdotto, $idOrdine, $prezzo, $qnt);";
      $res = $cn->multi_query($sql);
      if($res !== TRUE)
      {
        //CAMBIA alert
        ?><script>
        alert("dettaglio non aggiunto <?php echo mysqli_error($cn) ?> ");
        </script><?php
      }
    }
  }
}
?>
<script type="text/javascript">
location.href = "../componiOrdine.php?categoria=<?php echo $_SESSION['categoria']?>";
</script>

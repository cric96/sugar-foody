<?php
include("../secureLogin/secureLogin.php");
sec_session_start();
require_once("../config.php");
if(isset($_POST["conferma"])) {
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
          //prendi id mysql_insert_id() ?
        }
      }
    }

  }
  //cose fisse: aggiungi dettaglio e eventuali modifiche

}
?>

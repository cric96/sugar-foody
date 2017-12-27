<?php
include("./secureLogin/secureLogin.php");
require_once("./config.php");
sec_session_start();
$idOrdine = $_SESSION["ordine"];
$data = $_POST["data"]." ".$_POST["ora"];
$luogo = $_POST["luogo"];
$note = $_POST["note"];
$query = "UPDATE ordine
          SET data='$data', luogo='$luogo', note='$note'
          WHERE numeroOrdine=$idOrdine";
$res = $cn->query($query);
if ( $res === false) {
  echo "Query sbagliata";
}
?>

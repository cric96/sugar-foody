<?php
include("./secureLogin/secureLogin.php");
require_once("./config.php");
sec_session_start();
$idOrdine = $_SESSION["ordine"];
$pagato = $_POST["pagato"];
$query = "UPDATE ordine
          SET pagato='$pagato'
          WHERE numeroOrdine='$idOrdine'";
$res = $cn->query($query);
if ( $res === false) {
  echo "Query sbagliata";
}
?>

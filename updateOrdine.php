<?php
header('Content-type: application/json');
include("../secureLogin/secureLogin.php");
include("./config.php");
sec_session_start();
$idOrdine = $_SESSION["ordine"];
$data = $_POST["data"]." ".$_POST["ora"];
$luogo = $_POST["luogo"];
$query = "UPDATE ordine
          SET data='$data', luogo='$luogo'
          WHERE numeroOrdine='$idOrdine'";
$res = $cn->query($query);
if ( $res === false) {
  echo "Query sbagliata";
}
?>

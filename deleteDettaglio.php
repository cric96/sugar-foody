<?php
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
} else if(isset($_SESSION["ordine"]) && isset($_GET["D"]) && isset($_GET["P"])
&& !empty($_SESSION["ordine"]) && !empty($_GET["D"]) && !empty($_GET["P"])) {
  $idProd = $_GET["P"];
  $idDett = $_GET["D"];
  $idOrd = $_SESSION["ordine"];
  $sql="DELETE FROM `DETTAGLIO` WHERE idProdotto = $idProd AND numeroOrdine = $idOrd AND idDettaglio = $idDett;";
  ?><script><?php
  if($cn->query($sql) === TRUE) {
    ?>alert("Cancellazione del dettaglio avvenuta con successo");<?php
  } else {
    ?>alert("Cancellazione del dettaglio NON avvenuta");<?php
  }
  ?>
  location.href="riepilogoOrdine.php";
  </script><?php
} else {
  ?><script>alert("Cancellazione del dettaglio NON avvenuta");
  location.href="riepilogoOrdine.php";
  </script><?php
}
?>

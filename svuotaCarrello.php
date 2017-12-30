<?php
include_once("./class/ordineSet.php");
include("./secureLogin/secureLogin.php");
require_once("./config.php");
sec_session_start();
(new OrdineSet($cn))->clearChart($_SESSION["username"]);
unset($_SESSION["categoria"]);
unset($_SESSION["ordine"]);
?>
<script>
  window.location =  "/" + window.location.pathname.split('/')[1] + "/sceltaRistorante.php";
</script>

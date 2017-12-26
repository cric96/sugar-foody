<?php
include_once("./class/ordineSet.php");
include("./secureLogin/secureLogin.php");
require_once("./config.php");
sec_session_start();
(new OrdineSet($cn))->nextStatusOn($_SESSION["ordine"]);
 ?>

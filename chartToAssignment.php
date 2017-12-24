<?php
include_once("./class/ordineSet.php");
(new OrdineSet($cn))->nextStatusOn($_SESSION["ordine"]);
 ?>

<?php
  include("productSet.php");
  include_once("../config.php");
  var_dump((new ProductSet($cn))->getProduct(1));
?>

<?php
  include("productSet.php");
  include_once("../config.php");
  var_dump((new ProductSet($cn))->getProduct(1));
  (new ProductSet($cn))->createListino(array(1),"admin");
  var_dump((new ProductSet($cn))->getListino("admin"));
  var_dump((new ProductSet($cn))->updateProduct(1,"abba","descrizione","Pesce"));
  var_dump((new ProductSet($cn))->insertProduct("abba","descrizione","Pesce"));

?>

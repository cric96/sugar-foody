<?php include("./secureLogin/adminPage.php");
  include_once("./class/productSet.php");
  if(isset($_GET["prodotto"])) {
    (new ProductSet($cn))->deleteProductInListino($_GET["prodotto"],$_SESSION["nomeRistorante"]);
  }
  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

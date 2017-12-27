<?php
  header('Content-type: application/json');
  include("../secureLogin/secureLogin.php");
  sec_session_start();
  if(!isset($_POST["order"])) {
    echo json_encode(array("result"=>"bad"));
    exit();
  }
  $order = $_POST["order"];
  include_once("../class/ordineSet.php");
  include("../config.php");
  $query = (new OrdineSet($cn))->getOrder($order);
  if(!$query) {

    echo json_encode(array("result"=>"bad"));
    exit();
  }
  $products = $query->getProducts();

  $res = array();
  $index = 0;
  foreach($products as $product) {
    $res[$index] = array(
      "nome" => $product->getName(),
      "quantita" => $product->getQuantity(),
      "descrizione" => $product->getDescription(),
      "categoria" => $product->getCategory(),
      "prezzo" => $product->getPrice()
    );
    $index += 1;
  }
  echo json_encode($res, JSON_PRETTY_PRINT);
?>

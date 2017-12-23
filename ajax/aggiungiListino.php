<?php
  header('Content-type: application/json');
  include("../secureLogin/secureLogin.php");
  sec_session_start();
  if(isset($_SESSION["nomeRistorante"])) {
      if(isset($_POST["prodotto"])) {
          require_once("../config.php");
          include("../class/productSet.php");
          $res = (new ProductSet($cn))->addInListino($_POST["prodotto"],$_POST["prezzo"] * 100,$_SESSION["nomeRistorante"]);
          if(!$res) {
            echo json_encode(['result' => 'ok']);
          } else {
            echo json_encode(['result' => 'bad']);
          }
          exit();
      }
  }
  echo json_encode(['result' => 'bad']);
?>

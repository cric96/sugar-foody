<?php
  header('Content-type: application/json');
  include("../secureLogin/secureLogin.php");
  include("../class/ingredientSet.php");
  include("../config.php");
  sec_session_start();
  if(isset($_POST["nome"]) && isset($_POST["prezzo"])) {
    if((new IngredientSet($cn))->insertIngredient($_POST["nome"],$_POST["prezzo"]*100)) {
      echo json_encode(['result' => 'ok']);
    } else {
      echo json_encode(array('result' => 'bad'));
    }
    exit();
  }
  echo json_encode(['result' => 'bad']);
?>

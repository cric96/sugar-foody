<?php
  header('Content-type: application/json');
  include("../secureLogin/secureLogin.php");
  sec_session_start();
  $username = $_SESSION["username"];
  if(isset($_POST["insert"])) {
    include_once("../class/userSet.php");
    $result = (new UserSet($cn))->insertFattorino($_POST["telefono"],$POST["password"],$_POST["email"],$_POST["username"],$_POST["$nomeRistorante"]);
    if(!$result) {
      echo json_encode(array("result"=>"ok"));
    } else {
      echo json_encode(array("result"=>"bad"));
    }
  }
  
?>

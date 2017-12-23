<?php
  header('Content-type: application/json');
  include("../secureLogin/secureLogin.php");
  sec_session_start();
  if(isset($_POST["nomeRistorante"])) {
    echo json_encode(['result' => 'ok']);
  }
  echo json_encode(['result' => 'bad']);
?>

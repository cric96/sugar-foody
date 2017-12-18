
<?php
  header('Content-type: application/json');
  $username = "default";

  if(isset($_POST["reset"])) {
      require_once("../config.php");
      $res = $cn->query("DELETE FROM `notifica` WHERE username='".$username."'");
      echo json_encode(array("result"=>"ok"));
  } else {
    echo json_encode(array("result"=>"bad"));
  }
?>

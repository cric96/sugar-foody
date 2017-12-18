
<?php
  header('Content-type: application/json');
  $username = "default";

  if(isset($_POST["reset"])) {
      require_once("../config.php");
      include("../class/notificationSet.php");
      (new NotificationSet($cn))->deleteNotifications($username);
      echo json_encode(array("result"=>"ok"));
  } else {
    echo json_encode(array("result"=>"bad"));
  }
?>

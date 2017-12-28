<?php include("./secureLogin/adminPage.php");
  include_once("./class/userSet.php");
  $db = new UserSet($cn);
  if(isset($_GET["username"])) {
    $db->removeUser($_GET["username"]);
  }
  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

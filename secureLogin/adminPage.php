<?php
  include("secureLogin.php");
  sec_session_start();
  include("config.php");
  if(!login_check()) {
    ?><script type="text/javascript">
    location.href = "index.php";
    </script><?php
    $cn->close();
  }
  if(login_check_user()) {
    ?><script type="text/javascript">
    location.href = "sceltaRistorante.php";
    </script><?php
    $cn->close();
  }
  if(login_check_fattorino()) {
    ?><script type="text/javascript">
    location.href = "home_fattorini.php";
    </script><?php
    $cn->close();
  }
?>

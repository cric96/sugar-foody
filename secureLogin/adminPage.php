<?php
  include("./secureLogin.php");
  sec_session_start();
  include("config.php");
  if(!login_check()) {
    ?><script type="text/javascript">
    location.href = "index.php";
    </script><?php
    $cn->close();
  }
  if(login_check_user()) {

  }

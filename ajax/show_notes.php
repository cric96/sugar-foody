<?php
header('Content-type: application/html');
include("../secureLogin/secureLogin.php");
sec_session_start();
require_once("../config.php");
if(login_check_fattorino() != true) {
  if(login_check_user()) {
    ?><script type="text/javascript">
   location.href = "sceltaRistorante.php";
   </script><?php
  } else if (login_check_admin()) {
    ?><script type="text/javascript">
   location.href = "home_admin.php";
   </script><?php
 } else {
  ?><script type="text/javascript">
 location.href = "index.php";
 </script><?php
}
$cn->close();
}
if(isset($_POST['value'])) {
  ?><script src="./js/hide-accessibily.js"></script>
  <label for="notes" class="hide-acc">Note</label>
  <textarea readonly  id="notes" class="form-control form-control-sm" rows="3">  <?php echo $_POST['value'];?></textarea><?php
}


?>

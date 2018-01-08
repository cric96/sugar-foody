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
if(isset($_POST['id'])) {
  ?><script src="./js/hide-accessibily.js"></script>
  <label for="notes" class="hide-acc">Note</label>
  <?php
  $id = $_POST['id'];
  $query="SELECT u.username, u.email, u.telefono
  from utente u, ordine o
  where o.numeroOrdine = $id
  and o.utente = u.username";
  $res = $cn->query($query);
  if($res !== false) {
    if($res->num_rows > 0) {
      $row=$res->fetch_assoc();
      $user = $row["username"];
      $mail = $row["email"];
      $telefono = $row["telefono"];
    }
  }
  ?>
  <textarea id="notes" readonly class="form-control form-control-sm" rows="5">
Nome cliente: <?php echo $user ?>
&#13;&#10;Telefono: <?php echo $telefono ?>
&#13;&#10;Mail: <?php echo $mail ?>
  <?php if(isset($_POST['value'])) { echo "&#13;&#10;Note: ".$_POST['value'];}?>
  </textarea>
  <?php
}


?>

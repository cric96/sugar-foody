<?php
function returnHome() {
  ?><script type="text/javascript">
  location.href = "home_fattorini.php";
  </script><?php
}
// Inserisci in questo punto il codice per la connessione al DB e l'utilizzo delle varie funzioni.
include("./secureLogin/secureLogin.php");
sec_session_start();
require_once("./config.php");
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
else if(!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['stato']) || empty($_GET['stato'])) {
    returnHome();
  }
  else {
  $id = $_GET['id'];
  $stato = $_GET['stato'];
  $query="SELECT *
  FROM ordine
  WHERE numeroOrdine= $id";
  $result = $cn->query($query);
  if($result !== false){
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      if($row['fattorino'] === $_SESSION['username']) {
        //ok
        $sql="UPDATE ORDINE
        SET stato='$stato'
        WHERE numeroOrdine = $id";
        echo $sql;
        if($cn->query($sql) === TRUE) {
          ?><script type="text/javascript">
         alert("modifica di stato avvenuta correttamente");
         </script><?php
        }
      }
    }
  }
}
returnHome();
?>

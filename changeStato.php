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
  $query="SELECT o.*, s.valore
  FROM ordine o, stato s
  WHERE numeroOrdine= $id
  AND o.stato = s.nome";
  $result = $cn->query($query);
  if($result !== false){
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      if($row['fattorino'] === $_SESSION['username']) {
        //controlla se stato da assegnare ha valore parti allo di stato attuale + 1
        $check = "SELECT valore
        from Stato
        WHERE nome='$stato'";
        $resultC = $cn->query($check);
        if($resultC !== false){
          if ($resultC->num_rows == 1) {
            $rowC = $resultC->fetch_assoc();
            $valAssegnato = $rowC['valore'];
            if($row['valore'] == $rowC['valore'] - 1) {
            //ok
            $sql="UPDATE ORDINE
            SET stato='$stato'
            WHERE numeroOrdine = $id";
            if($cn->query($sql) === TRUE) {
              $check = "SELECT max(valore) as maxStato from Stato";
              $resultC = $cn->query($check);
              if($resultC !== false){
                if ($resultC->num_rows == 1) {
                  $rowC = $resultC->fetch_assoc();
                  include("./class/notificationSet.php");
                  if($rowC['maxStato'] == $valAssegnato) {
                    //notifica anche per admin perchè ho lo stato finale
                    (new NotificationSet($cn)) -> insertNotification($row['amministratore'],$id,$stato);
                  }
                  (new NotificationSet($cn)) -> insertNotification($row['utente'],$id,$stato);
                    ?><script type="text/javascript">
                   alert("modifica di stato avvenuta correttamente");
                   </script><?php
                 }
               }
            }
          }
        }
        }
      }
      }
    }
  }
  returnHome();
?>

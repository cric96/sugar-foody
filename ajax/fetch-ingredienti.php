<?php
header('Content-type: application/json');
include("../secureLogin/secureLogin.php");
sec_session_start();
if(isset($_POST['rowid'])) {
    require_once("../config.php");
   $id = $_POST['rowid'];
  echo $id;
  $query_sql = "SELECT *
  FROM COMPOSIZIONE
  WHERE idProdotto = $id";
  $result = $cn->query($query_sql);
  if($result !== false){
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo $row["nomeIngrediente"];
      }
    }
  }
}
?>

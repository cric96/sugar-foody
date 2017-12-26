<?php
include("../secureLogin/secureLogin.php");
sec_session_start();
require_once("../config.php");
if(login_check_user() != true) {
  if(login_check_fattorino()) {
    ?><script type="text/javascript">
   location.href = "home_fattorini.php";
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
if(isset($_POST["conferma"]) && isset($_GET["id"]) && !empty($_GET["id"]) && $_GET["id"] > 0) {
  if(!isset($_SESSION["ordine"])) {
    //ordine da creare, non c'è sessione e non c'è carrello
    //cerca amministratore
    $username = $_SESSION["username"];
    $queryCarrello = "SELECT o.numeroOrdine, u.nomeRistorante
    from ORDINE o, UTENTE u
    where o.utente = '$username'
    and o.stato = 'carrello'
    and o.amministratore = u.username";
    $result = $cn->query($queryCarrello);
    if($result !== false){
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['ordine'] = $row['numeroOrdine'];
        if($_SESSION['nomeRistorante'] !== $row['nomeRistorante']) {
          ?><script>
          alert("il tuo ordine in sospeso è presso il ristorante <?php echo $row['nomeRistorante'] ?>, per cui devi continuare ad ordinare presso di lui.");
          location.href("./categoriaProdotti.php?nome=<?php echo $row["nomeRistorante"];?>");
        </script><?php
        }
        insertDetails($cn);
      } else {
        $ristorante = $_SESSION["nomeRistorante"];
        $queryA = "SELECT username
        FROM UTENTE
        WHERE admin = 1
        AND nomeRistorante = '$ristorante'";
        $resultA = $cn->query($queryA);
        if($resultA !== false){
          if ($resultA->num_rows > 0) {
            $rowA = $resultA->fetch_assoc();
            $admin = $rowA["username"];
            $user = $_SESSION['username'];
            $insert="INSERT INTO ORDINE (utente, stato, amministratore)
            VALUES ('$user', 'carrello', '$admin')";
            $res = $cn->query($insert);
            if($res === TRUE) {
              $_SESSION["ordine"] = $cn->insert_id;
              insertDetails($cn);
            }
          }
        }
      }
    }
  } else {
    insertDetails($cn);
  }?>
  <script type="text/javascript">
    alert("errore nel sistema, contatta un tecnico.");
    location.href = "../componiOrdine.php?categoria=<?php echo $_SESSION['categoria']?>";
  </script>
  <?php
}

function getIdDettaglio($cn, $idOrdine, $idProdotto) {
  $queryA = "SELECT max(idDettaglio) as maxId
  FROM DETTAGLIO
  WHERE numeroOrdine = $idOrdine
  AND idProdotto = $idProdotto";
  $resultA = $cn->query($queryA);
  if($resultA !== false){
    if ($resultA->num_rows > 0) {
      $rowA = $resultA->fetch_assoc();
      return $rowA['maxId'] + 1;
    }
    return 1;
  }
  exitFrom();
  exit(1);
}

function getPrezzo($cn, $idProdotto, $ristorante) {
  $queryA = "SELECT prezzo
            FROM LISTINO
            WHERE idProdotto = $idProdotto
            AND nomeRistorante = '$ristorante'";
  $resultA = $cn->query($queryA);
  if($resultA !== false){
    if ($resultA->num_rows > 0) {
      $rowA = $resultA->fetch_assoc();
      return $rowA["prezzo"];
    }
  }
  exitFrom();
  exit(1);
}

function rimozioni($cn, $idDettaglio, $idProdotto, $idOrdine) {
  $rm ='';
  if (isset($_POST['ingr'])) {
    $query = "SELECT nomeIngrediente
    FROM composizione
    where idProdotto=$idProdotto
    and aggiunta=0
    and obbligatorio=0";
    $result = $cn->query($query);
    if($result !== false){
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if (!in_array($row["nomeIngrediente"], $_POST['ingr'])) {
              $ingrediente = $row["nomeIngrediente"];
              $rm .= "INSERT INTO MODIFICA(idDettaglio, idProdotto, numeroOrdine, nomeIngrediente, rimozione)
                    VALUES ($idDettaglio, $idProdotto, $idOrdine,'$ingrediente',1);";
            }
        }
      }
    }
  } else {
    //non c'è il post di ingredienti equivale a dire che o il prodotto non ha ingredienti
    //che si possono rimuovere, o si sono rimossi tutti gli ingredienti rimovibili
    $query = "SELECT nomeIngrediente
    FROM composizione
    where idProdotto=$idProdotto
    and aggiunta=0
    and obbligatorio=0";
    $result = $cn->query($query);
    if($result !== false){
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
              $ingrediente = $row["nomeIngrediente"];
              $rm .= "INSERT INTO MODIFICA(idDettaglio, idProdotto, numeroOrdine, nomeIngrediente, rimozione)
                    VALUES ($idDettaglio, $idProdotto, $idOrdine,'$ingrediente',1);";
            }
        }
      }
  }
  return $rm;
}

function aggiunte($cn, $idDettaglio, $idProdotto, $idOrdine, &$prezzo) {
  $ag = '';
  if (isset($_POST['agg'])) {
    foreach ($_POST['agg'] as $ingrediente) {
      //modificare prezzo
      $queryA = "SELECT prezzo FROM ingrediente where nome='$ingrediente'";
      $resultA = $cn->query($queryA);
      if($resultA !== false){
        if ($resultA->num_rows > 0) {
          $rowA = $resultA->fetch_assoc();
          $prezzo += $rowA["prezzo"];
          $ag .= "INSERT INTO MODIFICA(idDettaglio, idProdotto, numeroOrdine, nomeIngrediente, aggiunta)
            VALUES ($idDettaglio, $idProdotto, $idOrdine,'$ingrediente',1);";
        }
      }
    }
  }
  return $ag;
}

function insertDetails($cn) {
  $idOrdine = $_SESSION["ordine"];
  $idProdotto = $_GET["id"];
  $idDettaglio = getIdDettaglio($cn, $idOrdine, $idProdotto);
  $qnt = intval($_POST["quantità"]);
  $sql='';
  $ristorante = $_SESSION["nomeRistorante"];
  $prezzo = getPrezzo($cn, $idProdotto, $ristorante);
  if(checkDuplicati($cn, $idDettaglio, $idProdotto, $idOrdine, $qnt) === 0) {
    $sql .= rimozioni($cn, $idDettaglio, $idProdotto, $idOrdine);
    $sql .= aggiunte($cn, $idDettaglio, $idProdotto, $idOrdine, $prezzo);
    $sql = "INSERT INTO DETTAGLIO(idDettaglio, idProdotto, numeroOrdine, prezzo, quantita)
    VALUES ($idDettaglio, $idProdotto, $idOrdine, $prezzo, $qnt);" . $sql;
    ?><script><?php
    if($cn->multi_query($sql) === TRUE)
    {
      ?>alert("Dettaglio aggiunto correttamente");<?php
    } else {
      ?>alert("Dettaglio non aggiunto, contatta il tecnico");<?php
    }
    ?></script><?php
  }
  exitFrom();
}

//return true if there are duplicates, and in this casa update quantity field
function checkDuplicati($cn, $idDettaglio, $idProdotto, $idOrdine, $qnt) {
  if($idDettaglio > 1) {
    $agg = [];
    if(isset($_POST['agg'])) {
      foreach($_POST['agg'] as $item) {
        $agg[] = $item;
      }
    }
    $ingr = [];
    $query = "SELECT nomeIngrediente
    FROM composizione
    where idProdotto=$idProdotto
    and obbligatorio = 0
    and aggiunta = 0";
    $res=$cn->query($query);
    if($res !== false) {
      if($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
          $ingr[] = $row['nomeIngrediente'];
        }
      } else {
        return 0;
      }
    } else {
      return 0;
    }
    if(isset($_POST['ingr'])) {
      foreach($_POST['ingr'] as $item)
      {
        if (($key = array_search($item, $ingr)) !== false) {
            unset($ingr[$key]);
        }
      }
    }
    //ho due array: agg e ingr con le aggiunte e rimozioni del prodotto
    //per ogni dettaglio di quell'ordine mi salvo, array di modifiche e rimozioni
    //e confronto con quelli del mio prodotto
    $queryNoMod = "SELECT d.idDettaglio, m.aggiunta, m.rimozione, m.nomeIngrediente, d.quantita
        FROM DETTAGLIO d LEFT JOIN MODIFICA m
            ON d.idDettaglio = m.idDettaglio
            and d.numeroOrdine = m.numeroOrdine
            AND d.idProdotto = m.idProdotto
          where d.numeroOrdine = $idOrdine
          order by d.idDettaglio";
    $rowDet = 1;
    $q = 0;
    $detAgg = [];
    $detRim = [];
    $res=$cn->query($queryNoMod);
    if($res !== false) {
      if($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
          if($rowDet != intval($row["idDettaglio"])) {
            if($agg == $detAgg && $ingr == $detRim) {
              $q += $qnt;
              $update="UPDATE Dettaglio
              SET quantita = $q
              WHERE idDettaglio = $rowDet
              AND numeroOrdine = $idOrdine
              AND idProdotto = $idProdotto";
              if($cn->query($update) === true)
              {
                ?><script>alert("Dettaglio aggiunto correttamente");</script><?php
                return 1;
              } else {
                return 0;
              }
            }
            $detAgg = [];
            $detRim = [];
            $rowDet = intval($row["idDettaglio"]);
          }
          if($row["aggiunta"] == 1) {
              $detAgg[] = $row['nomeIngrediente'];
          } else if($row["rimozione"] == 1) {
              $detRim[] = $row['nomeIngrediente'];
          }
          $q = intval($row['quantita']);
        }
        if($agg == $detAgg && $ingr == $detRim) {
          $q += $qnt;
          $update="UPDATE Dettaglio
          SET quantita = $q
          WHERE idDettaglio = $rowDet
          AND numeroOrdine = $idOrdine
          AND idProdotto = $idProdotto";
          if($cn->query($update) === true)
          {
            ?><script>alert("Dettaglio aggiunto correttamente");</script><?php
            return 1;
          } else {
            return 0;
          }
        }
      } else {
        return 0;
      }
    } else {
      return 0;
    }
  }
  return 0;
}

function exitFrom() {
?><script type="text/javascript">
  location.href = "../componiOrdine.php?categoria=<?php echo $_SESSION['categoria']?>";
</script><?php
} ?>

<?php
  include_once("ordine.php");
  include_once("notificationSet.php");
  include_once("DBSet.php");
  //Astrazione della raffigurazione degli ingredienti del db
  class OrdineSet extends DBSet{

    private $stmInsert;
    private $stmUpdateFattorino;
    private $stmUpdateStandard;
    private $stmUpdate;
    private $stmSelectUser;
    private $stmSelectAdmin;

    public function __construct($con) {
      parent::__construct($con);
      $this->stmInsert = $this->con->prepare("INSERT INTO ORDINE (`data`, `utente`, `luogo`, `stato`,`amministratore`) VALUES (?,?,?,?,?)");
      $this->stmUpdateFattorino = $this->con->prepare("UPDATE ORDINE SET `fattorino`=?, stato=`elaborazione` WHERE  numeroOrdine=?");
      $this->stmUpdateStandard = $this->con->prepare("UPDATE ORDINE SET  stato=`elaborazione` WHERE numeroOrdine=?");
      $this->stmUpdate = $con->prepare("UPDATE ORDINE SET  stato=? WHERE numeroOrdine=?");
      $this->stmSelectUser = $con->prepare("SELECT FROM ORDINE WHERE utente=?");
      $this->stmSelectAdmin = $con->prepare("SELECT FROM ORDINE WHERE admin=?");
    }

    protected function createElement($row) {
      
    }
  }
 ?>

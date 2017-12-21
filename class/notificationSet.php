<?php
  //TODO AGGIUNGI STATO COME ARRAY DI stato["nome"], stato["valore"]
  include_once("notification.php");
  include_once("DBSet.php");
  //Quando puoi aggiungi controlli aggiuntivi: verificare che l'username esiste ecc
  /*
    Rappresenta tutte le notifiche del sistama -> astrazione del db
  */
  class NotificationSet extends DBSet{
    private $stmInsert;
    private $stmSelect;
    private $stmDelete;
    private $username;
    private $idOrder;
    private $status;
    public function __construct($con) {
      parent::__construct($con);
      $this->stmInsert = $con->prepare("INSERT INTO `notifica` (`id`, `username`, `numeroOrdine`, `stato`) VALUES (NULL, ?, ?, ?)");
      $this->stmSelect = $con->prepare("SELECT * FROM `notifica` WHERE username = ?");
      $this->stmDelete = $con->prepare("DELETE FROM `notifica` WHERE username=?");
      $this->username = '';
      $this->idOrder = '';
      $this->status= '';
      $this->stmSelect->bind_param("s",$this->username);
      $this->stmDelete->bind_param("s",$this->username);
      $this->stmInsert->bind_param("sss",$this->username,$this->idOrder,$this->status);
    }
    //serve per inserire una determinata notifica destinata ad un certo utente
    public function insertNotification($username,$idOrder,$status) {
      $this->username = $username;
      $this->idOrder = $idOrder;
      $this->status = $status;
      return parent::executeBasicQuery($this->stmInsert);
    }
    //cancella tutte le notifiche di un determinato utente
    public function deleteNotifications($username) {
      $this->username = $username;
      return parent::executeBasicQuery($this->stmDelete);

    }
    //restituisce tutte le notifiche di un utente
    public function getNotification($username) {
      $this->username = $username;
      return parent::executeSelectQuery($this->stmSelect);
    }
    protected function createElement($row) {
      return new Notification($row["stato"],$row["numeroOrdine"]);
    }
  }
?>

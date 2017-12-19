<?php
  include("notification.php");
  //Quando puoi aggiungi controlli aggiuntivi: verificare che l'username esiste ecc
  /*
    Rappresenta tutte le notifiche del sistama -> astrazione del db
  */
  class NotificationSet {
    private $con;
    private $stmInsert;
    private $stmSelect;
    private $stmDelete;
    private $username;
    private $idOrder;
    private $status;
    public function __construct($con) {
      $this->con = $con;
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
      $this->stmInsert->execute();
      if($this->stmInsert->get_result() === FALSE) {
        return false;
      }
      return true;
    }
    //cancella tutte le notifiche di un determinato utente
    public function deleteNotifications($username) {
      $this->username = $username;
      $this->stmDelete->execute();
      if($this->stmDelete->get_result() === FALSE) {
        return false;
      }
      return true;
    }
    //restituisce tutte le notifiche di un utente
    public function getNotification($username) {
      $this->username = $username;
      $this->stmSelect->execute();
      $query = $this->stmSelect->get_result();
      if($query === FALSE) {
        return false;
      }
      $res = array();
      $index = 0;
      if ($query->num_rows>0) {
        while($row_data = $query->fetch_assoc()) {
          $res[$index] = new Notification($row_data["stato"],$row_data["numeroOrdine"]);
          $index = $index + 1;
        }
      }
      return $res;
    }
  }
?>

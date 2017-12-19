<?php
  /*
    Classe utilizzata per gestire le notifiche
  */
  class Notification {
    private $status;
    private $idOrder;

    public function __construct($status,$idOrder){
      $this->status = $status;
      $this->idOrder = $idOrder;
    }
    //restituisce lo stato della notifica
    public function getStatus() {
      return $this->status;
    }
    //restituisce id dell'ordine associato alla notifica
    public function getOrder() {
      return $this->idOrder;
    }
  }
?>

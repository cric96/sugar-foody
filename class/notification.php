<?php
  class Notification {
    private $status;
    private $idOrder;

    public function __construct($status,$idOrder){
      $this->status = $status;
      $this->idOrder = $idOrder;
    }

    public function getStatus() {
      return $this->status;
    }

    public function getOrder() {
      return $this->idOrder;
    }
  }
?>
